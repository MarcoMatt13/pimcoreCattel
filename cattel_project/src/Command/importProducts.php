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
        $trimmedCode = trim($item["Code"]);

        if (empty($trimmedCode)) {
            throw new Exception("Mandatory field Code not present!");
        }

        // upsert or delete the objects
        $o = StaticImportMethods::createOrGetObjectByCode($trimmedCode, $objectClass);

        if(!empty($item["Delete"]) && $item["Delete"] == 'true') {
            $o->delete();
            return true;
        }

        $o->setParentId($parentFolder->getId());


        $o->setKey($trimmedCode);
        $o->setDescription($item["Description"]);

        $o->setCode($trimmedCode);
        $o->setPublished(true);
        if ($o->save()) {
            return true;
        };

        return false;
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
        $fabricPimcoreFolder = StaticImportMethods::createOrGetFolderByPath("/{$divisionName}s", 1);
        $fabricClassesArray = array("Products",
            "Sector",
            "Family",
            "Subfamily");

        StaticImportMethods::consoleInputValuesManagement($input, $fabricClassesArray, $inputPath, $archivePath, $fabricPimcoreFolder, $output, $divisionName);

        return Command::SUCCESS;
    }
}

