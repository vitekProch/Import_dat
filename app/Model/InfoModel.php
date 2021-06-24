<?php


namespace App\Model;


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

    public function getCategory()
    {
        return $this->categoryRepository->getCategory();
    }
}