<<!DOCTYPE html>
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
        <h1>Ejercicio 5</h1>	
        
         
       
        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/3019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';
        include "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        
        
        $entradaOK = true;
        
        $inicio = 1;
        while ($inicio <= 3) { 
            $aErrores[$nDepto]['codDepartamento'] = null; 
            $aErrores[$nDepto]['descDepartamento'] = null; 
            
            $aFormulario[$nDepto]['codDepartamento'] = null;             
            $aFormulario[$nDepto]['descDepartamento'] = null; 
            
            $inicio++; 
        }
        $inicioero = $inicio;
        if (isset($_POST['enviar'])) { 
            for ($insercion = 1; $insercion < $inicioero; $insercion++) {
                $aErrores[$insercion]['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_POST['codDepartamento' . $insercion], 200,3,1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[$insercion]['descDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_POST['descDepartamento' . $insercion],200,3,1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.    
            }
            foreach ($aErrores as $inicio => $aRegistro) {
                foreach ($aRegistro as $nDepto => $nombre) {
                    if ($aErrores[$inicio][$nDepto] != null) {
                        $entradaOK = false; 
                        $_POST[$nDepto . $inicio] = ""; 
                    }
                }
            }
        } else {
            $entradaOK = false; 
        }
        if ($entradaOK) { 
            
            for ($insercion = 1; $insercion < $inicioero; $insercion++) {
                $aFormulario[$insercion]['codDepartamento'] = strtoupper($_POST['codDepartamento' . $insercion]); 
                $aFormulario[$insercion]['descDepartamento'] = $_POST['descDepartamento' . $insercion]; 
            }
            try {
                $myBD = new PDO(DSN, USER, PASS); 
                $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                $todoOk = true; 
                $myBD->beginTransaction(); 
                $consulta = $myBD->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                for ($insercion = 1; $insercion < $inicioero; $insercion++) { 
                    $codigo = $aFormulario[$insercion]['codDepartamento']; 
                    $descripcion = $aFormulario[$insercion]['descDepartamento']; 
                    $consulta->bindParam(":codigo", $codigo); 
                    $consulta->bindParam(":descripcion", $descripcion); 
                    if (!$consulta->execute()) { 
                        $todoOk = false; 
                    }
                }
                if ($todoOk) {
                    $myBD->commit(); 
                    echo "Transacción ejecutada con éxito";
                    echo "Los registros son los siguientes: </br></br>";
                            $consulta = $myBD->query("SELECT * FROM Departamento"); // mostramos los registros
                            while ($registro = $consulta->fetchObject()) {
                                echo "<b>Codigo de departamento</b>: " . $registro->CodDepartamento . "</br>";
                                echo "<b>Descripcion de departamento</b>: " . $registro->DescDepartamento . "</br></br>";
                            }
                    
                    
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
                
                           Código de departamento*
                            
                            <?php for ($insercion = 1; $insercion < $inicioero; $insercion++) { ?>
                                <td><input type="text" name="codDepartamento<?php echo $insercion ?>" value="<?php echo $_POST['codDepartamento' . $insercion] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$insercion]['codDepartamento'] . "</font>"; ?></td>
                            <?php } ?></br></br>
                       
                                Descripción de departamento* 
                            
                            <?php for ($insercion = 1; $insercion < $inicioero; $insercion++) { ?>
                                <td><input type="text" name="descDepartamento<?php echo $insercion ?>" value="<?php echo $_POST['descDepartamento' . $insercion] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$insercion]['descDepartamento'] . "</font>"; ?></td>
                            <?php } ?></br></br>
                      
                        <input type="submit" name="enviar" value="enviar" class="boton">
                                  
            </form>
         <?php } ?>
    <footer>
          <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


