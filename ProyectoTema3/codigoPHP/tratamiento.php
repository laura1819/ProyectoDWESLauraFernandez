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
        <h1>Ejercicio 21</h1>

	<?php
	
	/**
		Autor: Laura Fernandez
		Realizado:22:10:2018;
		Comentarios:El programa muestra los datos que hemos introducido en el formulario anterior;
	*/	
	
		 echo "<h2>Datos recogidos</h2>"; //Titulo del formulario
	 	 echo "<p>El nombre introducido es: ".$_POST['nombre']."</p>"; //Mostramos la variable con el campo nombre
         echo "<p>Los apellidos son: ".$_POST['apellidos']."</p>"; //Mostramos la variable con el campo apellidos
         echo "<p>El correo electrónico es: ".$_POST['correo']."</p>"; //Mostramos la variable con el campo correo
         echo "<p>La contraseña elegida es: ".$_POST['contraseña']."</p>"; //Mostramos la variable con el campo de la contraseña
	?>

</body>
</html>
