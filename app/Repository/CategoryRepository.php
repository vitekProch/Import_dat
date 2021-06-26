<?php

namespace App\Repository;


use App\Model\Category;
use Nette\Database\Table\ActiveRow;
use Nette;

class CategoryRepository extends BaseRepository
{
    public const TABLE_NAME_CATEGORY = 'category';

    public const COLUMN_NAZEV_CATEGORIE = 'nazev_kategorie';


    public function getByName(string $name): ?ActiveRow
    {
        return $this->database->table(self::TABLE_NAME_CATEGORY)
            ->where(self::COLUMN_NAZEV_CATEGORIE, $name)
            // V tabulce je unique index, takze to vrati vzdy jen jeden zaznam
            ->fetch();
    }



    public function addCategory(Category $category): ActiveRow
    {
        return $this->database->table(self::TABLE_NAME_CATEGORY)
            ->insert([
                self::COLUMN_NAZEV_CATEGORIE => $category->getTyp(),
            ]);
    }

    public function getInformation():Nette\Database\ResultSet
    {
        return $this->database->query('        
        SELECT category.nazev_kategorie, COUNT(*) AS Pocet_Zaznamu_Hodnoty_Sloupec,SUM(product.cena) AS Celkova_cena, AVG(product.cena) AS Prumer
        FROM product
        INNER JOIN product_to_category
        ON product.id = product_to_category.product_id
        INNER JOIN category
        ON product_to_category.category_id = category.id
        GROUP BY product_to_category.category_id'
        );
    }
}