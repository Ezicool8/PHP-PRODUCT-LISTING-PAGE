<?php

require_once(__DIR__ . "/product.php");

class Book extends Product
{

    private $weight;

    public function getProductAttributes()
    {
        return "Weight" . ": " . $this->weight . " KG";
    }
    public function getDescription()
    {
        return $this->weight;
    }

    public function setDescription($attribute)
    {
        $this->weight = $attribute;
    }

    public function createDBEntry($productManager)
    {
        $firstInsert = ["sku" => $this->getSKU(), "name" => $this->getName(), "price" => $this->getPrice(), "category_name" => $this->getCategory()];
        $secondInsert = ["sku" => $this->getSKU(), "attribute" => $this->getDescription()];
        $productManager->create($firstInsert, $secondInsert);
    }
    public function readDbEntry($productManager)
    {
        $result = $productManager->read("sku, name, price, attribute", "sku = " . $this->getSKU());
        return $result;
    }
}
