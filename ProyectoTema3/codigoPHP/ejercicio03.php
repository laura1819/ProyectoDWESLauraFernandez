
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
        <h1>Ejercicio 3</h1>
        <p>
		
            <?php 
			
			/*
			Autor: Laura Fernandez
			Fecha 17/03/2019
			Comentarios: mostramos la hora en españa formateada en castellano;
				*/

			
            
            setlocale(LC_TIME, 'es_ES.UTF-8'); //selecionamos es de españa, el idioma
            date_default_timezone_set('Europe/Madrid'); //selecionamos zona horaria
            echo "Hora en España: ".date('H:i:sa')."<br>"; //imprimimos por pantalla la hora en españa
            echo "Fecha España: ".strftime("%A %d de %B del %Y"); //imprimimos por pantalla la fecha en españa
            ?>
        </p>
       
    </body>
</html>