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
        <h1>Ejercicio 17</h1>
		
       
        
		 <?php   
		 
			/*
                 Author: Laura Fernandez
                 Fecha 19/03/2019
                 Comentarios se recorre un array bidimensional con for,foreach y while, 
                 */ 
                 
                 $nFila = 1;
                 while($nFila <= 20){
                     $asiento = 1;
                        while($asiento <= 15){
                            $teatro[$nFila][$asiento] = null;
                            $asiento++;
                        }
                        $nFila++;
                 }
                 
                    
			// le ponemos los valores al array
            $teatro[7][9]="persona1"; // valores para la persona 1
            $teatro[13][7]="persona2"; // valores para la persona 2
            $teatro[2][9]="persona3"; // valores para la persona 3
            $teatro[11][12]="persona4"; // valores para la persona 4
            $teatro[1][15]="persona5"; // valores para la persona 5
            
             echo "<br><h2> Asientos ocupados:</h2><br>";
            echo "<br><h3> Con el bucle for:</h3><br>"; //Sacamos un mensajito por pantalla
			
            
            for($fila = 1; $fila < 20; $fila++) { // El primer for declararemos las filas que iran hasta la 25 y incrementamos
                for($asiento = 1; $asiento < 15 ; $asiento++){ // segundo for declararemos las filas que iran hasta el 25 y incrementamos               
                    if(isset($teatro[$fila][$asiento])){ // y si el asiento no es null es decir que tiene valores
                        echo "Asiento ocupado por ".$teatro[$fila][$asiento]." en la fila ".$fila." asiento ".$asiento."<br>"; //sacamos un mensaje que nos diga donde estan sentados
                    }
                }
            }
            
            echo "<br><h3>Con el bucle foreach:</h3><br>"; //sacamos un mensajito por pantalla
			
            foreach ($teatro as $nFila=>$fila) { //declaramos el bucle con foreach con la fila
                foreach ($fila as $nAsiento => $asiento) {  //declaramos el bucle con foreach con el asiento
                    if(!is_null($teatro[$nFila][$nAsiento])){// y si el asiento no es null es decir que tiene valores
                        echo "Asiento ocupado por ".$asiento." en la fila ".$nFila." asiento ".$nAsiento."<br>";     //sacamos un mensaje que nos diga donde estan sentados               
                    }
                }
            }
          
            echo '<br><h3>Con el bucle while:</h3><br>'; //sacamos un mensajito por pantalla
			
            $fila=1; //declaramos la fila          
                while($fila<20){ //ponemos el bucle en que la fila no puede ser mayor a 25
                     $asiento=1; //declaramos el asiento
                    while($asiento<15){ //ponemos el bucle en que el asiento no puede ser mayor a 25
                        if(isset($teatro[$fila][$asiento])){// y si el asiento no es null es decir que tiene valores
                            echo "Asiento ocupado por ".$teatro[$fila][$asiento]." en la fila ".$fila." asiento ".$asiento."<br>";//sacamos un mensaje que nos diga donde estan sentados
                        }
                        $asiento++; //lo incrementamos
                    }   
                    
                    $fila++;
                }
                
                 echo "<br><h2> Asientos libres:</h2><br>";
                
                 for($fila = 1; $fila < 20; $fila++) { // El primer for declararemos las filas que iran hasta la 25 y incrementamos
                echo "<b>Fila $fila</b> asientos libres: "; 
                     for($asiento = 1; $asiento < 15 ; $asiento++){ // segundo for declararemos las filas que iran hasta el 25 y incrementamos               
                    if(!isset($teatro[$fila][$asiento])){ // y si el asiento no es null es decir que tiene valores
                        echo "$asiento , "; //sacamos un mensaje que nos diga donde estan sentados
                    }
                }
                echo "<br>";
            }
           
          ?>                              
       
  
        
    </body>
</html>
