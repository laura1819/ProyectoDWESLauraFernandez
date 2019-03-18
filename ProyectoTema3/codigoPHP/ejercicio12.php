
<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
         <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
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
			Fecha 02/10/2018
			Comentarios: mostramos las variables con print y foreach
		*/
		
       
        echo "<h2>Variables superglobales con print_r" . "</h2>";
        //Muestra todas las variables superglobales y su valor.
        echo "<h3>" . "Variable GLOBALS" . "</h3>";
        print_r($GLOBALS);
        echo "<h3>" . "Variable SERVER" . "</h3>";
        print_r($_SERVER);
        echo "<h3>" . "Variable GET" . "</h3>";
        print_r($_GET);
        echo "<h3>" . "Variable POST" . "</h3>";
        print_r($_POST);
        echo "<h3>" . "Variable FILES" . "</h3>";
        print_r($_FILES);
        echo "<h3>" . "Variable COOKIE" . "</h3>";
        print_r($_COOKIE);
        echo "<h3>" . "Variable SESSION" . "</h3>";
        print_r($_SESSION);
        echo "<h3>" . "Variable REQUEST" . "</h3>";
        print_r($_REQUEST);
        echo "<h3>" . "Variable ENV" . "</h3>";
        print_r($_ENV);
        echo "<h2>" . "Variables superglobales con foreach" . "</h2>";
        echo "<h3>" . "Variable GLOBALS" . "</h3>";
        foreach ($GLOBALS as $nombre => $valor) { //Recorre todo el array $GLOBALS y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable SERVER" . "</h3>";
        foreach ($_SERVER as $nombre => $valor) { //Recorre todo el array $_SERVER y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable GET" . "</h3>";
        foreach ($_GET as $nombre => $valor) { //Recorre todo el array $_GET y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable POST" . "</h3>";
        foreach ($_POST as $nombre => $valor) { //Recorre todo el array $_POST y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable FILES" . "</h3>";
        foreach ($_FILES as $nombre => $valor) { //Recorre todo el array $_FILES y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable COOKIE" . "</h3>";
        foreach ($_COOKIE as $nombre => $valor) { //Recorre todo el array $_COOKIE y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable SESSION" . "</h3>";
        foreach ($_SESSION as $nombre => $valor) { //Recorre todo el array $_SESSION y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable REQUEST" . "</h3>";
        foreach ($_REQUEST as $nombre => $valor) { //Recorre todo el array $_REQUEST y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        echo "<h3>" . "Variable ENV" . "</h3>";
        foreach ($_ENV as $nombre => $valor) { //Recorre todo el array $_ENV y lo divide en nombre de la variable y valor.
            echo "<p>".$nombre . ": " . $valor . "</p>"; //Imprime el nombre de cada variable y su valor.
        }
        ?>
       
    </body>
</html>