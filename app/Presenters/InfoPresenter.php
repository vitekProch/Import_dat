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
        $printInformation = $this->infoModel->getInformation();
        $this->template->printInformation = $printInformation;
    }
}