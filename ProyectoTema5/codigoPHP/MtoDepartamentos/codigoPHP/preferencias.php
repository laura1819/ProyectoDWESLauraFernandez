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
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
        include "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        include "../config/configuracionDB.php";


        // setcookie("Eselect", $_POST['select'], time() + 7600);

       // $username = "jorge";
        
        ?>

<!--
        <script>
      //      alert(<?php //echo setcookie("Username", $username, time() + 3600 * 24 * 30, '/'); ?>);
        </script>
-->




        <footer>
            <a href="programa.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


