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
        <h1>Ejercicio 2</h1>		

        <?php
        /*
          Autor: Laura Fernandez
          Fecha 25/03/2019
          Comentarios: conexion a la base de datos
         */

        try { 
            $miBD = new PDO('mysql:host=192.168.20.19;dbname=DAW210_DBdepartamentos', 'usuarioDAW210_DBdepartamentos', 'paso'); // los parametros de la conexion
            echo "<h3>Conexion realizada" . "<br></h3>"; // mostramos un mensaje si la conexion esta bien
            $resultado = $miBD->query("SELECT * FROM Departamento"); // realizamos el query para que nos muestre los departamentos

            while ($registro = $resultado->fetchObject()) { // hacer un bucle para que salgan todas las tuplas de la base de datos
                echo "Codigo del departamento: " . $registro->Cod_Departamento . "<br>";  // sacamos un mensaje con el codigo del departamento              
                echo "Descripcion del departamento: " . $registro->DescDepartamento . "<br>";  // sacamos un mensaje con el codigo del departamento
            }

            echo "<h3>Hay " . $resultado->rowCount() . " Departamentos</h3>"; //mostramos un mensaje por pantalla contando el numero de departamentos
            
        } catch (PDOException $mensajeError) { // y si la conexion sale mal
            echo "Error" . $mensajeError->getMessage() . "<br>";    //nos mostrara un mensaje con el error
            echo'Código de error: ' . $miExceptionPDO->getCode(); //aqui nos mostrara el codigo del error que tengamos
        } finally { // y por ultimo
            unset($miBD); //cerramos la conexion con la base de datos
        }
        ?> 


    </body>
</html>



