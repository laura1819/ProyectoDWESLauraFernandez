-- Primero creamos la base de datos userEjercicio2
create database DAW210_DBLogInLogOffTema5;
-- Entramos a la base de datos sobre la que vamos a trabajar con la sentencia use 'nombre'.
use DAW210_DBLogInLogOffTema5;
-- Por último creamos la tabla
create table usuario(codUsuario varchar(255) primary key, descripcion varchar(250), pass varchar(255), perfil varchar(50), numVisitas int, fecha int, foto longblob)engine=innodb;
-- Damos permisos al usuario
grant all privileges on DAW210_DBLogInLogOffTema5.* to 'usuarioDBLogInLogOffTema5'@'%' identified by 'paso';