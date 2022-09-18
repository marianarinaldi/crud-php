# CRUD de gerenciamento de produtos com PHP orientado a objetos, PDO e MySQL 
## Banco de dados
Crie um banco de dados e execute as instruções SQLs abaixo para criar o database chamado `CRUD` e as tabelas `category` e `products`:
```sql
 START TRANSACTION;

	CREATE DATABASE crud;

	USE crud;

	CREATE TABLE `category` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`code` varchar(255) NOT NULL,
		`name` varchar(255) NOT NULL,
		PRIMARY KEY (id)
	) ENGINE=InnoDB ;

	CREATE TABLE `products` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` varchar(255) NOT NULL,
		`SKU` varchar(255) NOT NULL,
		`price` DECIMAL(10,2),
		`description` varchar(255) NOT NULL,
		`qtd` INT NOT NULL,
		`id_category` INT,
		`name_image` varchar(255),
		PRIMARY KEY (id),
		FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE CASCADE
	) ENGINE=InnoDB ;


	COMMIT;
```

## Configuração
As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Composer
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.

