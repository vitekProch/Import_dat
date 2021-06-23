<?php


namespace App\Model;


use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class ProductFacade
{

    /**
     * @var ProductMapper
     */
    private $productMapper;
    /**
     * @var CategoryMapper
     */
    private $categoryMapper;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, ProductMapper $productMapper, CategoryMapper $categoryMapper)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productMapper = $productMapper;
        $this->categoryMapper = $categoryMapper;
    }

    public function addDataFromDocument()
    {
        //private const FILE_PATH = __DIR__ . "/../../data.txt";
        //$document = file_get_contents(self::FILE_PATH); //Načteí souboru

        $file = "C:\Users\Vitek\Desktop\data.txt";
        //Načteí souboru
        $document = file_get_contents($file);

        //Rozdělení souboru na jeden produkt podle '*'
        $individualProduct = explode("*", $document);
        foreach ($individualProduct as $key => $product) {
            $partsOfProduct = explode("|", $individualProduct[$key]);

            //Použití mapperu pro vytvoření productu
            $newProduct = $this->productMapper->createNewProduct($partsOfProduct);

            // Zapsání produktu do dtb
            $productRow = $this->productRepository->addProduct($newProduct);
            $categoryNames = $partsOfProduct[2] ?? NULL;

            $joinedCategories = $categoryNames ?? '';
            //Rozdělení katerorii podle ';'

            $categoryTypes = explode(";", $joinedCategories);
            //Odstranění přebytečných mezer
            $noSpaceCategory = array_filter($categoryTypes);
            foreach ($noSpaceCategory as $category) {

                //Použití mapperu pro vytvoření category
                $categoryComplete = $this->categoryMapper->createNewCategory($category);

                try
                {
                    //Zapsání kategorii do dtb
                    $this->categoryRepository->addCategory($categoryComplete);
                }
                catch (\Exception $e) {

                }
            }
        }
    }
}