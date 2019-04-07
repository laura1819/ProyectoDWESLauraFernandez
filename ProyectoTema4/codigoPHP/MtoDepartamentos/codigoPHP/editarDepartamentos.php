<!DOCTYPE html>
<html>
    <head>
        <title>Editar departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
        
    </head>
    <body>
        <h1>Editar Departamento</h1>           
        
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author:  Laura Fernandez
         *  @since: 14 de noviembre de 2018
         *  Descripción: Editar departamentos del examen
         */                       
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";
        
            $codigo=$_GET['CodDepartamento']; //guardar con get
             try {                           
                    $miDB = new PDO(DSN, USER, PASS); //variable para pasar los parametros de conexion con pdo
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//si tenemos algun errror que lo muestre
                    $buscar = $miDB->query("select * from Departamento where CodDepartamento='$codigo'"); //guardamos en la variable el resultado de la consulta
                    $datos = $buscar->fetchObject(); //fetchObject Recupera una fila de resultados como un objeto
                    $descripcion = $datos->DescDepartamento; //variable para meter la descripcion
                    $fechaDeBaja=$datos->FechaDeBaja; // variable para meter la fecha de baja
            if (isset($_POST['Aceptar'])) { //si pulsamos el boton de aceptar
                
                $desc=$_POST['descripcion']; // guardar con post
                $actualizar = $miDB->prepare("update Departamento set DescDepartamento='$desc' where CodDepartamento=:codigo");  // variable para guardar la consulta de la actualizacion 
                $actualizar->bindParam(':codigo', $codigo); // bindParam Agrega variables a una sentencia preparada como parámetros
                $actualizar->execute();//realizamos la consulta
                
                Header("Location: ../login.php");// que nos mande a la cabezera al index al terminar
                
            } else {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?CodDepartamento=' . $_GET['CodDepartamento']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Codigo</td>
                                <td><input type="text" name="codigo" value="<?php echo $codigo; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Descripcion</td>
                                <td><input type="text" name="descripcion" id="descripcion"  value="<?php echo $descripcion; echo $_POST['descripcion'];?>"></td>
                            </tr>
                            <?php
                                if($fechaDeBaja!='0001-01-01'){
                                    ?>
                                    <tr>
                                        <td>Fecha de baja</td>
                                        <td><input type="text" name="fechaDeBaja" value="<?php echo $fechaDeBaja;?>" disabled></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            <tr>
                                <td><input type="button" value="Cancelar" onclick="location = '../login.php'"></td>
                                <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            <?php
            }
        } catch (PDOException $error) { // y si tenemos algun error
            echo "<p>Error " . $error->getMessage() . "</p>"; //sacamos el mensaje por pantalla para ver el error
        } finally { // y por ultimo
            unset($baseDeDatos); //cerramos la conexion con la base de datos
        }
        ?>
    </body>
   
</html>
