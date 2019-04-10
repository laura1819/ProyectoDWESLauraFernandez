<!DOCTYPE html>
<html>
    <head>
        <title>Añadir departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/estilos.css" type="text/css"/>

    </head>
    <body>
        <h1>Añadir Departamento</h1><br><br>           

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '0');
        /*
         *  @author: Laura Fernandez
         *  @since: 12 de noviembre de 2018
         *  Descripción: Añadir departamentos - examen
         */
        require "../core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "../config/configBDD.php";


        define("OBLIGATORIO", 1); //Definimos las constantes para la conexion a la base de datos
        define("NOOBLIGATORIO", 0);    //Definimos las constantes para la conexion a la base de datos
        define("LONGMINALFABETICO", 3);  //Definimos las constantes para la conexion a la base de datos

        $entradaOK = true; // ponemos la entrada a true

        $aFormulario = [//array con los campos del formulario
            codigo => null, // gusradar el valor del campo cuando es correcto
            nombre => null  //gusradar el valor del campo cuando es correcto
        ];

        $aErrores = [// array para almacenar los posibles errores
            codigo => null, //Guarda posibles errores en el campo codigo.
            nombre => null //Guarda posibles errores en el campo nombre.
        ];
        try {
            $miDB = new PDO(DSN, USER, PASS); //Conexión a la base de datos con PDO


            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // por si se produce algun error
            if (isset($_POST['Aceptar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.            
                $aErrores[codigo] = validacionFormularios::comprobarAlfabetico($_POST['codigo'], 3, LONGMINALFABETICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[nombre] = validacionFormularios::comprobarAlfaNumerico($_POST['nombre'], 100, LONGMINALFABETICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.

                $codigoBusqueda = $_POST['codigo'];
                $consulta = $miDB->query("select * from Departamento where CodDepartamento='$codigoBusqueda'"); // query para buscar el departameto con el que metamos
                if ($consulta->rowCount() != 0) { // si se ha encontrado algun codigo asi
                    $aErrores[codigo] = "Codigo de departamento ya existente"; // mostramos un error con que ya existe 
                }

                foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
                    if ($error != null) { // si no esta bien
                        $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                        $_POST[$campo] = "";
                    }
                }
            } else { // si no pulsamos aceptar entonces la entrada la ponemos a false
                $entradaOK = false; // entrada a false
            }
            if ($entradaOK) { //si todo esta bieny nada ha dado error mostramos            
                $insertar = $miDB->prepare('INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES (:codigo,:nombre)');    //realizamos el query para meter los datos
                $insertar->bindParam(':codigo', $_POST['codigo']);   //  cogemos el codigo
                $insertar->bindParam(':nombre', $_POST['nombre']);   //cogemos el nombre

                $insertar->execute();   //Ejecutamos el prepare                
                Header("Location: logind.php"); // mandamos en la cabezera al index
            } else { // si no es correcto mandamos que salga de nuevo el formulario
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table>                        
                            <tr>
                                <td>Código de departamento:</td>
                                <td><input type="text" id="codigo"  name="codigo" size="3"  value="<?php echo $_POST['codigo']; ?>">
                                    <?php
                                    echo "<font color='#FF0000' size='1px'>$aErrores[codigo]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Descripción del departamento:</td>
                                <td><input name="nombre"  id="nombre" value="<?php echo $_POST['nombre']; ?>">
                                    <?php
                                    echo "<font color='#FF0000' size='1px'>$aErrores[nombre]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                    ?>
                                </td>
                            </tr>  
                            <tr><td></td><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td><input type="button" value="Cancelar" class="boton_personalizados" onclick="location = 'logind.php'">
                                    <input type="submit" name="Aceptar" class="boton_personalizado" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>

                </form>
                <?php
            }
        } catch (PDOException $e) { // si tenemos algun error
            print "Error de: " . $e->getMessage() . "<br/>";    // sacamos por pantalla el mensaje de error
            die();
        } finally { // y por ultimo
            unset($miDB); // cerramos la conexion con la base de datos
        }
        ?>        
    </body>
</html>
