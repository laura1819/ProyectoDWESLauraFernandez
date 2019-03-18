
﻿﻿<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
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
			Fecha 02/10/2018
			Comentarios: mostramos la direcion ip del equipo que accede al programa
			*/
		
        
        echo "Su dirección IP es: " . $_SERVER['REMOTE_ADDR']; //sacamos por pantalla la direccion ip del dispositivo en el que estamos
        ?>
       
    </body>
</html>