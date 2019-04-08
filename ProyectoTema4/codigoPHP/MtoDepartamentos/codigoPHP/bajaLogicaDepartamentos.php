<!DOCTYPE html>
<html>
    <head>
        <title>Baja lógica departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <h1>Baja lógica Departamento</h1>           
        
        <?php
         error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author:  Laura Fernandez
         *  @since: 19 de noviembre de 2018
         *  Descripción: Baja lógica departamentos del examen
         */
      
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";
        
        //Coger la fecha actual y darselo como sugerencia
        setlocale(LC_TIME, 'es_ES.UTF-8'); // sacamos la hora para poder ponerla en la base de datos
        $fechaActual=strftime("%Y-%m-%d"); //le pasamos como queremos que nos muestre la hora
            
            $codigo=$_GET['CodDepartamento']; // cogemos el codigo 
             try {                           
                    $miDB = new PDO(DSN, USER, PASS); //iniciamos la variable pdo con los parametros de conexion
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//si sale algun errore que nos lo muestre
                    $buscar = $miDB->query("select * from Departamento where CodDepartamento='$codigo'"); //query para guardar el codigo del departamento
                    $datos = $buscar->fetchObject(); //fetchObject Recupera una fila de resultados como un objeto
                    $descripcion = $datos->DescDepartamento; // metemos la descripcion en la variable
                    $fechaDeBaja=$datos->FechaDeBaja; // metemos la fecha de baja en la variable
            if (isset($_POST['Aceptar'])) { //Si pulsamos aceptar haremos lo siguiente
                try{
                    $fechaDeBaja=$_POST['fechaDeBaja'];
                    $actualizar = $miDB->prepare("update Departamento set FechaDeBaja='$fechaDeBaja' where CodDepartamento=:codigo"); //query para actualizar la fecha de baja segun el codigo que ha sido dado de baja
                    $actualizar->bindParam(':codigo', $codigo); // bindParam Agrega variables a una sentencia preparada como parámetros
                    $actualizar->execute();//Realizamos la consulta de borrar
                }catch(PDOException $e){ // si surge un error en el formato de la fecha
                    echo "<script>alert('Formato no correcto: AAAA-MM-DD');window.location.href='login.php';</script>"; // sacamos el mensaje de error y le damos el formato
                }
                
                
                echo "<script>alert('DADO DE BAJA!!!');window.location.href='login.php';</script>"; // si esta todo bien lo indicamos
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
                                <td>Descripción</td>
                                <td><input type="text" name="descripcion" value="<?php echo $descripcion;?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Fecha de baja</td>
                                <td><input type="text" name="fechaDeBaja" id="fechaDeBaja" value="<?php echo $fechaActual; echo $_POST['fechaDeBaja'];?>" ></td>
                            </tr>                                   
                            <tr>
                                <td><input type="button" value="Cancelar" class="boton_personalizados" onclick="location = 'login.php'"></td>
                                <td><input type="submit" name="Aceptar" class="boton_personalizado" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            <?php
            }
        } catch (PDOException $error) { // y si algo va mal
            echo "<p>Error " . $error->getMessage() . "</p>"; //sacamos por pantalla el error
        } finally { // y por ultimo
            unset($baseDeDatos); //Se cierra la conexión con la base de datos.
        }
        ?>
    </body>
   
</html>

