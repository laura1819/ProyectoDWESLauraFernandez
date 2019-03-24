<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
         <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 27</h1>
		<h2>Consulta climatica</h2>
		
		 <?php
       
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
		 $entradaOK = true;
		 
        define("OBLIGATORIO", 1);
        define("NOOBLIGATORIO", 0);
        define("MAXIMONUMERO", 100);
        define("MINIMONUMERO", 100);
        define("LONGMAXTEXTOLIBRE", 50);
        define("LONGMINTEXTOLIBRE", 3);
        $entradaOK = true;
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = ['hoy' => null, //Almacena el valor del campo nombre cuando éste sea correcto.
            'ayer' => null, //Almacena el valor del campo alfabético cuando éste sea correcto.
            'presion' => null, //Almacena el valor del campo contraseña cuando éste sea correcto.
            'estado' => null, //Almacena el valor del campo decimal cuando éste sea correcto.
            'plan' => null, //Almacena el valor del texto libre cuando éste sea correcto.
            'seleccionMultiple' => null, //Almacena el valor del campo checkbox cuando éste sea correcto.
            'cielo' => null]; //Almacena el valor del elemento dentro de una lista cuando éste sea correcto.
        $aOpcionesLista=['soleado', 'nublado', 'lluvioso']; //Se inicializan las posibles opciones de la lista.
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = ['hoy' => null, //Guarda posibles errores en el campo alfabético.
            'ayer' => null, //Guarda posibles errores en el campo alfanumérico.
            'presion' => null, //Guarda posibles errores en el campo pass.
            'estado' => null, //Guarda posibles errores en el campo decimal.
            'plan' => null, //Guarda posibles errores en el campo email.
            'seleccionMultiple' => null, //Guarda posibles errores en el campo url.
            'cielo' => null]; //Guarda posibles errores en el campo que puede tener ciertos valores.
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores['hoy'] = validacionFormularios::comprobarEntero($_POST["hoy"], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO);
            $aErrores['ayer'] = validacionFormularios::comprobarEntero($_POST["ayer"], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO);
            $aErrores['presion'] = validacionFormularios::comprobarEntero($_POST["presion"], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO);
            $aErrores['cielo'] = validacionFormularios::validarElementoEnLista($_POST['cielo'], $aOpcionesLista, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores['estado'] = validacionFormularios::validarRadioB($_POST["estado"], OBLIGATORIO);
            $aErrores['plan'] = validacionFormularios::comprobarAlfaNumerico($_POST["plan"], LONGMAXTEXTOLIBRE, LONGMINTEXTOLIBRE, OBLIGATORIO);
           
            foreach ($aErrores as $campo=>$error) { //Recorre el array de errores en busca de algún mensaje de error.
                if ($error != null) {
                    $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                    $_POST[$campo]="";
                }
            }
        } else {
            $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
        }
        if ($entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
            //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
            $aFormulario[alfabetico]=$_POST['alfabetico']; //Recoge el valor del campo ya validado.
            $aFormulario[alfanumerico]=$_POST['alfanumerico']; //Recoge el valor del campo ya validado.
            $aFormulario[pass] = $_POST['pass']; //Recoge el valor del campo ya validado.
            $aFormulario[entero] = $_POST['entero']; //Recoge el valor del campo ya validado.
            $aFormulario[decimal] = $_POST['decimal']; //Recoge el valor del campo ya validado.
            $aFormulario[email] = $_POST['email']; //Recoge el valor del campo ya validado.
            $aFormulario[url] = $_POST['url']; //Recoge el valor del campo ya validado.
            $aFormulario[fecha] = $_POST['fecha']; //Recoge el valor del campo ya validado.
            $aFormulario[dni] = $_POST['dni']; //Recoge el valor del campo ya validado.
            $aFormulario[codigoPostal] = $_POST['codigoPostal']; //Recoge el valor del campo ya validado.
            $aFormulario[telefono] = $_POST['telefono']; //Recoge el valor del campo ya validado.
            $aFormulario[textoLibre] =  $_POST['textoLibre']; //Recoge el valor del campo ya validado.
            $aFormulario[campoRadio] =  $_POST['campoRadio']; //Recoge el valor del campo ya validado.
            $aFormulario[seleccionMultiple] =  $_POST['seleccionMultiple1']." ".$_POST['seleccionMultiple2']; //Recoge el valor del campo ya validado.
            $aFormulario[elementoLista] = $_POST['elementoLista']; //Recoge el valor del campo ya validado.
            echo "<h2>Resultado</h2>";
            echo "<p>Alfabético: " . $aFormulario[alfabetico] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Alfanumérico: " . $aFormulario[alfanumerico] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Contraseña: " . $aFormulario[pass] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Entero: " . $aFormulario[entero] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Decimal: " . $aFormulario[decimal] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Email: " . $aFormulario[email] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Url: " . $aFormulario[url] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Fecha: " . $aFormulario[fecha] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>DNI: " . $aFormulario[dni] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Código Postal: " . $aFormulario[codigoPostal] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Teléfono: " . $aFormulario[telefono] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Texto Libre: " . $aFormulario[textoLibre] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Radio Button: " . $aFormulario[campoRadio] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>CheckBox: " . $aFormulario[seleccionMultiple] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.          
            echo "<p>Elemento en lista: " . $aFormulario[elementoLista] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
       
	   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Datos</caption>
                        <tr>
                            <td>Temperatura hoy</td>
                            <td><input type="text" name="hoy"  value="<?php echo $_POST['hoy'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[hoy]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Temperatura ayer</td>
                            <td><input type="text" name="ayer"  value="<?php echo $_POST['ayer'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[ayer]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Presión atmosférica</td>
                            <td><input type="text" name="presion"  value="<?php echo $_POST['presion'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[presion]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Estado del cielo</td>
                            <td><select name="cielo">
                                    <option value="soleado" <?php if($_POST['cielo']=='elemento1'){echo "selected";}?>>soleado</option>
                                    <option value="nublado" <?php if($_POST['cielo']=='elemento2'){echo "selected";}?>>nublado</option>
                                    <option value="lluvioso" <?php if($_POST['cielo']=='elemento2'){echo "selected";}?>>lluvioso</option>
                                </select>*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[cielo]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Estado de ánimo</td>
                            <td><input type="radio" name="estado" <?php if($_POST['estado']=="Bueno"){echo "checked";}?> value="Bueno">Bueno
                                <input type="radio" name="estado" <?php if($_POST['estado']=="Malo"){echo "checked";}?> value="Malo">Malo
                                <input type="radio" name="estado" <?php if($_POST['estado']=="Como el tiempo"){echo "checked";}?> value="Como el tiempo">Como el tiempo
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[campoRadio]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Plan para hoy</td>
                            <td><textarea name="textoLibre" cols="30" rows="6"><?php echo $_POST['textoLibre'];?></textarea>
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[textoLibre]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                      
                            <td><input type="submit" name="Registrarse"></td>
                        </tr>
                    </table>
                </div>
            </form>
	  <?php } ?>
	   
	   
    </body>
</html>