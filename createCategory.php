<?php
require __DIR__ . '/vendor/autoload.php';
use \App\Entity\Category;

if(isset($_POST['category-name'],$_POST['category-code'])){
  $objCategory = new Category;
  $objCategory->name = $_POST['category-name'];
  $objCategory->code = $_POST['category-code'];
  $objCategory->create();    
}

include __DIR__ .'/includes/header.php';

include __DIR__ .'/includes/addCategory.php';

include __DIR__ .'/includes/footer.php';
