<?php
require __DIR__ . '/vendor/autoload.php';

include __DIR__ .'/includes/header.php';

if($_GET['page'] == 'category'){
  include __DIR__ .'/includes/addCategory.php';
}
if($_GET['page'] == 'product'){
include __DIR__ .'/includes/addProduct.php';
}

include __DIR__ .'/includes/footer.php';
