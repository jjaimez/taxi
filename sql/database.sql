/*CREATE DATABASE taxi;*/

USE taxi;

CREATE TABLE `usuarios` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT, 
  `usuario` VARCHAR(20) NOT NULL, 
  `password` VARCHAR(10) NOT NULL, 
  PRIMARY KEY  (`id`) 
);

INSERT INTO `taxi`.`usuarios`
(`usuario`,
`password`)
VALUES
('jacinto','jacinto');

CREATE TABLE `taxi`.`pedido` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lat_origen` FLOAT(10,6) NULL,
  `lng_origen` FLOAT(10,6) NULL,
  `pasajeros` INT NULL,
  `lat_destino` FLOAT(10,6) NULL,
  `lng_destino` FLOAT(10,6) NULL,
  `empresa` VARCHAR(45) NULL,
  `fumador` INT NULL,
  `conversador` INT NULL,
  `estado` VARCHAR(100) NULL,
  `direccion_origen` VARCHAR(100) NULL,
  `direccion_destino` VARCHAR(100) NULL DEFAULT 'No especificado',
  `minutos` INT NULL DEFAULT 0,
  `leida` VARCHAR(3) NULL DEFAULT 'no',
  PRIMARY KEY (`id`));

CREATE TABLE `taxi`.`opiniones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `preferencias` INT NULL,
  `puntualidad` INT NULL,
  `autos` INT NULL,
  `precio` INT NULL,
  `ley` INT NULL,
  `opinion` VARCHAR(300) NULL,
  `nombre` VARCHAR(45) NULL,
  `empresa` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

