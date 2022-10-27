<?php


namespace App\Controller;

use Pimcore\Model\DataObject\Product\Listing;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Pimcore\Config;
use Pimcore\Db;
use function Sabre\Event\Promise\all;

class GetProductsController
{
    /**
     * @Route("/get/product", name="getProducts");
     * @return Response
     */
    public function sendProducts(): Response
    {

        $allProducts = new Listing();
        $jsonResponseProducts = array();

        foreach ($allProducts as $singleProduct) {
            $jsonResponseProducts[] = [
                "sku" => $singleProduct->getSku(),
                "name" => $singleProduct->getName(),
                "sector" => $singleProduct->getSector() ? $singleProduct->getSector()[0]->getName() : "",
                "family" => $singleProduct->getFamily() ? $singleProduct->getFamily()[0]->getName() : "",
                "subFamily" => $singleProduct->getSubFamily() ? $singleProduct->getSubFamily()[0]->getName() : "",
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
}
