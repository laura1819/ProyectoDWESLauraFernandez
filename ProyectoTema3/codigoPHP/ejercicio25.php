<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel='stylesheet' type='text/css' href='../webroot/css/estilos.css'/>
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
            'alfb' => null, // guarda los errores del campo 
            'alfn' => null, // guarda los errores del campo 
            'entero' => null, // guarda los errores del campo 
            'float' => null, // guarda los errores del campo 
            'email' => null, // guarda los errores del campo 
            'url' => null, // guarda los errores del campo 
            'fecha' => null, // guarda los errores del campo 
            'tel' => null, // guarda los errores del campo 
            'dni' => null, // guarda los errores del campo
            'cp' => null, // guarda los errores del campo
            'pass' => null, // guarda los errores del campo
            'radiobutton' => null,  // guarda los errores del campo
            'select' => null, // guarda los errores del campo
            'textArea' => null, // guarda los errores del campo
            
            'alfbNoOb' => null, // guarda los errores del campo 
            'alfnNoOb' => null, // guarda los errores del campo 
            'enteroNoOb' => null, // guarda los errores del campo 
            'floatNoOb' => null, // guarda los errores del campo 
            'emailNoOb' => null, // guarda los errores del campo 
            'urlNoOb' => null, // guarda los errores del campo 
            'fechaNoOb' => null, // guarda los errores del campo 
            'telNoOb' => null, // guarda los errores del campo 
            'dniNoOb' => null, // guarda los errores del campo
            'cpNoOb' => null, // guarda los errores del campo
            'passNoOb' => null, // guarda los errores del campo
            'textAreaNoOb' => null // guarda los errores del campo
            
          
        ];

        $aFormulario = [// array de los valores que contienen los campos del formulario cuando estos estan bien
            'alfb' => null, // guarda el valor del campo cuando este es correcto
            'alfn' => null, // guarda el valor del campo cuando este es correcto
            'entero' => null, // guarda el valor del campo cuando este es correcto
            'float' => null, // guarda el valor del campo cuando este es correcto
            'email' => null, // guarda el valor del campo cuando este es correcto
            'url' => null, // guarda el valor del campo cuando este es correcto
            'fecha' => null, // guarda el valor del campo cuando este es correcto
            'tel' => null, // guarda el valor del campo cuando este es correcto
            'dni' => null, // guarda el valor del campo cuando este es correcto
            'cp' => null, // guarda el valor del campo cuando este es correcto
            'pass' => null, // guarda el valor del campo cuando este es correcto
            'radiobutton' => null, // guarda el valor del campo cuando este es correcto
            'select' => null, // guarda el valor del campo cuando este es correcto
            'textArea' => null, // guarda el valor del campo cuando este es correcto
            
            'alfbNoOb' => null, // guarda los errores del campo 
            'alfnNoOb' => null, // guarda los errores del campo 
            'enteroNoOb' => null, // guarda los errores del campo 
            'floatNoOb' => null, // guarda los errores del campo 
            'emailNoOb' => null, // guarda los errores del campo 
            'urlNoOb' => null, // guarda los errores del campo 
            'fechaNoOb' => null, // guarda los errores del campo 
            'telNoOb' => null, // guarda los errores del campo 
            'dniNoOb' => null, // guarda los errores del campo
            'cpNoOb' => null, // guarda los errores del campo
            'passNoOb' => null, // guarda los errores del campo
            'textAreaNoOb' => null // guarda los errores del campo
            
        ];

        $button = [
            'opcion1',
            'opcion2'
        ];
        
        $a_select = [
            'opcion1',
            'opcion2',
            'opcion3',
            'opcion4'
        ];
        
        

        if (!empty($_POST['enviar'])) { //Para cada campo del formulario: Validar entrada y actuar en consecuencia 
            
            $aErrores['alfb'] = validacionFormularios::comprobarAlfabetico($_POST['alfb'], 25, 3, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['alfn'] = validacionFormularios::comprobarAlfanumerico($_POST['alfn'], 25, 3, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['entero'] = validacionFormularios::comprobarEntero($_POST['entero'], 10, 1, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['float'] = validacionFormularios::comprobarFloat($_POST['float'], 10, 1, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['email'] = validacionFormularios::validarEmail($_POST['email'], 25, 4, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['url'] = validacionFormularios::validarURL($_POST['url'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['fecha'] = validacionFormularios::validarFecha($_POST['fecha'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['tel'] = validacionFormularios::validaTelefono($_POST['tel'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['dni'] = validacionFormularios::validarDni($_POST['dni'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['cp'] = validacionFormularios::validarCp($_POST['cp'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['pass'] = validacionFormularios::comprobarAlfanumerico($_POST['pass'], 50, 3, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['radiobutton'] = validacionFormularios::validarElementoEnLista($_POST['radiobutton'], $button, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $a_errores['select'] = validacionFormularios::validarElementoEnLista($_POST['select'], $a_select, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['textArea'] = validacionFormularios::comprobarAlfanumerico($_POST['textArea'], 25, 3, 1); //el array de los errores coje el mensaje de error para el campo de la libreria
          
            $aErrores['alfbNoOb'] = validacionFormularios::comprobarAlfabetico($_POST['alfbNoOb'], 25, 3, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['alfnNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['alfnNoOb'], 25, 3, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['enteroNoOb'] = validacionFormularios::comprobarEntero($_POST['enteroNoOb'], 10, 1, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['floatNoOb'] = validacionFormularios::comprobarFloat($_POST['floatNoOb'], 10, 1, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['emailNoOb'] = validacionFormularios::validarEmail($_POST['emailNoOb'], 25, 4, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['urlNoOb'] = validacionFormularios::validarURL($_POST['urlNoOb'], 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['fechaNoOb'] = validacionFormularios::validarFecha($_POST['fechaNoOb'], 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['telNoOb'] = validacionFormularios::validaTelefono($_POST['telNoOb'], 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['dniNoOb'] = validacionFormularios::validarDni($_POST['dniNoOb'], 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['cpNoOb'] = validacionFormularios::validarCp($_POST['cpNoOb'], 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['passNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['passNoOb'], 50, 3, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            $aErrores['textAreaNoOb'] = validacionFormularios::comprobarAlfanumerico($_POST['textAreaNoOb'], 25, 3, 0); //el array de los errores coje el mensaje de error para el campo de la libreria
            

            foreach ($aErrores as $error) { // Busca algun mensaje de error en el recorriendo el array de errores
                if ($error != null) {
                    $entradaOK = false; //si encuentra algun error se cambiaria a false la entradaok
                }
            }
        } else {
            $entradaOK = false;  // cuando encontremos un error
        }



        if ($entradaOK) {  //Tratamiento de datos OK
             
            $aFormulario['alfb'] = $_POST['alfb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['alfn'] = $_POST['alfn']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['entero'] = $_POST['entero']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['float'] = $_POST['float']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['email'] = $_POST['email']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['url'] = $_POST['url']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['fecha'] = $_POST['fecha']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['tel'] = $_POST['tel']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['dni'] = $_POST['dni']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['cp'] = $_POST['cp']; // recoge el valor del campo una vez que ya ha pasado la validacion		
            $aFormulario['pass'] = $_POST['pass']; // recoge el valor del campo una vez que ya ha pasado la validacion		
            $aFormulario['radiobutton'] = $_POST['radiobutton']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['select'] = $_POST['select']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['textArea'] = $_POST['textArea']; // recoge el valor del campo una vez que ya ha pasado la validacion
             
            $aFormulario['alfbNoObNoOb'] = $_POST['alfbNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['alfnNoOb'] = $_POST['alfnNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['enteroNoOb'] = $_POST['enteroNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['floatNoOb'] = $_POST['floatNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['emailNoOb'] = $_POST['emailNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['urlNoOb'] = $_POST['urlNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['fechaNoOb'] = $_POST['fechaNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['telNoOb'] = $_POST['telNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['dniNoOb'] = $_POST['dniNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['cpNoOb'] = $_POST['cpNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion		
            $aFormulario['passNoOb'] = $_POST['passNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
            $aFormulario['textAreaNoOb'] = $_POST['textAreaNoOb']; // recoge el valor del campo una vez que ya ha pasado la validacion
        
            
            //Imprimimos los datos correctamente
             echo '<h2>Campos que eran obligatorios</h2>';
            print 'alfb: ' . $aFormulario['alfb'] . '<br />';   //saca por pantalla el valor del campo alfabetico
            print 'alfn: ' . $aFormulario['alfn'] . '<br />'; //saca por pantalla el valor del campo alfanumerico
            print 'entero: ' . $aFormulario['entero'] . '<br />'; //saca por pantalla el valor del campo entero
            print 'float: ' . $aFormulario['float'] . '<br />'; //saca por pantalla el valor del campo float
            print 'email: ' . $aFormulario['email'] . '<br />'; //saca por pantalla el valor del campo email
            print 'url: ' . $aFormulario['url'] . '<br />'; //saca por pantalla el valor del campo url
            print 'fecha: ' . $aFormulario['fecha'] . '<br />'; //saca por pantalla el valor del campo fecha
            print 'Telefono: ' . $aFormulario['tel'] . '<br />'; //saca por pantalla el valor del campo telefono
            print 'Dni: ' . $aFormulario['dni'] . '<br />'; //saca por pantalla el valor del campo dni
            print 'Codigo postal: ' . $aFormulario['cp'] . '<br />'; //saca por pantalla el valor del campo cp
            print 'Contraseña: ' . $aFormulario['pass'] . '<br />'; //saca por pantalla el valor del campo cp
            print 'Campo Radiobuton: ' . $aFormulario['radiobutton'] . '<br />'; //saca por pantalla el valor del campo cp
            print 'Campo select: ' . $aFormulario['select'] . '<br />'; //saca por pantalla el valor del campo cp
            print 'Campo TextArea: ' . $aFormulario['textArea'] . '<br />'; //saca por pantalla el valor del campo cp
            
            echo '<h2>Campos que no eran obligatorios</h2>';
            print 'alfbNoOb: ' . $aFormulario['alfbNoOb'] . '<br />';   //saca por pantalla el valor del campo alfabetico
            print 'alfnNoOb: ' . $aFormulario['alfnNoOb'] . '<br />'; //saca por pantalla el valor del campo alfanumerico
            print 'enteroNoOb: ' . $aFormulario['enteroNoOb'] . '<br />'; //saca por pantalla el valor del campo entero
            print 'floatNoOb: ' . $aFormulario['floatNoOb'] . '<br />'; //saca por pantalla el valor del campo float
            print 'emailNoOb: ' . $aFormulario['emailNoOb'] . '<br />'; //saca por pantalla el valor del campo email
            print 'urlNoOb: ' . $aFormulario['urlNoOb'] . '<br />'; //saca por pantalla el valor del campo url
            print 'fechaNoOb: ' . $aFormulario['fechaNoOb'] . '<br />'; //saca por pantalla el valor del campo fecha
            print 'TelefonoNoOb: ' . $aFormulario['telNoOb'] . '<br />'; //saca por pantalla el valor del campo telefono
            print 'DniNoOb: ' . $aFormulario['dniNoOb'] . '<br />'; //saca por pantalla el valor del campo dni
            print 'Codigo postalNoOb: ' . $aFormulario['cpNoOb'] . '<br />'; //saca por pantalla el valor del campo cp
            print 'ContraseñaNoOb: ' . $aFormulario['passNoOb'] . '<br />'; //saca por pantalla el valor del campo cp
             print 'textAreaNoOb: ' . $aFormulario['textAreaNoOb'] . '<br />'; //saca por pantalla el valor del campo cp
            
            
        } else {
            ?>
            <form class='formu' name='formulario' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'/>
                
               Comprobar alfabetico: 
                <input type='text' name='alfbNoOb' class='primero'
                       value='<?php
                       if (isset($_POST['alfbNoOb']) && is_null($aErrores['alfbNoOb'])) {
                           echo $_POST['alfbNoOb'];
                       }
                       ?>'/> 
                <label style='color: red;'><?php echo $aErrores['alfbNoOb']; ?></label>
                
                Comprobar alfabetico: 
                <input type='text' name='alfb' class='segundo'
                       value='<?php
                       if (isset($_POST['alfb']) && is_null($aErrores['alfb'])) {
                           echo $_POST['alfb'];
                       }
                       ?>'/> 
                <label style='color: red;'><?php echo $aErrores['alfb']; ?>*</label><br><br>
               
                Comprobar alfanumerico:
                <input type='text' name='alfnNoOb' class='primero'
                       value='<?php
                       if (isset($_POST['alfnNoOb']) && is_null($aErrores['alfnNoOb'])) {
                           echo $_POST['alfnNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['alfnNoOb']; ?></label>
                
                Comprobar alfanumerico:
                <input type='text' name='alfn' 
                       value='<?php
                       if (isset($_POST['alfn']) && is_null($aErrores['alfn'])) {
                           echo $_POST['alfn'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['alfn']; ?>*</label><br><br>
                
                Comprobar entero:
                <input type='text' name='enteroNoOb' class='primero'
                       value='<?php
                       if (isset($_POST['enteroNoOb']) && is_null($aErrores['enteroNoOb'])) {
                           echo $_POST['enteroNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['enteroNoOb']; ?></label>
                
                Comprobar entero:
                <input type='text' name='entero' 
                       value='<?php
                       if (isset($_POST['entero']) && is_null($aErrores['entero'])) {
                           echo $_POST['entero'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['entero']; ?>*</label><br><br>
                
                
                Comprobar float:
                <input type='text' name='floatNoOb' class='primero'
                       value='<?php
                   if (isset($_POST['floatNoOb']) && is_null($aErrores['floatNoOb'])) {
                       echo $_POST['floatNoOb'];
                   }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['floatNoOb']; ?></label>
                
                Comprobar float:
                <input type='text' name='float' 
                       value='<?php
                   if (isset($_POST['float']) && is_null($aErrores['float'])) {
                       echo $_POST['float'];
                   }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['float']; ?>*</label><br><br>
                
                
                Comprobar email:
                <input type='text' name='emailNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['emailNoOb']) && is_null($aErrores['emailNoOb'])) {
                           echo $_POST['emailNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['emailNoOb']; ?></label>
                
                Comprobar email:
                <input type='text' name='email'  
                       value='<?php
                       if (isset($_POST['email']) && is_null($aErrores['email'])) {
                           echo $_POST['email'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['email']; ?>*</label><br><br>

                
                 Comprobar URL:
                <input type='text' name='urlNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['urlNoOb']) && is_null($aErrores['urlNoOb'])) {
                           echo $_POST['urlNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['urlNoOb']; ?></label>
                
                Comprobar URL:
                <input type='text' name='url'  
                       value='<?php
                       if (isset($_POST['url']) && is_null($aErrores['url'])) {
                           echo $_POST['url'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['url']; ?>*</label><br><br>
                
                
                Comprobar Fecha:
                <input type='text' name='fechaNoOb'  class='primero'
                       value='<?php
                   if (isset($_POST['fechaNoOb']) && is_null($aErrores['fechaNoOb'])) {
                       echo $_POST['fechaNoOb'];
                   }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['fechaNoOb']; ?></label>
                
                Comprobar Fecha:
                <input type='text' name='fecha'  
                       value='<?php
                   if (isset($_POST['fecha']) && is_null($aErrores['fecha'])) {
                       echo $_POST['fecha'];
                   }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['fecha']; ?>*</label><br><br>
                
                
                Comprobar telefono: 
                <input type='text' name='telNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['telNoOb']) && is_null($aErrores['telNoOb'])) {
                           echo $_POST['telNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['telNoOb']; ?></label>
                
                Comprobar telefono: 
                <input type='text' name='tel'  
                       value='<?php
                       if (isset($_POST['tel']) && is_null($aErrores['tel'])) {
                           echo $_POST['tel'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['tel']; ?>*</label><br><br>
                
                
                 Comprobar dni: 
                <input type='text' name='dniNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['dniNoOb']) && is_null($aErrores['dniNoOb'])) {
                           echo $_POST['dniNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['dniNoOb']; ?></label>
                
                
                Comprobar dni: 
                <input type='text' name='dni'  
                       value='<?php
                       if (isset($_POST['dni']) && is_null($aErrores['dni'])) {
                           echo $_POST['dni'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['dni']; ?>*</label><br><br>			
                
                
                Comprobar Codigo postal: 
                <input type='text' name='cpNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['cpNoOb']) && is_null($aErrores['cpNoOb'])) {
                           echo $_POST['cpNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['cpNoOb']; ?></label>
                
                Comprobar Codigo postal: 
                <input type='text' name='cp'  
                       value='<?php
                       if (isset($_POST['cp']) && is_null($aErrores['cp'])) {
                           echo $_POST['cp'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['cp']; ?>*</label><br><br>
                
                
                 Comprobar Contraseña: 
                <input type='password' name='passNoOb'  class='primero'
                       value='<?php
                       if (isset($_POST['passNoOb']) && is_null($aErrores['passNoOb'])) {
                           echo $_POST['passNoOb'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['passNoOb']; ?></label>
                
                Comprobar Contraseña: 
                <input type='password' name='pass'  
                       value='<?php
                       if (isset($_POST['pass']) && is_null($aErrores['pass'])) {
                           echo $_POST['pass'];
                       }
                       ?>'/>
                <label style='color: red;'><?php echo $aErrores['pass']; ?>*</label><br><br>	
                
                 
                
                TextArea<textarea rows='4' name='textAreaNoOb' cols='30' value='<?php
                       if (isset($_POST['textAreaNoOb']) && is_null($aErrores['textAreaNoOb'])) {
                           echo $_POST['textAreaNoOb'];
                       }
                       ?>'></textarea>
                <label style='color: red;'><?php echo $aErrores['textAreaNoOb'] ?></label>
                
                TextaArea<textarea rows='4' name='textArea' cols='30' value='<?php
                       if (isset($_POST['textArea']) && is_null($aErrores['textArea'])) {
                           echo $_POST['textArea'];
                       }
                       ?>'></textarea>
                <label style='color: red;'><?php echo $aErrores['textArea'] ?>*</label><br><br>
                


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
