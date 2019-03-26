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
        <h1>Ejercicio 4</h1>                 
         
         <?php 
        /* 
         Autor: Laura Fernandez 
            Fecha 25/03/2019
            Comentarios:  Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento. 
         */ 
        require "../core/181025validacionFormularios.php"; // la libreria de validacion para los errores de el formulario 
         
    $entradaOK = true; // ponemos la entrada a true 
          
          
        define('IP', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos'); // definimos los parametros de la conexion para conectarnos 
        define('CONTR', 'paso'); // la contraseña de la base de datos 
        define('USUARIO', 'usuarioDAW210DBDepartamentos'); // el usuario de la base de datos 
        define("OBLIGATORIO", 1); // y los parametros para validar los campos 
        define("NOOBLIGATORIO", 0); // y los parametros para validar los campos 
        define("LONGMAXDESC", 255); // y los parametros para validar los campos 
        define("LONGMINDESC", 1); // y los parametros para validar los campos 
        
         
        $aFormulario = ['desDepartamento' => null]; // creamos un array para los parametros de la base de datos 
        
        $aErrores = ['desDepartamento' => null]; // hacemos un array con los errores  
        if (isset($_POST['Buscar'])) {  // si se ha pulsado buscar 
            $aErrores['desDepartamento'] = validacionFormularios::comprobarAlfanumerico($_POST['desDepartamento'], LONGMAXDESC, LONGMINDESC, OBLIGATORIO); // corregiria un error si se produjera 
            foreach ($aErrores as $campo => $error) {  //recorremos buscando errores 
                if ($error != null) { // si tenemos algun error 
                    $entradaOK = false;  // la entrada nos la pone en false 
                    $_POST[$campo] = ""; //  
                } 
            } 
        } else { 
            $entradaOK = false; // y si no la entrada la ponemos a falso 
        }  
        if ($entradaOK) {  // si la entrada esta bien se sacan los datos 
            
            $aFormulario['desDepartamento'] = $_POST['desDepartamento'];  //coje el valor del campo ya validado 
            try { 
                $baseDeDatos = new PDO(IP, USUARIO, CONTR);  // se inicia la variable con un PDO 
                echo "<p>Conexión correcta</p>"; // sacamos un mensaje de que la conexion es correcta 
                $consulta = $baseDeDatos->query("select * from Departamento where DescDepartamento like '%$aFormulario[desDepartamento]%' or DescDepartamento like '$aFormulario[desDepartamento]%' or DescDepartamento like '%$aFormulario[desDepartamento]'"); //guardamos en la variable el contenido de lo que tenemos en la base de datos 
                if($consulta->rowCount()==0){  // si no hay ninguna tupla 
                    echo "<p>No se encontraron registros</p>";  // sacamos un mensaje de que no se encontro ningun registro 
                }else{ // pero si si tenemos registros 
                    echo "<p>Se encontraron ".$consulta->rowCount()." registros</p>"; //pues los contamos y los sacamos por pantalla 
                } 
                while ($registro = $consulta->fetchObject()) { // hacemos un bucle para mostrar todas las tuplas 
                    echo "<p>" . $registro->CodDepartamento . "=" . $registro->DescDepartamento . "</p>";  //y las sacamos por pantalla el cod y la desc 
                } 
            } catch (PDOException $error) { // si tenemos algun error  
                echo "<p>Error " . $error->getMessage() . "</p>";  // mostraremos el mensaje de error 
            }  
                unset($baseDeDatos);  // cerramos la conexion  
             
        } else { // y si no mostramos de nuevo el formulario 
             
            ?> 
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                <div> 
       
                        <caption>Busca el departamento</caption> 
        
                      Descripción
                       
                   
                    <textarea rows='2' name='desDepartamento' cols='30' value='<?php
                        if (isset($_POST['desDepartamento']) && is_null($aErrores['desDepartamento'])) {
                            echo $_POST['desDepartamento'];
                        }
                        ?>'></textarea>
                        <label style='color: red;'><?php echo $aErrores['desDepartamento'] ?></label>
                             
                         <input type="submit" name="Buscar" value="Búsqueda"> 
                   
                    </table> 
                </div> 
            </form> 
        <?php } ?> 
         
         
         
      </body>          
</html> 




