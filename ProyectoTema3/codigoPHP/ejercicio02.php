
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
        <h1>Ejercicio 2</h1>
		

        <?php
		
		/**
		Autor: Laura Fernandez
		Fecha 02/10/2018
		Comentaios: el programa inicializa y muestra una variable Heredoc:
		**/
		
        /*Inicializamos la varuiable heredoc con la estructura <<<'nombre_variable' luego
		añadimos lineas de codigo y finalizamos la variable heredoc introduciendo
		el mismo nombre de la variable pero sin tabular como vemos y finalmente con un print
		mostramos por pantalla**/
		
        $a = <<<cadena
            DAW2<br/>
            DWES<br/>
            Ejercicio Heredoc
cadena;
        print $a;
        ?>
        
    </body>
</html>