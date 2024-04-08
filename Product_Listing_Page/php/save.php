<?php

require_once(__DIR__ . '/book.php');
require_once(__DIR__ . '/disk.php');
require_once(__DIR__ . '/furniture.php');
require_once(__DIR__ . '/product_manager.php');

$productManager = new ProductManager();

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$decoded = [];

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
}

$type = $decoded["product_type"];
$product = new $type();
$product->setAttributes($decoded);

if (count($productManager->read($product->getSKU())) !== 0) {
    http_response_code(400);
    echo "Sku already exists";
    exit();
} else {
    $product->createDBEntry($productManager);
    http_response_code(201);
    echo "Created";
    exit();
}

echo "Failed";
