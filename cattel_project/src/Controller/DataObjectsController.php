<?php


namespace App\Controller;

use App\Tools\StaticImportMethods;
use Exception;
use Pimcore\Model\Asset;
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
        $token = $request->headers->get("authorization");
        $token = base64_decode(trim(str_replace("Basic", "", $token)));
        $token = explode(":", $token);

        if (!isset($token[0]) || !isset($token[1])) {
            throw new \Exception("No token found", 401);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $arrayProducts = json_decode($request->getContent());

        $responseArray = array();

        foreach ($arrayProducts as $index => $singleProduct) {

            $arrayFields = ["sku", "name", "sector", "family", "subFamily", "brand", "brandCattel", "attributesJGalileo", "shelfLife", "unityOfMeasure",
                "alcoholContent", "preservationMode", "itemsInPackage", "packageType", "sellingUnit", "unitWeight", "productDrainedWeight",
                "productSizesJGalileo", "productSizes", "isDeleted"];

            foreach ($arrayFields as $field) {
                if (!property_exists($singleProduct, $field)) {
                    $response->setStatusCode(500);
                    throw new \Exception("Campo $field mancante nel prodotto in posizione $index!");
                }
                if (empty($singleProduct->sku)) {
                    $response->setStatusCode(500);
                    throw new \Exception("Campo obbligatorio SKU vuoto nel prodotto in posizione $index!");
                }
            }

            $backup = Product::doHideUnpublished();
            Product::setHideUnpublished(false);
            $product = StaticImportMethods::createOrGetProductBySku($singleProduct->sku);
            Product::setHideUnpublished($backup);

            try {
                $product->setName($singleProduct->name);
                $product->setKey($singleProduct->sku);
                $product->setSku($singleProduct->sku);
                $product->setSector(Sector::getByCode($singleProduct->sector)->getData());
                $product->setFamily(Family::getByCode($singleProduct->family)->getData());
                $product->setSubFamily(SubFamily::getByCode($singleProduct->subFamily)->getData());
                $product->setBrand($singleProduct->brand);
                $product->setBrandCattel($singleProduct->brandCattel);
                $product->setAttributesJGalileo($singleProduct->attributesJGalileo);
                $product->setShelfLife($singleProduct->shelfLife);
                $product->setUnityOfMeasure($singleProduct->unityOfMeasure);
                $product->setAlcoholContent($singleProduct->alcoholContent);
                $product->setPreservationMode($singleProduct->preservationMode);
                $product->setItemsInPackage($singleProduct->itemsInPackage);
                $product->setPackageType($singleProduct->packageType);
                $product->setSellingUnit($singleProduct->sellingUnit);
                preg_match_all('!\d+\.*\d*!', $singleProduct->unitWeight, $unitWeightMatches);
                $product->setUnitWeight(new DataObject\Data\QuantityValue($unitWeightMatches[0][0] ?? null, "Kg"));

                preg_match_all('!\d+\.*\d*!', $singleProduct->productDrainedWeight, $drainedWeightMatches);
                $product->setProductDrainedWeight(new DataObject\Data\QuantityValue($drainedWeightMatches[0][0] ?? null, "Kg"));

                $product->setProductSizesJGalileo($singleProduct->productSizesJGalileo);
                $product->setProductSizes($singleProduct->productSizes);
                $product->setParentId(Folder::getByPath("/Data/Products")->getId());
                $product->setPublished(true);

                if (empty($product->getId()) && $singleProduct->isDeleted === true) {
                    $product->setPublished(false);

                    $responseArray["records"][$index]["sku"] = $singleProduct->sku;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Prodotto creato come non pubblico";

                } elseif (!empty($product->getId()) && $singleProduct->isDeleted === true) {
                    $product->setPublished(false);

                    $responseArray["records"][$index]["sku"] = $singleProduct->sku;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Prodotto de-listato";
                } else {

                    $responseArray["records"][$index]["sku"] = $singleProduct->sku;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Prodotto inserito o aggiornato";
                };
                $product->save();

            } catch (\TypeError|Exception|ValidationException $e) {
                $responseArray["records"][$index]["sku"] = $singleProduct->sku;
                $responseArray["records"][$index]["success"] = false;
                $responseArray["records"][$index]["message"] = "ERRORE - Messaggio: {$e->getMessage()}";
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
        $response = new Response();

        $responseArray = array();
        foreach ($arraySectors as $index => $singleSector) {

            $arrayFields = ["code", "title", "description", "isDeleted"];

            foreach ($arrayFields as $field) {
                if (!property_exists($singleSector, $field)) {
                    $response->setStatusCode(500);
                    throw new \Exception("Campo $field mancante nel settore in posizione $index!");
                }
            }

            $backup = Sector::doHideUnpublished();
            Sector::setHideUnpublished(false);
            $sector = StaticImportMethods::createOrGetObjectByCode($singleSector->code, 'Sector');
            Sector::setHideUnpublished($backup);

            try {
                $sector->setCode($singleSector->code);
                $sector->setKey($singleSector->code);
                $sector->setTitle($singleSector->title);
                $sector->setDescription($singleSector->description);
                $sector->setParentId(Folder::getByPath("/Data/Categories")->getId());
                $sector->setPublished(true);

                if (empty($sector->getId()) && ($singleSector->isDeleted === true)) {
                    $sector->setPublished(false);
                    $responseArray["records"][$index]["code"] = $singleSector->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Settore creato come non pubblicato";

                } elseif (!empty($sector->getId()) && ($singleSector->isDeleted === true)) {
                    $responseArray["records"][$index]["code"] = $singleSector->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Settore de-listato";
                } else {
                    $responseArray["records"][$index]["code"] = $singleSector->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Settore inserito o aggiornato";
                }
                $sector->save();

            } catch (\TypeError $e) {
                $responseArray["records"][$index]["code"] = $singleSector->code;
                $responseArray["records"][$index]["success"] = false;
                $responseArray["records"][$index]["message"] = "ERRORE - Messaggio: {$e->getMessage()}";
            }
        }

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
        $response = new  Response();

        $responseArray = array();
        foreach ($arrayFamilies as $index => $singleFamily) {

            $arrayFields = ["code", "title", "description", "isDeleted"];

            foreach ($arrayFields as $field) {
                if (!property_exists($singleFamily, $field)) {
                    $response->setStatusCode(500);
                    throw new \Exception("Campo $field mancante nella famiglia in posizione $index!");
                }
            }

            $backup = Family::doHideUnpublished();
            Family::setHideUnpublished(false);
            $family = StaticImportMethods::createOrGetObjectByCode($singleFamily->code, 'Family');
            Family::setHideUnpublished($backup);

            $parentSector = Sector::getByCode($singleFamily->sector)->getData();

            try {
                $family->setCode($singleFamily->code);
                $family->setKey($singleFamily->code);
                $family->setTitle($singleFamily->title);
                $family->setDescription($singleFamily->description);
                $family->setPublished(true);
                if (empty($family->getId()) && $singleFamily->isDeleted === true) {
                    $family->setPublished(false);
                    $family->setParentId($parentSector[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Famiglia creata come non pubblicato!";

                } elseif (!empty($family->getId()) && $singleFamily->isDeleted === true) {
                    $family->setPublished(false);
                    $family->setParentId($parentSector[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Famiglia de-listata!";

                } elseif (empty($parentSector)) {

                    $responseArray["records"][$index]["code"] = $singleFamily->code;
                    $responseArray["records"][$index]["success"] = false;
                    $responseArray["records"][$index]["message"] = throw new Exception("Settore non esistente! Impossibile aggiungere la famiglia!!");

                } elseif ($singleFamily->isDeleted === false) {
                    $family->setParentId($parentSector[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Famiglia inserita o aggiornata!";
                }

                $family->save();

            } catch (\TypeError|Exception $e) {
                $responseArray["records"][$index]["code"] = $singleFamily->code;
                $responseArray["records"][$index]["success"] = false;
                $responseArray["records"][$index]["message"] = "ERRORE - Messaggio: {$e->getMessage()}";
            }
        }

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

        $responseArray = array();
        $response = new Response();

        foreach ($arraySubFamilies as $index => $singleSubFamily) {

            $arrayFields = ["code", "title", "description", "isDeleted"];

            foreach ($arrayFields as $field) {
                if (!property_exists($singleSubFamily, $field)) {
                    $response->setStatusCode(500);
                    throw new \Exception("Campo $field mancante nella sottofamiglia in posizione $index!");
                }
            }

            $backup = SubFamily::doHideUnpublished();
            SubFamily::setHideUnpublished(false);
            $subFamily = StaticImportMethods::createOrGetObjectByCode($singleSubFamily->code, 'SubFamily');
            SubFamily::setHideUnpublished($backup);

            $parentFamily = Family::getByCode($singleSubFamily->family)->getData();

            try {
                $subFamily->setCode($singleSubFamily->code);
                $subFamily->setKey($singleSubFamily->code);
                $subFamily->setTitle($singleSubFamily->title);
                $subFamily->setDescription($singleSubFamily->description);
                $subFamily->setPublished(true);

                if (empty($subFamily->getId()) && $singleSubFamily->isDeleted === true) {
                    $subFamily->setPublished(false);
                    $subFamily->setParentId($parentFamily[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleSubFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Famiglia creata come non pubblicato!";

                } elseif (!empty($subFamily->getId()) && $singleSubFamily->isDeleted === true) {
                    $subFamily->setPublished(false);
                    $subFamily->setParentId($parentFamily[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleSubFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Sottofamiglia de-listata!";

                } elseif (empty($parentFamily)) {
                    $responseArray["records"][$index]["code"] = $singleSubFamily->code;
                    $responseArray["records"][$index]["success"] = false;
                    $responseArray["records"][$index]["message"] = throw new Exception("Famiglia non esistente! Impossibile aggiungere la sottofamiglia!!");

                } elseif ($singleSubFamily->isDeleted === false) {
                    $subFamily->setParentId($parentFamily[0]->getId());

                    $responseArray["records"][$index]["code"] = $singleSubFamily->code;
                    $responseArray["records"][$index]["success"] = true;
                    $responseArray["records"][$index]["message"] = "Sottofamiglia inserita o aggiornata!";
                }

                $subFamily->save();

            } catch (\TypeError|Exception $e) {

                $responseArray["records"][$index]["code"] = $singleSubFamily->code;
                $responseArray["records"][$index]["success"] = false;
                $responseArray["records"][$index]["message"] = "ERRORE - Messaggio: {$e->getMessage()}";
            }
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($responseArray));
        return $response;
    }

}
