<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
        
    </head>
    <body>
        <h1>Ejercicio 3</h1>				
       <?php
        /*
         *  @author: Laura Fernandez
         *  Fecha 25/03/2019
         *  Descripción: Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        
        //Definimos las constantes para la conexion a la base de datos                
        define('IPDB', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos');                  
        define('USER', 'usuarioDAW210DBDepartamentos'); 
        define('PASS', 'paso');
        
        define("OBLIGATORIO", 1);
        define("NOOBLIGATORIO", 0);    
        define("LONGMINALFABETICO", 3);                      
                    
        $entradaOK = true;
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = [
            'codigo' => null, //Almacena el valor del campo alfabético cuando éste sea correcto.
            'nombre' => null  //Almacena el valor del campo alfanumérico cuando éste sea correcto.
        ];
                    
        $aErrores = [
            'codigo' => null, //Guarda posibles errores en el campo codigo.
            'nombre' => null //Guarda posibles errores en el campo nombre.
        ];   
        if (isset($_POST['Enviar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.            
            $aErrores['codigo'] = validacionFormularios::comprobarAlfabetico($_POST['codigo'],3, LONGMINALFABETICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores['nombre'] = validacionFormularios::comprobarAlfaNumerico($_POST['nombre'],100, LONGMINALFABETICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            
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
            try {
                $miDB=new PDO(IPDB,USER,PASS); //Conexión a la base de datos con PDO
                
                //Modificamos el valor del atributo ERRMODE            
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 //Volvemos a mostrar el atributo modificado, para comprobar en qué ha cambiado
              
                
            
                $insertar = $miDB->prepare('INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:codigo,:nombre)');    //Realizamos una consulta preparada
                $insertar->bindParam(':codigo',$_POST['codigo']);   //Recogemos los datos en las variables de las consultas preparadas
                $insertar->bindParam(':nombre',$_POST['nombre']);   //Recogemos los datos en las variables de las consultas preparadas
 
                $insertar->execute();   //Ejecutamos el prepare
                
                /*Comprobamos que se ha añadido correctamente*/
                $datos = $miDB->query('SELECT * FROM Departamento');    
                echo "<p><strong>Se ha insertado correctamente</strong> </p>"; 
                echo "<p>Los registros de la tabla Departamento son: </p>"; 
                while($resultados=$datos->fetchObject()){   //Creamos un objeto, el cual se va a usar para guardar los datos del query anterior
                  echo "<p>" . $resultados->CodDepartamento . " - " . $resultados->DescDepartamento . "</p>";  //Mostrar los datos de la tabla, dentro de un while
                }
                echo "<br>";         
                echo "El numero total de registros es: ".$datos->rowCount();    //Mostrar el numero total de registros de la tabla

            } catch (PDOException $e) {
                print "Error de: " . $e->getMessage() . "<br/>";    //Si no se ha realizado correctamente algo, salta el error (la excepción)
                die();
            }finally{
                unset($miDB);
            }
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               
                            Código de departamento:
                            <input type="text" name="codigo" size="3" value="<?php
                               if (isset($_POST['codigo']) && is_null($aErrores['codigo'])) {
                                   echo $_POST['codigo'];
                               }
                               ?>">* 
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[codigo]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?></br></br>
                            
                            Descripción del departamento:
                           
                            
                            
                          <textarea rows='2' name='nombre' cols='30' value='<?php
                        if (isset($_POST['nombrer']) && is_null($aErrores['textAreaNoOb'])) {
                            echo $_POST['nombre'];
                        }
                        ?>'></textarea>*
                        <label style='color: red;'><?php echo $aErrores['nombre'] ?></label></br></br>
                            Campo requerido *</br></br>
                            <input type="submit" name="Enviar">
                     
                  
             
                
            </form>
        <?php }
        
        
        ?>        
      </body>         
</html>





