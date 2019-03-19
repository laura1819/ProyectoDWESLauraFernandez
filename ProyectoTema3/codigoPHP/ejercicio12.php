
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
        <h1>Ejercicio 12</h1>
		
		
        <?php
		
		/*
			Autor:Laura Fernandez
			Fecha 19/03/2019
			Comentarios: mostramos las variables con print y foreach
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
        
        
        
        echo "<h2>" . "Variables superglobales con foreach" . "</h2>";
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
        ?>
       
    </body>
</html>