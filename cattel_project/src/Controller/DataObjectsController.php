<?php


namespace App\Controller;

use App\Tools\StaticImportMethods;
use Pimcore\Model\DataObject\Family;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Product\Listing;
use Pimcore\Model\DataObject\Sector;
use Pimcore\Model\DataObject\SubFamily;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Pimcore\Config;
use Pimcore\Db;
use function Sabre\Event\Promise\all;
use function Symfony\Component\String\s;

class DataObjectsController
{
    /**
     * @Route("/get/product", name="getProducts", methods={"GET"});
     * @return Response
     */
    public function getProducts(): Response
    {

        $allProducts = new Listing();
        $jsonResponseProducts = array();

        foreach ($allProducts as $singleProduct) {
            $jsonResponseProducts[] = [
                "sku" => $singleProduct->getSku(),
                "name" => $singleProduct->getName(),
                "sector" => $singleProduct->getSector() ? $singleProduct->getSector()[0]->getTitle() : "",
                "family" => $singleProduct->getFamily() ? $singleProduct->getFamily()[0]->getTitle() : "",
                "subFamily" => $singleProduct->getSubFamily() ? $singleProduct->getSubFamily()[0]->getTitle() : "",
                "brand" => $singleProduct->getBrand(),
                "brandCattel" => $singleProduct->getBrandCattel(),
                "attributesJGalileo" => $singleProduct->getAttributesJGalileo(),
                "shelfLife" => $singleProduct->getShelfLife(),
                "unityOfMeasure" => $singleProduct->getUnityOfMeasure(),
                "alcoholContent" => $singleProduct->getAlcoholContent(),
                "preservationMode" => $singleProduct->getPreservationMode(),
                "itemsInPackage" => $singleProduct->getItemsInPackage(),
                "packageType" => $singleProduct->getPackageType(),
                "sellingUnit" => $singleProduct->getSellingUnit(),
                "unitWeight" => $singleProduct->getUnitWeight(),
                "productDrainedWeight" => $singleProduct->getProductDrainedWeight(),
                "productSizesJGalileo" => $singleProduct->getProductSizesJGalileo(),
                "productSizes" => $singleProduct->getProductSizes()
            ];
        }


        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($jsonResponseProducts));
        return $response;
    }

    /**
     * @Route("/get/family", name="getFamilies", methods={"GET"});
     * @return Response
     */
    public function getFamilies(): Response
    {

        $allFamilies = new Family\Listing();
        $jsonResponseProducts = array();

        foreach ($allFamilies as $singleFamily) {
            $jsonResponseProducts[] = [
                "code" => $singleFamily->getCode(),
                "name" => $singleFamily->getTitle(),
                "sector" => $singleFamily->getChildren() ? $singleFamily->getChildren()[0]->getPath() : "",

            ];
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($jsonResponseProducts));
        return $response;
    }

    /**
     * @Route("/upsert/product", name="upsertProducts", methods={"POST"});
     * @return Response
     * @throws \Exception
     */
    public function upsertProducts(Request $request): Response
    {

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $arrayProducts = json_decode($request->getContent());

        $responseArray = array();
        foreach ($arrayProducts as $singleProduct) {
            $product = StaticImportMethods::createOrGetProductBySku($singleProduct->sku);
            if (empty($product->getId()) && $singleProduct->isDeleted === true) {

                $singleProduct = (object)array_merge(array('message' => 'Non è possibile eliminare un prodotto non esistente'), (array)$singleProduct);
                $responseArray[] = $singleProduct;

            } elseif (!empty($product->getId()) && $singleProduct->isDeleted === true) {
                $product->delete();
                $singleProduct = (object)array_merge(array('message' => 'Prodotto eliminato'), (array)$singleProduct);
                $responseArray[] = $singleProduct;

            } elseif ($singleProduct->isDeleted === false) {

                $product->setName($singleProduct->name);
                $product->setKey($singleProduct->sku);
                $product->setSku($singleProduct->sku);
                $product->setSector(Sector::getByCode($singleProduct->sector)->getData());
                $product->setFamily(Family::getByCode($singleProduct->family)->getData());
                $product->setSubFamily(SubFamily::getByCode($singleProduct->subFamily)->getData());
                $product->setBrand($singleProduct->brand);
                $product->setBrandCattel($singleProduct->brandCattel);
                $product->setParentId(Folder::getByPath("/Data/Products")->getId());
                $product->setPublished(true);
                $product->save();

                $singleProduct = (object)array_merge(array('message' => 'Prodotto inserito o aggiornato!'), (array)$singleProduct);
                $responseArray[] = $singleProduct;
            }
        }

        $response->setContent(json_encode($responseArray));
        return $response;
    }

    /**
     * @Route("/upsert/sector", name="upsertSectors", methods={"POST"});
     * @return Response
     * @throws \Exception
     */
    public function upsertSectors(Request $request): Response
    {

        $arraySectors = json_decode($request->getContent());

        $responseArray = array();
        foreach ($arraySectors as $singleSector) {
            $sector = StaticImportMethods::createOrGetObjectByCode($singleSector->code, 'Sector');
            if (empty($sector->getId()) && $singleSector->isDeleted === true) {
                $singleSector->message = "Settore inserito!";
                $responseArray[] = $singleSector;

            } elseif (!empty($sector->getId()) && $singleSector->isDeleted === true) {
                $singleSector->message = "Settore eliminato!";
                $responseArray[] = $singleSector;
                $sector->delete();

            } elseif ($singleSector->isDeleted === false) {
                $sector->setCode($singleSector->code);
                $sector->setKey($singleSector->code);
                $sector->setTitle($singleSector->title);
                $sector->setDescription($singleSector->description);
                $sector->setParentId(Folder::getByPath("/Data/Categories")->getId());
                $sector->setPublished(true);
                $sector->save();

                $singleSector->message = "Settore inserito!";
                $responseArray[] = $singleSector;
            }
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($responseArray));
        return $response;
    }

    /**
     * @Route("/upsert/families", name="upsertFamilies", methods={"POST"});
     * @return Response
     * @throws \Exception
     */
    public function upsertFamilies(Request $request): Response
    {

        $arrayFamilies = json_decode($request->getContent());

        $responseArray = array();
        foreach ($arrayFamilies as $singleFamily) {
            $family = StaticImportMethods::createOrGetObjectByCode($singleFamily->code, 'Family');
            $parentSector = Sector::getByCode($singleFamily->sector)->getData();

            if (empty($family->getId()) && $singleFamily->isDeleted === true) {
                $singleFamily->message = "Prodotto inserito!";
                $responseArray[] = $singleFamily;

            } elseif (!empty($family->getId()) && $singleFamily->isDeleted === true) {
                $family->delete();

            } elseif (empty($parentSector)) {
                $responseArray["message"] = "Settore non esistente! Impossibile aggiungere la famiglia!";
                $responseArray[] = $singleFamily;

            } elseif ($singleFamily->isDeleted === false) {

                $family->setCode($singleFamily->code);
                $family->setKey($singleFamily->code);
                $family->setTitle($singleFamily->title);
                $family->setDescription($singleFamily->description);

                $family->setParentId($parentSector[0]->getId());
                $family->setPublished(true);

                $family->save();
            }
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($responseArray));
        return $response;
    }

    /**
     * @Route("/upsert/subFamilies", name="upsertSubFamilies", methods={"POST"});
     * @return Response
     * @throws \Exception
     */
    public function upsertSubFamilies(Request $request): Response
    {

        $arraySubFamilies = json_decode($request->getContent());

        foreach ($arraySubFamilies as $singleSubFamily) {
            $product = StaticImportMethods::createOrGetObjectByCode($singleSubFamily->code, 'SubFamily');
            if (empty($product->getId()) && $singleSubFamily->isDeleted === true) {
                continue;
                //throw new \Exception("Non è possibile eliminare un prodotto non esistente");
            } elseif (!empty($product->getId()) && $singleSubFamily->isDeleted === true) {
                $product->delete();
            } elseif ($singleSubFamily->isDeleted === false) {

                $product->setCode($singleSubFamily->code);
                $product->setKey($singleSubFamily->code);
                $product->setTitle($singleSubFamily->title);
                $product->setDescription($singleSubFamily->description);

                $parentFamily = Family::getByCode($singleSubFamily->family)->getData()[0];

                $product->setParentId($parentFamily->getId());
                $product->setPublished(true);

                $product->save();
            }
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent("ciao");
        return $response;
    }

}
