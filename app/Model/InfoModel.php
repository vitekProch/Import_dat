<?php


namespace App\Model;
use Nette;

use App\Repository\CategoryRepository;

class InfoModel
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function getInformation():Nette\Database\ResultSet
    {
        return $this->categoryRepository->getInformation();
    }
}