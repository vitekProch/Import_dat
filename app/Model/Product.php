<?php

declare(strict_types=1);

namespace App\Model;

class Product
{
    public $prduktove_cislo;
    public $katalogove_cislo;
    public $predkontace;
    public $popis;
    public $dodatecne_info;
    public $hmotnost;
    public $ryzost;
    public $novinka;
    public $akce;
    public $cena;
    public $zaruka;
    public $zaruka_mesice;
    public $pocet_sklad;

    public function __construct(
         $prduktove_cislo,
         $katalogove_cislo,
         $predkontace,
         $popis,
         $dodatecne_info,
         $hmotnost,
         $ryzost,
         $novinka,
         $akce,
         $cena,
         $zaruka,
         $zaruka_mesice,
         $pocet_sklad
    )
    {
        $this->prduktove_cislo = $prduktove_cislo;
        $this->katalogove_cislo = $katalogove_cislo;
        $this->predkontace = $predkontace;
        $this->popis = $popis;
        $this->dodatecne_info = $dodatecne_info;
        $this->hmotnost = $hmotnost;
        $this->ryzost = $ryzost;
        $this->novinka = $novinka;
        $this->akce = $akce;
        $this->cena = $cena;
        $this->zaruka = $zaruka;
        $this->zaruka_mesice = $zaruka_mesice;
        $this->pocet_sklad = $pocet_sklad;
    }
}