<?php 
$itens ='';

foreach ($products as $product) {
  $itens .= '
    <li>
      <div class="product-image">
        <img src="../assets/images/product/tenis-runner-bolt.png" layout="responsive" width="164" height="145" alt="'.$product->name.'" />
      </div>
      <div class="product-info">
        <div class="product-name">
          <span>'.$product->name.'</span>
        </div>
        <div class="product-price">';
          if($product->qtd > 0){
            $itens .= '<span class="special-price">'.$product->qtd.' available</span>'; 
          }else{
            $itens .= '<span class="special-price">Out of stock</span>'; 
          }
          $itens .= ' <span>R$ '.$product->price.'</span>
        </div>
      </div>
    </li>';
}

?>
  
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Dashboard</h1>
    </div>
    <div class="infor">
      You have <?= count($products)?> products added on this store: <a href="../createProduct.php" class="btn-action">Add new Product</a>
    </div>
    <ul class="product-list">
      <?= $itens ?>
    </ul>
  </main>
  <!-- Main Content -->
