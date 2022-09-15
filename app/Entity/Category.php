<?php

namespace App\Entity;
use \App\Db\Database;

use \PDO;

class Category{

  /**
  * Identificador único do produto
  * @var integer
  */
  public $id;

  /**
   * Nome da categoria
   * @var string
   */
  public $name;
  
  /**
   * Código da categoria
  * @var string
  */
  public $code;

  /**
   * Método responsável por cadastrar a Categoria
   * @return boolean
   */
  public function create(){

    //inserir produto no banco
    $objDatabase = new Database('category');
    $this->id = $objDatabase->insert([
      'name' => $this->name,
      'code' => $this->code,     
    ]);
    
    //retornar sucesso
    return true;
  }

  /**
   * Método responsável por atualizar a categoria no banco
   * @return boolean
   */
  public function update(){
    return (new Database('category'))->update(
      'id = '.$this->id,
      [
        'name' => $this->name,
        'code' => $this->code,  
      ]);
  }

  /**
   * Método responsável por excluir a categoria do banco
   * @return boolean
   */
  public function delete(){
    return (new Database('category'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as categorias do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getCategories($where = null, $order = null, $limit = null){
    return (new Database('category'))->select($where,$order,$limit)
      ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma categoria com base em seu ID
   * @param  integer $id
   * @return Product
   */
  public static function getCategory($id){
    return (new Database('category'))->select('id = '.$id)
      ->fetchObject(self::class);
  }


}