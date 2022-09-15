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
  PRIMARY KEY (id),
  FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE CASCADE
) ENGINE=InnoDB ;


COMMIT;