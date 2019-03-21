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
	<h1>Ejercicio 22</h1>

        <?php
		/**
		Autor: Laura Fernandez
		Realizado: 19/03/2019
		Comentarios:El programa muestra los datos que hemos introducido pero en la misma pagina
	*/
       
        if (isset($_POST['enviar'])) {  //Si pulsamos el boton de enviar que se ejecuten las siguientes instrucciones.
            echo "<h2>Datos recogidos</h2>"; // Titulo del formulario al recoger los datos
            echo "<p>El nombre introducido es: " . $_POST['nombre'] . "</p>"; //Mostramos la variable con el campo nombre
            echo "<p>Los apellidos son: " . $_POST['apellidos'] . "</p>"; //Mostramos la variable con el campo apellidos
            echo "<p>El correo electrónico es: " . $_POST['correo'] . "</p>"; //Mostramos la variable con el campo del correo
            echo "<p>La contraseña elegida es: " . $_POST['contraseña'] . "</p>"; //Mostramos la variable con el campo de la contraseña
           
        } else { //Si no se ha pulsado el boton de enviar se mostrara el formulario
		//La instruccion del form hace que el formulario se muestre en la misma pagina y con el metodo _POST
            ?>
			
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
            
                
                        
                       
                            <p>Nombre
                            <input type="text" name="nombre">*</p>
                       
                            </p>Apellidos
                            <input type="text" name="apellidos">*</p>
                        
                            <p>Correo electrónico
                            <input type="text" name="correo" >*</p>
                        
                            <p>Contraseña
                            <input type="text" name="contraseña" >*</p>
                       
                            
                            <input type="submit" name="enviar">
                        
                    
                
            </form>
        <?php } ?>
          
              
        

	

	</body>
</html>
