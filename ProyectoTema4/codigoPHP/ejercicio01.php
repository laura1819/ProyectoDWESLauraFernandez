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
        <h1>Ejercicio 1</h1>				
        <?php		
		/*
			Autor: Laura Fernandez
			Fecha 25/03/2019
			Comentarios: conexion a la base de datos
			*/
        
        echo "<h3>Conexion correcta</h3>" . "<br>"; // mostrar un mensaje por pantalla

        try { //si todo va bien hacer las siguientes instruciones
            $miBD = new PDO('mysql:127.0.0.1;DAW210_DBDepartamentos', 'usuarioDAW210DBDepartamentos', 'paso'); //iniciamos la variable con PDO y le pasamos la ip la base de datos, usuario y contraseña
            echo "Conexion realizada" . "<br>"; // si todo esta bien mostramos un mensaje de que la conexion esta realizada
        } catch (PDOException $mensajeError) { // si la conexion no se ha realizado correctamente realizaremos lo siguiente
            echo "Error " . $mensajeError->getMessage() . "<br>"; // mostraremos un mensaje de error de la excepcion 
        }finally{ // y por ultimo
        unset($miBD); //cerramos la conexion
        }
        ///////////////////////////////////////////////
        echo "<h3>Conexion Incorrecta</h3>" . "<br>"; //mostramos un error

        try { //si todo va bien hacer las siguientes instruciones
            $miBD = new PDO('mysql:192.168.20.19;dbname=DAW210_BDDepartamentos', 'usuarioDAW210DBDepartamentos', 'passsssssso'); // realizamos la conexion metiendo mal la contraseña para provocar un error
            echo "Conexion realizada" . "<br>"; // si esta bien ponemos el mensaje de conexion bien realizada
        } catch (PDOException $mensajeError) { // si no esta bien haremos las siguientes instruciones
            echo "Error " . $mensajeError->getMessage() . "<br>";  // mostramos el error de la excepcion si ha fallado algo
        }finally{ // y por ultimo
        unset($miBD); // cerramos la conexion con la base de datos
        }
        ?> 
                  
                
    </body>
</html>


