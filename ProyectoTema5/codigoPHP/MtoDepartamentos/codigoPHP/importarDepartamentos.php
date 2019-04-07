<!DOCTYPE html>
<html>
    <head>
        <title>Importar departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <h1>Importar Departamentos</h1>           
       
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author:  Laura Fernandez
         *  @since: 16 de noviembre de 2018
         *  Descripción: Importar departamentos del examen
         */      

        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";
        
       $entradaOk = true; 
        try {
            $myBD = new PDO(DSN, USER, PASS);  
            $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (isset($_POST['Aceptar'])) { // si pulsamos aceptar iniciamos una transacion
                $myBD->beginTransaction(); 
                
                if (is_uploaded_file($_FILES['archivo']['tmp_name'])) { // vemos si el archivo fue subido para interpretar el fichero como objeto
                    $fichero = simplexml_load_file($_FILES["archivo"]["tmp_name"]); 
                    
                    if (!is_null($fichero)) { // si el fichero no es null preparamos la consulta y metemos los datos pasados
                        $consulta = $myBD->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)"); 
                        $consulta->bindParam(":codigo", $codigo); 
                        $consulta->bindParam(":descripcion", $descripcion); 
                        
                        foreach ($fichero as $departamento) { // creamos un bucle para introducir todos los datos
                            $codigo = $departamento->CodDepartamento; 
                            $descripcion = $departamento->DescDepartamento; 
                            if (!$consulta->execute()) { 
                                $entradaOk = false; 
                            }
                        }
                        
                        if ($entradaOk) { // si la entrada es buena
                            $myBD->commit();  // confirmamos la transacion
                            echo "<h2>Base de datos importada con exito</h2>";
                            echo "<h2>Los registros son: </h2>";

                             echo "<script>alert('Importado correctamente');window.location.href='login.php';</script>";
                        } else {
                            $myBD->rollBack(); // y si no revertimos los cambios
                            echo "<p>No pudo importarse la base de datos</p>";
                        }
                    }
                } else {
                    echo "<p>No se pudo cargar el archivo</p>";
                }
            } else {
                ?>
                <form style="text-align: center;" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                    Selecciona archivo
                    <input type="file" name="archivo"></br></br>

                    <input type="button" value="Cancelar" class="boton_personalizados" onclick="location = 'login.php'">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" name="Aceptar" class="boton_personalizado" value="Aceptar">

                </form>
                <?php
            }
        } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; 
        } finally {
            unset($myBD); 
        }
        
        ?>
       
               
    </body>
</html>
