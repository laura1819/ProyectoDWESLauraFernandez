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
        <h1>Ejercicio 18</h1>

        <?php
        /*
          Author: Laura Fernandez
          Fecha 19/03/2019
          Comentarios: Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
         */

        $fruta = array('a' => 'manzana', 'b' => 'banana', 'c' => 'arándano');

        
        while (list($clave, $valor) = each($fruta)) {
            echo "$clave => $valor\n";
        }
        ?>                                 

    </body>
</html>
