<!DOCTYPE html>
<html>
    <head>
        <title>Añadir departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>

    </head>
    <body>
        <h1>Añadir Departamento</h1><br><br>           

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

        $aFormulario = [// creamos un array para los campos del formulario
            usuario => null, // para el campo usuario 
            pass => null, // para el campo pass 
            descripcion => null // para el campo descripcion 
        ];

        $aErrores = [// creamos un array de errores para los campos del formulario
            usuario => null, // para el campo usuario 
            pass => null, // para el campo pass 
            descripcion => null // para el campo descripcion 
        ];
        try {

            $miDB = new PDO(DSN, USER, PASS);        // creamos la conexion con un elemento pdo 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si tenemos algun error que nos lo muestre 


            if (isset($_POST['Registrarse'])) {     // si pulsamos en registrarse
                $aErrores[usuario] = validacionFormularios::comprobarAlfabetico($_POST['usuario'], 15, LONGMINALFABETICO, OBLIGATORIO); // comprobamos el campo con la libreria de formularios
                $aErrores[pass] = validacionFormularios::comprobarAlfaNumerico($_POST['pass'], 250, LONGMINALFABETICO, OBLIGATORIO); // comprobamos el campo con la libreria de formularios
                $aErrores[descripcion] = validacionFormularios::comprobarAlfaNumerico($_POST['descripcion'], 255, LONGMINALFABETICO, OBLIGATORIO); // comprobamos el campo con la libreria de formularios


                $usuario = $_POST['usuario'];    // cogemos en la variable el nombre del usuario        


                $result = $miDB->query("SELECT * FROM usuario WHERE CodUsuario='$usuario'"); // creamos una consulta para que el usuario coincida con el de la bd 
                if ($result->rowCount() != 0) { // si el usuario ya esta creado 
                    $aErrores[usuario] = "Ya existe este usuario";                // sacamos un mensaje de que ya existe      
                    $entradaOK = false;                     // y ponemos la entrada a false
                }

                foreach ($aErrores as $campo => $error) {
                    if ($error != null) {
                        $entradaOK = false;
                        $_POST[$campo] = "";
                    }
                }
            } else { //  y si no 
                $entradaOK = false; //ponemos la entrada al false 
            }
            if ($entradaOK) { // si la entrada es buena
                $pass = hash('sha256', $_POST['pass']); // guardamos la contrasela en sha256


                $query = "insert into usuario (CodUsuario, descripcion, pass, perfil, numVisitas) values (:CodUsuario,:descripcion,:pass,'Usuario', 1)"; //hacemos una consulta para meter los parametros del registro
                $result = $miDB->prepare($query); // preparamos la consulta 

                $result->bindParam(':CodUsuario', $_POST['usuario']); // el valor del usuariuo sea el del formulario 

                $result->bindParam(':descripcion', $_POST['descripcion']); // el valor de la descripcion el del formulario 
                

                $result->bindParam(':pass', $pass); // el valor de la pass como la del formulario
                $result->execute(); // ejecutamos la consulta 


                session_start(); // iniciamos la sesion 

                $_SESSION['usuario_DAW210_Login'] = $_POST['usuario']; // guardamos el usuario en la variable sesion


                Header("Location: programa.php"); // y nos vamos a la pestalla de navegacion
            } else {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Usuario:</td>
                                <td><input type="text" id="usuario" name="usuario" size="10" value="<?php echo $_POST['usuario']; ?>">
        <?php
        echo "<font color='#FF0000' size='1px'>$aErrores[usuario]</font>";
        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Descripción:</td>
                                <td><input type="text" id="descripcion" name="descripcion" style="width:150px; height:30px;" value="<?php echo $_POST['descripcion']; ?>">
        <?php
        echo "<font color='#FF0000' size='1px'>$aErrores[descripcion]</font>";
        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td><input type="password" name="pass" id="pass" size="8" value="<?php echo $_POST['pass']; ?>">
        <?php
        echo "<font color='#FF0000' size='1px'>$aErrores[pass]</font>";
        ?>
                                </td>
                            </tr>                       
                            <tr>
                                <td>                            
                                    <input type="submit" name="Registrarse" class="boton_personalizado" value="Registrarse">
                                </td>
                                <td>
                                    <input type="button" name="Cancelar" value="Cancelar" class="boton_personalizados" onclick="location = '../login.php'">
                                </td>
                            </tr>
                        </table>
                    </div>

                </form>
        <?php
    }
} catch (PDOException $e) { // si se produce algun error 
    print "Error de: " . $e->getMessage() . "<br/>";     // se mustra un mensaje 
    die(); // se mata la conexio 
} finally { // y por ultimo 
    unset($miDB); // se cierra la conexion
}
?> 
    </body>
</html>
