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
        <h1>Ejercicio 3</h1>		
       
        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/3019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';
        include "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        
        $entradaOk = true;
        $aFormulario = [
            'codigo' => "",
            'descripcion' => ""
        ];

        $aErrores = [
            'codigo' => "",
            'descripcion' => ""
        ];
        
         try {
                $myBD = new PDO(DSN, USER, PASS);
                
                $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['enviar'])) {
            $aErrores['codigo'] = validacionFormularios::comprobarAlfabetico($_POST['codigo'], 3, 3, 1);
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfabetico($_POST['descripcion'], 255, 3, 1);
            
            
             $codigoBusqueda = $_POST['codigo']; 
                $duplicado = $myBD->query("SELECT * FROM Departamento WHERE CodDepartamento='$codigoBusqueda'"); 
                if ($duplicado->rowCount() != 0) { 
                    $aErrores['codigo'] = "Codigo de departamento ya existente"; 
                }

            foreach ($aErrores as $campo => $error) {
                if ($error != null) {
                    $entradaOk = false;
                    $_POST[$campo] = "";
                }
            }
        } else {
            $entradaOk = false;
        }
        if ($entradaOk) {
           

                $consulta = $myBD->prepare("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:cod,:desc)");
                $consulta->bindParam(':cod', $_POST['codigo']);
                $consulta->bindParam(':desc', $_POST['descripcion']);

                $consulta->execute();
                
               

                $datos = $myBD->query("SELECT * FROM Departamento");
                echo "<h3><u><strong>Se ha insertado correctamente</strong></u> </h3>";
                echo "<b>El codigo: </b>" . $_POST['codigo'] . "</br>";
                echo "<b>Con la descripcion: </b>" . $_POST['descripcion'] . "</br>";
                echo "<h3><u>Los registros de la tabla Departamento son: </u></h3>";

                while ($registros = $datos->fetchObject()) {
                     echo  "<b>Codigo de departamento</b>: " . $registros->CodDepartamento . "</br>";
                     echo "<b>Descripcion de departamento</b>: " . $registros->DescDepartamento .  "</br></br>";
                }
                
                
            
            
        } else {
            ?>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <b>Codigo del departamento :</b> <input type="text" name="codigo" value="<?php
                               if (isset($_POST['codigo']) && is_null($aErrores['codigo'])) {
                                   echo $_POST['codigo'];
                               }
                               ?>">* <label style='color: red;'><?php echo $aErrores['codigo']; ?> </label></br></br>
                <b>Descrip de departamento : </b><input type="text" name="descripcion" style="WIDTH: 328px;"  value="<?php
                               if (isset($_POST['descripcion']) && is_null($aErrores['descripcion'])) {
                                   echo $_POST['descripcion'];
                               }
                               ?>">* <label style='color: red;'><?php echo $aErrores['descripcion']; ?> </label></br></br>
                <input type="submit" name="enviar" value="enviar">
            </form>
        <?php
        }
        } catch (PDOException $exc) {
                echo $exc->getMessage();
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






