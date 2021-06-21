<?php


namespace App\Model;


class ProductMapper
{
    /**
     * @param array $partsOfProduct
     * @return Product
     */
    public function createNewProduct(array $partsOfProduct):Product
    {
        return new Product(
            $partsOfProduct[0] ?? NULL,
            $partsOfProduct[1] ?? NULL,
            $partsOfProduct[3] ?? NULL,
            $partsOfProduct[4] ?? NULL,
            $partsOfProduct[5] ?? NULL,
            $partsOfProduct[6] ?? NULL,
            $partsOfProduct[7] ?? NULL,
            $partsOfProduct[8] ?? NULL,
            $partsOfProduct[9] ?? NULL,
            $partsOfProduct[10] ?? NULL,
            $partsOfProduct[11] ?? NULL,
            $partsOfProduct[12] ?? NULL,
            $partsOfProduct[13] ?? NULL
        );
    }
}