<?php

namespace App\Repository;


use App\Model\Category;
use Nette\Database\Table\ActiveRow;

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
}