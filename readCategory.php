<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Category;

$categories = Category::getCategories();

include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/listCategories.php';
include __DIR__ .'/includes/footer.php';
