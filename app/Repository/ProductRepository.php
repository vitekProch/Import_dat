<?php

namespace App\Repository;
use App\Model\Product;

class ProductRepository extends BaseRepository
{
    public function pridej_product(Product $product)
    {
        bdump($product->prduktove_cislo);
        $this->database->table('product')
            ->insert([
                'produktove_cislo' => $product->prduktove_cislo,
                'katalogove_cislo' => $product->katalogove_cislo,
                'predkontace' => $product->predkontace,
                'popis' => $product->popis,
                'dodatecne_info' => $product->dodatecne_info,
                'hmotnost' => $product->hmotnost,
                'ryzost' => $product->ryzost,
                'novinka' => $product->novinka,
                'akce' => $product->akce,
                'cena' => $product->zaruka,
                'zaruka' => $product->zaruka_mesice,
                'delka_zaruky' => $product->zaruka_mesice,
                'pocet_sklad' => $product->pocet_sklad,
            ]);
    }
}