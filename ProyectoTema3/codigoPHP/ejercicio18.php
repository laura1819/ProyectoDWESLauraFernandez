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
          
            $teatro[2][2]="persona1";
            $teatro[4][1]="persona2";
            $teatro[19][10]="persona3";
            $teatro[5][9]="persona4";
            $teatro[12][1]="persona5";
            
            function mostrar($teatro){
                foreach ($teatro as $fila=>$vFila) {
                    foreach ($vFila as $asiento => $vAsiento) {
                        echo "Asiento ocupado por ".$vAsiento." en la fila ".$fila." asiento ".$asiento."<br>";                    
                    }
                }
            }
            mostrar($teatro);
          ?>                                 
        
		         
       
  
        
    </body>
</html>
