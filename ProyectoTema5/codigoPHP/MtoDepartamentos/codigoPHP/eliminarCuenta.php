<!DOCTYPE html>
<html>
    <head>
        <title>Añadir departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>

    </head>
    <body>
        <h1>Eliminar cuenta</h1><br><br>           

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author: Laura Fernandez
         *  @since: 12 de noviembre de 2018
         *  Descripción: Añadir departamentos - examen
         */
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configuracionDB.php";

        session_start(); // iniciamos la sesion 
        if (!isset($_SESSION['usuario_DAW210_Login'])) { // si el usuario se la logueado mal  
            Header("Location: login.php"); // le mandamos al login 
        }

        $CodUsuario = $_SESSION['usuario_DAW210_Login']; // guardamos el nombre del usuario
        
        try {
            $miDB=new PDO(DSN,USER,PASS); // creamos una variable con un pdo para pasarle los parametros de la conexion 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si tenemos algun error que nos lo muestre 
            
        
            $query = "select * from usuario where CodUsuario=:CodUsuario"; // preparamos una consulta para identificar el usuario 
            $result = $miDB->prepare($query); // preparamos la consulta 
            $result->bindParam(':CodUsuario', $CodUsuario); // comprobamos que el usuario sea el que se ha introducido 
            $result->execute(); // y ejecutamos la consulta 

       
            $datos = $result->fetchObject(); // cogemos los datos que vamos a usar en este apratado
            $descripcion=$datos->descripcion; // cogemos los datos que vamos a usar en este apratado
            
        if (isset($_POST['Eliminar'])) {          // si pulsamos eliminar
            $query = "delete from usuario where CodUsuario=:CodUsuario"; // hacemos la consulta para borrar el usuario  
            $result = $miDB->prepare($query); // preparamos la consulta 
            $result->bindParam(':CodUsuario', $CodUsuario); // comprobamos que el usuario sea el usuario  
            $result->execute(); // ejecutamos la consulta 
            Header("Location: ../login.php"); // volvemos al login 
        }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <tr>
                            <td>Usuario:</td>
                            <td><input type="text" id="usuario" name="usuario"  value="<?php echo $CodUsuario;?>" disabled>
                                <?php
                                echo "<font color='red' size='1px'>$aErrores[usuario]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Descripción:</td>
                            <td><input type="text" id="descripcion" name="descripcion"   value="<?php echo $descripcion;?>" disabled>
                                <?php
                                echo "<font color='red' size='1px'>$aErrores[descripcion]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>         
                        <tr>
                            <td>                            
                            <input type="submit" name="Eliminar" value="Eliminar" class="boton_personalizados">                                                
                            <input type="button" name="Cancelar" value="Cancelar" class="boton_personalizado" onclick="location = 'edPerfil.php'">
                            </td>
                        </tr>
                    </table>
                </div>
                
            </form>
        <?php         
    } catch (PDOException $e) { // si se ha producido algun error
        print "Error de: " . $e->getMessage() . "<br/>";    //Si no se ha realizado correctamente algo, salta el error (la excepción)
        die(); //matamos la sesion
    }finally{ // y por ultimo 
        unset($miDB); // cerramos la conexion con la base de datos 
    }  


        
?> 
    </body>
</html>

