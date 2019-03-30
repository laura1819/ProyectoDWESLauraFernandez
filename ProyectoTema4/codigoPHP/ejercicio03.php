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
             h1{
                font-family: 'Charmonman', cursive;
            }
             table {
                width: 800px;
                border-collapse: collapse;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
            }

            th,
            td {
                padding: 15px;
                background-color: rgba(255,255,255,0.2);
                color: #fff;
            }

            th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 3</h1>	


        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
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

                
            } else {
                ?>


                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <b>Codigo del departamento :</b> <input size=3 type="text" name="codigo" value="<?php
        if (isset($_POST['codigo']) && is_null($aErrores['codigo'])) {
            echo $_POST['codigo'];
        }
        ?>">* <label style='color: red;'><?php echo $aErrores['codigo']; ?> </label></br></br>
                    <b>Descrip de departamento : </b><input type="text" name="descripcion" style="WIDTH: 328px;"  value="<?php
                    if (isset($_POST['descripcion']) && is_null($aErrores['descripcion'])) {
                        echo $_POST['descripcion'];
                    }
                    ?>">* <label style='color: red;'><?php echo $aErrores['descripcion']; ?> </label></br></br>
                    <input type="submit" name="enviar" value="Insertar"></br></br>
                    </br></br>
                </form>
        <?php } ?>
        
                <div style="text-align:center;">
                    <table style="margin: 0 auto;"> 
                        <tr> 
                            <td><b><u>Código</u></b></td> 
                            <td><b><u>Descripción</u></b></td>

                        </tr>

        <?php 
        $datos = $myBD->query("SELECT * FROM Departamento");
        while ($registros = $datos->fetchObject()) {
            ?>
                     <tr>
                                <td><?php echo $registros->CodDepartamento; ?></td>
                                <td> <?php echo $registros->DescDepartamento; ?></td>
                            </tr>  
                
            
                                
        <?php } ?> 
                </div>
            </table>
                        <?php
                    
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






