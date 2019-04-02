<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
            table {
                width: 800px;
                border-collapse: collapse;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
            }

            th,
            td {
                padding: 15px;
                background-color: rgba(255,255,255,0.2);
                color: #fff;
            }

            th {
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 6</h1>	
        
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Volver" value="Volver">
        </form>
       
        <?php
       

        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de datos
         */

        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configuracionDB.php";
        
        
         session_start(); // iniciamos la sesion

            
            if (!isset($_SESSION['usuario_DAW210_Login'])) { // si la sesion que queremos iniciar no existe
                Header("Location: login.php"); // te manda directamente al login
            }

          
            $Cod_Usuario = $_SESSION['usuario_DAW210_Login']; // creamos una variable para meter al usuario
            
            try{      
             
                $miDB=new PDO(IPDB,USER,PASS); // creamos una variable como pdo para iniciar la conexion
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si esta da algun error que nos lo muestre
              
                
              
                if(!isset($_POST['Volver'])){  // si no le damos a volver que nos muestre las variables            
                        echo "<h3>LAS VARIABLES SUPERGLOBALES CON FOREACH:</h3>";  //sacamos un mensaje por pantalla
             
                        echo "<h3>SERVER</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_SERVER as $key => $value) {  // recorremos lo que tiene esta variable
                            echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>";  //metemos un salto de linea

                        echo "<h3>GET</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_GET as $key => $value) {  // recorremos lo que tiene esta variable
                            echo "<b>$key</b>: $value<br>";  // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>POST</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_POST as $key => $value) {  // recorremos lo que tiene esta variable
                           echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>FILES</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_FILES as $key => $value) {  // recorremos lo que tiene esta variable
                            echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>COOKIE</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_COOKIE as $key => $value) {  // recorremos lo que tiene esta variable
                            echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>SESSION</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_SESSION as $key => $value) {  // recorremos lo que tiene esta variable
                           echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>REQUEST</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_REQUEST as $key => $value) {  // recorremos lo que tiene esta variable
                            echo "<b>$key</b>: $value<br>";   // sacamos por pantalla el contenido de la variable 
                        }  
                        echo "<hr>"; //metemos un salto de linea

                        echo "<h3>ENV</h3>"; //sacamos un mensaje por pantalla
                        foreach ($_ENV as $key => $value) {  // recorremos lo que tiene esta variable
                           echo "<b>$key</b>: $value<br>";  // sacamos por pantalla el contenido de la variable 
                        } 
                        phpinfo(); // mostramos el phpinfo
                        exit; // cerramos la conexion
                        
                }else{ // si hemos pulsado volver
                             
                    Header("Location: programa.php"); // nos vamos al apartado de navegacion
                }
            }catch(PDOException $e){ // si se ha cometido algun fallo
                print "<h3>Error de: " . $e->getMessage() . "</h3>"; // sacamos el mensaje del error
                print "<h3>El código del error es: " . $e->getCode()."</h3>"; // sacamos el fallo del error
            }finally{ // y por ultimo
               unset($miDB); // cerramos la conexion con la base de datos
            }
        
        ?>
    <footer>
          <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


