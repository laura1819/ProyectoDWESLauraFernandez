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
        <h1>Ejercicio 14</h1>
		
		
        <?php
        
        /*
		Autor: Laura Fernandez
		Fecha 19/03/2019
		Comentarios el programa muestra una libreria que comprueba pone un titulo con h1
		*/
         
        
        include "../core/formulariovalidar.php"; //aqui vamos a la libreria de validacion
       
	   
	   $titulo="Mi web"; // le damos a la variable lo que queremos meter en el h1 de la funcion
		hacer_encabezado($titulo); // y la llamamos para que nos muestre
        
        ?>
        
    </body>
</html>

