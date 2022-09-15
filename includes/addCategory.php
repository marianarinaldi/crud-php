
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>    
    <form action="createCategory.php" method="post">     
      <div class="input-field">
        <input type="hidden" name="pageAddCategory" id="pageAddCategory" value="category" />
        <label for="category-name" class="label">Category Name</label>
        <input type="text" name="category-name" id="category-name" class="input-text" />
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" name="category-code" id="category-code" class="input-text" />
      </div>
      <div class="actions-form">
        <a href="../readCategory.php"  class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  </main>
  <!-- Main Content -->

  