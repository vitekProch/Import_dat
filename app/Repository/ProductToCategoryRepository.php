<?php


namespace App\Repository;


class ProductToCategoryRepository extends BaseRepository
{

    public const TABLE_NAME_PRODUCT_TO_CATEGORY = 'product_to_category';

    public const TABLE_PRODUCT_ID = 'product_id';
    public const TABLE_CATEGORY_ID = 'category_id';


    public function getProductToCategory($productId, $categoryId)
    {
        $this->database->table(self::TABLE_NAME_PRODUCT_TO_CATEGORY)
            ->insert([
                self::TABLE_PRODUCT_ID => $productId,
                self::TABLE_CATEGORY_ID => $categoryId
            ]);
    }
}