<?php


namespace App\Repository;


class ProductToCategoryRepository extends BaseRepository
{
    public const TABLE_NAME = 'product_to_category';


    public function getProductToCategory($productId, $categoryId)
    {
        $this->database->table(self::TABLE_NAME)
            ->insert([
                'product_id' => $productId,
                'category_id' => $categoryId
            ]);
    }
}