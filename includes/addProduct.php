
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Product</h1>
    <form action="createProduct.php" method="post">
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" name="sku" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name"  name="name" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" name="price" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" name="quantity" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" name="category" class="input-text">
          <option>Category 1</option>
          <option>Category 2</option>
          <option>Category 3</option>
          <option>Category 4</option>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="description" class="input-text"></textarea>
      </div>
      <div class="actions-form">
        <a href="../readProduct.php"  class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>      
    </form>
  </main>
  <!-- Main Content -->
