<?php
require __DIR__ . '/vendor/autoload.php';
use \App\Entity\Category;

define('TITLE','New');

if(isset($_POST['category-name'],$_POST['category-code'])){
  $obj = new Category;
  $obj->name = $_POST['category-name'];
  $obj->code = $_POST['category-code'];
  $obj->create();    
  
  header('location: readCategory.php?status=success');
  exit;
}

include __DIR__ .'/includes/header.php';

include __DIR__ .'/includes/addCategory.php';

include __DIR__ .'/includes/footer.php';
