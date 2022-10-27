<?php

namespace App\Command;

use App\Tools\StaticImportMethods;
use Exception;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\ExceptionInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class importProducts extends AbstractCommand
{

    protected static $defaultName = 'app:importProducts';

    const CLASSNAME = "Products";
    const LOCAL_INPUT_PATH = "input";
    const LOCAL_ARCHIVE_PATH = "archive";

    protected function configure()
    {
        $className = self::CLASSNAME;

        $this
            ->setName("$className import")
            ->setHelp("This command allows you to import some $className objects")
            ->addOption(
                'monitoring-item-id',
                null,
                InputOption::VALUE_REQUIRED,
                'Contains the monitoring item if executed via the Pimcore backend'
            )
            ->setDescription("This command allows you to import some $className objects")
            ->addArgument("classNames", InputArgument::IS_ARRAY, "The name of the class(es) to upsert");
    }

    /**
     * @throws Exception
     */
    protected function importProducts($item, $objectClass, $parentFolder): bool
    {
        $trimmedCode = trim($item["sku"]);

        if (empty($trimmedCode)) {
            throw new Exception("Mandatory field sku not present!");
        }

        // upsert or delete the objects
        $o = StaticImportMethods::createOrGetObjectByCode($trimmedCode, $objectClass);
        if (!empty($item["isDelete"]) && $item["isDelete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setParentId($parentFolder->getId());
        $o->setKey($trimmedCode);

        $o->setName($item["name"]);

        // sector
        $sector = DataObject\Sector::getByCode($item["sector"]);
        if (!empty($sector->count())) {
            foreach ($sector->load() as $singleSector) {
                $o->setSector($singleSector);
            }
        }  else {
            $o->setSector(null);
        }

        // family
        $family = DataObject\Family::getByCode($item["family"]);
        if (!empty($family->count())) {
            foreach ($family->load() as $singleFamily) {
                $o->setFamily($singleFamily);
            }
        }  else {
            $o->setFamily(null);
        }

        // subfamily
        $subfamily = DataObject\SubFamily::getByCode($item["subFamily"]);
        if (!empty($subfamily->count())) {
            foreach ($subfamily->load() as $singleSubFamily) {
                $o->setSubFamily($singleSubFamily);
            }
        }  else {
            $o->setSubFamily(null);
        }



        $o->setBrand($item["brand"]);
        $o->setBrandCattel($item["brandCattel"]);


        $o->setPublished(true);
        if ($o->save()) {
            return true;
        };

        return false;
    }

    protected function importSector($item, $objectClass, $parentFolder): bool
    {
        $trimmedCode = trim($item["sku"]);

        dd($trimmedCode);

        return false;
    }


    /**
     * @throws Exception
     */
    public
    function selectMethodByProductsClassName($item, $objectClass, $parentFolder): bool
    {
        switch ($objectClass) {
            case "Product":
                return $this->importProducts($item, $objectClass, $parentFolder);
                break;

            case "Sector":
                return $this->importSector($item, $objectClass, $parentFolder);
                break;
            default:
                return $this->importProducts($item, $objectClass, $parentFolder);
                break;
            /*
                case "Family":
                return $this->importProducts($item, $objectClass, $parentFolder);
                break;
            case "Subfamily":
                return $this->importProducts($item, $objectClass, $parentFolder);
                break;
*/
        }
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $archivePath = self::LOCAL_ARCHIVE_PATH;
        $divisionName = self::CLASSNAME;
        $inputPath = self::LOCAL_INPUT_PATH;

        // create folder Fabric if it does not exist
        $fabricPimcoreFolder = StaticImportMethods::createOrGetFolderByPath("/{$divisionName}", 1);
        $fabricClassesArray = array("Product",
            "Sector",
            "Family",
            "Subfamily");

        StaticImportMethods::consoleInputValuesManagement($input, $fabricClassesArray, $inputPath, $archivePath, $fabricPimcoreFolder, $output, $divisionName);

        return Command::SUCCESS;
    }
}

