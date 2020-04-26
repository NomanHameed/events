<?php

session_start();

error_reporting(1);


require 'includes/header.php';
require 'includes/navconnected.php'; 
?>

<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index.php" class="breadcrumb">Dashboard</a>
          <a href="createcategory.php" class="breadcrumb">Create Category</a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container addp">
  <form method="post" enctype="multipart/form-data">
    <div class="card">
      <?php

       include '../db.php';
       ?>

      <div class="row">
        <div class="input-field col s6">
          <i class="fa fa-product-hunt prefix"></i>
          <input id="icon_prefix" type="text" class="validate" name="categoryname">
          <label for="icon_prefix">Category Name</label>
        </div>  


    </div>
<div class="row">
<div class="center-align">
        <button type="submit" name="done" class="waves-effect button-rounded waves-light btn">Submit</button>
      </div></div>
    <?php require 'addcategory.php'; ?>
  </form>
</div>

<?php require 'includes/footer.php'; ?>
