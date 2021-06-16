<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Repository\CategoryRepository;
use Nette;
use App\Repository\ProductRepository;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    use Nette\SmartObject;

    /** @var Nette\Database\Context */
    protected $database;

    /** @var ProductRepository */
    protected $productRepository;

    /** @var CategoryRepository */
    protected $categoryRepository;

    public function __construct(Nette\Database\Context $database, ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->database = $database;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
}

