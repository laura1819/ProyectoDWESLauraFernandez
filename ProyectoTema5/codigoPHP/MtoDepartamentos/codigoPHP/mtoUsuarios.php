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
        <h1>Mantenimiento de usuarios</h1>


        <?php
        
        include "../config/configuracionDB.php";
        
        session_start(); // iniciamos la sesion

        
        if (!isset($_SESSION['usuario_DAW210_Login'])) { // si la sesion que queremos iniciar no existe
            Header("Location: ../login.php"); // te manda directamente al login
        }
         
        
        if(isset($_POST['salir'])){
             Header("Location: programa.php");
        }
        
        try {
            $myBD = new PDO(DSN, USER, PASS);
            $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $consulta = $myBD->query("SELECT * FROM usuario");
        } catch (PDOException $exc) {
            echo "Error" . $exc->getMessage();
        } finally {
            unset($myBD);
        }
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
        <input type="submit" name="salir" value="salir" class="boton_personalizados">
          </form>
        <div style="text-align:center;">
        <table style="margin: 0 auto;"> 
            <tr> 
                <td><b><u>usuario</u></b></td> 
                <td><b><u>Descripción</u></b></td>
               
            </tr>

<?php while ($registro = $consulta->fetchObject()) {
    ?>
                <tr>
                    <td><?php echo $registro->codUsuario ; ?></td>
                    <td> <?php echo $registro->descripcion ; ?></td>
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

