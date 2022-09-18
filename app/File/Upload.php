<?php 
namespace App\File;
class Upload{

  /**
  * Nome do arquivo (sem extensão)
  * @var string
  */
  private $name;

  /**
 * Extensão do arquivo (sem ponto)
 * @var string
 */
  private $extension;
  
  /**
  * Type do arquivo
  * @var string
  */
  private $type;

  /**
  * Nome/caminho temporário do arquivo
  * @var string
  */
  private $tempName;

  /**
  * Código de erro do upload
  * @var integer
  */
  private $error;

  /**
   * Contador de duplicações de duplicações
   * @var
   */
  private $duplicates = 0;
  /**
  * Construtor da classe
  * @param array $file $_FILES[campo]
  */
  public function __construct($file){
    $this->type = $file['type'];
    $this->tmpName = $file['tmpName'];
    $this->error = $file['error'];
    
    $info = pathinfo($file['name']);
    $this->name = $info['filename'];
    $this->extension = $info['extension'];    
    
  }

  /**
   * Método responsável por retornar o nome do arquivo com sua extensão
   * @return string
   */
  public function getBaseName(){
    //VALIDA EXTENSÃO
    $extension = strlen($this->extension) ? '.'.$this->extension : '';
    
    //VALIDA DUPLICAÇÃO
    $duplicates = $this->duplicates > 0 ? '-'.$this->duplicates : '';

    //RETORNA O NOME COMPLETO
    return $this->name.$duplicates.$extension;
  }
  /**
   * Método responsável
   * @param string $dir
   * @param boolean $overwrite
   * @param [type] $dir
   */

  public function getPossibleBasename($dir, $overwrite){
    //SOBRESCREVER ARQUIVO
    if($overwrite) return $this->getBaseName();

    //NÃO PODE SOBRESCREVER ARQUIVO
    $basename = $this->getBaseName();

    //VERIFICAR DUPLICAÇÃO
    if(!file_exists($dir.'/'.$basename)){
      return $basename;
    }

    //INCREMENTAR DUPLICAÇÕES
    $this->duplicates++;

    //RETORNA O PRÓPRIO MÉTODO
    return $this->getPossibleBasename($dir, $overwrite);
  }

  /**
   * Método responsável por mover o arquivo de upload
   * @param string $dir
   * @param boolean $overwrite
   * @return boolean
   */
  public function upload($dir, $overwrite = true){
    //VERIFICAR ERROR
    if($this->error != 0) return false;

    //CAMINHO COMPLETO DE DESTINO
    $path = $dir.'/'.$this->getPossibleBasename($dir, $overwrite);

    //MOVE O ARQUIVO PARA PASTA DE DESTINO
    return move_uploaded_file($this->tempName, $path);
  }

}

?>