<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }

        </style>
    </head>
    <body>
        <h1>Ejercicio 7</h1>	</br></br>
        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/3019
          Comentarios: conexion a la base de datos
         */
        include '../config/configBD.php';
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
                            echo "<h2>Base de datos importada con éxito</h2>";
                            echo "<h2>Los registros son: </h2>";

                            $consulta = $myBD->query("SELECT * FROM Departamento"); // mostramos los registros
                            while ($registro = $consulta->fetchObject()) {
                                echo "<b>Codigo de departamento</b>: " . $registro->CodDepartamento . "</br>";
                                echo "<b>Descripcion de departamento</b>: " . $registro->DescDepartamento . "</br></br>";
                            }
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
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                    Selecciona archivo
                    <input type="file" name="archivo"></br></br></br></br>

                    <input type="button" value="Cancelar" onclick="location = '../indexProyectoTema4.php'">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" name="Aceptar" value="Aceptar">

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
    <footer>
          <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>