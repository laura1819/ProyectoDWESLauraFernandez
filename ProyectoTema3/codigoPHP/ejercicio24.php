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



        <h1>Ejercicio 24</h1>

        <?php
        /**
          Autor: Laura Fernandez
          @since: 18/03/2019
          Comentarios: el programa crea un formulario y muestra los datos introducidos en la misma página verificando las entradas de datos.
         */
        require_once "../core/181025validacionFormularios.php"; //La libreria donde validaremos los datos.

        $entradaOK = true; //Inicialización de la variable que nos indica que todo va bien 
        $aErrores = [// array de los errores con los campos del formulario
            "nombre" => null, // guarda los errores del campo nombre
            "apellidos" => null, // guarda los errores del campo apellidos
            "email" => null, // guarda los errores del campo email
            "telefono" => null, // guarda los errores del campo telefonoefono
            "dni" => null // guarda los errores del campo del dni
        ];

        $aFormulario = [// array de los valores que contienen los campos del formulario cuando estos estan bien
            "nombre" => null, // guarda el valor del campo nombre cuando este es correcto
            "apellidos" => null, // guarda el valor del campo apellidos cuando este es correcto
            "email" => null, // guarda el valor del campo email cuando este es correcto
            "telefono" => null, // guarda el valor del campo telefonoefono cuando este es correcto
            "dni" => null // guarda el valor del campo dni cuando este es correcto
        ];


        if (!empty($_POST['enviar'])) { // si pulsamos el boton enviar se va realizar las siguientes instruciones
            $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_POST['nombre'], 20, 3, 3); //el array de los errores coje el mensaje de error para el campo nombre de la libreria
            $aErrores["apellidos"] = validacionFormularios::comprobarAlfabetico($_POST['apellidos'], 20, 3, 3); //el array de los errores coje el mensaje de error para el campo apellidos de la libreria
            $aErrores["email"] = validacionFormularios::validarEmail($_POST['email'], 30, 3, 1); //el array de los errores coje el mensaje de error para el campo email de la libreria
            $aErrores["telefono"] = validacionFormularios::validaTelefono($_POST['telefono'], 1); //el array de los errores coje el mensaje de error para el campo telefonoefono de la libreria
            $aErrores["dni"] = validacionFormularios::validarDni($_POST['dni'], 1); //el array de los errores coje el mensaje de error para el campo dni de la libreria


            foreach ($aErrores as $error) { // Busca algun mensaje de error en el recorriendo el array de errores
                if ($error != null) {
                    $entradaOK = false; //si encuentra algun error se cambiaria a false la entradaok
                }
            }
        } else {   // y si no se ha pulsado nada la entrada estara a false tambien ya que los campos estan vacios
            $entradaOK = false;
        }

        if ($entradaOK) {  //si la entrada es correcta entonces imprimimos por pantalla los datos
            $aFormulario["nombre"] = $_POST['nombre']; // recoge el valor del campo nombre una vez que ya ha pasado la validacion
            $aFormulario["apellidos"] = $_POST['apellidos']; // recoge el valor del campo apellidos una vez que ya ha pasado la validacion
            $aFormulario["email"] = $_POST['email']; // recoge el valor del campo email una vez que ya ha pasado la validacion
            $aFormulario["telefono"] = $_POST['telefono']; // recoge el valor del campo telefonoefono una vez que ya ha pasado la validacion
            $aFormulario["dni"] = $_POST['dni']; // recoge el valor del campo dni una vez que ya ha pasado la validacion



            print "Nombre: " . $aFormulario["nombre"] . "<br />";  //saca por pantalla el valor del campo nombre
            print "Apellidos: " . $aFormulario["apellidos"] . "<br />"; //saca por pantalla el valor del campo apellidos
            print "Email: " . $aFormulario["email"] . "<br />"; //saca por pantalla el valor del campo email
            print "telefonoefono: " . $aFormulario["telefono"] . "<br />"; //saca por pantalla el valor del campo telefonof
            print "Dni: " . $aFormulario["dni"] . "<br />"; //saca por pantalla el valor del campo dni
        } else {  //si la entrada de datos no es correcta nuevamente mostramos el formulario
            ?>
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"/>

            Introduzca su nombre: 
            <input type="text" name="nombre" 
                   value="<?php if (isset($_POST["nombre"]) && is_null($aErrores["nombre"])) {
            echo $_POST["nombre"];
        } ?>"/> 
            <label style="color: red;"><?php echo $aErrores["nombre"]; ?>*</label><br><br>

            Introduzca sus apellidos:
            <input type="text" name="apellidos" 
                   value="<?php if (isset($_POST["apellidos"]) && is_null($aErrores["apellidos"])) {
            echo $_POST["apellidos"];
        } ?>"/>
            <label style="color: red;"><?php echo $aErrores["apellidos"]; ?>*</label><br><br>

            Introduzca su email:
            <input type="text" name="email"  
                   value="<?php if (isset($_POST["email"]) && is_null($aErrores["email"])) {
            echo $_POST["email"];
        } ?>"/>
            <label style="color: red;"><?php echo $aErrores["email"]; ?>*</label><br><br>

            Introduzca su telefonoefono: 
            <input type="text" name="telefono"  
                   value="<?php if (isset($_POST["telefono"]) && is_null($aErrores["telefono"])) {
            echo $_POST["telefono"];
        } ?>"/>
            <label style="color: red;"><?php echo $aErrores["telefono"]; ?>*</label><br><br>

            Introduzca su dni: 
            <input type="text" name="dni"  
                   value="<?php if (isset($_POST["dni"]) && is_null($aErrores["dni"])) {
            echo $_POST["dni"];
        } ?>"/>
            <label style="color: red;"><?php echo $aErrores["dni"]; ?>*</label><br><br>





            <input type="submit" value="Enviar" name="enviar"/>

        </form>
    <?php
}
?>


</body>
</html>
