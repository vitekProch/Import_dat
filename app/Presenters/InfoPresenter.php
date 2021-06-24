<?php


namespace App\Presenters;


use App\Model\InfoModel;

class InfoPresenter extends BasePresenter
{
    /**
     * @var InfoModel
     */
    private $infoModel;

    public function __construct(InfoModel $infoModel)
    {
        parent::__construct();
        $this->infoModel = $infoModel;
    }

    public function renderInfo()
    {
        $printCategory = $this->infoModel->getCategory();
        $this->template->printCategory = $printCategory;

        $countCategoryProduct = $this->infoModel->getCategory(); //pridat metodu na počet produktu v kategorii
        $this->template->countCategoryProduct = $countCategoryProduct;

        $priseProduct = $this->infoModel->getCategory(); //pridat cenu produktu
        $this->template->priseProduct = $priseProduct;

        $averageProductCount = $this->infoModel->getCategory(); //pridat metodu na průmer
        $this->template->averageProductCount = $averageProductCount;
    }
}