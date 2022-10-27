<?php

namespace App\Tools;

use App\Command\importProducts;
use Exception;
use League\Csv\Reader;
use League\Csv\Statement;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Folder;
use Symfony\Component\Filesystem\Filesystem;
use Carbon\Carbon;

class StaticImportMethods
{
    // create or get the dataObject given by the code
    public static function createOrGetObjectByCode(string $code, string $objectClass)
    {
        $stringClass = "Pimcore\Model\DataObject\\" . $objectClass;

        empty($stringClass::getBySku($code)->count()) ?
            $o = new $stringClass() :
            $o = $stringClass::getBySku($code)->getData()[0];

        return $o;
    }

    // create or get the folder given by the path
    public static function createOrGetFolderByPath(string $path, int $parentId): Folder|DataObject\AbstractObject|DataObject\Concrete|null
    {
        Folder::getByPath($path) ?
            $locFolder = Folder::getByPath($path) :
            $locFolder = Folder::create(array('o_parentId' => $parentId, 'o_creationDate' => time(), 'o_published' => true, "o_key" => basename($path)));

        return $locFolder;
    }

    // create or get the asset given by the path
    public static function createOrGetAssetByPath(string $path): Asset|Asset\Image|null
    {

        Asset\Image::getByPath($path) ?
            $o = Asset\Image::getByPath($path) :
            $o = new Asset\Image();
        return $o;

    }

    // check if in the given $inputPath there are files with $objectClass in the name
    public static function searchFilesInFolderByClassName($objectClass, $inputPath): array
    {
        $files = scandir("$inputPath");
        $arrayFiles = [];
        foreach ($files as $file) {
            preg_match("/^${objectClass}_+[0-9]+.csv/", $file, $matches);
            $match = $matches[0] ?? "";
            if (stristr($match, $objectClass . "_")) {
                $timestamp = explode(".", explode("_", $file)[1]);
                $arrayFiles["$inputPath/" . $file] = $timestamp[0];
            }
        }
        return $arrayFiles;
    }

    public static function setManyToOneRelation($objectClass, $item, $o)
    {
        $stringClass = "Pimcore\Model\DataObject\\" . $objectClass;
        $dataObject = $stringClass::getByCode($item["$objectClass"]);
        if (strpos($item["$objectClass"], "|")) {
            throw new Exception("Invalid value for this field! Many-to-One relation, only one element is allowed");
        }

        $stringMethod = "set" . $objectClass;
        if (!empty($dataObject->count())) {
            foreach ($dataObject->load() as $dataObject) {
                $o->$stringMethod($dataObject);
            }
        } else {
            $o->$stringMethod(null);

        }
        return $o;
    }
    
    private static function writeCSVerrorAndSuccessFilesFullMethod($archiveLocalPath, $pimcoreFolder, $now, $dataObjectClassName,
                                                                   $divisionName, $inputLocalPath, $output): void
    {
        $filesList = self::searchFilesInFolderByClassName($dataObjectClassName, $inputLocalPath);
        $filesystem = new Filesystem();
        $year = Carbon::now('Europe/Rome')->isoFormat('YYYY');

        // return exception if there aren't files in the local folder
        // create local archive folder if needed
        if (empty($filesList)) {
            $output->writeln("<question>No files found for the $dataObjectClassName class!<question>");
        } else {
                !$filesystem->exists("$archiveLocalPath/$year/$now") ??
                $filesystem->mkdir("$archiveLocalPath/$year/$now");
        }

        // define useful variables
        $stringDivision = "App\Command\\import$divisionName";
        $stringSelectDivisionSwitchMethod = "selectMethodBy" . $divisionName . "ClassName";

        // create the objectFolder folder in Pimcore if it does not exist
        $folderPath = "/{$divisionName}s/{$dataObjectClassName}s";
        $parentFolder = StaticImportMethods::createOrGetFolderByPath($folderPath, $pimcoreFolder->getId());

        // start the processing of the files found in the local folder
        foreach ($filesList as $file => $timestamp) {
            $fileName = basename($file);

            // prepare the success and error files writing the columns
            $csv = Reader::createFromPath("$file");
            $csv->setDelimiter(';');
            $fileColumns = $csv->fetchOne();
            $filesystem->appendToFile("$archiveLocalPath/$year/$now/{$dataObjectClassName}_{$timestamp}_success.csv", implode(';', $fileColumns) . "\r\n");

            // add the error column for the _error.csv file
            $fileColumns[] = "error";
            $filesystem->appendToFile("$archiveLocalPath/$year/$now/{$dataObjectClassName}_{$timestamp}_error.csv", implode(';', $fileColumns) . "\r\n");

            // read the csv line-by-line to import the items
            $csv->setHeaderOffset(0); //set the CSV header offset
            $csvRecords = Statement::create()->process($csv);

            // process the record one-by-one using the method for the corresponding class
            foreach ($csvRecords as $index => $item) {
                try {
                    // search the correct method for the selected Division; then starts with the processing
                    $responseToSingleObjectProcessing = (new $stringDivision())->$stringSelectDivisionSwitchMethod($item, $dataObjectClassName, $parentFolder);
                    if ($responseToSingleObjectProcessing) {
                        $filesystem->appendToFile("$archiveLocalPath/$year/$now/{$dataObjectClassName}_{$timestamp}_success.csv", implode(';', $item) . "\r\n");
                        $output->writeln("<info>$dataObjectClassName {$item["sku"]} for file $fileName upserted!</info>");
                    } else {
                        $output->writeln("<error>Class $dataObjectClassName not found!<error>");
                    }

                } // if there are an exception, write it in the _error file
                catch (Exception $e) {
                    $output->writeln("<error>Error found for item $index {$item["sku"]} for file $fileName</error>");
                    $item[] = "{$e->getMessage()}, line {$e->getLine()}";
                    $filesystem->appendToFile("$archiveLocalPath/$year/$now/{$dataObjectClassName}_{$timestamp}_error.csv", implode(';', $item) . "\r\n");

                }
            }
            // move the origin file to the archive folder
            //$filesystem->rename("$file", "$archiveLocalPath/$year/$now/{$dataObjectClassName}_$timestamp.csv");
            $filesystem->copy("$file", "$archiveLocalPath/$year/$now/{$dataObjectClassName}_$timestamp.csv");
        }
    }

    /**
     * @throws Exception
     */
    public static function consoleInputValuesManagement($input, $classesArray, $inputPath, $archivePath, $pimcoreFolder, $output, $division): void
    {
        // import only the class(es) in input, if there are any
        $now = Carbon::now('Europe/Rome')->isoFormat('YYYYMMDD_HHmmss');

        if ($input->getArgument("classNames")) {

            foreach ($input->getArgument("classNames") as $singleInputClass) {
                if (!in_array($singleInputClass, $classesArray) ||
                    !class_exists("Pimcore\Model\DataObject\\" . $singleInputClass)) {
                    $output->writeln("<error>CLASS $singleInputClass DOES NOT EXIST! <error>");
                    continue;
                }

                // create folder Yarn if it does not exist
                $filesystem = new Filesystem();
                if (!is_file("$archivePath")) {
                    $filesystem->mkdir("$archivePath");
                }

                self::writeCSVerrorAndSuccessFilesFullMethod("$archivePath", $pimcoreFolder, $now, $singleInputClass, $division, $inputPath, $output);
            }
        } else {
            foreach ($classesArray as $class) {
                self::writeCSVerrorAndSuccessFilesFullMethod("$archivePath", $pimcoreFolder, $now, $class, $division, $inputPath, $output);
            }
        }
    }
}
