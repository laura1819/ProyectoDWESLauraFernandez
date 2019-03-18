
<!DOCTYPE html>
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
        <h1>Ejercicio 4</h1>
        <p>
		
		
            <?php
			
			/*
				Autor: Laura Fernandez
				Fecha 02/10/2018
				Comentarios: muestra el programa la hora en Oporto formateada en portugues
			*/
			
			
            
            setlocale(LC_TIME, 'pt_PT.UTF-8'); //selecionamos el idioma en este caso pt de portugal
            date_default_timezone_set('Europe/Lisbon'); // selecionamos la zona horaria que tiene portugal
            echo "Hora en Oporto: ".date('H:i:sa')."<br>"; // sacamos por pantalla la hora en oporto
            echo "Fecha Oporto: ".strftime("%A %d de %B del %Y");// sacamos por pantalla la fecha en oporto
            ?>
        </p>
       
    </body>
</html>