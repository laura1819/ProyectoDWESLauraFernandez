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
          Autor: Laura Fenandez
          Fecha 19/03/2019
          Comentarios: creamos un array y lo recorremos con funciones
         */
        
        
        $salario = array("Lunes" => 77, //Inicializamos el array con los dias de la semana y el sueldo 
            "Martes" => 65, //inicializamos el dia con el sueldo percibido
            "Miercoles" => 85,//inicializamos el dia con el sueldo percibido
            "Jueves" => 98, //inicializamos el dia con el sueldo percibido
            "Viernes" => 105, //inicializamos el dia con el sueldo percibido
            "Sabado" => 266, //inicializamos el dia con el sueldo percibido
            "Domingo" => 299);//inicializamos el dia con el sueldo percibido
			
        
        $salarioSemanal = 0;//inicializamos el salario semanal a 0
        
        echo "<h2>Salario semanal con each</h2>"; //sacamos un mensaje por pantalla
        
        while ($salarioDiario = each($salario)) { //bucle que recorre el array para cojer el identificador y el valor en dos variables
            
            echo "<p>El " . $salarioDiario[0] . " cobra " . $salarioDiario[1] . " euros" . "</p>"; //saca por pantalla el identificador y valor de campo
            $salarioSemanal += $salarioDiario[1]; //Le sumamos el salario de cada uno de los días.
        }
        
        
        echo "<h3>El salario total de la semana es de " . $salarioSemanal . " euros</h3>"; //sacamos por pantalla el salario semanal
        $salarioSemanal = 0;
        reset($salario);
        echo "<h2>Salario semanal con reset, current, next y key</h2>"; //sacamos un mensaje por pantalla
        
        while (!is_null(key($salario))) { //volvemos al buclemientras no sea igual a null
            
            echo "<p>El " . key($salario) . " cobra " . current($salario) . " euros" . "</p>"; //saca por pantalla el ide y el valor
            
            $salarioSemanal += current($salario); //le vamos a sumar al acumulador el salario de la pos donde esta el puntero del array
            
            next($salario); //avanzamos el puntero una posicion
        }
       
        echo "<h3>El salario total de la semana es de " . $salarioSemanal . " euros</h3>";  //imprimimos por pantalla el salario semanal de nuevo
        
        echo "<h2>Valores del array</h2>"; //sacamos un mensaje
		
		//Y mostramos:
		
        print_r(array_values($salario));
        echo "<h2>Count de un array</h2>";
        echo "<p>Los registros del array son ".count($salario)."</p>";
        echo "<h2>Array Key Exists</h2>";
        if(array_key_exists("Lunes", $salario)){
            echo "<p>Existe la key introducida</p>";
        }else{
            echo "<p>No existe la key introducida</p>";
        }
        echo "<h2>Array Search</h2>";
        if((array_search(100, $salario))!=FALSE){
            echo "<p>Existe el valor introducido</p>";
        }else{
            echo "<p>No existe el valor introducido</p>";
        }
        ?>
  
        
    </body>
</html>
