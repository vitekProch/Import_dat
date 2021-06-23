<?php


namespace App\Model;


class CategoryMapper
{
    /**
     * @param string $category
     * @return Category
     */
    public function createNewCategory(string $category):Category
    {
        return new Category($category);
    }
}