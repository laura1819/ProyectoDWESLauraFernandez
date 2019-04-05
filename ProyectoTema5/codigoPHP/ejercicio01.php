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

        <?php
        /*
          Autor: Laura Fernandez
          Fecha 01/04/2019
          Comentarios: conexion a la base de datos
         */

        if (isset($_POST['Volver'])) {
            Header("Location: ../indexProyectoTema5.php");
        }


        if ($_SERVER['PHP_AUTH_USER'] != 'usuario' || $_SERVER['PHP_AUTH_PW'] != 'paso') {  //comprueba que el usuario y la contraseña coinciden con estas  
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');  // WWW-Authenticate: <type> realm=<realm> definen el método de autenticación que dbe ser usado para obtener acceso a un recurso
            header('HTTP/1.0 401 Unauthorized'); // El encabezado HTTP 401 le dice a su navegador que no está autorizado para ver esa página
            echo "Usuario no reconocido!"; //sacamos un mensaje por pantalla si no esta bien el usuario o no lo ha introducido
            exit; //cerramos la conexion
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="Volver" value="Volver">
        </form>

<?php
echo "<h3>El usuario es PHP_AUTH_USER: " . $_SERVER['PHP_AUTH_USER'] . "</h3><br>";
echo "<h3>La contraseña es PHP_AUTH_PW: " . $_SERVER['PHP_AUTH_PW'] . "</h3>";

phpinfo();
?> 





    </body>
    <footer>
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        Volver al Index           
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>



