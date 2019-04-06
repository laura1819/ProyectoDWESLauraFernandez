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

        if (isset($_POST['guardaSelect'])) {
            setcookie("Eselect", $_POST['select'], time() + 7600);
        }


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

        if (isset($_POST['BuscaDepto'])) { // si pulsamos en detalles 
            Header("Location: departamentos.php"); // nos llevara a detalles 
        }

        if (isset($_POST['preferencias'])) { // si pulsamos en detalles 
            Header("Location: preferencias.php"); // nos llevara a detalles 
        }


        $CodUsuario = $_SESSION['usuario_DAW210_Login']; // creamos una variable para meter el nombre del usuario 
        try {

            $miDB = new PDO(DSN, USER, PASS);      // creamos una variable con pdo para guardar la conexion 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hay algun error que nos lo muestre 


            $ultConexion = date('d-m-Y H:i:s', $_SESSION['ultConexion_DAW210_Login']); // recogemos la ultima conexion pasada por la variable sesion


            if ($_SESSION['visitas_DAW210_Login'] == 0) { // si esta variable recoge 0 visitas 
                echo '<h3><font color=blue>Bienvenido ' . $CodUsuario . ' por primera vez </font></h3>'; //sacara por pantalla este mensaje 
            } else { // y si no 
                echo '<h3>Bienvenido ' . $CodUsuario . '</h3>'; // mostrara el mensaje de bienvenida 
                echo '<h3>Número de visitas anteriores: ' . $_SESSION['visitas_DAW210_Login'] . '</h3>';   // con el numero de visitas              
                echo '<h3>La última conexión: ' . $ultConexion . '</h3>'; // y con la hora de conexion correspondiente
            }
            if (isset($_POST['select'])) {
                echo "<h3>El idioma elegido es : " . $_POST['select'] . "</h3>";
            } elseif (isset($_COOKIE['Eselect'])) {
                echo "<h3>El idioma elegido es :  " . $_COOKIE['Eselect'] . "</h3>";
            }else{
                echo "no ha elegido idioma";
            }
            
        } catch (PDOException $e) { // si se produce algun error 
            print "Error de: " . $e->getMessage() . "<br/>"; // mostrara el codigo de error 
        } finally { // y finalmente 
            unset($miDB); // cierra la sesion
        }
        ?> 
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" name="Detallar" value="Detallar"/> 
                <input type="submit" name="Cerrar_sesión" value="Cerrar sesión"/>
                <input type="submit" name="BuscaDepto" value="Mto.Departamentos"/>
                <input type="submit" name="preferencias" value="Edit.Preferencias"/>

        </div>
        Elegir idioma
        <select name='select' value='<?php echo $_POST['select']; ?>'>  
            <?php if(isset($_POST['select'])){ ?>
            
            
             <option  value='español' <?php echo (isset($_POST['select']) && $_POST['select'] == 'español' ? 'selected': ''); ?>>Español</option>
            <option  value='frances' <?php echo (isset($_POST['select']) && $_POST['select'] == 'frances' ? 'selected' : ''); ?>>Frances</option>
            <option  value='aleman' <?php echo (isset($_POST['select']) && $_POST['select'] == 'aleman' ? 'selected' : ''); ?>>Aleman</option>
            <option  value='ingles' <?php echo (isset($_POST['select']) && $_POST['select'] == 'ingles' ? 'selected' : ''); ?>>Ingles</option>
            
           
            <?php }else{ ?>
                
            <option  value='español' <?php echo (isset($_COOKIE['Eselect']) && $_COOKIE['Eselect'] == 'español' ? 'selected': ''); ?>>Español</option>
            <option  value='frances' <?php echo (isset($_COOKIE['Eselect']) && $_COOKIE['Eselect'] == 'frances' ? 'selected' : ''); ?>>Frances</option>
            <option  value='aleman' <?php echo (isset($_COOKIE['Eselect']) && $_COOKIE['Eselect'] == 'aleman' ? 'selected' : ''); ?>>Aleman</option>
            <option  value='ingles' <?php echo (isset($_COOKIE['Eselect']) && $_COOKIE['Eselect'] == 'ingles' ? 'selected' : ''); ?>>Ingles</option>
                
                
                
           <?php } ?>
        </select>
        
        
        <input type="submit" name="guardaSelect" value="Guardar"/>
    </form> 




    <footer>
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        Volver al Index           
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>


