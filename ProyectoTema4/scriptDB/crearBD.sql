
	/* Autor: Laura Fernandez
		Fecha: 25/03/19
		Comentarios: Crear una base de datos y añadir una tabla
		*/

        
			-- Creamos la base de datos
				create database if not exists DAW210_DBDepartamentos; 
				
			-- Usamos la base de datos que acabamos de crear
				use DAW210_DBDepartamentos; 
					
			-- Creamos la tabla
				CREATE TABLE `Departamento` (
                                    `CodDepartamento` varchar(3) NOT NULL,
                                    `DescDepartamento` varchar(100) NOT NULL,
                                    `FechaDeBaja` date NOT NULL DEFAULT '0001-01-01'
                                  ) ENGINE=InnoDB 
		
                        -- LE damos los permisos al usuario
                                grant all privileges on DAW210_DBDepartamentos to usuarioDAW210DBDepartamentos identified by 'paso';        
      
