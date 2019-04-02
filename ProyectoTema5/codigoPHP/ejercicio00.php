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
        
        
    
        
        
      
        echo "<h3>" . "Variable GLOBALS" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($GLOBALS as $nombre => $valor) { //Recorre todo el array $GLOBALS y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable SERVER" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_SERVER as $nombre => $valor) { //Recorre todo el array $_SERVER y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable GET" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_GET as $nombre => $valor) { //Recorre todo el array $_GET y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable POST" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_POST as $nombre => $valor) { //Recorre todo el array $_POST y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable FILES" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_FILES as $nombre => $valor) { //Recorre todo el array $_FILES y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable COOKIE" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_COOKIE as $nombre => $valor) { //Recorre todo el array $_COOKIE y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable SESSION" . "</h3>";// sacamos pon pantalla el titulo de la variable
        foreach ($_SESSION as $nombre => $valor) { //Recorre todo el array $_SESSION y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable REQUEST" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_REQUEST as $nombre => $valor) { //Recorre todo el array $_REQUEST y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable ENV" . "</h3>"; // sacamos pon pantalla el titulo de la variable
        foreach ($_ENV as $nombre => $valor) { //Recorre todo el array $_ENV y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        
        
        phpinfo();
        
        
           ?>


    </body>
     <footer>
          <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>




