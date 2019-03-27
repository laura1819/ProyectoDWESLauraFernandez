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
        <h1>Ejercicio 1</h1>		

        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/3019
          Comentarios: conexion a la base de datos
         */
        
            include '../config/configBD.php'; 
        
            echo "<h3>CONEXION REALIZADA CORRECTAMENTE</h3>";
            try { 
           $myBD = new PDO(DSN,USER,PASS);
           $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion realizada correctamente";
            
            echo "<h4>Atributos de la conexion</h4>";
            
            
            $atributos = array(
                "AUTOCOMMIT", 
                "ERRMODE", 
                "CASE", 
                "CLIENT_VERSION", 
                "CONNECTION_STATUS",
                "ORACLE_NULLS", 
                "PERSISTENT", 
                "SERVER_INFO", 
                "SERVER_VERSION"             
            );
            
            
            foreach ($atributos as $valores) {
                echo "PDO::ATTR_$valores: ";
                echo $myBD->getAttribute(constant("PDO::ATTR_$valores")) . "<br>"; 
            }
            
            
            
            
            
        } catch (PDOException $exc) { 
            echo "El error es: " . $exc->getMessage();
        }finally{ 
            unset($myBD);
        }
        
        echo "<h3>CONEXION REALIZADA CON UN PARAMETRO MAL</h3>";
                
         
            try { 
           $myBD = new PDO(DSN,USERR,PASS);
           $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion realizada correctamente";
            
            
            
        } catch (PDOException $exc) { 
            echo "El error es: " . $exc->getMessage();
        }finally{ 
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




