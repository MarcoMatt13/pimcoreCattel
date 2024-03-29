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


class importData extends AbstractCommand
{

    protected static $defaultName = 'app:importData';

    const CLASSNAME = "Data";
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
        $o = StaticImportMethods::createOrGetProductBySku($trimmedCode);
        if (!empty($item["isDelete"]) && $item["isDelete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setSku($trimmedCode);
        $o->setParentId($parentFolder->getId());
        $o->setKey($trimmedCode);

        $o->setName($item["name"]);

        // sector
        $sector = DataObject\Sector::getByCode($item["sector"]);
        if (!empty($sector->count())) {
            foreach ($sector->getData() as $singleSector) {
                $o->setSector([$singleSector]);
            }
        } else {
            $o->setSector(null);
        }

        // family
        $family = DataObject\Family::getByCode($item["family"]);
        if (!empty($family->count())) {
            foreach ($family->load() as $singleFamily) {
                $o->setFamily([$singleFamily]);
            }
        } else {
            $o->setFamily(null);
        }

        // subfamily
        $subfamily = DataObject\SubFamily::getByCode($item["subFamily"]);
        if (!empty($subfamily->count())) {
            foreach ($subfamily->load() as $singleSubFamily) {
                $o->setSubFamily([$singleSubFamily]);
            }
        } else {
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
        $trimmedCode = trim($item["code"]);

        if (empty($trimmedCode)) {
            throw new Exception("Mandatory field sku not present!");
        }

        // upsert or delete the objects
        $o = StaticImportMethods::createOrGetObjectByCode($trimmedCode, $objectClass);
        if (!empty($item["isDelete"]) && $item["isDelete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setKey($trimmedCode);
        $o->setCode($trimmedCode);
        $o->setTitle($item["title"]);
        $o->setDescription($item["description"]);

        $o->setParentId($parentFolder->getId());

        $o->setPublished(true);
        if ($o->save()) {
            return true;
        };

        return false;
    }

    protected function importFamily($item, $objectClass): bool
    {
        $trimmedCode = trim($item["code"]);

        if (empty($trimmedCode)) {
            throw new Exception("Mandatory field sku not present!");
        }

        $parentSector = DataObject\Sector::getByCode($item["sector"])->getData();
        if (empty($parentSector)) {
            throw new Exception("Sector non trovato!");
        }

        // upsert or delete the objects
        $o = StaticImportMethods::createOrGetObjectByCode($trimmedCode, $objectClass);
        if (!empty($item["isDelete"]) && $item["isDelete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setKey($trimmedCode);
        $o->setCode($trimmedCode);
        $o->setTitle($item["title"]);
        $o->setDescription($item["description"]);

        $o->setParentId($parentSector[0]->getId());

        $o->setPublished(true);
        if ($o->save()) {
            return true;
        };

        return false;
    }

    protected function importSubFamily($item, $objectClass): bool
    {
        $trimmedCode = trim($item["code"]);

        if (empty($trimmedCode)) {
            throw new Exception("Mandatory field sku not present!");
        }

        $parentFamily = DataObject\Family::getByCode($item["family"])->getData();
        if (empty($parentFamily)) {
            throw new Exception("Family non trovata!");
        }

        // upsert or delete the objects
        $o = StaticImportMethods::createOrGetObjectByCode($trimmedCode, $objectClass);
        if (!empty($item["isDelete"]) && $item["isDelete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setKey($trimmedCode);
        $o->setCode($trimmedCode);
        $o->setTitle($item["title"]);
        $o->setDescription($item["description"]);

        $o->setParentId($parentFamily[0]->getId());

        $o->setPublished(true);
        if ($o->save()) {
            return true;
        };

        return false;
    }


    /**
     * @throws Exception
     */
    public
    function selectMethodByDataClassName($item, $objectClass, $parentFolder): bool
    {
        return match ($objectClass) {
            "Product" => $this->importProducts($item, $objectClass, $parentFolder),
            "Sector" => $this->importSector($item, $objectClass, $parentFolder),
            "Family" => $this->importFamily($item, $objectClass),
            "SubFamily" => $this->importSubFamily($item, $objectClass),

        };
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
        $pimcoreFolder = StaticImportMethods::createOrGetFolderByPath("/$divisionName", 1);
        $classesArray = array(
            "Sector",
            "Family",
            "SubFamily",
            "Product"
        );

        StaticImportMethods::consoleInputValuesManagement($input, $classesArray, $inputPath, $archivePath, $pimcoreFolder, $output, $divisionName);

        return Command::SUCCESS;
    }
}

