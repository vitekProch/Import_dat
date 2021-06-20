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
        ?int $prduktove_cislo,
        ?int $katalogove_cislo,
        ?int $predkontace,
        string $popis,
        string $dodatecne_info,
        ?int $hmotnost,
        ?int $ryzost,
        ?int $novinka,
        ?int $akce,
        ?int $cena,
        ?int $zaruka,
        ?int $zaruka_mesice,
        ?int $pocet_sklad
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