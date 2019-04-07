<!DOCTYPE html>
<html>
    <head>
        <title>Rehabilitación departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <h1>Rehabilitacion Departamento</h1>           
        
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author:  Laura Fernandez
         *  @since: 19 de noviembre de 2018
         *  Descripción: Rehabilitación departamentos del examen
         */                          
        
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";
        
            $codigo=$_GET['CodDepartamento'];
             try {                           
                    $miDB = new PDO(DSN, USER, PASS); //iniciamos la variable pdo y le pasamos los parametros de conexion
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// si salta algun error que nos de el codigo
                    $buscar = $miDB->query("select * from Departamento where CodDepartamento='$codigo'"); //hacemos un query y guardamos su consulta
                    $datos = $buscar->fetchObject(); // fetchObject Recupera una fila de resultados como un objeto
                    $descripcion = $datos->DescDepartamento; //variable para la descripcion 
                    $fechaDeBaja=$datos->FechaDeBaja; // variable para la fecha de baja
                    
                    $actualizar = $miDB->prepare("update Departamento set fechaDeBaja='0001-01-01' where CodDepartamento=:codigo"); // quwery para actualuizar la fecha de baja
                    $actualizar->bindParam(':codigo', $codigo); // bindParam Agrega variables a una sentencia preparada como parámetros
                    $actualizar->execute();//Realizamos la consulta de borrar
                    
                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                        <p>Estas seguro que quieres rehabilitar este registro?</p>              
                        <input type="button" name="cancelar" value="Cancelar" onclick="location='../login.php'">
                        <input type="submit" name="Aceptar" value="Aceptar">    
                    </form>
        
                    <?php
                    if(isset($_POST['Aceptar'])){
                        echo "<script>alert('REHABILITADO!!!!');window.location.href='../login.php';</script>";
                    }
                    
                    
                   
                    
        } catch (PDOException $error) { // y si sale algun error
            echo "<p>Error " . $error->getMessage() . "</p>"; // mostramos el mensaje de error
            unset($baseDeDatos); //cerramos la conexion
        }
        ?>        
    </body>
</html>

