<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Product;
use App\Model\Category;
use App\Model\ProductFacade;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

final class HomepagePresenter extends BasePresenter
{

    private const FILE_PATH = __DIR__ . "/../../data.txt";

    /** @var ProductRepository */
    protected $productRepository;

    /** @var CategoryRepository */
    protected $categoryRepository;
    /**
     * @var ProductFacade
     */
    private $productFacade;
    /**
     * HomepagePresenter constructor.
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, ProductFacade $productFacade)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productFacade = $productFacade;
    }


    /**
     * @param int|null $x
     * @return int|null
     */
    public function actionPridejData()
    {
        $document = file_get_contents(self::FILE_PATH); //Načteí souboru



        $poleProduktu = explode("*", $document); //Rozdělení souboru na jeden produkt podle '*'
        // Rozdělení produktu na jednotlivé části podle '|'
        foreach ($poleProduktu as $key => $product)
        {
            $poleJednohoProduktu = explode("|", $poleProduktu[$product]);
            foreach ($poleJednohoProduktu as $product2)
            {
                $product2 = new Product(
                    $poleJednohoProduktu[0] ?? NULL,
                    $poleJednohoProduktu[1] ?? NULL,
                    $poleJednohoProduktu[3] ?? NULL,
                    $poleJednohoProduktu[4] ?? NULL,
                    $poleJednohoProduktu[5] ?? NULL,
                    $poleJednohoProduktu[6] ?? NULL,
                    $poleJednohoProduktu[7] ?? NULL,
                    $poleJednohoProduktu[8] ?? NULL,
                    $poleJednohoProduktu[9] ?? NULL,
                    $poleJednohoProduktu[10] ?? NULL,
                    $poleJednohoProduktu[11] ?? NULL,
                    $poleJednohoProduktu[12] ?? NULL,
                    $poleJednohoProduktu[13] ?? NULL
                );
                $productRow = $this->productRepository->pridej_product($product2); // Zapsání produktu do dtb

                $joinedCategories = $poleJednohoProduktu[2];
                $pole_rozdeleno = explode(";", $joinedCategories); //Rozdělení katerorii podle ';'
                $pole_category = array_filter($pole_rozdeleno); //Odstranění přebytečných mezer
                for ($c = 0; $c < count($pole_category); $c++) {
                    $category1 = new Category($productRow->id, $pole_category[$c]); //Použití přepravky pro kategorie
                    $this->categoryRepository->pridej_category($category1); //Zapsání kategorii do dtb
                }
            }
        }
        /**
        for ($a = 1; $a < count($poleProduktu); $a++) {
            $poleJednohoProduktu = explode("|", $poleProduktu[$a]);
            for ($b = 0; $b < count($poleJednohoProduktu); $b++) {

                //Použití přepravky pro produkty
                $product1 = new Product(
                    $poleJednohoProduktu[0] ?? NULL,
                    $poleJednohoProduktu[1] ?? NULL,
                    $poleJednohoProduktu[3] ?? NULL,
                    $poleJednohoProduktu[4] ?? NULL,
                    $poleJednohoProduktu[5] ?? NULL,
                    $poleJednohoProduktu[6] ?? NULL,
                    $poleJednohoProduktu[7] ?? NULL,
                    $poleJednohoProduktu[8] ?? NULL,
                    $poleJednohoProduktu[9] ?? NULL,
                    $poleJednohoProduktu[10] ?? NULL,
                    $poleJednohoProduktu[11] ?? NULL,
                    $poleJednohoProduktu[12] ?? NULL,
                    $poleJednohoProduktu[13] ?? NULL
                );

            }

            $productRow = $this->productRepository->pridej_product($product1); // Zapsání produktu do dtb

            $joinedCategories = $poleJednohoProduktu[2];
            $pole_rozdeleno = explode(";", $joinedCategories); //Rozdělení katerorii podle ';'
            $pole_category = array_filter($pole_rozdeleno); //Odstranění přebytečných mezer
            for ($c = 0; $c < count($pole_category); $c++) {
                $category1 = new Category($productRow->id, $pole_category[$c]); //Použití přepravky pro kategorie
                $this->categoryRepository->pridej_category($category1); //Zapsání kategorii do dtb
            }
        }
**/
        $this->terminate();
    }
}