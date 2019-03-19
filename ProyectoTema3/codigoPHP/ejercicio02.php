
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
        <h1>Ejercicio 2</h1>
		

        <?php
		
		/**
		Autor: Laura Fernandez
		Fecha 17/03/2019
		Comentaios: el programa inicializa y muestra una variable Heredoc:
		**/
		
        /*Inicializamos la varuiable heredoc con la estructura <<<'nombre_variable' luego
		añadimos lineas de codigo y finalizamos la variable heredoc introduciendo
		el mismo nombre de la variable pero sin tabular como vemos y finalmente con un print
		mostramos por pantalla**/
        
        //poner una sentencia sql en la variable
		
        $a = <<<cadena
            DAW2<br/>
            DWES<br/>
            Ejercicio Heredoc
cadena;
        print $a;
        ?>
        
    </body>
</html>