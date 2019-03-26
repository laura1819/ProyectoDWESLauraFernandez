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
        <h1>Ejercicio 6</h1>				

        <?php
        /*
         *  @author: Laura Fernandez
         *   Fecha 25/03/2019
         *  Descripción: Página web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.
         */
        try {
            //Definimos las constantes para la conexion a la base de datos

           define('IPDB', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos'); // definimos la conexion a la base de datos
            define('USER', 'usuarioDAW210DBDepartamentos'); // el usuario de la base de datos
            define('PASS', 'paso'); // la contraseña de la base de datos

            $miDB = new PDO(IPDB, USER, PASS); // creamos un pdo y le pasamos los parametros de la conexion


                 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hhay algun error que nos lo saque el codigo
         
            //Inicializamos el array
            $newdep[0]['Cod_Departamento'] = 'DDC'; // con el codigo del departamento
            $newdep[0]['DescDepartamento'] = 'Coches'; // con la descripcion del departamento 
            $newdep[1]['Cod_Departamento'] = 'DFD'; // con el codigo del departamento
            $newdep[1]['DescDepartamento'] = 'Furgonetas'; // con la descripcion del departamento
            $newdep[2]['Cod_Departamento'] = 'DMD'; // con el codigo del departamento
            $newdep[2]['DescDepartamento'] = 'Motos'; // con la descripcion del departamento
            try {
               
                $insertar = $miDB->prepare("INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES (:codigo,:nombre)"); // hacemos la consulta para insertar los documentos

              
                $insertar->bindParam(':codigo', $codigo); // le damos los valores a las variables
                $insertar->bindParam(':nombre', $nombre); // le damos los valores a las variables

                //Recorremos el array y ejecutamos dentro del bucle, para que vaya pasando por todos los elementos del array
                foreach ($newdep as $elementos) { // rhacemos un bucle para que saque todas las tuplas
                    $codigo = $elementos['CodDepartamento']; // sacamos los codigos
                    $nombre = $elementos['DescDepartamento']; // sacamos las descripciones
                    $insertar->execute(); // ejecutamos
                }
            } catch (PDOException $e) { // si nos da error
                echo "<p><strong>Ya existe un registro o varios de los que queremos introducir</strong></p>"; //sacamos el mensaje
            }

            //Mostramos los datos de la tabla, para comprobar que se han insertado correctamente
            $registros = $miDB->query('SELECT * FROM Departamento'); // hacemos un query para sacar los departamentos
             echo "<p>Se ha insertado con exito </p>"; // sacamos mensajepor pantalla
            echo "<p>Los registros actuales son: </p>"; // sacamos mensaje por pantalla
            while ($resultados = $registros->fetchObject()) {   //guardamos los datos del array 
                echo "<p>" . $resultados->CodDepartamento . " - " . $resultados->DescDepartamento . "</p>";  //sacamos por pantalla los elementos                                 
            }
        } catch (PDOException $e) { // si tenemos algun error
            print "Error de: " . $e->getMessage() . "<br/>";    //Si no se ha realizado correctamente algo, salta el error (la excepción)
            die();
        } finally { // y por ultimo
            unset($miDB); //cerramos la sesion
        }
        ?>        


    </body>         
</html>





