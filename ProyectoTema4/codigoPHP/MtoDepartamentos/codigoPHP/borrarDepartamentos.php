<!DOCTYPE html>
<html>
    <head>
        <title>Borrar departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <h1>Borrar Departamento</h1>           
        
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author:  Laura Fernandez
         *  @since: 14 de noviembre de 2018
         *  Descripción: Borrar departamentos del examen
         */
         require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";   
       
            $codigo=$_GET['CodDepartamento']; // variable para meter el codigo del departamento
             try {                   
                    $miDB = new PDO(DSN, USER, PASS); //variable para meter la conexion pdo con la base de datos
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// si tenemos algun error lo sacamos 
                    $buscar = $miDB->query("select * from Departamento where CodDepartamento='$codigo'"); //guarddamos en l avariable el resultado del query
                    $datos = $buscar->fetchObject(); //fetchObject Recupera una fila de resultados como un objeto
                    $descripcion = $datos->DescDepartamento; // vatiable para meter la descripcion
            
            if (isset($_POST['Aceptar'])) { // si se pulsa el boton de aceptar
                
                $borrar = $miDB->prepare("delete from Departamento where CodDepartamento=:codigo");  //query para borrar por el codigo que hemos elegido
                $borrar->bindParam(':codigo', $codigo);  // codigo del departamento elegido 
                $borrar->execute();//Realizamos la consulta de borrar
                
                Header("Location: ../login.php");// poner en la cabezera el index para que nos redirecione
                
            } else {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?CodDepartamento=' . $_GET['CodDepartamento']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="codigo" value="<?php echo $codigo; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Descripcion</td>
                                <td><input type="text" name="descripcion" value="<?php echo $descripcion; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="Cancelar" onclick="location = '../login.php'"></td>
                                <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            <?php
            }
        } catch (PDOException $error) { // y si da algun error
            echo "<p>Error " . $error->getMessage() . "</p>"; // sacamos por pantalla el error
        } finally { // y por ultimo
            unset($baseDeDatos); // cerramos la conexion con la base de datos
        }
        ?>
    </body>
    
</html>
