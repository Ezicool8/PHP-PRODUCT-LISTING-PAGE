<?php

require_once(__DIR__ . '/db.php');

class ProductManager extends DatabaseHandler
{

    public function create($firstValues, $secondValues)
    {
        $firstSql = "INSERT INTO products VALUES (?,?,?,?)";
        $secondSql = "INSERT INTO product_attributes VALUES (?,?)";
        $firstStmt = $this->connect()->prepare($firstSql);
        $firstStmt->execute([$firstValues['sku'], $firstValues['name'], $firstValues['price'], $firstValues['category_name']]);
        $secondStmt = $this->connect()->prepare($secondSql);
        $secondStmt->execute([$secondValues['sku'], $secondValues['attribute']]);
    }

    public function read($where)
    {
        $sql = "SELECT sku FROM products WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$where]);
        return $stmt->fetchAll();
    }

    public function getAllProducts()
    {
        $sql = "SELECT products.sku, products.name, products.price, categories.category_name AS product_type, product_attributes.attribute FROM products
        left outer join product_attributes
        on (product_attributes.sku = products.sku)
        left outer join categories
        on (categories.category_name = products.category_name)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAllCategories(){
        $sql = 'SELECT * FROM categories';
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function delete($sku){
        $sql = "DELETE FROM products WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);
    }
}
