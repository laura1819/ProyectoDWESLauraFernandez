

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
        <h1>Ejercicio 1</h1>

        <!--
                Autor: Laura Fernandez
                Fecha 17/03/2019
                Comentarios: inicializamos las variables y mostramos variables de distintos tipos;
        -->
        
        <?php
        
        // hacer sumas con los numeros etc
        // poner en la salida de pantalla con que estamos mostrando
        //mostrar con diferentes
        
        
        $string = "cadena"; //declaramos la variable a con un valor string
        $integer = 1; // declaramos la variable con un entero
        $float = 13.9; //declaramos la variable con un valor decimal
        $boolean = true; // declaramos la variable con un valor booleano
        $varArray = [1, 2, 3, 4, 5]; // declaramos un array de una dimension



        print "La variable $ string, contiene " . $string . " es de tipo " . gettype($string); // sacamos por pantalla el valor de la variable y con gettype su tipo
        echo "<br>"; // ponemos un salto de linea
        print "La variable $ integer, contiene" . $integer . " es de tipo " . gettype($integer); // sacamos por pantalla el valor de la variable y con gettype su tipo
        echo "<br>"; // ponemos un salto de linea
        print "La variable $ float, contiene" . $float . " es de tipo " . gettype($float); // sacamos por pantalla el valor de la variable y con gettype su tipo
        echo "<br>"; // ponemos un salto de linea
        print "La variable $ boolean, contiene" . $boolean . " es de tipo " . gettype($boolean); // sacamos por pantalla el valor de la variable y con gettype su tipo
        echo "<br>"; // ponemos un salto de linea
        print "La variable $ varArray, contiene" . $varArray . " es de tipo " . gettype($varArray); // sacamos por pantalla el valor de la variable y con gettype su tipo
    
        echo "<br>"; // ponemos un salto de linea
        echo "<br>"; // ponemos un salto de linea
   
        echo "<h3>Mostrar lo que contiene cada variable y su tipo</h3>"; // ponemos un salto de linea
        
        var_dump($integer); //sacamos por pantalla las variables y sus tipos
        echo "<br>"; // ponemos un salto de linea
        var_dump($float);
        echo "<br>"; // ponemos un salto de linea
        var_dump($boolean);
        echo "<br>"; // ponemos un salto de linea
        var_dump($string);
        echo "<br>"; // ponemos un salto de linea
        var_dump($varArray);
        echo "<br>"; // ponemos un salto de linea
      
       
        ?>

    </body>
</html>