

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
        <h1>Ejercicio 1</h1>
		
		<!--
			Autor: Laura Fernandez
			Fecha 02/10/2018
			Comentarios: inicializamos las variables y mostramos variables de distintos tipos;
-->
    
        <?php
        $a = "cadena"; //declaramos la variable a con un valor string
        $b = 1; // declaramos la variable con un entero
        $c = 13.9; //declaramos la variable con un valor decimal
        $d = true; // declaramos la variable con un valor booleano
        $e = [1, 2, 3, 4, 5]; // declaramos un array de una dimension
        
        
        
				print "La variable " . $a . " es de tipo " . gettype($a); // sacamos por pantalla el valor de la variable y con gettype su tipo
				echo "<br>"; // ponemos un salto de linea
				printf("%s es una cadena", $a); //Sacamos por pantalla la variable $a, que es tratada como un String con el especificador %s.
				echo "<br>";// ponemos un salto de linea
				print_r($e); // sacamos por pantalla los valores que contiene el array y sus tipos
				echo "<br>";// ponemos un salto de linea
				var_dump($b, $c); //sacamos por pantalla las variables y sus tipos
        ?>
        
    </body>
</html>