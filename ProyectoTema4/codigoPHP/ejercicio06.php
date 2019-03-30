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
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 6</h1>	
        
         
       
        <?php
        error_reporting(E_ALL);
ini_set('display_errors', '0');

        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';
        include "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        
        
         $entradaOK = true;
        
        $num = 1;
        while ($num <= 3) { 
            $aErrores[$nDepto]['codDepartamento'] = null;
            $departamentosNuevo[$nDepto]['codDepartamento'] = null; 
            $aErrores[$nDepto]['descDepartamento'] = null; 
            $departamentosNuevo[$nDepto]['descDepartamento'] = null; 
            $num++; 
        }
        $numero = $num;
        if (isset($_POST['enviar'])) { 
            for ($numInsert = 1; $numInsert < $numero; $numInsert++) {
                $aErrores[$numInsert]['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_POST['codDepartamento' . $numInsert], 3, 3, 1); 
                $aErrores[$numInsert]['descDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_POST['descDepartamento' . $numInsert], 200, 3, 1); 
            }
            foreach ($aErrores as $num => $aRegistro) {
                foreach ($aRegistro as $nDepto => $nombre) {
                    if ($aErrores[$num][$nDepto] != null) {
                        $entradaOK = false; 
                        $_POST[$nDepto . $num] = ""; 
                    }
                }
            }
        } else {
            $entradaOK = false; 
        }
        if ($entradaOK) { 
            
            for ($numInsert = 1; $numInsert < $numero; $numInsert++) {
                $departamentosNuevo[$numInsert]['codDepartamento'] = strtoupper($_POST['codDepartamento' . $numInsert]); 
                $departamentosNuevo[$numInsert]['descDepartamento'] = $_POST['descDepartamento' . $numInsert]; 
            }
            try {
                $myBD = new PDO(DSN, USER, PASS); 
                $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p>Conexión correcta</p>";
                $consulta = $myBD->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)");
                for ($numInsert = 1; $numInsert < $numero; $numInsert++) { 
                    $codigo = $departamentosNuevo[$numInsert]['codDepartamento']; 
                    $descripcion = $departamentosNuevo[$numInsert]['descDepartamento']; 
                    $consulta->bindParam(":codigo", $codigo); 
                    $consulta->bindParam(":descripcion", $descripcion); 
                    if ($consulta->execute()) {
                        echo "<p>Se insertó el departamento con el código " . $codigo . "y con la descripcion: " . $descripcion . " </p></br>";
                        
                        
                    } else {
                        echo "<p>No se pudo insertar el departamento con el código " . $codigo . " </p>"; 
                    }
                }
            } catch (PDOException $error) {
                echo "<p>Error " . $error->getMessage() . "</p>"; 
            } finally {
                unset($myBD);
            }
        } else {
           
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div style="text-align:center;">
                    <table  style="margin: 0 auto;">
                        <tr>
                            <td>Código de departamento*</td>
                            
                            <?php for ($numInsert = 1; $numInsert < $numero; $numInsert++) { ?>
                                <td><input type="text" name="codDepartamento<?php echo $numInsert ?>" value="<?php echo $_POST['codDepartamento' . $numInsert] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numInsert]['codDepartamento'] . "</font>"; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Descripción de departamento*</td>
                            <?php for ($numInsert = 1; $numInsert < $numero; $numInsert++) { ?>
                                <td><input type="text" name="descDepartamento<?php echo $numInsert ?>" value="<?php echo $_POST['descDepartamento' . $numInsert] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numInsert]['descDepartamento'] . "</font>"; ?></td>
                            <?php } ?>
                        </tr>
                        <tr><td><input type="submit" name="enviar" value="enviar" class="boton"></td></tr>
                    </table>
                </div>                   
            </form>
        <?php } ?>
    <footer>
          <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


