<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel='stylesheet' type='text/css' href='../webroot/css/estilos2.css'/>
        <style>
            h1{
                font: normal 3.3em 'fb', 'Trebuchet MS', Helvetica, Arial;
            }
        </style>
    </head>
    <style>
        .error{
            color:red;
        }
    </style>
    <body>
        <h1>Encuesta</h1>


        <?php
        require '../core/181025validacionFormularios.php'; //Incluye la librería de validación.

        $entradaOK = true; // ponemos la entrada a true
        $aErrores; // declaramos el array de errores que mas tarde le daremos los valores
        $aFormulario; // declaramos el array del formulario que mas tarde le daremos datos

        $persona = 1; // inicializamos la variable persona a 1
        while ($persona <= 3) { // creamos un bucle que vaya hasta el 3 que es el numero de personas
            // metemos los datos en el array de errores para guardar los posibles errores
            $aErrores[$persona]['depFav'] = null;
            $aErrores[$persona]['fecha'] = null;
            $aErrores[$persona]['diasDep'] = null;
            $aErrores[$persona]['pracDep'] = null;
            $aErrores[$persona]['medida'] = null;
            // metemos los datos en el array de formulario para guardar los posibles errores
            $aFormulario[$persona]['depFav'] = null;
            $aFormulario[$persona]['fecha'] = null;
            $aFormulario[$persona]['diasDep'] = null;
            $aFormulario[$persona]['pracDep'] = null;
            $aFormulario[$persona]['medida'] = null;

            $persona++; // incrementamos la persona del bucle
        }


        if (isset($_POST['enviar'])) { // si hemos pulsado en enviar
            for ($persona = 1; $persona <= 3; $persona++) { // se hara un bucle para pasar por las 3 personas
                // haremos un atratamiento de errores para detectar los posibles fallos
                $aErrores[$persona]['depFav'] = validacionFormularios::comprobarAlfabetico($_POST['depFav' . $persona], 30, 3, 1);
                $aErrores[$persona]['fecha'] = validacionFormularios::validarFecha($_POST['fecha' . $persona], 1);
                $aErrores[$persona]['diasDep'] = validacionFormularios::comprobarEntero($_POST['diasDep' . $persona], 10, 1, 1);
                $aErrores[$persona]['pracDep'] = validacionFormularios::validarRadioB($_POST['pracDep' . $persona], 1);
                $aErrores[$persona]['medida'] = validacionFormularios::comprobarFloat($_POST['medida' . $persona], 10, 1, 1);
            }

            foreach ($aErrores as $persona => $aPersona) { // recorremos el array con un bucle para sacar los errores
                foreach ($aPersona as $pregunta => $depFav) { // utilizamos dos foreach 
                    if ($aErrores[$persona][$pregunta] != null) { // si es diferente a null algun registro
                        $entradaOK = false; // la entrada es false
                        $_POST[$numPregunta . $numPersona] = ''; // limpiamos los campos
                    }
                }
            }
        } else { // si no hemos pulsado 
            $entradaOK = false; // la entrada es false
        }

        if ($entradaOK) { // si la entrada esta bien
            //hacemos el tratamiento de datos
            for ($persona = 1; $persona <= 3; $persona++) { // creamos un bucle para sacar todas las personas y sus datos meterlos en el array
                $aFormulario[$persona]['depFav'] = $_POST['depFav' . $persona];
                $aFormulario[$persona]['fecha'] = $_POST['fecha' . $persona];
                $aFormulario[$persona]['diasDep'] = $_POST['diasDep' . $persona];
                $aFormulario[$persona]['pracDep'] = $_POST['pracDep' . $persona];
                $aFormulario[$persona]['medida'] = $_POST['medida' . $persona];
            }
            // y vamos a sacar los datos por pantalla
            $acumulador = 0; // pondremos un acumuldor a 0 que utilizaremos para la media
            for ($persona = 1; $persona <= 3; $persona++) { // hacemos un bucle pra que nos saque todas las personas
                ?><article><?php 
                echo "<h1>Encuestado</h1>"; 
                // y recogemos las respuestas como queramos
                // estos dos registros los sacaremos con un echo y ya esta
                echo '<p> Hola tu Deporte favorito es ' . $aFormulario[$persona]['depFav'] . '</p>'; 
                echo '<p> Tu fecha de nacimiento es el ' . $aFormulario[$persona]['fecha'] . '</p>';
                // los dias de deporte lo haremos con una condicion que saque dos mensajes 
                if ($aFormulario[$persona]['diasDep'] > 5) {
                    echo '<p>practica deporte unas cuentas horas a la semana esta muy bien!</p>';
                } else {
                    echo '<p>Tiene que practicar deporte mas horas a la semana</p>';
                }
                // la practica de deporte lo haremos con una condicion que saque dos mensajes
                if ($aFormulario[$persona]['pracDep'] == 'si') {
                    echo '<p>Me parece muy bien que practique deporte de elite!</p>';
                } else {
                    echo '<p>Tiene que apuntarse algun deporte de elite!</p>';
                }
                // y por ultimo haremos la cuenta que nos sacara la media de los campos de la medida
                $acumulador += $aFormulario[$persona]['medida'];
                ?></article><?php
                }

                echo '<h2>La media de altura de los encuestados es ' . $acumulador / ($persona - 1) . '</h2>';
            } else {
                ?>
            <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
                                   

                    <table>
                        <tr> 
                            <td><p>¿Cual es tu deporte favorito?</p></td>
    <?php for ($persona = 1; $persona <= 3; $persona++) { ?>
                                <td><input type='text' name='depFav<?php echo $persona ?>' value='<?php {
            echo $_POST['depFav' . $persona];
        }
        ?>' >*<br><p class="error"><?php echo $aErrores[$persona]['depFav'] ?></p><br></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td><p>¿Cual es tu año de nacimiento?</p></td>
                                       <?php for ($persona = 1; $persona <= 3; $persona++) { ?>
                                <td><input type='text' name='fecha<?php echo $persona ?>' value='<?php {
                                       echo $_POST['fecha' . $persona];
                                   }
                                   ?>' >*<br><p class="error"><?php echo $aErrores[$persona]['fecha'] ?></p><br></td>
                            <?php } ?>
                        </tr>
                        <tr> 
                            <td><p>¿Cuantas horas practicas deporte?(semana)</p></td>
                                       <?php for ($persona = 1; $persona <= 3; $persona++) { ?>
                                <td><input type='text' name='diasDep<?php echo $persona ?>' value='<?php {
                                       echo $_POST['diasDep' . $persona];
                                   }
                                   ?>' >*<br><p class="error"><?php echo $aErrores[$persona]['diasDep'] ?></p><br></td>
                                <?php } ?>
                        </tr>
                        <tr> 
                            <td><p>¿Practicas algun deporte de elite?</p></td>
    <?php for ($persona = 1; $persona <= 3; $persona++) { ?>
                                <td><input type='radio' name='pracDep<?php echo $persona ?>' value='si' <?php if ($_POST['pracDep' . $persona] == 'si') echo 'checked'; ?>>Sí
                                    <input type='radio' name='pracDep<?php echo $persona ?>' value='no' <?php if ($_POST['pracDep' . $persona] == 'no') echo 'checked'; ?>>No*<br><p class="error"><?php echo $aErrores[$persona]['pracDep'] ?></p><br></td>
                            <?php } ?>
                        </tr>
                        <tr> 
                            <td><p>¿Cuanto mides?(metros)</p></td>
    <?php for ($persona = 1; $persona <= 3; $persona++) { ?>
                                <td><input type='text' name='medida<?php echo $persona ?>' value='<?php {
            echo $_POST['medida' . $persona];
        }
        ?>' >*<br><p class="error"><?php echo $aErrores[$persona]['medida'] ?></p><br></td>
                                <?php } ?>
                        </tr>

                    </table>
              <br>

                <input type='submit' name='enviar'>
            </form>

    <?php
}
?>
    </body>
</html>
