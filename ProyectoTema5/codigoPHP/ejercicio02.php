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



        </style>
    </head>
    <body>
        <h1>Ejercicio 2</h1>	


        <?php
        /*
          Autor: Laura Fernandez
          Fecha 01/04/2019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';
        session_start(); //inicia sesion
        
        if (isset($_POST['Cerrar_Sesion'])) { //si le damos a cerrar sesion destruira la sesion  
                    unset($_SERVER['PHP_AUTH_USER']);
                    session_destroy();
                    Header("Location: ../indexProyectoTema5.php");
                }
        
        
        if (!isset($_SERVER['PHP_AUTH_USER'])) { //si el usuario no ha entrado se piden los datos
            header('WWW-Authenticate: Basic realm="ejercicio02"');
            header("HTTP/1.0 401 Unauthorized");
            exit;
        } else { //comprobamos los datos de la base de datos
            try {
                $miBD = new PDO(DSN, USER, PASS); //objeto PDO para realizar la conexion
                $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $pass = hash('sha256', $_SERVER['PHP_AUTH_PW']); //generamos un hash con la contraseña introducida
                $usuario = $_SERVER['PHP_AUTH_USER'];

                $sql = "select * from usuario where codUsuario='$usuario' and pass='$pass'"; //query para buscar los datos del usuario introducido
                $consulta = $miBD->prepare($sql); //consulta preparada con el query anterior
                $consulta->execute(); //ejecutamos la instruccion

                if ($consulta->rowCount() == 0) { //si el resultado es 0 no ha encontrado nada y no mostrara nada
                    header('WWW-Authenticate: Basic realm="ejercicio02"');
                    header("HTTP/1.0 401 Unauthorized");
                    exit;
                } else { //sino muestra la variable superglobal $_SERVER, y crea las cookies de ultimo login y visitas
                    
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="submit" name="Cerrar_Sesion" value="Cerrar_Sesion">
                    </form>
                    <?php
                    echo "<h1>Variables Super Globales SERVER</h1>";
                    echo "<pre>";
                    print_r($_SERVER); //muestra el contenido de la varibble superglobal $_SERVER
                    echo "</pre>";
                    echo "<h3>Variables SESSION</h3>";
                    echo "<pre>";
                    print_r($_SESSION);
                    echo "</pre>";
                }
                
            } catch (PDOException $mensajeError) {
                echo "Error " . $mensajeError->getMessage() . "<br>"; //mensaje de salida
                echo "Codigo del error " . $mensajeError->getCode() . "<br>"; //mensaje de salida/codigo del error
            } finally {
                unset($miBD); //Se cierra la conexion
            }
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Cerrar_Sesion" value="Cerrar_Sesion">
        </form>

    </body>
    <footer>
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        Volver al Index       
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>





