<?php

namespace App\Repository;


use App\Model\Category;

class CategoryRepository extends BaseRepository
{
    public function addCategory(Category $category)
    {
        $this->database->table('product_category')
            ->insert([
                'id_produktu' => $category->id_produktu,
                'nazev_kategorie' => $category->typ,
            ]);
    }
}