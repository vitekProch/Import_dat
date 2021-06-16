<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\ProductFacade;
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
    /**
     * @var ProductFacade
     */
    private $productFacade;

    /**
     * BasePresenter constructor.
     * @param Nette\Database\Context $database
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param ProductFacade $productFacade
     */
    public function __construct(Nette\Database\Context $database, ProductRepository $productRepository, CategoryRepository $categoryRepository, ProductFacade $productFacade)
    {
        $this->database = $database;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productFacade = $productFacade;
    }
}

