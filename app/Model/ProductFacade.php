<?php


namespace App\Model;


use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class ProductFacade
{
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function xx()
    {
        $file = "C:\Users\Vitek\Desktop\data.txt";
        //Načteí souboru
        $document = file_get_contents($file);
        //Rozdělení souboru na jeden produkt podle '*'
        $poleProduktu = explode("*", $document);
        foreach ($poleProduktu as $key => $product)
        {
            $poleJednohoProduktu = explode("|", $poleProduktu[$key]);
            foreach ($poleJednohoProduktu as $product2)
            {
                $product2 = new Product(
                    $poleJednohoProduktu[0] ?? NULL,
                    $poleJednohoProduktu[1] ?? NULL,
                    $poleJednohoProduktu[3] ?? NULL,
                    $poleJednohoProduktu[4] ?? NULL,
                    $poleJednohoProduktu[5] ?? NULL,
                    $poleJednohoProduktu[6] ?? NULL,
                    $poleJednohoProduktu[7] ?? NULL,
                    $poleJednohoProduktu[8] ?? NULL,
                    $poleJednohoProduktu[9] ?? NULL,
                    $poleJednohoProduktu[10] ?? NULL,
                    $poleJednohoProduktu[11] ?? NULL,
                    $poleJednohoProduktu[12] ?? NULL,
                    $poleJednohoProduktu[13] ?? NULL
                );
            }
            // Zapsání produktu do dtb
            $productRow = $this->productRepository->pridejProduct($product2);

            $joinedCategories = $poleJednohoProduktu[2] ?? '';
            //Rozdělení katerorii podle ';'
            $poleRozdeleno = explode(";", $joinedCategories);
            //Odstranění přebytečných mezer
            $poleCategory = array_filter($poleRozdeleno);
            foreach ($poleCategory as $category) {
                //Použití přepravky pro kategorie
                $category1 = new Category($productRow->id, $category);
                //Zapsání kategorii do dtb
                $this->categoryRepository->pridejCategory($category1);
            }
        }
    }
}