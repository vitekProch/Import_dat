<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\ProductFacade;

final class HomepagePresenter extends BasePresenter
{

    /**
     * HomepagePresenter constructor.
     */
    public function __construct(ProductFacade $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    public function actionAddData()
    {
        $this->productFacade->xx();
        $this->terminate();
    }
}