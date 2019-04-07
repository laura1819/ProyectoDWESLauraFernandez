-- Entramos a la base de datos sobre la que vamos a trabajar con la sentencia use 'nombre'.
use DAW210_DBLogInLogOffTema5;
-- Primero borramos todos los registros de la tabla Departamento.
delete from usuario;
-- Después borramos la tabla Departamento.
drop table usuario;
-- Y por último borramos la base de datos.
drop database DAW210_DBLogInLogOffTema5;
-- Y borramos el usuario
drop user usuarioDBLogInLogOffTema5;