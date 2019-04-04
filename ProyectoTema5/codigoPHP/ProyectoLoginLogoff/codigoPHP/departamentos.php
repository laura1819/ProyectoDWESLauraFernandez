<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/programa.css"/>
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
        
        
        
        <?php
        $aErrores = [
            'descripcion' => ""
        ];

        $aFormulario = [
            'descripcion' => ""
        ];
        ?>
        <h1>Buscar departamentos</h1>	



        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBDD.php';
        include "../core/181025validacionFormularios.php"; //Incluye la librería de validación.





        $entradaOk = true;
        
        if (isset($_POST['Volver'])) {  // si no le damos a volver que nos muestre las variables            
              
                Header("Location: programa.php"); // nos vamos al apartado de navegacion
            }

        if (isset($_POST['enviar'])) {
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfanumerico($_POST['descripcion'], 255, 1, 0);

            foreach ($aErrores as $campo => $error) {
                if ($error != null) {
                    $entradaOk = false;
                    $_POST[$campo] = "";
                }
            }
        } else {
            $entradaOk = false;
        }
        ?>
 <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <b>Introduce Descripcion :</b> <input type="text" name="descripcion" 
                                                  value='<?php
                                                  if (isset($_POST['descripcion']) && is_null($aErrores['descripcion'])) {
                                                      echo $_POST['descripcion'];
                                                  }
                                                  ?>'
                                                  style="WIDTH: 328px;"><label style='color: red;'><?php echo $aErrores['descripcion']; ?></label>

            <input type="submit" name="enviar" value="buscar">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" name="Volver" value="Volver">
            
     
        </form>
 </div>
        <?php
        try {
            $myBD = new PDO(DSN, USER, PASS);




            if ($entradaOk) {
                $aFormulario['descripcion'] = $_POST['descripcion'];


                $consulta = $myBD->query("select * from Departamento where DescDepartamento like '%$aFormulario[descripcion]%' or DescDepartamento like '$aFormulario[descripcion]%' or DescDepartamento like '%$aFormulario[descripcion]'");

                if ($consulta->rowCount() == 0) {
                    echo "<label style='color: red;'>No hay ningun registro con esa descripcion</label>";
                } else {


                    echo "<b>Registros encontrados : </b>" . $consulta->rowCount() . "</br></br>";
                }
                ?>

                <div style="text-align:center;">
                    <table style="margin: 0 auto;"> 
                        <tr> 
                            <td><b><u>Código</u></b></td> 
                            <td><b><u>Descripción</u></b></td>

                        </tr>

                        <?php
                        while ($registros = $consulta->fetchObject()) {
                            ?>
                            <tr>
                                <td><?php echo $registros->CodDepartamento; ?></td>
                                <td> <?php echo $registros->DescDepartamento; ?></td>
                            </tr>  



                        <?php } ?> 
                </div>
            </table>

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


