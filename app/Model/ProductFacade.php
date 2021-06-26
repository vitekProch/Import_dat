<?php


namespace App\Model;


use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class ProductFacade
{
    public const FILE_PATH = __DIR__ . '/../../';
    /**
     * @var string
     */
    private $filename;

    public function __construct(string $filename, ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->filename = $filename;
    }

    public function addDataFromDocument()
    {
        $file = self::FILE_PATH . $this->filename;
        //Načteí souboru
        $document = file_get_contents($file);

        //Rozdělení souboru na jeden produkt podle '*'
        $individualProduct = explode("*", $document);
        foreach ($individualProduct as $key => $product) {
            $partsOfProduct = explode("|", $individualProduct[$key]);

            $productComplete = new Product(
                $partsOfProduct[0] ?? NULL,
                $partsOfProduct[1] ?? NULL,
                $partsOfProduct[3] ?? NULL,
                $partsOfProduct[4] ?? NULL,
                $partsOfProduct[5] ?? NULL,
                $partsOfProduct[6] ?? NULL,
                $partsOfProduct[7] ?? NULL,
                $partsOfProduct[8] ?? NULL,
                $partsOfProduct[9] ?? NULL,
                $partsOfProduct[10] ?? NULL,
                $partsOfProduct[11] ?? NULL,
                $partsOfProduct[12] ?? NULL,
                $partsOfProduct[13] ?? NULL
            );

            // Zapsání produktu do dtb
            $productRow = $this->productRepository->addProduct($productComplete);
            $categoryNames = $partsOfProduct[2];
            $joinedCategories = $categoryNames ?? '';
            //Rozdělení katerorii podle ';'
            $categoryTypes = explode(";", $joinedCategories);
            //Odstranění přebytečných mezer
            $noSpaceCategory = array_filter($categoryTypes);
            foreach ($noSpaceCategory as $category) {
                //Použití přepravky pro kategorie
                $categoryComplete = new Category($productRow->id, $category);
                //Zapsání kategorii do dtb
                $this->categoryRepository->addCategory($categoryComplete);
            }
        }
    }
}