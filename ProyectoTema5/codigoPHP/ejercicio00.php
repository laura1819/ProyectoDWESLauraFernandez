<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos1.css"/>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>
        	

        <?php
        
        /*
          Autor: Laura Fernandez
          Fecha 01/04/2019
          Comentarios: conexion a la base de datos
         */
        
        
    
        
        
      
        
        echo "<h2>Variables superglobales con print_r" . "</h2>";
        //Muestra todas las variables superglobales y su valor.
        echo "<h3>" . "Variable GLOBALS" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($GLOBALS); // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable SERVER" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_SERVER);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable GET" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_GET);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable POST" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_POST);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable FILES" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_FILES);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable COOKIE" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_COOKIE);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable SESSION" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_SESSION);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable REQUEST" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_REQUEST);  // imprime por pantalla el valor de la variable
        echo "<h3>" . "Variable ENV" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        print_r($_ENV);  // imprime por pantalla el valor de la variable
        
        
        phpinfo();
        
        
           ?>


    </body>
     
     <footer>
          <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>




