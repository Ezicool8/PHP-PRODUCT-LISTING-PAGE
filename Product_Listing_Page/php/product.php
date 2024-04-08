<?php

abstract class Product
{
    private $sku;
    private $name;
    private $price;
    private $category_name;

    public function setSKU($sku){
        $this->sku = $sku;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setCategory($category_name){
        $this->category_name = $category_name;
    }
    public function getSKU(){
        return $this->sku;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getCategory(){
        return $this->category_name;
    }
    public function setAttributes($attributes)
    {
        $this->setSKU($attributes['sku']);
        $this->setName($attributes['name']);
        $this->setPrice($attributes['price']);
        $this->setCategory($attributes['product_type']);
        $this->setDescription($attributes['attribute']);
    }
    abstract public function setDescription($attribute);
    abstract public function getDescription();
    abstract public function getProductAttributes();
    abstract public function createDBEntry($productManager);
    abstract public function readDbEntry($productManager);
}
