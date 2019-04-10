<!DOCTYPE html>
<html>
    <head>
        <title>Ver departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <h1>Ver Departamento</h1>           
       
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author: Laura Fernandez
         *  @since: 14 de noviembre de 2018
         *  Descripción: Borrar departamentos del examen
         */
             
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";
       
            $codigo=$_GET['CodDepartamento']; //guardar con get
             try {                   
                    $miDB = new PDO(DSN, USER, PASS);  //variable para guardar los parametros de la conexion en pdo
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//si tenemos algun error que lo muestre
                    $buscar = $miDB->query("select * from Departamento where CodDepartamento='$codigo'"); //guardamos en la variable el resultado del query
                    $datos = $buscar->fetchObject(); //fetchObject Recupera una fila de resultados como un objeto
                    $descripcion = $datos->DescDepartamento; // variable para guardar la descripcion
                    $FechaDeBaja=$datos->FechaDeBaja; // variable para guardar la fecha de baja
            if (isset($_POST['Aceptar'])) { //y si se pusa el boton de aceptar             
                
                Header("Location: logind.php");// mandamos a la cabezera en index para que nos dirija alli
                
            } else { // y si no mostramos otra vez 
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?CodDepartamento=' . $_GET['CodDepartamento']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="codigo" value="<?php echo $codigo; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Descripción</td>
                                <td><input type="text" name="descripcion" value="<?php echo $descripcion; ?>" disabled></td>
                            </tr>
                            <?php
                                if($FechaDeBaja!='0001-01-01'){
                                    ?>
                                    <tr>
                                        <td>Fecha de baja</td>
                                        <td><input type="text" name="FechaDeBaja" value="<?php echo $FechaDeBaja;?>" disabled></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            <tr>
                                <td><input type="submit" name="Aceptar" class="boton_personalizado" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
        } finally {
            unset($baseDeDatos); //Se cierra la conexión con la base de datos.
        }
        ?>
    </body>
   
</html>
