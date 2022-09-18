<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Category;
use \App\Entity\Product;

$page = $_GET['page'];


//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA
if($page == 'Category'){
  $obj = Category::getCategory($_GET['id']);
  //VALIDAÇÃO
  if(!$obj instanceof Category){
    header('location: index.php?status=error');
    exit;
  }
}
if($page == 'Product'){
  $obj = Product::getProduct($_GET['id']);
  //VALIDAÇÃO
  if(!$obj instanceof Product){
    header('location: index.php?status=error');
    exit;
  }
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obj->delete();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ .'/includes/header.php';
include __DIR__.'/includes/confirmDelete.php';
include __DIR__ .'/includes/footer.php';
