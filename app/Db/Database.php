<?php 

namespace App\Db;

use \PDO;
use PDOException;

class Database{


  const db_name = 'crud';
  const db_host = 'localhost';
  const db_user = 'root';
  const db_pass = '';
  /**
   * Nome da tabela a ser manipulada
   * @var string
  */
  private $table;

  /**
   * Instancia de conexão com o banco de dados
   * @var PDO
  */

  private $connection;

  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }
  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection(){
    try {
      $this->connection = new PDO('mysql:host='.self::db_host.';dbname='.self::db_name, self::db_user, self::db_pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
      die('ERROR: '.$e->getMessage());
    }

  }

   /**
   * Método responsável por executar queries dentro do banco de dados
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Método responsável por inserir dados no banco
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){
    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');
 
    //MONTA A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //EXECUTA O INSERT
    $this->execute($query,array_values($values));

    //RETORNA O ID INSERIDO
    return $this->connection->lastInsertId();
  }

  /**
   * Método responsável por executar uma consulta no banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $inner
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $inner = null, $fields = '*'){
    //DADOS DA QUERY
    $where = !empty($where) ? 'WHERE '.$where : '';
    $order = !empty($order) ? 'ORDER BY '.$order : '';
    $limit = !empty($limit) ? 'LIMIT '.$limit : '';
    $inner = !empty($inner) ? $inner : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' as a '.$inner.' '.$where.' '.$order.' '.$limit;

    //EXECUTA A QUERY
    return $this->execute($query);
  }

  /**
   * Método responsável por executar atualizações no banco de dados
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where,$values){
    //DADOS DA QUERY
    $fields = array_keys($values);

    //MONTA A QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    //EXECUTAR A QUERY
    $this->execute($query,array_values($values));

    //RETORNA SUCESSO
    return true;
  }

  /**
   * Método responsável por excluir dados do banco
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //MONTA A QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTA A QUERY
    $this->execute($query);

    //RETORNA SUCESSO
    return true;
  }
   
}