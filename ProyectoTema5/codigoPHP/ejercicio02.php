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
        
       
        
        
        if (isset($_POST['Volver'])) { 
                   
                    Header("Location: ../indexProyectoTema5.php");
                }
        
        
        if (!isset($_SERVER['PHP_AUTH_USER'])) { 
            header('WWW-Authenticate: Basic realm="daw210"');
            header("HTTP/1.0 401 Unauthorized");
            exit;
            
             
            
        }else { 
            try {
                $miBD = new PDO(DSN, USER, PASS); 
                $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pass = hash('sha256', $_SERVER['PHP_AUTH_PW']); 
                $usuario = $_SERVER['PHP_AUTH_USER'];
                $sql = "select * from usuario where codUsuario='$usuario' and pass='$pass'"; 
                $consulta = $miBD->prepare($sql); 
                $consulta->execute(); 
                if ($consulta->rowCount() == 0) { 
                    header('WWW-Authenticate: Basic realm="ejercicio02"');
                    header("HTTP/1.0 401 Unauthorized");
                    exit;
                } else { 
                    
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="submit" name="Cerrar_Sesion" value="Volver">
                    </form>
                    <?php
                    
                    echo "<pre>";
                    print_r($_SERVER); 
                    echo "</pre>";
                    echo "<h3>Variables SESSION</h3>";
                    echo "<pre>";
                    print_r($_SESSION);
                    echo "</pre>";
                    
                    phpinfo();
                }
                
            } catch (PDOException $mensajeError) {
                echo "Error " . $mensajeError->getMessage() . "<br>"; //mensaje de salida
                echo "Codigo del error " . $mensajeError->getCode() . "<br>"; //mensaje de salida/codigo del error
            } finally {
                unset($miBD); //Se cierra la conexion
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
