<!DOCTYPE html>
<html>
    <head>
        <title>Añadir departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>

    </head>
    <body>
        <h1>Añadir Departamento</h1><br><br>           

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author: Laura Fernandez
         *  @since: 12 de noviembre de 2018
         *  Descripción: Añadir departamentos - examen
         */
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configuracionDB.php";

        $entradaOK = true;// ponemos la entrada a true
        
        $aFormulario = [ // creamos un array con las posiciones del formulario
            usuario => null, // con el usuario 
            descripcion => null // y con la descripcion
        ];
                    
        $aErrores = [ // creamos un array con las posiciones del formulario de errores 
            usuario => null, // con el usuario 
            descripcion => null // y con la descripcion
        ]; 
        
       
        session_start(); // iniciamos la sesion
        
       
        if (!isset($_SESSION['usuario_DAW210_Login'])) { // si la sesion a la que queremos entrar no existe
            Header("Location: ../login.php"); // nos manda al login de nuevo
        }
       
       
        $CodUsuario = $_SESSION['usuario_DAW210_Login']; // guardamos el nombre del usuario
        
        try {
           
            $miDB=new PDO(DSN,USER,PASS);  // creamos un elemento pdo con los parametros de la conexion      
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si ocurre algun error que lo muestre 
            
          
            $query = "select * from usuario where CodUsuario=:CodUsuario"; // creamos una consulta para identificar al usuario 
            $result = $miDB->prepare($query); // preparamos la consulta 
            $result->bindParam(':CodUsuario', $CodUsuario); // miramos que el usuario coincida 
            $result->execute(); // ejecutamos la consulta 

           
            $datos = $result->fetchObject(); // cogemos los datos que vamos a usar en este apratado
            $descripcion=$datos->descripcion; // cogemos los datos que vamos a usar en este apratado
            
          
            if (isset($_POST['Editar'])) {  // si hemos pulsado en editar 
               
                $aErrores[descripcion] = validacionFormularios::comprobarAlfaNumerico($_POST['descripcion'],255, LONGMINALFABETICO, OBLIGATORIO); // validamos con la libreria que compla lo que queremos 

               
                $descrip = $_POST['descripcion'];  // guardamos la descripcion en una variable          
                   if($descrip==null){ // si la descripcion esta a null 
                       $aErrores[descripcion]="La descripción no puede estar vacía"; //mostramos el mensaje por pantalla                    
                        $entradaOK=false;   // ponemos la entrada a false
                   }      

                foreach ($aErrores as $campo=>$error) { // si salta el error 
                    if ($error != null) {     // entonces haremos los siguiente
                        $entradaOK = false; // ponemos la entrada a false 
                        $_POST[$campo]=""; // y limpiamos el campo 
                    }
                }  
            } else { // y si no 
                $entradaOK = false; // ponemos la entrada a false  
            }
            if($entradaOK){ // si la entrada es buena
                
                
                
                $desc=$_POST['descripcion'];  // creamos una variable para guardar la descripcion que hemos añadido 
                
              
                $query = "update usuario set descripcion=:descripcion where CodUsuario=:CodUsuario"; // hacemos un update a la bd para cambiar la descripcion 
                $result = $miDB->prepare($query);  // preparamos la consulta 
                $result->bindParam(':descripcion', $desc); // con los campos de descripcion 
                $result->bindParam(':CodUsuario', $CodUsuario); // con el campo del codigo del usuario 
                $result->execute(); // y ejecutamos la consulta
                
               
                Header("Location: programa.php");
            }else{
                ?>
        <div style="text-align: center;">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   
                      
                         
                               Usuario:
                           <input type="text" id="usuario" name="usuario" size="10" value="<?php echo $CodUsuario;?>" disabled>
                                    <?php
                                    echo "<font color='red' size='1px'>$aErrores[usuario]</font>"; 
                                    ?><br><br>
                          
                                Descripción:
                               <input type="text" id="descripcion" name="descripcion"  value="<?php echo $descripcion; echo $_POST['descripcion'];?>">
                                    <?php
                                    echo "<font color='red' size='1px'>$aErrores[descripcion]</font>"; 
                                    ?><br><br>
                                                                                                           

                        
                        <input type="submit" name="Editar" value="Editar" class="boton_personalizado">   
                        <input type="button" name="Editar_Contraseña" class="boton_personalizado" value="Editar Contraseña" onclick="location='editarContrasena.php'">
                        <input type="button" name="Eliminar_Cuenta" class="boton_personalizados" value="Eliminar_Cuenta" onclick="location='eliminarCuenta.php'">
                        <input type="button" name="Salir" value="Salir" class="boton_personalizados" onclick="location = 'programa.php'">
                    
                        </div>
                </form>
            <?php         

            }
    } catch (PDOException $e) {
        print "Error de: " . $e->getMessage() . "<br/>";    
        die();
    }finally{
        unset($miDB);
    }  
       



        
?> 
    </body>
</html>
