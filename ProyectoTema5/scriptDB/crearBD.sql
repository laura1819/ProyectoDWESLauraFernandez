
	/* Autor: Laura Fernandez
		Fecha: 01/04/19
		Comentarios: Crear una base de datos y añadir una tabla
		*/

    -- Primero creamos la base de datos userEjercicio2
create database DAW210_DBProyectoTema5;
-- Entramos a la base de datos sobre la que vamos a trabajar con la sentencia use 'nombre'.
use DAW210_DBProyectoTema5;
-- Por último creamos la tabla
create table usuario(codUsuario varchar(255) primary key, descripcion varchar(250), pass varchar(255), perfil varchar(50))engine=innodb;
-- Damos permisos al usuario
grant all privileges on DAW210_DBProyectoTema5.* to 'usuarioDBProyectoTema5'@'%' identified by 'paso'; 
      
