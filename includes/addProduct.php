<?php 
$itens = '';
foreach ($categories as $category) {

  $itens .='
  <option value="'.$category->id.'"';

  if(isset($obj->id_category)){
    if($obj->id_category == $category->id){
      $itens .=' selected ';
    }
  }

  $itens .='>
  '.$category->name.'
  </option>
  ';
}
?>
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item"><?= TITLE ?> Product</h1>
    <form action="" method="post">
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" name="sku" class="input-text" value="<?= isset($obj->SKU) ? $obj->SKU : ''  ?>" required/> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name"  name="name" class="input-text" value="<?= isset($obj->name) ? $obj->name : ''  ?>" required/> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="number" id="price" name="price" class="input-text" min="1" step="any" value="<?= isset($obj->price) ? $obj->price : ''  ?>" required /> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="number" id="quantity" name="quantity" class="input-text" min="0"  value="<?= isset($obj->qtd) ? $obj->qtd : ''  ?>" required/> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" name="category" class="input-text" required>
        <?= $itens ?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="description" class="input-text" required>
          <?= isset($obj->description) ? $obj->description : ''  ?>
        </textarea>
      </div>
      <div class="input-field">
        <label for="image" class="label">Image</label>
        <input type="file" id="imageProduct" name="imageProduct" class="input-text" />
      </div>
      <div class="actions-form">
        <a href="../readProduct.php"  class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" onclick="validation()" />
      </div>      
    </form>
  </main>
  <!-- Main Content -->

<script type="text/javascript">
  function validation(){
    var name = document.getElementById('name');
    var sku = document.getElementById('sku');
    var price = document.getElementById('price');
    var quantity = document.getElementById('quantity');
    var category = document.getElementById('category');
    var description = document.getElementById('description');

    if(name.value == '' || sku.value == '' || price.value == '' || quantity.value == '' || category.value == '' || description.value == ''){
      alert('Preencha todos os campos');
    
    }
  }

</script>