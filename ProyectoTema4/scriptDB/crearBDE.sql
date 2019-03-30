
	/* Autor: Laura Fernandez
		Fecha: 25/03/19
		Comentarios: Crear una base de datos y añadir una tabla
		*/

        
			-- Creamos la base de datos
				create database if not exists DAW210_DBDepartamentos; 
				
			-- Usamos la base de datos que acabamos de crear
				use DAW210_DBDepartamentos; 
					
			-- Creamos la tabla
				create table if not exists Departamento(CodDepartamento varchar(3) primary key,
								        DescDepartamento varchar(255))
				engine=innodb;
		
                        -- LE damos los permisos al usuario
                                grant all privileges on DAW210_DBDepartamentos to usuarioDAW210DBDepartamentos identified by 'pasoExplotacion';        
      
