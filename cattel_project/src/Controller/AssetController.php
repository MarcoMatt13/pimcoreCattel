<?php

namespace App\Controller;

use App\Tools\StaticImportMethods;
use Carbon\Carbon;
use Exception;
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Family;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\Product\Listing;
use Pimcore\Model\DataObject\Sector;
use Pimcore\Model\DataObject\SubFamily;
use Pimcore\Model\Element\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssetController
{

    /**
     * @throws Exception
     */
    public function onAssetPostUpdate(): void
    {

        // recover all the asset modified in the last 24 hours
        $now = time();
        $totAss = new \Pimcore\Model\Asset\Listing();
        $totAss->setCondition("${now} - modificationDate <= 86400")->getData();

        $allDataObj = new DataObject\Product\Listing();

        foreach ($totAss as $updateImg) {
            foreach ($allDataObj as $singleObj) {
                if ($singleObj->getImage() && $singleObj->getImage()->getFullPath() === $updateImg->getFullPath()) {
                    $singleObj->setLastModifiedImage(Carbon::now('Europe/Rome')->isoFormat('YYYYMMDD_HHmmss'));
                    $singleObj->setImage(Asset::getById($updateImg->getId()));
                    $singleObj->save();
                }
            }
        }
    }


    /**
     * @throws Exception
     */
    public function onAssetPreDelete(ElementEventInterface $e): void
    {

        $now = time();
        $asset = $e->getElement();
        $allDataObj = new DataObject\Product\Listing();

        foreach ($allDataObj as $singleObj) {
            if ($singleObj->getImage() && $singleObj->getImage()->getFullPath() === $asset->getFullPath()) {
                $singleObj->setLastModifiedImage(Carbon::now('Europe/Rome')->isoFormat('YYYYMMDD_HHmmss'));
                $singleObj->setImage(null);
                $singleObj->save();
            }
        }
    }

}
