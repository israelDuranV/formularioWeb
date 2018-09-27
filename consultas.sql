/*CREO LA BASE DE DATOS**/
CREATE DATABASE ejercicio;
/*INGRESO A LA BASE DE DATOS*/
use ejercicio;
/*CREO LA TABLA FORMULARIO*/
CREATE TABLE formulario (id INT(6) AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(30) NOT NULL, correo VARCHAR(50) NOT NULL, celular VARCHAR(15), horario TIME, sucursal VARCHAR(10), codigo VARCHAR(7), reg_date TIMESTAMP)ENGINE=InnoDB;
/*QUERY PARA INSERT */
INSERT INTO formulario (nombre,correo,celular,horario,sucursal,codigo) VALUES ("'.$nombre.'","'.$email.'","'.$celular.'","'.$horario.'","'.$sucursales.'","'.$codigo.'")';
