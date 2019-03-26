<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 7</h1>				
      
		 <?php
        /*
        Autor: Laura Fernandez
	 Fecha 25/03/2019
       	Comentarios: Página web que cargue registros en la tabla Departamento desde un array datosNuevos utilizando una consulta preparada.
         */
		 
		 
		 try {
                
                
                define('IP', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos');   // definimos los parametros de la conexion               
                define('USER', 'usuarioDAW210DBDepartamentos');  // pasamos el nombre del usuario de la base de datos
                define('CONTR', 'paso'); // pasamos la contrasela de la base de datos

                $miDataBase=null; // creamos una variable para guardar los parametros
                $resultadoConsulta=null; // metemos el resultado de la consulta sql
                $fichero=null; // variable para meter el fichero
                $CodDepartamento=null; // variable para el codigo de departamento
                $DescDepartamento=null; // variable para la descripcion del departamento
                $sql=null; // variable para la consulta sql
                
                $miDataBase=new PDO(IP, USER, CONTR); // le pasamos los parametros de la conexion
                $fichero= simplexml_load_file("../tmp/tuplas.xml"); // ponemos la ruta

                if(!is_null($fichero)){  
                    echo "<p id=correcto>El fichero se ha importado correctamente en el servidor!</p>"; // sacamos el mensaje que se ha i,portardo correcdtamente
                    foreach($fichero as $dep){ // hacemos un bucle para sacar los registros 
                        $CodDepartamento=$dep->codDepartamento; // el codigo del departamento
                        $DescDepartamento=$dep->descDepartamento; // la descripcion del departamento
                        $sql="insert into Departamento values ('$CodDepartamento', '$DescDepartamento')"; 
                        $resultadoConsulta=$miDataBase->exec($sql); // preparamos la consulta
                    }
               }
                else{ 
                    echo "<p>No se ha podido importar el archivo!</p>"; // sacamos un mensaje de que no se ha podido importar
                }
				
				
            }catch(PDOException $pdoe){ // y si falla
                echo "<label id=fallo>Error </label>".$pdoe->getMessage()."<br>"; //sacamos el error
                echo "<label id=fallo>Codigo de error </label>".$pdoe->getCode(); // sacamos el codigo de error
				
				
            }finally{
                unset($miDataBase);
                die;
            }
        ?>
            		
		
      </body>         
</html>





