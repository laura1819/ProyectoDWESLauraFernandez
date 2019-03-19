
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
        <h1>Ejercicio 5</h1>
		
		
        <?php
		
		/*
			Autor: Laura Fernandez
			Fecha 02/10/2018
			Comentarios: muestra una variable timestamp inicializada
			*/
		
        
        $fecha = new DateTime(); // inicializa la variable fecha como variable de datetime con la fecha y la hora
        $fecha->setTimestamp(1552901586); // fijamos el timestamp a la variable $fecha
        echo "Timestamp: " . $fecha->getTimestamp(); //imprimimos por pantalla el timestamp como valor entero
        echo "<br>";// metemos un salto de linea
        echo "Fecha: " . $fecha->format('Y-m-d H:i:s'); //formatea el timestamp como una variable de tipo date y forma la fecha
        ?>
        
    </body>
</html>