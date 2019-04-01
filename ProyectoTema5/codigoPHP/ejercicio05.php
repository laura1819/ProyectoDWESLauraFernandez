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
        <h1>Ejercicio 5</h1>	



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
            $aErrores[$nDepto]['descDepartamento'] = null;
            
            $aFormulario[$nDepto]['codDepartamento'] = null;          
            $aFormulario[$nDepto]['descDepartamento'] = null;
            $num++;
        }
        $numero = $num;
        if (isset($_POST['enviar'])) {
            for ($nInserta = 1; $nInserta < $numero; $nInserta++) {
                $aErrores[$nInserta]['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_POST['codDepartamento' . $nInserta], 3, 3, 1);
                $aErrores[$nInserta]['descDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_POST['descDepartamento' . $nInserta], 200, 3, 1);
            }
            foreach ($aErrores as $num => $aRegisro) {
                foreach ($aRegisro as $nDepto => $nombre) {
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

            for ($nInserta = 1; $nInserta < $numero; $nInserta++) {
                $aFormulario[$nInserta]['codDepartamento'] = strtoupper($_POST['codDepartamento' . $nInserta]);
                $aFormulario[$nInserta]['descDepartamento'] = $_POST['descDepartamento' . $nInserta];
            }
            try {
                $myBD = new PDO(DSN, USER, PASS);
                $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
                $todoOk = true;
                $myBD->beginTransaction();
                $consulta = $myBD->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                for ($nInserta = 1; $nInserta < $numero; $nInserta++) {
                    $codigo = $aFormulario[$nInserta]['codDepartamento'];
                    $descripcion = $aFormulario[$nInserta]['descDepartamento'];
                    $consulta->bindParam(":codigo", $codigo);
                    $consulta->bindParam(":descripcion", $descripcion);
                    if (!$consulta->execute()) {
                        $todoOk = false;
                    }
                }
                if ($todoOk) {
                    $myBD->commit();
                    echo "<h2><b>Transacción ejecutada con éxito!!!</b></h2>";
                    echo "<h2>Los registros son los siguientes</h2>";
                    ?>
                    <div style="text-align:center;">
                        <table style="margin: 0 auto;"> 
                            <tr> 
                                <td><b><u>Código</u></b></td> 
                                <td><b><u>Descripción</u></b></td>

                            </tr>

                            <?php 
                            $consulta = $myBD->query("SELECT * FROM Departamento");
                            while ($registro = $consulta->fetchObject()) {
                                ?>
                                <tr>
                                    <td><?php echo $registro->CodDepartamento; ?></td>
                                    <td> <?php echo $registro->DescDepartamento; ?></td>
                                </tr>    
                            <?php } ?> 
                    </div>
                </table>


                <?php
            } else {
                $myBD->rollBack();
                echo "No pudo llevarse a cabo la transacción";
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
                <table style="margin: 0 auto;">
                    <tr>
                        <td>Código de departamento*</td>

    <?php for ($nInserta = 1; $nInserta < $numero; $nInserta++) { ?>
                            <td><input type="text" name="codDepartamento<?php echo $nInserta ?>" value="<?php echo $_POST['codDepartamento' . $nInserta] ?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$nInserta]['codDepartamento'] . "</font>"; ?></td>
    <?php } ?>
                    </tr>
                    <tr>
                        <td>Descripción de departamento*</td>

                        <?php for ($nInserta = 1; $nInserta < $numero; $nInserta++) { ?>
                            <td><input type="text" name="descDepartamento<?php echo $nInserta ?>" value="<?php echo $_POST['descDepartamento' . $nInserta] ?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$nInserta]['descDepartamento'] . "</font>"; ?></td>
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


