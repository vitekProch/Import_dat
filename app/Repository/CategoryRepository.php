<?php

namespace App\Repository;


use App\Model\Category;
use Nette\Database\Table\ActiveRow;

class CategoryRepository extends BaseRepository
{
    public const TABLE_NAME = 'product_category';

    public const COLUMN_NAME = 'nazev_kategorie';

    public function getByName(string $name): ?ActiveRow
    {
        return $this->database->table(self::TABLE_NAME)
            ->where(self::COLUMN_NAME, $name)
            // V tabulce je unique index, takze to vrati vzdy jen jeden zaznam
            ->fetch();
    }


    public function addCategory(Category $category): ActiveRow
    {
        return $this->database->table(self::TABLE_NAME)
            ->insert([
                'id_produktu' => $category->id_produktu,
                self::COLUMN_NAME => $category->getTyp(),
            ]);
    }
}