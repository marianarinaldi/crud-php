<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Product;

$fields =  ' a.id
            ,a.name
            ,a.SKU
            ,a.price
            ,a.description
            ,a.qtd
            ,c.name as categoryName
            ,a.id_category
            ,a.name_image';

$inner = 'INNER JOIN category c ON c.id = a.id_category';

$products = Product::getProducts($where = null, $order = null, $limit = null, $inner, $fields);


include __DIR__ .'/includes/header.php';
include __DIR__ .'/includes/dashboard.php';
include __DIR__ .'/includes/footer.php';



