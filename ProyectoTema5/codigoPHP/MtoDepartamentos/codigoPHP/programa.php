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
        <h1>Ejercicio LoginLogoff</h1>	



        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de GuardaAnimal
         */

        include "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        include "../config/configuracionDB.php";

        setlocale(LC_TIME, 'es_ES.UTF-8'); // introducimos la hora que queremos utilizar
        date_default_timezone_set('Europe/Madrid'); // introducimos la situacion geografica


        session_start(); // iniciamos la sesion







        if (!isset($_SESSION['usuario_DAW210_Login'])) { // si el usuario no esta bien identificado 
            Header("Location: login.php"); //  nos mandara al login 
        }


        if (isset($_POST['Cerrar_sesión'])) { // si le damos a cerrar sesion 
            unset($_SESSION['usuario_DAW210_Login']); // cierra la sesion del usuario 
            session_destroy(); // destruye la sesion 
            Header("Location: ../login.php"); // y te manda al login 
        }


        if (isset($_POST['Detallar'])) { // si pulsamos en detalles 
            Header("Location: detalle.php"); // nos llevara a detalles 
        }

        if (isset($_POST['Departamentos'])) { // si pulsamos en detalles 
            Header("Location: login.php"); // nos llevara a detalles 
        }

        if (isset($_POST['edPerfil'])) { // si pulsamos en detalles 
            Header("Location: edPerfil.php"); // nos llevara a detalles 
        }

        if (isset($_POST['preferencias'])) { // si pulsamos en detalles 
            Header("Location: preferencias.php"); // nos llevara a detalles 
        }

        if (isset($_POST['mtoUsuarios'])) {
            Header("Location: mtoUsuarios.php");
        }

        $CodUsuario = $_SESSION['usuario_DAW210_Login']; // creamos una variable para meter el nombre del usuario 
        try {

            $miDB = new PDO(DSN, USER, PASS);      // creamos una variable con pdo para guardar la conexion 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hay algun error que nos lo muestre 

            $query = "select * from usuario where CodUsuario=:CodUsuario";
            $result = $miDB->prepare($query);
            $result->bindParam(':CodUsuario', $CodUsuario);
            $result->execute();


            $datos = $result->fetchObject();
            $perfil = $datos->perfil;

            $ultConexion = date('d-m-Y H:i:s', $_SESSION['ultConexion_DAW210_Login']); // recogemos la ultima conexion pasada por la variable sesion


            if ($_SESSION['visitas_DAW210_Login'] == 0) { // si esta variable recoge 0 visitas 
                echo '<h3><font color=blue>Bienvenido ' . $CodUsuario . ' por primera vez </font></h3>'; //sacara por pantalla este mensaje 
            } else { // y si no 
                echo '<h3>Bienvenido ' . $CodUsuario . '</h3>'; // mostrara el mensaje de bienvenida 
                echo '<h3>Número de visitas anteriores: ' . $_SESSION['visitas_DAW210_Login'] . '</h3>';   // con el numero de visitas              
                echo '<h3>La última conexión: ' . $ultConexion . '</h3>'; // y con la hora de conexion correspondiente
            }
        } catch (PDOException $e) { // si se produce algun error 
            print "Error de: " . $e->getMessage() . "<br/>"; // mostrara el codigo de error 
        } finally { // y finalmente 
            unset($miDB); // cierra la sesion
        }
        //echo "<pre>";
       // print_r($_COOKIE);
      //  echo "</pre>";

        //if (isset($_COOKIE['Epais'])) {
       //     echo "El idioma es : " . $_COOKIE['Epais'];
      //  } 
        ?> 

        <div >
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

               <!-- <input type="radio" id="uno" name="gender" value="male"> Male<br>
                <input type="radio" id="dos" name="gender" value="female"> Female<br>
                <input type="radio" id="tres" name="gender" value="other"> Other <br><br>
                -->

                    <?php
                   
                        
                
                
                    if (isset($_COOKIE['Epais']) && $_COOKIE['Epais'] == 'español') {
                         ?>
                <input type='radio' id="uno" name='radiobutton' value='español' <?php echo (isset($_COOKIE['Epais']) && $_COOKIE['Epais'] == 'español' ? 'checked' : '');?> checked><label>español</label>
                <input type='radio' id="dos" name='radiobutton' value='ingles' <?php echo (isset($_COOKIE['Epais']) && $_COOKIE['Epais'] == 'ingles' ? 'checked' : ''); ?>><label>ingles</label>
                        <?php
                }else{ 
                ?>
               
                <input type='radio' id="uno" name='radiobutton' value='español' <?php echo (isset($_COOKIE['Epais']) && $_COOKIE['Epais'] == 'español' ? 'checked' : '');?> ><label>español</label>
                <input type='radio' id="dos" name='radiobutton' value='ingles' <?php echo (isset($_COOKIE['Epais']) && $_COOKIE['Epais'] == 'ingles' ? 'checked' : ''); ?> checked><label>ingles</label>
                        <?php
                } 
                ?>
               

                <br><br>
                <input type="submit" class="boton_personalizados" name="Cerrar_sesión" value="Cerrar sesión"/>
                <input type="submit" class="boton_personalizado" name="edPerfil" value="Editar Perfil"/>
                <input type="submit" class="boton_personalizado" name="Detallar" value="Detallar"/> 
                <input type="submit" class="boton_personalizado" name="Departamentos" value="Mto.Departamentos"/>
                <input type="submit" class="boton_personalizado" name="preferencias" value="Edit.Preferencias"/>
<?php
if ($perfil == 'Administrador') {
    ?>
                    <style>
                        body{
                            background-color:#00499D ;
                        }
                    </style>

                    <input type="submit" class="boton_personalizadoa" name="mtoUsuarios" value="Mantenimiento de Usuarios"/>
    <?php
}
?>
        </div><br><br>

    </form> 

    <script type="text/javascript">

        (function () {
            var espa = function () {
<?php echo setcookie("Epais", $_POST['radiobutton'], time() + 7600); ?>

            };
            var ingles = function () {
<?php echo setcookie("Epais", $_POST['radiobutton'], time() + 7600); ?>

            };
            
         

            var uno = document.getElementById('uno');
            uno.addEventListener("click", espa);

            var dos = document.getElementById('dos');
            dos.addEventListener("click", ingles);



        }());

    </script>


    <footer>
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        Volver al Index           
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>


