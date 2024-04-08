<?php

require_once(__DIR__ . "/../php/product_manager.php");
require_once(__DIR__ . "/../php/book.php");
require_once(__DIR__ . "/../php/furniture.php");
require_once(__DIR__ . "/../php/disk.php");

$productManager = new ProductManager();
$result = $productManager->getAllProducts();
$products = [];

foreach ($result as $row) {
  $type = $row["product_type"];
  $product = new $type();
  $product->setAttributes($row);
  array_push($products, $product);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../css/productStyle.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>List Products</title>
</head>

<body>
<div class="container">
  <nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
      <h2 class="nav-item ms-5">Product List</h2>
      <div class="d-flex align-items-center ms-auto">
        <div class="nav-item">
        <a class="nav-link" href="../php/add_product_form.php"><button class="btn btn-outline-dark">ADD</button></a>
        </div>
        <div class="nav-item">
          <button class="btn btn-outline-dark me-5" id="delete-product-btn" type="submit" form="items-form">MASS DELETE</button>
        </div>
      </div>
    </div>
  </nav>
  <hr class="mx-auto" style="width:95%">
</div>

  <div class="container">
  <form action="../php/delete.php/" id="items-form" method="post">
    <div class="card-group">
      <?php foreach ($products as $product) { ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="card m-3 border-dark" style="max-width: 18rem;">
            <div class="card-body mx-auto" >
              <input class="delete-checkbox" type="checkbox" name= "<?php echo($product->getSKU()); ?>">
              <p class="card-text">SKU : <?php echo($product->getSKU()); ?></p>
              <p class="card-text">Name : <?php echo($product->getName()); ?></p>
              <p class="card-text">Price : <?php echo($product->getPrice()); ?> $</p>
              <p class="card-text"><?php echo($product->getProductAttributes()); ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </form>
</body>

</html>
<script src="../js/delete.js"></script>