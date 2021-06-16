<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Product;
use App\Model\Category;

final class HomepagePresenter extends BasePresenter
{

    public function handlePridej_data()
    {
        $file = "C:\Users\Vitek\Desktop\data.txt";
        $document = file_get_contents($file); //Načteí souboru

        $pole = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]; //Předdefinované pole (kvůli tomu že některé indexy chybí)


        $pole_produktu = explode("*", $document); //Rozdělení souboru na jeden produkt podle '*'

        for ($a = 1; $a < count($pole_produktu); $a++) {
            $pole_jednoho_produktu = explode("|", $pole_produktu[$a]); // Rozdělení produktu na jednotlivé části podle '|'
            for ($b = 0; $b < count($pole_jednoho_produktu); $b++) {
                $pole[$b] = $pole_jednoho_produktu[$b];
                $product1 = new Product($pole[0], $pole[1], $pole[3], $pole[4], $pole[5], $pole[6], $pole[7], $pole[8], $pole[9], $pole[10], $pole[11], $pole[12], $pole[13]); //Použití přepravky pro produkty

            }
            $this->productRepository->pridej_product($product1); // Zapsání produktu do dtb

            $pole_rozdeleno = explode(";", $pole[2]); //Rozdělení katerorii podle ';'
            $pole_category = array_filter($pole_rozdeleno); //Odstranění přebytečných mezer
            for ($c = 0; $c < count($pole_category); $c++) {
                $category1 = new Category($a, $pole_category[$c]); //Použití přepravky pro kategorie
                $this->categoryRepository->pridej_category($category1); //Zapsání kategorii do dtb
            }
        }
    }
}