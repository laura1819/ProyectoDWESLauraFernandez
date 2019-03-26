<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Encuesta climatica</h1>


        <?php
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.

        $entradaOk = true; // ponemos la entrada a true al principio
        
        
        $aErrores = array ( // crear un array para guardar los posibles errores de los campos
            'temHoy' => null,
            'temAyer' => null,
            'presion' => null,
            'estadoCielo' => null,
            'estadoAnimo' => null,
            'planHoy' => null
        );
        
        $aFormulario = array( // crear un array para guardar los valores de los campos
             'temHoy' => null,
            'temAyer' => null,
            'presion' => null,
            'estadoCielo' => null,
            'estadoAnimo' => null,
            'planHoy' => null
        );
        
        $aOpcionesLista = array ( // crear un array para guardar los campos de la lista
            'soleado',
            'nublado',
            'despejado'
        );
        
        if(isset($_POST['enviar'])){ // si hemos pulsado el boton de enviar
            // le pasamos los campos que hemos introducido por la libreria para ver si tiene errores
            $aErrores['temHoy'] = validacionFormularios::comprobarEntero($_POST['temHoy'],100,2,1);
            $aErrores['temAyer'] = validacionFormularios::comprobarEntero($_POST['temAyer'],100,2,1);
            $aErrores['presion'] = validacionFormularios::comprobarEntero($_POST['presion'],100,2,1);
            $aErrores['estadoCielo'] = validacionFormularios::validarElementoEnLista($_POST['estadoCielo'],$aOpcionesLista,1);
            $aErrores['estadoAnimo'] = validacionFormularios::validarRadioB($_POST['estadoAnimo'],1);
            $aErrores['planHoy'] = validacionFormularios::comprobarAlfaNumerico($_POST['planHoy'],30,5,1);
            
            foreach ($aErrores as $error){ // creamos un bucle para encontrar los errores  si hubiese
                if($error !=null){ // si la variable que contiene los errores no es null 
                    $entradaOk = false; // ponemos la entrada a false porque hay aungun error
                }
            }
            
        }else{ // y si no pulsamos enviar
                $entradaOk = false; // la entrada tambien en false
            }
            
        
        if ($entradaOk){ 
            // si la entrada es correcta hacemos el tratamiento de los datos
            $aFormulario['temHoy'] = $_POST['temHoy'];
            $aFormulario['temAyer'] = $_POST['temAyer'];
            $aFormulario['presion'] = $_POST['presion'];
            $aFormulario['estadoCielo'] = $_POST['estadoCielo'];
            $aFormulario['estadoAnimo'] = $_POST['estadoAnimo'];
            $aFormulario['planHoy'] = $_POST['planHoy'];
            
            // sacamos por pantalla los datos que hemos introducido 
            
            echo "La temperatura de hoy es : " . $aFormulario['temHoy'] . "</br>";
            echo "La temperatura de ayer es : " . $aFormulario['temAyer'] . "</br>";
            echo "La presion es : " . $aFormulario['presion'] . "</br>";
            echo "El estado del cielo es : " . $aFormulario['estadoCielo'] . "</br>";
            echo "El estado de animo es : " .$aFormulario['estadoAnimo'] . "</br>";
            echo "El plan para hoy es : " .$aFormulario['planHoy'] . "</br>";
        }else{    
            
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Temperatura hoy : <input type="text" name="temHoy" value="<?php
                               if (isset($_POST['temHoy']) && is_null($aErrores['temHoy'])) {
                                   echo $_POST['temHoy'];
                               }
                               ?>"><?php echo "<em>" . $aErrores['temHoy'] . "</em>"; ?></br></br>
            
            Temperatura ayer : <input type="text" name="temAyer" value="<?php
                               if (isset($_POST['temAyer']) && is_null($aErrores['temAyer'])) {
                                   echo $_POST['temAyer'];
                               }
                               ?>"><?php echo "<em>" . $aErrores['temAyer'] . "</em>" ?></br></br>
            
            Presion Atmosferica : <input type="text" name="presion" value="<?php
                               if (isset($_POST['presion']) && is_null($aErrores['presion'])) {
                                   echo $_POST['presion'];
                               }
                               ?>"><?php echo "<em>" . $aErrores['presion'] . "</em>" ?></br></br>
            
            Estado del Cielo :
            <select name="estadoCielo">
                <option value="soleado" <?php echo (isset($_POST['estadoCielo']) && $_POST['estadoCielo'] == 'soleado' ? 'selected' : ''); ?>>Soleado</option>
                <option value="despejado" <?php echo (isset($_POST['estadoCielo']) && $_POST['estadoCielo'] == 'nublado' ? 'selected' : ''); ?>>Despejado</option>
                <option value="nublado" <?php echo (isset($_POST['estadoCielo']) && $_POST['estadoCielo'] == 'despejado' ? 'selected' : ''); ?>>Nublado</option>
        </select><?php echo "<em>" . $aErrores['estadoCielo'] . "</em>" ?></br></br>
        Estado de animo 
        <input type="radio" name="estadoAnimo" value="bueno" <?php echo (isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == 'bueno' ? 'checked' : ''); ?> checked>Bueno
        <input type="radio" name="estadoAnimo" value="malo" <?php echo (isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == 'malo' ? 'checked' : ''); ?>>Malo
        <input type="radio" name="estadoAnimo" value="como el tiempo" <?php echo (isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == 'como el tiempo' ? 'checked' : ''); ?>>Como el tiempo <?php echo $aErrores['estadoAnimo']; ?></br></br>
        Plan para hoy <textarea name="planHoy" cols="30" rows="6" value="<?php echo $_POST['planHoy'];?>"></textarea><?php echo "<em>" . $aErrores['planHoy'] . "</em>" ?></br></br>
        <input type="submit" value="enviar" name="enviar"/>
    </form>
        <?php
        }
       ?>
</body>
</html>
