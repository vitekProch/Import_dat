<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Product;
use App\Model\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

final class HomepagePresenter extends BasePresenter
{
    private const FILE_PATH = __DIR__ . "/../../data.txt";


    /**
     * @param int|null $x
     * @return int|null
     */
    public function actionPridej_data(?int $x): ?int
    {
        $document = file_get_contents(self::FILE_PATH); //Načteí souboru



        $pole_produktu = explode("*", $document); //Rozdělení souboru na jeden produkt podle '*'

        foreach ($pole_produktu as $key => $product)
        {

        }
        for ($a = 1; $a < count($pole_produktu); $a++) {
            $poleJednohoProduktu = explode("|", $pole_produktu[$a]); // Rozdělení produktu na jednotlivé části podle '|'
            for ($b = 0; $b < count($poleJednohoProduktu); $b++) {

                //Použití přepravky pro produkty
                $product1 = new Product(
                    $poleJednohoProduktu[0],
                    $poleJednohoProduktu[1],
                    $poleJednohoProduktu[3],
                    $poleJednohoProduktu[4],
                    $poleJednohoProduktu[5],
                    $poleJednohoProduktu[6],
                    $poleJednohoProduktu[7],
                    $poleJednohoProduktu[8],
                    $poleJednohoProduktu[9],
                    $poleJednohoProduktu[10],
                    $poleJednohoProduktu[11],
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
        $this->terminate();
    }
}