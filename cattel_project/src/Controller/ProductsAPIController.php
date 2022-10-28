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

class ProductsAPIController
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
                $responseArray[] = "Impossibile eliminare un prodotto non esistente!";

                //throw new \Exception("Non è possibile eliminare un prodotto non esistente");
            } elseif (!empty($product->getId()) && $singleProduct->isDeleted === true) {
                $responseArray[] = "Prodotto eliminato!";

                $product->delete();
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

                $responseArray[] = "Created product";

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

        foreach ($arraySectors as $singleSector) {
            $product = StaticImportMethods::createOrGetObjectByCode($singleSector->code, 'Sector');
            if (empty($product->getId()) && $singleSector->isDeleted === true) {
                continue;
                //throw new \Exception("Non è possibile eliminare un prodotto non esistente");
            } elseif (!empty($product->getId()) && $singleSector->isDeleted === true) {
                $product->delete();
            } elseif ($singleSector->isDeleted === false) {

                $product->setCode($singleSector->code);
                $product->setKey($singleSector->code);
                $product->setTitle($singleSector->title);
                $product->setDescription($singleSector->description);
                $product->setParentId(Folder::getByPath("/Data/Categories")->getId());
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

    /**
     * @Route("/upsert/families", name="upsertFamilies", methods={"POST"});
     * @return Response
     * @throws \Exception
     */
    public function upsertFamilies(Request $request): Response
    {

        $arrayFamilies = json_decode($request->getContent());

        foreach ($arrayFamilies as $singleFamily) {
            $product = StaticImportMethods::createOrGetObjectByCode($singleFamily->code, 'Family');
            if (empty($product->getId()) && $singleFamily->isDeleted === true) {
                continue;
                //throw new \Exception("Non è possibile eliminare un prodotto non esistente");
            } elseif (!empty($product->getId()) && $singleFamily->isDeleted === true) {
                $product->delete();
            } elseif ($singleFamily->isDeleted === false) {

                $product->setCode($singleFamily->code);
                $product->setKey($singleFamily->code);
                $product->setTitle($singleFamily->title);
                $product->setDescription($singleFamily->description);

                $parentSector = Sector::getByCode($singleFamily->sector)->getData()[0];

                $product->setParentId($parentSector->getId());
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
