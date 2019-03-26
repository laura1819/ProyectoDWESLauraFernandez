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
        <h1>Ejercicio 5</h1>				
        <h3>Meter tres registros</h3>
        <?php
        /*
         *  @author: Laura Fernandez
         *   Fecha 25/03/2019
         *  Descripción: Página web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
         */
        try {
            

            define('IPDB', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos'); // definimos la conexion a la base de datos
            define('USER', 'usuarioDAW210DBDepartamentos'); // el usuario de la base de datos
            define('PASS', 'paso'); // la contraseña de la base de datos

            $miDB = new PDO(IPDB, USER, PASS); // creamos la conexion creando  un pdo y pasandole los paarametros
           

           
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // para que nos muestre el error si se produjera
       
  
            $entradaOK = true; // ponemos la entrada a true
            $miDB->beginTransaction(); // Inicia una transacción
            try {
                $insertar1 = 'INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES("DDV","Verduras")'; // pasamos el query con lo que queremos introducir
                if (($miDB->exec($insertar1) == 0)) {  // ejecutamos la consulta
                    $entradaOK = false; // ponemos la entrada a false
                }
                $insertar2 = 'INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES("DDP","Pescado")'; // pasamos el query con lo que queremos introducir
                if (($miDB->exec($insertar2) == 0)) {  // ejecutamos la consulta
                    $entradaOK = false; // ponemos la entrada a false
                }
                $insertar3 = 'INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES("DDB","Bebidas")'; // pasamos el query con lo que queremos introducir
                if (($miDB->exec($insertar3) == 0)) {  // ejecutamos la consulta
                    $entradaOK = false; // ponemos la entrada a false
                }

                if ($entradaOK) { // si la entrada esta bien
                    $miDB->commit();
                    echo "<p>Los cambios se han realizado correctamente.</p>"; // mensaje por pantalla
                } else {
                    $miDB->rollback(); // si hay alguin error 
                    echo "<p>No se han podido realizar los cambios.</p>"; // mensaje por pantalla
                }
            } catch (PDOException $e) { // si ya existe algun registro o todos
                echo "<p><strong>Ya existe un registro o varios de los que queremos introducir</strong></p>"; //sacamos un mensaje de que ya estan introducidos
            }
            $registros = $miDB->query('SELECT * FROM Departamento'); // hacemos un query para que nos muestre los registros
            echo "<p>Se ha insertado con exito </p>"; // mensaje por pantalla 
            echo "<p>Los registros actuales son: </p>"; // mensaje por pantalla
            while ($resultados = $registros->fetchObject()) {   //Creamos un objeto, el cual se va a usar para guardar los datos del query anterior
                echo "<p>" . $resultados->Cod_Departamento . " - " . $resultados->DescDepartamento . "</p>";  //Mostrar los datos de la tabla, dentro de un while                                    
            }
            unset($dwes);
        } catch (PDOException $e) { // y si esta mal
            print "Error de: " . $e->getMessage() . "<br/>";    //Si no se ha realizado correctamente algo, salta el error (la excepción)
            die(); 
        } finally { // y por ultimo 
            unset($miDB); // cerramos la sesion
        }
        ?>        




    </body>         
</html>





