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
        <h1>Ejercicio 15</h1>
		

        <?php
        /**
           Author: Laura Fernandez
           Fecha 19/03/2019
		   Comentarios: creamos un array y lo recorremos
         */
        
        //vamos a inicializar el array con los dias de la semana y el sueldo que percibe
        $salario = array("Lunes" => 77, //inicializamos el dia y le damos un valor
                         "Martes" => 85, //inicializamos el dia y le damos un valor
                         "Miercoles" => 95, //inicializamos el dia y le damos un valor
                         "Jueves" => 105, //inicializamos el dia y le damos un valor
                         "Viernes" => 125, //inicializamos el dia y le damos un valor
                         "Sabado" => 145, //inicializamos el dia y le damos un valor
                         "Domingo" => 250); //inicializamos el dia y le damos un valor
       
        $salarioSemanal=0; // creamos una variable con el salario semanal
        
        foreach ($salario as $dia => $sueldo) {  //Recoremos el array guardando el valor y el identificador en ls variables
          
            echo "<p>El " . $dia . " cobra " . $sueldo . " euros" . "</p>"; //sacamos por pantalla las variables dia y el sueldo
            $salarioSemanal+=$sueldo;
        }
        echo "El salario total es:  ".$salarioSemanal." euros"; //y por ultimo sacamos por pantalla el salario semanal
        ?>
        
    </body>
</html>