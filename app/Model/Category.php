<?php


namespace App\Model;


class Category
{
    private $typ;

    public function __construct(
        string $typ
    )
    {
        $this->typ = $typ;
    }

    /**
     * @return string
     */
    public function getTyp(): string
    {
        return $this->typ;
    }
}