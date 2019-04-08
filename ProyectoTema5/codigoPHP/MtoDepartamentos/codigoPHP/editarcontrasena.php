<!DOCTYPE html>
<html>
    <head>
        <title>Añadir departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>

    </head>
    <body>
        <h1>Editar Contraseña</h1><br><br>           

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

        $entradaOK = true; // ponemos la entrada a true

        $aFormulario = [ // creamos un array con las posiciones del formulario
            pass1=>null, // pass vieja
            pass2=>null, // pass nueva
            pass3=>null // pass nueva otra vez
        ];
                    
        $aErrores = [ // creamos un array de errores para los campos del formulario
            pass1=>null, // pass vieja
            pass2=>null, // pass nueva
            pass3=>null // pass nueva otra vez
        ];   
        
     
        session_start();  // iniciamos la sesios
        
      
        if (!isset($_SESSION['usuario_DAW210_Login'])) { // si la sesion a la que queremos entrar no existe
            Header("Location: login.php"); // te manda al login de nuevo
        }

      
        $CodUsuario = $_SESSION['usuario_DAW210_Login']; // guardamos el nombre del usuario
        
        try {
          
            $miDB=new PDO(DSN,USER,PASS);    // creamos una variable con pdo para conectarnos a la bd       
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si se produce algun error que nos lo muestre
            
         
            $query = "select * from usuario where CodUsuario=:CodUsuario"; // hacemos una consulta para comprobar que el usuario coincide
            $result = $miDB->prepare($query); // preparamos la consulta 
            $result->bindParam(':CodUsuario', $CodUsuario);  // recogemos los datos del usuario
            $result->execute(); // ejecutamos la consulta

          
            $datos = $result->fetchObject(); // cogemos los datos que vamos a usar en este apratado
            $passInicial=$datos->pass; // cogemos los datos que vamos a usar en este apartado
            
        if (isset($_POST['Editar'])) { // si pulsamos en editar 
            
            $aErrores[pass1] = validacionFormularios::comprobarAlfaNumerico($_POST['pass1'],255,3, 1); // validamos que la pass cumpla con los valores que queremos
            $aErrores[pass2] = validacionFormularios::comprobarAlfaNumerico($_POST['pass2'],255, 3, 1); // validamos que la pass cumpla con los valores que queremos
            $aErrores[pass3] = validacionFormularios::comprobarAlfaNumerico($_POST['pass3'],255, 3, 1); // validamos que la pass cumpla con los valores que queremos
            
            if($passInicial!=hash('sha256', $_POST['pass1'])){ // comprobamos que la pass coincida con la que tenemos  
                    $aErrores[pass1] = $aErrores[pass1] . ' La pass no coincide con la base de datos';  //  si no coincice ponemos este mensaje de error 
                    $entradaOK = false; // y cambiamos la entrada a false
            } 
            if ($_POST['pass2'] != $_POST['pass3']) { // comprobamos que las passs nuevas coinden 
                $aErrores[pass2] = $aErrores[pass3] . ' Las passs no son iguales'; // si no mostramos el mensaje de que no coinciden 
                $entradaOK = false; // y ponemos la entrada a false 
            }  
                
            foreach ($aErrores as $campo=>$error) {
                if ($error != null) {    
                    $entradaOK = false; // ponemos la entrada a false 
                    $_POST[$campo]=""; //limpiamos el campo
                }
            }  
        } else { // y si no
            $entradaOK = false; // entonces ponemos la entrada a falso
        }
        if($entradaOK){ // si la entrada es buena
          
            
            $passNueva = hash('sha256', $_POST['pass2']); // creamos una variable para la pass nueva 
            $query = "update usuario set pass=:pass where CodUsuario=:CodUsuario";  // hacemos un update a la base de datos para cambiarla 
            $result = $miDB->prepare($query);// preparamos la consulta 
            $result->bindParam(':CodUsuario', $CodUsuario); // con el codigo de usuario correspondiente 
            $result->bindParam(':pass',$passNueva); // y la pass nueva correspondiente
            $result->execute(); // y ejecutamos la consulta
            
           
            Header("Location: edPerfil.php"); // volemos hasta el perfil
        }else{
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <tr>
                            <td>Contraseña antigua:</td>
                            <td><input type="password"  name="pass1" size="10" value="<?php echo $_POST['pass1'];?>" >
                                <?php
                                echo "<font color='red' size='1px'>$aErrores[pass1]</font>"; 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña nueva:</td>
                            <td><input type="password"  name="pass2" size="10" value="<?php echo $_POST['pass2'];?>">
                                <?php
                                echo "<font color='red' size='1px'>$aErrores[pass2]</font>"; 
                                ?>
                            </td>
                        </tr> 
                        <tr>
                            <td>Contraseña nueva de nuevo:</td>
                            <td><input type="password"  name="pass3" size="10" value="<?php echo $_POST['pass3'];?>">
                                <?php
                                echo "<font color='red' size='1px'>$aErrores[pass3]</font>"; 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>                            
                            <input type="submit" name="Editar" value="Editar" class="boton_personalizado">                                                
                            <input type="button" name="Cancelar" value="Cancelar" class="boton_personalizados" onclick="location = 'edPerfil.php'">
                            </td>
                        </tr>
                    </table>
                </div>
               
            </form>
        <?php         

        }
    } catch (PDOException $e) {
        print "Error de: " . $e->getMessage() . "<br/>";    
        die();
    }finally{
        unset($miDB);
    }  


        
?> 
    </body>
</html>

