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
            table td{
               padding-left: 40px;
            
            }
            
           

        </style>
    </head>
    <body>
        <h1>Ejercicio 2</h1>	


        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';

        try {
            $myBD = new PDO(DSN, USER, PASS);
            $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h3>La conexion se ha realizado con exito!</h3> </br>";
            $consulta = $myBD->query("SELECT * FROM Departamento");
        } catch (PDOException $exc) {
            echo "Error" . $exc->getMessage();
        } finally {
            unset($myBD);
        }
        ?>
        <div style="text-align:center;">
        <table style="margin: 0 auto;"> 
            <tr> 
                <td><b>Código</b></td> 
                <td><b>Descripción</b></td>
               
            </tr>

<?php while ($registro = $consulta->fetchObject()) {
    ?>
                <tr>
                    <td><?php echo $registro->CodDepartamento ; ?></td>
                    <td> <?php echo $registro->DescDepartamento ; ?></td>
                </tr>    
            <?php } ?> 
        </div>
        </table>
    </body>
    <footer>
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        Volver al Index           
        <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
    </footer>
</html>





