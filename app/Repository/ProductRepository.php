<?php

namespace App\Repository;
use App\Model\Product;
use Nette\Database\Table\ActiveRow;

class ProductRepository extends BaseRepository
{
    public const TABLE_NAME_PRODUCT = 'product';

    public const COLUMN_PRODUKTOVE_CISLO = 'produktove_cislo';
    public const COLUMN_KATALOGOVE_CISLO = 'katalogove_cislo';
    public const COLUMN_PREDKONTACE = 'predkontace';
    public const COLUMN_POPIS = 'popis';
    public const COLUMN_DODATECNE_INFO = 'dodatecne_info';
    public const COLUMN_HMOTNOST = 'hmotnost';
    public const COLUMN_RYZOST = 'ryzost';
    public const COLUMN_NOVINKA = 'novinka';
    public const COLUMN_AKCE = 'akce';
    public const COLUMN_CENA = 'cena';
    public const COLUMN_ZARUKA = 'zaruka';
    public const COLUMN_DELKA_ZARUKY = 'delka_zaruky';
    public const COLUMN_POCET_SKLAD = 'pocet_sklad';

    public function addProduct(Product $product): ActiveRow
    {
        return $this->database->table(self::TABLE_NAME_PRODUCT)
            ->insert([
                self::COLUMN_PRODUKTOVE_CISLO => $product->prduktove_cislo,
                self::COLUMN_KATALOGOVE_CISLO => $product->katalogove_cislo,
                self::COLUMN_PREDKONTACE => $product->predkontace,
                self::COLUMN_POPIS => $product->popis,
                self::COLUMN_DODATECNE_INFO => $product->dodatecne_info,
                self::COLUMN_HMOTNOST => $product->hmotnost,
                self::COLUMN_RYZOST => $product->ryzost,
                self::COLUMN_NOVINKA => $product->novinka,
                self::COLUMN_AKCE => $product->akce,
                self::COLUMN_CENA => $product->cena,
                self::COLUMN_ZARUKA => $product->zaruka,
                self::COLUMN_DELKA_ZARUKY => $product->zaruka_mesice,
                self::COLUMN_POCET_SKLAD => $product->pocet_sklad,
            ]);
    }
}