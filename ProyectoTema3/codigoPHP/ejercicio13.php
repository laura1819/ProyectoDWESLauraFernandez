
<!DOCTYPE html>
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
        <h1>Ejercicio 13</h1>
		
		
        <?php
		
		/*
			Autor: Laura Fernandez
			Fecha 19/03/2019
			Comentarios: el programa cuenta las visitas desde una fecha
			*/
		
        
          $archivo = "../tmp/visitas.txt"; // Selecciona el fichero.
        $f = fopen($archivo, "r"); // Abre el fichero que contará las visitas para lectura.
        if ($f) {
            $contador = fread($f, filesize($archivo)); // Lee el fichero.
            $contador = $contador + 1; // IncrementA el contador.
            fclose($f); // Cierra el fichero.
        }
        $f = fopen($archivo, "w+"); // Abre el fichero que contará las visitas como escritura.
        if ($f) {
            fwrite($f, $contador); // Sobreescribe el contador actualizado sumándole 1.
            fclose($f); // Cierra el fichero.
        }
        echo "<p>El programa tiene " . $contador . " visitas</p>"; //Imrpime por pantalla el contador de visitas.
        ?>
        
    </body>
</html>