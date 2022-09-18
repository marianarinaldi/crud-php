<?php 
  $itens = '';
  foreach($categories as $category){
    $itens .= '
      <tr class="data-row">
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$category->name.'</span>
        </td>      
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$category->code.'</span>
        </td>      
        <td class="data-grid-td">
          <div class="actions">          
            <div class="action edit">
              <a href="update.php?page=Category&id='.$category->id.'">
                <button type="button" class="btn-edit">Edit</button>
              </a>            
            </div>
            <div class="action delete">
              <a href="delete.php?page=Category&id='.$category->id.'">
                <button type="button" class="btn-delete">Delete</button>
              </a>
            </div>
          </div>
        </td>
      </tr>';
 }

  $itens = !empty($itens) ? $itens : '<tr class="data-row">
        <td colspan="6" class="data-grid-td text-center">
              Nenhuma categoria encontrada
        </td>
    </tr>';
?>
<body>
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="../createCategory.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      <?=$itens?>    
    </table>
  </main>
  <!-- Main Content -->
