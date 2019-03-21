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
        
        



        $teatro[7][9] = "persona1"; // valores para la persona 1
        $teatro[13][7] = "persona2"; // valores para la persona 2
        $teatro[2][9] = "persona3"; // valores para la persona 3
        $teatro[11][12] = "persona4"; // valores para la persona 4
        $teatro[1][14] = "persona5"; // valores para la persona 5


        while (list($clave, $valor) = each($teatro)) {  
            echo "en la fila : " . $clave . " y en el asiento : " ;
            while (list($clavedos, $valordos) = each($valor)){                
              echo $clavedos . " se sienta : " .$valordos;  
              echo "<br>";
               //echo var_dump($valor);
              //echo var_dump($clave);
              //echo var_dump($valordos);
              //echo var_dump($clavedos);
            }
            
        }
        
        
        
       
         
        
        
        ?>                                 

    </body>
</html>
