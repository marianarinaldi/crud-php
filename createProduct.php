<?php

require __DIR__ . '/vendor/autoload.php';
use App\Entity\Product;


if(isset($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['category'],$_POST['description'])){
  
  $objProduct = new Product;
  $objProduct->sku = $_POST['sku'];
  $objProduct->name = $_POST['name'];
  $objProduct->price = $_POST['price'];
  $objProduct->quantity = $_POST['quantity'];
  $objProduct->category = $_POST['category'];
  $objProduct->description = $_POST['description'];
  $objProduct->create();  
}

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/addProduct.php';
include __DIR__ .'/includes/footer.php';
