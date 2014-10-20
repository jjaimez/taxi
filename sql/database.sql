CREATE DATABASE taxi;

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

