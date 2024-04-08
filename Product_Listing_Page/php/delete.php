<?php

require_once (__DIR__."/product_manager.php");

$productManager = new ProductManager();
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$decoded = [];

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
}

foreach ($decoded as $key){
    $productManager->delete($key);
}

echo "Success";