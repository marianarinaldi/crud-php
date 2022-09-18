<?php 
$itens ='';
foreach ($products as $product) {
  $itens .= '
    <tr class="data-row">
      <td class="data-grid-td">
          <span class="data-grid-cell-content">'.$product->name.'</span>
      </td>    
      <td class="data-grid-td">
          <span class="data-grid-cell-content">'.$product->SKU.'</span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content">R$ '.$product->price.'</span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content">'.$product->qtd.'</span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content">'.$product->categoryName.'</span>
      </td>    
      <td class="data-grid-td">
        <div class="actions">
          <div class="action edit">
            <a href="update.php?page=Product&id='.$product->id.'">
              <button type="button" class="btn-edit">Edit</button>
            </a>   
          </div>
          <div class="action delete">
            <a href="delete.php?page=Product&id='.$product->id.'">
              <button type="button" class="btn-delete">Delete</button>
            </a>
          </div>
        </div>
      </td>
    </tr>';
}

$itens = !empty($itens) ? $itens : '<tr class="data-row">
<td colspan="6" class="data-grid-td text-center">
      Nenhum produto encontrado
</td>
</tr>';
?>
<body>
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Products</h1>
      <a href="../createProduct.php" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      <?=$itens?>      
    </table>
  </main>
  <!-- Main Content -->


