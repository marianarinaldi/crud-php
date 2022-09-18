<?php

require __DIR__ . '/vendor/autoload.php';
use App\Entity\Product;
use \App\Entity\Category;
use \App\File\Upload;

define('TITLE','New');

if(isset($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['category'],$_POST['description'], $_FILES['imageProduct'])){
  
  $objProduct = new Product;
  $objProduct->SKU = $_POST['sku'];
  $objProduct->name = $_POST['name'];
  $objProduct->price = $_POST['price'];
  $objProduct->quantity = $_POST['quantity'];
  $objProduct->category = $_POST['category'];
  $objProduct->description = $_POST['description'];

  $objUpload = new Upload($_FILES['imageProduct']);
  $sucesso = $objUpload->upload(__DIR__.'/assets/images/product'.false);
  if($sucesso){

    $objProduct->image = $objUpload->getBaseName();
  }
  $objProduct->create();  

  header('location: readProduct.php?status=success');
  exit;
}

$categories = Category::getCategories();

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/addProduct.php';
include __DIR__ .'/includes/footer.php';
