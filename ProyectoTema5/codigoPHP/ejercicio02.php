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

   
        if (isset($_POST['Cancelar'])) {
            $_SERVER[PHP_AUTH_USER] = '';
            $_SERVER[PHP_AUTH_PW] = '';
        }
        if (!isset($_SERVER['PHP_AUTH_USER'])) { //Si no se ha autenticado el usuario, se piden los datos.
            header('WWW-Authenticate: Basic realm="DAW210"');
            header("HTTP/1.0 401 Unauthorized");
            exit;
        } else { //Si lo ha hecho ya comprobamos los datos con la base de datos.
            try {
                $baseDeDatos = new PDO(DSN, USER, PASS); //Se inicia la variable como un elemento PDO y se establece la conexión.
                $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pass = hash('sha256', $_SERVER[PHP_AUTH_PW]); //Se vuelva en una variable el hash generado con sha256 de la contraseña introducida por el usuario.
                $query = "select * from usuario where codUsuario=:codUsuario and pass=:pass";
                $consulta = $baseDeDatos->prepare($query); //Se prepara la consulta.
                $consulta->bindParam(':codUsuario', $_SERVER[PHP_AUTH_USER]);
                $consulta->bindParam(':pass', $pass);
                $consulta->execute(); //Se ejecuta la consulta.
                if ($consulta->rowCount() == 0) { //Evalúa si se ha producido algún resultado, si no lo ha hecho no se muestra el contenido.
                    header('WWW-Authenticate: Basic realm="Contenido restringido"');
                    header("HTTP/1.0 401 Unauthorized");
                    exit;
                } else {
                    session_start();
                    $_SESSION['usuario'] = $_SERVER[PHP_AUTH_USER];
                    
                    Header("Location: ejercicio00.php");
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <table>
                            <tr>
                                <td><input type="submit" name="Cancelar" value="Cancelar"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
            } catch (PDOException $error) {
                echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
            } finally {
                unset($baseDeDatos); //Se cierra la conexión con la base de datos.
            }
        }
        ?>
        
    </body>
    <footer>
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        Volver al Index       
        <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>





