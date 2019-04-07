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

       // echo "<pre>";
      //  print_r($_COOKIE);
      //  echo "</pre>";

        
        
        if (isset($_POST['nAnimal'])) {
           $_SERVER['PHP_SELF'];
        }
        
         if (isset($_POST['volver'])) {
            header("Location: programa.php");
        }
        
        if (isset($_POST['guardaAnimal'])) {
            setcookie("Eanimal", $_POST['animal'], time() + 7600);
            
        }
        
              
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <?php
            if (!isset($_POST['animal'])) {
                if(isset($_COOKIE['Eanimal'])){
                echo "<h3> Tu animal guardado es : " .  $_COOKIE['Eanimal'] . "</h3>";
                }
                ?>
                <p>Un animal: <input type="text" name="animal" value="<?php
                    if (isset($_POST['animal'])) {
                        echo $_POST['animal'];
                    }
                    ?>"/></p>
                <input type="submit" name="guardaAnimal" value="GuardarAnimal" class="boton_personalizado"/>
                <input type="submit" name="volver" value="Volver" class="boton_personalizados"/><br><br>
            <?php  }else {
                echo "<h3> Su animal se ha guardado correctamente: " .$_POST['animal'] .  "</h3>";
                ?>
                <input type="submit" name="volver" value="Volver" class="boton_personalizados"/>
                <input type="submit" name="nAnimal" value="NuevoAnimal" class="boton_personalizado"/><br><br>
           <?php } ?>
                    
            </form>

     
        <footer>
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


