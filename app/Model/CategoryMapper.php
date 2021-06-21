<?php


namespace App\Model;


class CategoryMapper
{
    /**
     * @param int $id
     * @param string $category
     * @return Category
     */
    public function createNewCategory(int $id ,string $category):Category
    {
        return new Category($id, $category);
    }
}