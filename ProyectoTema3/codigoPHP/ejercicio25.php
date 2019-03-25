<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel='stylesheet' type='text/css' href='../webroot/css/estilos3.css'/>
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>



        <h1>Ejercicio 25 Plantilla para formularios</h1>

        <?php
        /**
          Autor: Laura Fernandez
          @since: 23/10/2018
          Comentarios: el programa crea un formulario y muestra los datos introducidos en la misma página verificando las entradas de datos.
         */
        require_once '../core/181024validacionFormularios.php'; // la libreria en comun para validar los datos

        $entradaOK = true; //Inicialización de la variable que nos indica que todo va bien 
        $aErrores = [//Inicialización del array donde recogemos los errores 
            'alfb' => null, // campo errores alfabetico
            'alfn' => null, // campo errores alfanumerico
            'entero' => null, // campo errores entero 
            'float' => null, // campo errores para un numero float 
            'email' => null, // campo errores para el email 
            'url' => null, // campo errores para la url 
            'fecha' => null, // campo errores para la fecha 
            'tel' => null, // campo errores para el telefono 
            'dni' => null, // campo errores para el dni
            'cp' => null, // campo errores para el codigo postal
            'pass' => null, // campo errores para la contraseña
            'radiobutton' => null, // campo errores para el radiobutton
            'select' => null, // campo errores para la listbox
            'textArea' => null, // campo errores para el text area
            'alfbNoOb' => null, // campo de errores para el alfabetico no obligatorio
            'alfnNoOb' => null, // campo de errores para el alfanumerico no obligatorio
            'enteroNoOb' => null, // campo de errores para el entero no obligatorio
            'floatNoOb' => null, // campo de errores para el float no obligatorio
            'emailNoOb' => null, // campo de errores para el email no obligatorio
            'urlNoOb' => null, //  campo de errores para el url no obligatorio
            'fechaNoOb' => null, // campo de errores para el fecha obligatorio
            'telNoOb' => null, // campo de errores para el telefono no obligatorio
            'dniNoOb' => null, // campo de errores para el dni no obligatorio
            'cpNoOb' => null, // campo de errores para el codigo postal no obligatorio
            'passNoOb' => null, // campo de errores para la contraseña no obligatorio
            'textAreaNoOb' => null // campo de errores para el textarea no obligatorio
        ];

        $aFormulario = [// array de los valores que contienen los campos del formulario cuando estos estan bien
            'alfb' => null, // campo  alfabetico
            'alfn' => null, // campo  alfanumerico
            'entero' => null, // campo  entero 
            'float' => null, // campo  para un numero float 
            'email' => null, // campo  para el email 
            'url' => null, // campo  para la url 
            'fecha' => null, // campo  para la fecha 
            'tel' => null, // campo  para el telefono 
            'dni' => null, // campo  para el dni
            'cp' => null, // campo  para el codigo postal
            'pass' => null, // campo  para la contraseña
            'radiobutton' => null, // campo  para el radiobutton
            'select' => null, // campo  para la listbox
            'textArea' => null, // campo  para el text area
            'alfbNoOb' => null, // campo de  para el alfabetico no obligatorio
            'alfnNoOb' => null, // campo de  para el alfanumerico no obligatorio
            'enteroNoOb' => null, // campo de  para el entero no obligatorio
            'floatNoOb' => null, // campo de  para el float no obligatorio
            'emailNoOb' => null, // campo de  para el email no obligatorio
            'urlNoOb' => null, //  campo de  para el url no obligatorio
            'fechaNoOb' => null, // campo de  para el fecha obligatorio
            'telNoOb' => null, // campo de  para el telefono no obligatorio
            'dniNoOb' => null, // campo de  para el dni no obligatorio
            'cpNoOb' => null, // campo de  para el codigo postal no obligatorio
            'passNoOb' => null, // campo de  para la contraseña no obligatorio
            'textAreaNoOb' => null // campo de  para el textarea no obligatorio
        ];

        $button = [// un array para guardar las opciones del radioButton
            'opcion1',
            'opcion2'
        ];

        $a_select = [// un array para guardar las opciones para la listBox
            'opcion1',
            'opcion2',
            'opcion3',
            'opcion4'
        ];



        if (!empty($_POST['enviar'])) { //Para cada campo del formulario: Validar entrada y actuar en consecuencia 
            // para cada elemento del campo le pasamos su comprobacion de la libreria
            $aErrores['alfb'] = validacionFormularios::comprobarAlfabetico($_POST['alfb'], 25, 3, 1);
            $aErrores['alfn'] = validacionFormularios::comprobarAlfanumerico($_POST['alfn'], 25, 3, 1);
            $aErrores['entero'] = validacionFormularios::comprobarEntero($_POST['entero'], 10, 1, 1);
            $aErrores['float'] = validacionFormularios::comprobarFloat($_POST['float'], 10, 1, 1);
            $aErrores['email'] = validacionFormularios::validarEmail($_POST['email'], 25, 4, 1);
            $aErrores['url'] = validacionFormularios::validarURL($_POST['url'], 1);
            $aErrores['fecha'] = validacionFormularios::validarFecha($_POST['fecha'], 1);
            $aErrores['tel'] = validacionFormularios::validaTelefono($_POST['tel'], 1);
            $aErrores['dni'] = validacionFormularios::validarDni($_POST['dni'], 1);
            $aErrores['cp'] = validacionFormularios::validarCp($_POST['cp'], 1);
            $aErrores['pass'] = validacionFormularios::comprobarAlfanumerico($_POST['pass'], 50, 3, 1);
            $aErrores['radiobutton'] = validacionFormularios::validarElementoEnLista($_POST['radiobutton'], $button, 1);
            $a_errores['select'] = validacionFormularios::validarElementoEnLista($_POST['select'], $a_select, 1);
            $aErrores['textArea'] = validacionFormularios::comprobarAlfanumerico($_POST['textArea'], 25, 3, 1);

            $aErrores['alfbNoOb'] = validacionFormularios::comprobarAlfabetico($_POST['alfbNoOb'], 25, 3, 0);
            $aErrores['alfnNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['alfnNoOb'], 25, 3, 0);
            $aErrores['enteroNoOb'] = validacionFormularios::comprobarEntero($_POST['enteroNoOb'], 10, 1, 0);
            $aErrores['floatNoOb'] = validacionFormularios::comprobarFloat($_POST['floatNoOb'], 10, 1, 0);
            $aErrores['emailNoOb'] = validacionFormularios::validarEmail($_POST['emailNoOb'], 25, 4, 0);
            $aErrores['urlNoOb'] = validacionFormularios::validarURL($_POST['urlNoOb'], 0);
            $aErrores['fechaNoOb'] = validacionFormularios::validarFecha($_POST['fechaNoOb'], 0);
            $aErrores['telNoOb'] = validacionFormularios::validaTelefono($_POST['telNoOb'], 0);
            $aErrores['dniNoOb'] = validacionFormularios::validarDni($_POST['dniNoOb'], 0);
            $aErrores['cpNoOb'] = validacionFormularios::validarCp($_POST['cpNoOb'], 0);
            $aErrores['passNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['passNoOb'], 50, 3, 0);
            $aErrores['textAreaNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['textAreaNoOb'], 25, 3, 0);


            foreach ($aErrores as $error) { // Busca algun mensaje de error en el recorriendo el array de errores
                if ($error != null) {
                    $entradaOK = false; //si encuentra algun error se cambiaria a false la entradaok
                }
            }
        } else {
            $entradaOK = false;  // cuando encontremos un error
        }



        if ($entradaOK) {  //Tratamiento de datos OK
            // recogemos el valor de cada campo una vez que este es correcto
            $aFormulario['alfb'] = $_POST['alfb'];
            $aFormulario['alfn'] = $_POST['alfn'];
            $aFormulario['entero'] = $_POST['entero'];
            $aFormulario['float'] = $_POST['float'];
            $aFormulario['email'] = $_POST['email'];
            $aFormulario['url'] = $_POST['url'];
            $aFormulario['fecha'] = $_POST['fecha'];
            $aFormulario['tel'] = $_POST['tel'];
            $aFormulario['dni'] = $_POST['dni'];
            $aFormulario['cp'] = $_POST['cp'];
            $aFormulario['pass'] = $_POST['pass'];
            $aFormulario['radiobutton'] = $_POST['radiobutton'];
            $aFormulario['select'] = $_POST['select'];
            $aFormulario['textArea'] = $_POST['textArea'];

            $aFormulario['alfbNoObNoOb'] = $_POST['alfbNoOb'];
            $aFormulario['alfnNoOb'] = $_POST['alfnNoOb'];
            $aFormulario['enteroNoOb'] = $_POST['enteroNoOb'];
            $aFormulario['floatNoOb'] = $_POST['floatNoOb'];
            $aFormulario['emailNoOb'] = $_POST['emailNoOb'];
            $aFormulario['urlNoOb'] = $_POST['urlNoOb'];
            $aFormulario['fechaNoOb'] = $_POST['fechaNoOb'];
            $aFormulario['telNoOb'] = $_POST['telNoOb'];
            $aFormulario['dniNoOb'] = $_POST['dniNoOb'];
            $aFormulario['cpNoOb'] = $_POST['cpNoOb'];
            $aFormulario['passNoOb'] = $_POST['passNoOb'];
            $aFormulario['textAreaNoOb'] = $_POST['textAreaNoOb'];


            //Imprimimos los datos correctamente
            echo '<h2>Campos que eran obligatorios</h2>';
            print 'alfb: ' . $aFormulario['alfb'] . '<br />';
            print 'alfn: ' . $aFormulario['alfn'] . '<br />';
            print 'entero: ' . $aFormulario['entero'] . '<br />';
            print 'float: ' . $aFormulario['float'] . '<br />';
            print 'email: ' . $aFormulario['email'] . '<br />';
            print 'url: ' . $aFormulario['url'] . '<br />';
            print 'fecha: ' . $aFormulario['fecha'] . '<br />';
            print 'Telefono: ' . $aFormulario['tel'] . '<br />';
            print 'Dni: ' . $aFormulario['dni'] . '<br />';
            print 'Codigo postal: ' . $aFormulario['cp'] . '<br />';
            print 'Contraseña: ' . $aFormulario['pass'] . '<br />';
            print 'Campo Radiobuton: ' . $aFormulario['radiobutton'] . '<br />';
            print 'Campo select: ' . $aFormulario['select'] . '<br />';
            print 'Campo TextArea: ' . $aFormulario['textArea'] . '<br />';

            echo '<h2>Campos que no eran obligatorios</h2>';
            print 'alfbNoOb: ' . $aFormulario['alfbNoOb'] . '<br />';
            print 'alfnNoOb: ' . $aFormulario['alfnNoOb'] . '<br />';
            print 'enteroNoOb: ' . $aFormulario['enteroNoOb'] . '<br />';
            print 'floatNoOb: ' . $aFormulario['floatNoOb'] . '<br />';
            print 'emailNoOb: ' . $aFormulario['emailNoOb'] . '<br />';
            print 'urlNoOb: ' . $aFormulario['urlNoOb'] . '<br />';
            print 'fechaNoOb: ' . $aFormulario['fechaNoOb'] . '<br />';
            print 'TelefonoNoOb: ' . $aFormulario['telNoOb'] . '<br />';
            print 'DniNoOb: ' . $aFormulario['dniNoOb'] . '<br />';
            print 'Codigo postalNoOb: ' . $aFormulario['cpNoOb'] . '<br />';
            print 'ContraseñaNoOb: ' . $aFormulario['passNoOb'] . '<br />';
            print 'textAreaNoOb: ' . $aFormulario['textAreaNoOb'] . '<br />';
        } else {
            ?>
            <form class='formu' name='formulario' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'/>
            <table> 
                <tr>
                    <td>
                        Comprobar alfabetico: 
                        <input type='text' name='alfbNoOb' class='primero' size="11"
                               value='<?php
                               if (isset($_POST['alfbNoOb']) && is_null($aErrores['alfbNoOb'])) {
                                   echo $_POST['alfbNoOb'];
                               }
                               ?>'/> 
                        <label style='color: red;'><?php echo $aErrores['alfbNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar alfabetico: 
                        <input type='text' name='alfb' class='segundo' size="11"
                               value='<?php
                               if (isset($_POST['alfb']) && is_null($aErrores['alfb'])) {
                                   echo $_POST['alfb'];
                               }
                               ?>'/> 
                        <label style='color: red;'><?php echo $aErrores['alfb']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar alfanumerico:
                        <input type='text' name='alfnNoOb' class='primero' size="11"
                               value='<?php
                               if (isset($_POST['alfnNoOb']) && is_null($aErrores['alfnNoOb'])) {
                                   echo $_POST['alfnNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['alfnNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar alfanumerico:
                        <input type='text' name='alfn' size="11"
                               value='<?php
                               if (isset($_POST['alfn']) && is_null($aErrores['alfn'])) {
                                   echo $_POST['alfn'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['alfn']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar entero:
                        <input type='text' name='enteroNoOb' class='primero' size="5"
                               value='<?php
                               if (isset($_POST['enteroNoOb']) && is_null($aErrores['enteroNoOb'])) {
                                   echo $_POST['enteroNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['enteroNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar entero:
                        <input type='text' name='entero'  size="5"
                               value='<?php
                               if (isset($_POST['entero']) && is_null($aErrores['entero'])) {
                                   echo $_POST['entero'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['entero']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar float:
                        <input type='text' name='floatNoOb' class='primero' size="5"
                               value='<?php
                               if (isset($_POST['floatNoOb']) && is_null($aErrores['floatNoOb'])) {
                                   echo $_POST['floatNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['floatNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar float:
                        <input type='text' name='float'  size="5"
                               value='<?php
                               if (isset($_POST['float']) && is_null($aErrores['float'])) {
                                   echo $_POST['float'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['float']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar email:
                        <input type='text' name='emailNoOb'  class='primero'
                               value='<?php
                               if (isset($_POST['emailNoOb']) && is_null($aErrores['emailNoOb'])) {
                                   echo $_POST['emailNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['emailNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar email:
                        <input type='text' name='email'  
                               value='<?php
                               if (isset($_POST['email']) && is_null($aErrores['email'])) {
                                   echo $_POST['email'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['email']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar URL:
                        <input type='text' name='urlNoOb'  class='primero'
                               value='<?php
                               if (isset($_POST['urlNoOb']) && is_null($aErrores['urlNoOb'])) {
                                   echo $_POST['urlNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['urlNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar URL:
                        <input type='text' name='url'  
                               value='<?php
                               if (isset($_POST['url']) && is_null($aErrores['url'])) {
                                   echo $_POST['url'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['url']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar Fecha:
                        <input type='text' name='fechaNoOb'  class='primero' size="6"
                               value='<?php
                               if (isset($_POST['fechaNoOb']) && is_null($aErrores['fechaNoOb'])) {
                                   echo $_POST['fechaNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['fechaNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar Fecha:
                        <input type='text' name='fecha'  size="7"
                               value='<?php
                               if (isset($_POST['fecha']) && is_null($aErrores['fecha'])) {
                                   echo $_POST['fecha'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['fecha']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar telefono: 
                        <input type='text' name='telNoOb'  class='primero' size="10"
                               value='<?php
                               if (isset($_POST['telNoOb']) && is_null($aErrores['telNoOb'])) {
                                   echo $_POST['telNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['telNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar telefono: 
                        <input type='text' name='tel'  size="10"
                               value='<?php
                               if (isset($_POST['tel']) && is_null($aErrores['tel'])) {
                                   echo $_POST['tel'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['tel']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar dni: 
                        <input type='text' name='dniNoOb'  class='primero' size="9"
                               value='<?php
                               if (isset($_POST['dniNoOb']) && is_null($aErrores['dniNoOb'])) {
                                   echo $_POST['dniNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['dniNoOb']; ?></label>
                    </td>
                    <td>

                        Comprobar dni: 
                        <input type='text' name='dni'  size="9"
                               value='<?php
                               if (isset($_POST['dni']) && is_null($aErrores['dni'])) {
                                   echo $_POST['dni'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['dni']; ?>*</label><br><br>	
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar Codigo postal: 
                        <input type='text' name='cpNoOb'  class='primero' size="4"
                               value='<?php
                               if (isset($_POST['cpNoOb']) && is_null($aErrores['cpNoOb'])) {
                                   echo $_POST['cpNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['cpNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar Codigo postal: 
                        <input type='text' name='cp'  size="4"
                               value='<?php
                               if (isset($_POST['cp']) && is_null($aErrores['cp'])) {
                                   echo $_POST['cp'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['cp']; ?>*</label><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprobar Contraseña: 
                        <input type='password' name='passNoOb'  class='primero' size="11"
                               value='<?php
                               if (isset($_POST['passNoOb']) && is_null($aErrores['passNoOb'])) {
                                   echo $_POST['passNoOb'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['passNoOb']; ?></label>
                    </td>
                    <td>
                        Comprobar Contraseña: 
                        <input type='password' name='pass' size="11"
                               value='<?php
                               if (isset($_POST['pass']) && is_null($aErrores['pass'])) {
                                   echo $_POST['pass'];
                               }
                               ?>'/>
                        <label style='color: red;'><?php echo $aErrores['pass']; ?>*</label><br><br>	
                    </td>
                </tr>

                <tr>
                    <td>
                        TextArea: <textarea rows='4' name='textAreaNoOb' cols='30' value='<?php
                        if (isset($_POST['textAreaNoOb']) && is_null($aErrores['textAreaNoOb'])) {
                            echo $_POST['textAreaNoOb'];
                        }
                        ?>'></textarea>
                        <label style='color: red;'><?php echo $aErrores['textAreaNoOb'] ?></label>
                    </td>
                    <td>
                        TextaArea: <textarea rows='4' name='textArea' cols='30' value='<?php
                        if (isset($_POST['textArea']) && is_null($aErrores['textArea'])) {
                            echo $_POST['textArea'];
                        }
                        ?>'></textarea>
                        <label style='color: red;'><?php echo $aErrores['textArea'] ?>*</label><br><br>
                    </td>
                </tr>

            </table>
            <label>Radio button </label>
            <input type='radio' name='radiobutton' value='opcion1' <?php echo (isset($_POST['radiobutton']) && $_POST['radiobutton'] == 'opcion1' ? 'checked' : ''); ?> checked><label>Opcion 1</label>
            <input type='radio' name='radiobutton' value='opcion2' <?php echo (isset($_POST['radiobutton']) && $_POST['radiobutton'] == 'opcion2' ? 'checked' : ''); ?>><label>Opcion 2</label>
            <label style='color: red;'><?php echo $aErrores['radiobutton'] ?>*</label><br><br>

            <select name='select' value='<?php echo $_POST['select']; ?>'>
                <option value='opcion1' value='opcion1' <?php echo (isset($_POST['select']) && $_POST['select'] == 'opcion1' ? 'selected' : ''); ?>>Opción 1</option>
                <option value='opcion2' value='opcion2' <?php echo (isset($_POST['select']) && $_POST['select'] == 'opcion2' ? 'selected' : ''); ?>>Opción 2</option>
                <option value='opcion3' value='opcion3' <?php echo (isset($_POST['select']) && $_POST['select'] == 'opcion3' ? 'selected' : ''); ?>>Opción 3</option>
                <option value='opcion4' value='opcion4' <?php echo (isset($_POST['select']) && $_POST['select'] == 'opcion4' ? 'selected' : ''); ?>>Opción 4</option>

            </select> <label style='color: red;'><?php echo $aErrores['select'] ?>*</label><br><br>






            <input type='submit' value='Enviar' name='enviar'/>

        </form>
        <?php
    }
    ?>


</body>
</html>
