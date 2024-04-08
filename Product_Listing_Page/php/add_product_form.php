<?php

require_once(__DIR__ . "/product_manager.php");
$productManager = new ProductManager();
$categories = $productManager->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

  <title>Add Products</title>
</head>

<body>
<nav class="navbar navbar-expand-sm">
  <div class="container-fluid">
    <h2 class="nav-item ms-5">Add Product</h2>
    <div class="d-flex align-items-center ms-auto">
      <div class="nav-item">
        <button type="submit" class="btn btn-outline-dark" form="product_form">Save</button>
      </div>
      <div class="nav-item">
        <a class="nav-link" href="../"><button class="btn btn-outline-dark me-5">Cancel</button></a>
      </div>
    </div>
  </div>
</nav>


<hr class="mx-auto" style="width:95%">
<div class="container" id="whole-form-container">
    <div class="row justify-content-center align-items-center">
      <form action="save.php" method="post" id="product_form">

        <div class="row mb-3">
          <label for="sku" class="col-sm-2 col-form-label">SKU :</label>
          <div class="col-sm-10">
              <input type="text" class="form-control w-25" name="sku" id="sku" placeholder="SKU">
          </div>
        </div>
        <div class="row mb-3">
          <label for="name" class="col-sm-2 col-form-label">Name : </label>
          <div class="col-sm-10">
              <input type="text" class="form-control w-25" name="name" id="name" placeholder="Name">
          </div>
        </div>
        <div class="row mb-3">
          <label for="price" class="col-sm-2 col-form-label">Price ($):</label>
          <div class="col-sm-10">
              <input type="text"  name="price"  class="form-control w-25" id="price" placeholder="Price">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Select product type :</label>
          <select class="form-select custom-select form-select-sm mb-3 w-25" name="product_type" id="productType">
            <option value="">Select type</option>
            <?php foreach($categories as $category) :  ?>
              <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name'];?> </option>
            <?php endforeach; ?>
          </select>
        </div>

          <div class="form-group form-group-icon-left" id="furniture" style="display:none;">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-25" name="height" id="height" placeholder="Height (CM)">
                </div>
            </div>

            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-25" name="width" id="width" placeholder="Width (CM)">
                </div>
            </div>

            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control w-25" name="length" id="length" placeholder="Length (CM)">
                </div>
            </div>
            <div class="form-text">Please provide the height, width and length of the furniture in centimeters</div>
          </div>

          <div class=" row mb-3" id="disk" style="display:none;">
              <label for="size" class="col-sm-2 col-form-label" >Size (MB):</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control w-25" name="size" id="size" placeholder="Size (MB)">
              </div>
              <div class="form-text">Please provide the size of the disk in Mega-byte (MB)</div>
          </div>

          <div class="row mb-3" id="book" style="display:none;">
              <label for="weight" class="col-sm-2 col-form-label">Weigth (KG) :</label>
              <div class="col-sm-10">
                  <input type="text"  class="form-control w-25" name="weight" id="weight" placeholder="Weight">
              </div>
              <div class="form-text">Please provide the weight of the book in Kilogramme (KG)</div>
          </div>

      </form>
    </div>
  </div>

</body>

</html>
<script src="../js/add_form.js"></script>
<script src="../js/jquery_type_switcher.js"></script>
 

  