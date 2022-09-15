CREATE DATABASE `carrinho-de-compras`;
USE `carrinho-de-compras`;
CREATE TABLE `product` (
	`id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  	`name` VARCHAR(40),
  	`price` FLOAT(2),
  	`image_url` TEXT
);