<?php

require_once(__DIR__ . "/product.php");

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function getProductAttributes()
    {
        return "Dimensions" . ": " . $this->height . "x" . $this->width . "x" . $this->length;
    }
    public function getDescription()
    {
        return $this->height . "x" . $this->width . "x" . $this->length;
    }

    public function setDescription($attribute)
    {
        $data = explode("x", $attribute);
        $this->height = $data[0];
        $this->width = $data[1];
        $this->length = $data[2];
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
