<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Category;
use \App\Entity\Product;

$page = $_GET['page'];

//DEFININDO TÍTULO DA PÁGINA
define('TITLE','Edit');

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

if($page == 'Category'){
  //CONSULTA
  $obj = Category::getCategory($_GET['id']);
  //VALIDAÇÃO
  if(!$obj instanceof Category){
    header('location: index.php?status=error');
    exit;
  }
  //UPDATE da categoria
  if(isset($_POST['category-name'],$_POST['category-code'])){
   
    $obj->name = $_POST['category-name'];
    $obj->code = $_POST['category-code'];
    $obj->update();    
    
    header('location: readCategory.php?status=success');
    exit;
  }
}

if($page == 'Product'){
  //CONSULTA
  $obj = Product::getProduct($_GET['id']);
  //VALIDAÇÃO
  if(!$obj instanceof Product){
    header('location: index.php?status=error');
    exit;
  }
  //UPDATE do produto
  if(isset($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['category'],$_POST['description'])){
  
    $obj->SKU = $_POST['sku'];
    $obj->name = $_POST['name'];
    $obj->price = $_POST['price'];
    $obj->quantity = $_POST['quantity'];
    $obj->category = $_POST['category'];
    $obj->description = $_POST['description'];
    $obj->update();  
  
    header('location: readProduct.php?status=success');
    exit;
  }
}

include __DIR__ .'/includes/header.php';

if($page == 'Category'){
  include __DIR__ .'/includes/addCategory.php';
}

if($page == 'Product'){
  $categories = Category::getCategories();
include __DIR__ .'/includes/addProduct.php';
}

include __DIR__ .'/includes/footer.php';
