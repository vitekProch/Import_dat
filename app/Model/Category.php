<?php


namespace App\Model;


class Category
{
    public $typ;
    public function __construct(
        string $typ
    )
    {
        $this->typ = $typ;
    }
}