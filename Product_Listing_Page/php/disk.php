<?php

require_once(__DIR__ . "/product.php");

class Disk extends Product
{
    private $size;

    public function getProductAttributes()
    {
        return "Size" . ": " . $this->size . " MB";
    }
    public function getDescription()
    {
        return $this->size;
    }
    public function setDescription($attribute)
    {
        $this->size = $attribute;
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
