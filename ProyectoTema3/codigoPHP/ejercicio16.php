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
        <h1>Ejercicio 16</h1>

        <?php
        /**
          Autor: Laura Fenandez
          Fecha 19/03/2019
          Comentarios: creamos un array y lo recorremos con funciones
         */
        
        
        
        $salario = array("Lunes" => 77, //Inicializamos el array con los dias de la semana y el sueldo 
            "Martes" => 65, //inicializamos el dia con el sueldo percibido
            "Miercoles" => 85, //inicializamos el dia con el sueldo percibido
            "Jueves" => 98, //inicializamos el dia con el sueldo percibido
            "Viernes" => 105, //inicializamos el dia con el sueldo percibido
            "Sabado" => 266, //inicializamos el dia con el sueldo percibido
            "Domingo" => 299); //inicializamos el dia con el sueldo percibido


        $salarioSemanal = 0; //inicializamos el salario semanal a 0



        echo "<h2>Salario semanal con foreach</h2>"; //sacamos un mensaje por pantalla   
        echo "<em>foreach — foreach() podemos recorrer los diferentes tipos de arrays y objetos de una manera controlada.</em>";//sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        foreach ($salario as $dia => $sueldo) {  //Recoremos el array guardando el valor y el identificador en ls variables         
            echo "<p>El " . $dia . " cobra " . $sueldo . " euros" . "</p>"; //sacamos por pantalla las variables dia y el sueldo
            $salarioSemanal += $sueldo;
        }
        echo "El salario total es:  " . $salarioSemanal . " euros"; //y por ultimo sacamos por pantalla el salario semanal



        reset($salario); // reseterar informacion anterior

        $salarioSemanal = 0; //inicializamos el salario semanal a 0

        echo "<h2>Salario semanal con each</h2>"; //sacamos un mensaje por pantalla   
        echo "<em>each — Devolver el par clave/valor actual de un array y avanzar el cursor del array</em>";
        while ($salarioDiario = each($salario)) { //bucle que recorre el array para cojer el identificador y el valor en dos variables
            echo "<p>El " . $salarioDiario[0] . " cobra " . $salarioDiario[1] . " euros" . "</p>"; //saca por pantalla el identificador y valor de campo
            $salarioSemanal += $salarioDiario[1]; //Le sumamos el salario de cada uno de los días.
        }

        echo "<h3>El salario total de la semana es de " . $salarioSemanal . " euros</h3>"; //sacamos por pantalla el salario semanal

        reset($salario); // reseterar informacion anterior





        echo "<h2>Salario semanal con list</h2>"; //sacamos un mensaje por pantalla   
        echo "<em>list — Asignar variables como si fueran un array</em>"; //sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        while (list($clave, $valor) = each($salario)) { // con list le pasamos dos parametros la clave y el valor 
            echo "<p>El " . $clave . " cobra " . $valor . " euros" . "</p>"; //saca por pantalla el identificador y valor de campo          
        }




        reset($salario); // reseterar informacion anterior

        $salarioSemanal = 0; //inicializamos el salario semanal a 0



        echo "<h2>Salario semanal con current, key y next</h2>"; //sacamos un mensaje por pantalla   
        echo "<em>key — Obtiene una clave de un array</em>"; //sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        echo "<em>current — Devuelve el elemento actual en un array</em>"; //sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        echo "<em>next — Avanza el puntero interno de un array</em>"; //sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        echo "<br>"; //sacamos un mensaje por pantalla   
        while ($clave2 = current($salario)) { //devuelve el elemento 
            if ($clave2 == 105) { // mandamos que busque el 105
                echo key($salario) . '<br />'; //saca la clave de el 105 
            }
            next($salario); // avanza el puntero
        }


        reset($salario); // reseterar informacion anterior


        echo "<h2>Valores del array</h2>"; //sacamos un mensaje	
        echo "<em>array_values — Devuelve todos los valores de un array </em>"; //sacamos un mensaje por pantalla   
        echo "<br>";//sacamos un mensaje por pantalla   
        print_r(array_values($salario)); // mostramos con print_r los valores que tenemos en el array con sus indices numericos


        echo "<h2>Count de un array</h2>"; // sacamos un mensaje por pantalla
        echo "<em> count - Cuenta los elementos del array y nos devuelve el numero de registros que tiene </em>";//sacamos un mensaje por pantalla   
        echo "<br>";//sacamos un mensaje por pantalla   
        echo "<p>Los registros del array son " . count($salario) . "</p>"; // y con count sacamos cuantos registros tiene el array 



        echo "<h2>Array Key Exists</h2>";//sacamos un mensaje por pantalla   
        echo "<em>array_key_exists — Verifica si el índice o clave dada existe en el array </em>";//sacamos un mensaje por pantalla   
        echo "<br>";//sacamos un mensaje por pantalla   
        if (array_key_exists("Lunes", $salario)) { // le pasamos un dia de la semana que este dentro del array 
            echo "<p>Existe la key introducida</p>"; // como lo va encontrar sacara este mensaje por pantalla
        } else { // si no estuvuera el dia que le hemos introduccido nos sacara por pantalla 
            echo "<p>No existe la key introducida</p>"; // el mensaje de que no existe la key introducida
        }


        echo "<h2>Array Search</h2>"; // con array search
        echo "<em>array_search — Busca un valor determinado en un array </em>";
        if ((array_search(105, $salario)) != FALSE) { // se pasamos un salario de los que tebemos en el array
            echo "<p>Existe el valor introducido</p>"; // como lo va a encontrar sacara este mensaje por pantalla
        } else { // y si no lo encontrara
            echo "<p>No existe el valor introducido</p>"; //mostraria este mensaje por pantalla
        }
        ?>


    </body>
</html>
