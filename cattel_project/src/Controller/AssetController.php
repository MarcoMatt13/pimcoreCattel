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
        $nowCarbon = Carbon::createFromTimestamp($now)->timezone('Europe/Rome')->isoFormat('MMMM Do YYYY, h:mm:ss a');
        $totAss = new \Pimcore\Model\Asset\Listing();
        $totAss->setCondition("${now} - modificationDate <= 86400")->getData();

        $allDataObj = new DataObject\Product\Listing();

        foreach ($totAss as $updateImg) {
            foreach ($allDataObj as $singleObj) {
                if ($singleObj->getImage() && $singleObj->getImage()->getFullPath() === $updateImg->getFullPath()) {
                    $singleObj->setLastModifiedImage($nowCarbon);
                    $singleObj->setImage(Asset::getById($updateImg->getId()));
                    $singleObj->save();
                }
            }
        }
    }


    /**
     * @throws Exception
     */
    public function onImagePreDelete(ElementEventInterface $e): void
    {

        $asset = $e->getElement();
        $allDataObj = new DataObject\Product\Listing();
        $now = Carbon::now('Europe/Rome')->isoFormat('MMMM Do YYYY, h:mm:ss a');

        foreach ($allDataObj as $singleObj) {
            if ( $singleObj->getImage() && $e->getElement()->getId() == $singleObj->getImage()->getId() && $singleObj->getImage()->getFullPath() === $asset->getFullPath()) {
                $singleObj->setLastModifiedImage($now);
                $singleObj->setImage(null);
                $singleObj->save();
            }
        }
    }

    /**
     * @throws Exception
     */
    public function onGalleryPreDelete(ElementEventInterface $e): void
    {

        $asset = $e->getElement();
        $allDataObj = new DataObject\Product\Listing();
        $now = Carbon::now('Europe/Rome');

        foreach ($allDataObj as $singleObj) {
            $dataObjectGallery = $singleObj->getGallery()->getItems();

            if ($singleObj->getImage() && $singleObj->getImage()->getFullPath() === $asset->getFullPath()) {
                $singleObj->setLastModifiedImage($now);
                $singleObj->setImage(null);
                $singleObj->save();
            }
        }
    }

    /**
     * @throws Exception
     */
    public function onDataObjectPreUpdate(ElementEventInterface $e): void
    {
        $dataObject = $e->getElement();
        $now = Carbon::now('Europe/Rome');
        $imageModificationDate = $e->getElement()->getImage() ? Carbon::createFromTimestamp($e->getElement()->getImage()->getModificationDate())->timezone('Europe/Rome') : $now;

        $versions = $e->getElement()->getVersions();
        $previousVersionDate = Carbon::createFromTimestamp($versions[count($versions) - 1]->getData()->getModificationDate())->timezone('Europe/Rome');

        $previousObjectImageFullPath = $versions[count($versions) - 1]->getData()->getImage() ? $versions[count($versions) - 1]->getData()->getImage()->getFullPath() : "";
        $currentObjectImageFullPath = $e->getElement()->getImage() ? $e->getElement()->getImage()->getFullPath() : "";

        $previousObjectImageData = $versions[count($versions) - 1]->getData()->getImage() ? $versions[count($versions) - 1]->getData()->getImage()->getData() : "";
        $currentObjectImageData = $e->getElement()->getImage() ? $e->getElement()->getImage()->getData() : "";

        if ($previousObjectImageFullPath !== $currentObjectImageFullPath) {
            $dataObject->setLastModifiedImage($now);
        }
        if ($now->diffInDays($previousVersionDate) <= 1 && ($previousObjectImageData !== $currentObjectImageData || $previousObjectImageFullPath == $currentObjectImageFullPath)) {
            $dataObject->setLastModifiedDataObject($now);
        }
    }
}
