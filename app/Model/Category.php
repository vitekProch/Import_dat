<?php


namespace App\Model;


class Category
{
    public $id_produktu;
    public $typ;
    public function __construct(
        int $id_produktu,
        string $typ
    )
    {
        $this->id_produktu = $id_produktu;
        $this->typ = $typ;
    }
}