
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
        <h1>Ejercicio 7</h1>
		
		
        <?php
		
		/*
			Autor: Laura Fernandez
			Fecha 02/10/2018
			Comentarios: el programa muestra el nombre y el path del fichero el cual estamos ejecutando
			*/
		
      
        echo "Path completo: ".$_SERVER['PHP_SELF'] . "<br>"; // saca por pantalla el path completo del archivo que se esta ejecutando
        echo "Nombre fichero: ".array_pop(explode('/', $_SERVER['PHP_SELF'])); // saca por pantalla el nombre completo del archivo que se esta ejecutando
        ?>
        
    </body>
</html>