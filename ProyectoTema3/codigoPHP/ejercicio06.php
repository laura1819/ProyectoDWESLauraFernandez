
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
        <h1>Ejercicio 6</h1>.
		
		
        <?php
		
		/*
			Autor: Laura Fernandez
			Fecha 17/03/2019
			Comentaerios: este programa muestra la fecha y el dia en 60 dias
		*/
		
        
        $fecha = date('j-m-Y'); // inicializamos esta variable con date y formato dia-mes-año
        $fecha2 = strtotime('+60 day', strtotime($fecha)); //creamos una nueva fecha y sumamos 60 dias a la variable
        $fecha2 = date('j-m-Y', $fecha2); // da formato a la variable que hemos creado antes con formato dia-mes-año
		
        echo "La fecha actual es: ".$fecha."<br>"; // imprimimos por pantalla la fecha y le añadimos un salto de linea
        echo "La nueva fecha es: $fecha2"; // sacamos por pantalla la nueva fecha con 60 dias mas
        ?>
        
    </body>
</html>