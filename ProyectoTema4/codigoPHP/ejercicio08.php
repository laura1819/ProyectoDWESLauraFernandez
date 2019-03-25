
﻿﻿<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 8</h1>
		

        <?php
		
				/*
			Autor: Laura Fernandez
			Fecha 17/03/2019
			Comentarios: mostramos la direcion ip del equipo que accede al programa
			*/
		
        echo "<em>La variable global _SERVER da información del entorno del servidor y de ejecución</em><br>";
        echo "<br>";
        echo "<em>'REMOTE_ADDR' muestra la dirección IP desde la cual está viendo la página actual el usuario. </em>";
        echo "<br>";
        echo "<br>";
        echo "<b>Su dirección IP es: " . $_SERVER['REMOTE_ADDR']. "</b>"; //sacamos por pantalla la direccion ip del dispositivo en el que estamos
        ?>
       
    </body>
</html>