<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/programa.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }

        </style>
    </head>
    <body>
        <h1>Ejercicio 6</h1>	
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" name="Volver" value="Volver" class="boton_personalizado">
            </form>
        </div>
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
            Header("Location: ../login.php"); // te manda directamente al login
        }


        $Cod_Usuario = $_SESSION['usuario_DAW210_Login']; // creamos una variable para meter al usuario

        try {

            $miDB = new PDO(DSN, USER, PASS); // creamos una variable como pdo para iniciar la conexion
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si esta da algun error que nos lo muestre



            if (!isset($_POST['Volver'])) {  // si no le damos a volver que nos muestre las variables            
                //sacamos un mensaje por pantalla
                echo "<pre>";
                    print_r($_COOKIE); 
                    echo "</pre>";
                phpinfo(); // mostramos el phpinfo
                exit; // cerramos la conexion
            } else { // si hemos pulsado volver
                Header("Location: programa.php"); // nos vamos al apartado de navegacion
            }
        } catch (PDOException $e) { // si se ha cometido algun fallo
            print "<h3>Error de: " . $e->getMessage() . "</h3>"; // sacamos el mensaje del error
            print "<h3>El código del error es: " . $e->getCode() . "</h3>"; // sacamos el fallo del error
        } finally { // y por ultimo
            unset($miDB); // cerramos la conexion con la base de datos
        }
        ?>
        <footer>
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


