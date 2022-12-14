<?php

namespace App\Entity;
use \App\Db\Database;
use \PDO;
class Product{

  /**
  * Identificador único do produto
  * @var integer
  */
  public $id;

  /**
  * Código do produto
  * @var string
  */
  public $sku;

  /**
  * Nome do produto
  * @var string
  */
  public $name;

  /**
  * Preço do produto
  * @var float
  */
  public $price;

  /**
  * Preço do produto
  * @var integer
  */
  public $quantity;
  
  /**
  * Preço do produto
  * @var integer
  */
  public $category;
  
  /**
  * Preço do produto
  * @var string
  */
  public $description;
  /**
  * Nome da Imagem do produto
  * @var string
  */
  public $name_image;
  /**
   * Método responsável por cadastrar Produto
   * @return boolean
   */
  public function create(){
    
    //inserir produto no banco
    $objDatabase = new Database('products');
    $this->id = $objDatabase->insert([
      'SKU' => $this->SKU,
      'name' => $this->name,
      'price' => $this->price,
      'qtd' => $this->quantity,
      'id_category' => $this->category,
      'description' => $this->description,
      'name_image' => $this->name_image
    ]);
    
    //retornar sucesso
    return true;
  }
  /**
   * Método responsável por atualizar o produto no banco
   * @return boolean
   */
  public function update(){
    return (new Database('products'))->update(
      'id = '.$this->id,
      [
        'SKU' => $this->SKU,
        'name' => $this->name,
        'price' => $this->price,
        'qtd' => $this->quantity,
        'id_category' => $this->category,
        'description' => $this->description,
        'name_image' => $this->name_image
      ]);
  }

  /**
   * Método responsável por excluir o produto do banco
   * @return boolean
   */
  public function delete(){
    return (new Database('products'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os products do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getProducts($where = null, $order = null, $limit = null, $inner = null, $fields = null){
    
    return (new Database('products'))->select($where,$order,$limit, $inner, $fields)
      ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um produto com base em seu ID
   * @param  integer $id
   * @return Product
   */
  public static function getProduct($id){
    return (new Database('products'))->select('id = '.$id)
      ->fetchObject(self::class);
  }


}