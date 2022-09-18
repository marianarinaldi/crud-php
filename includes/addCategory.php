
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item"><?= TITLE ?> Category</h1>    
    <form action="" method="post">     
      <div class="input-field">
        <input type="hidden" name="pageAddCategory" id="pageAddCategory" value="category" />
        <label for="category-name" class="label">Category Name</label>
        <input type="text" name="category-name" id="category-name" class="input-text" value="<?= isset($obj->name) ? $obj->name : ''  ?>" required/>
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" name="category-code" id="category-code" class="input-text" value="<?= isset($obj->code)  ? $obj->code : '' ?>" required/>
      </div>
      <div class="actions-form">
        <a href="../readCategory.php"  class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit"  value="Save" onclick="validation()" />
      </div>
    </form>
  </main>
  <!-- Main Content -->

  <script type="text/javascript">
  function validation(){
    var categoryName = document.getElementById('category-name');
    var categoryCode = document.getElementById('category-code');

    if(categoryName.value == '' || categoryCode.value == '' ){
      alert('Preencha todos os campos');    
    }
  }

</script>