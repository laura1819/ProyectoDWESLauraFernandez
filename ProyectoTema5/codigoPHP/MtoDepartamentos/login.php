
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/login.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

      
    </head>
    <body>
        <h1>Ejercicio LoginLogoff</h1>	



        <?php
        /*
          Autor: Laura Fernandez
          Fecha 01/03/2019
          Comentarios: conexion a la base de datos
         */


        require "core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "config/configuracionDB.php";




        $entradaOK = true; // ponemos la entrada a true 

        $aFormulario = [// iniciamos un array con los campos del formulario 
            'usuario' => null, // con el campo nombre 
            'contraseña' => null   //  con el campo de la contraseña 
        ];

        $aErrores = [// creamos un array de errores con los campos del formulario 
            'usuario' => null, // con el campo del nombre 
            'contraseña' => null  // con el campo de la contraseña 
        ];
        
        if(isset($_POST['Registro'])){
            Header("Location: codigoPHP/registro.php");
        }
        
        try {
            $miDB = new PDO(DSN, USER, PASS);               //creamos una variable para la conexion a la bd pdo 

            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hay algun error que lo muestre 


            if (isset($_POST['Aceptar'])) { // si pulsamos en aceptar
                $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_POST['usuario'], 15, 2, 1); // validamos el campo con la libreria de formularios
                $aErrores['contraseña'] = validacionFormularios::comprobarAlfaNumerico($_POST['contraseña'], 250, 2, 1);  // validamos el campo con la libreria de formularios


                $usuario = $_POST['usuario']; // creamos una variable para guardar el usuario 


                $contraseña = hash('sha256', $_POST['contraseña']); // creamos una variable para guardar la contraseña 


                $result = $miDB->query("SELECT * FROM usuario WHERE CodUsuario='$usuario' and pass='$contraseña'"); // hacemos una consulta para ver que coinciden los datos con los dela bd 

                if ($result->rowCount() == 0) { //si no coindicen 
                    $aErrores['usuario'] = "No existe este usuario con esta contraseña"; //mostramos un mensaje de error
                    $aErrores['contraseña'] = "No existe esta contraseña, para este usuario"; //mostramos un mensaje de error
                    $entradaOK = false;               // y ponemos la entrada a false     
                }


                foreach ($aErrores as $campo => $error) {  // recorremos en busca de algun error 
                    if ($error != null) {     // si tenemos algun error 
                        $entradaOK = false; // ponemos la entrada a false 
                        $_POST[$campo] = ""; // limpiamos los campos
                    }
                }
            } else { // y si no  
                $entradaOK = false; // ponemos la entrada a false
            }
            
           
            
            if ($entradaOK) { // si la entrada es correcta 
                session_start(); // iniciamos la sesion 

                $_SESSION['usuario_DAW210_Login'] = $_POST['usuario']; //guaradmos el valor de usuario en la variable sesion 


                $query = "select * from usuario where CodUsuario=:CodUsuario"; // hacemos una consulta para que el usuario sea el mismo
                $result = $miDB->prepare($query); // preparamos la consulta 
                $result->bindParam(':CodUsuario', $_POST['usuario']); //cogemos el campo usuario con el de la base de datos 
                $result->execute(); //ejecutamos la consulta 
                


                $valores = $result->fetchObject(); // recogemos los campos necesarios
                $visitas = $valores->numVisitas; // creamos una variable con las vosotas que ira al campo de la bd 
                $ultConexion = $valores->fecha; // creamos una variable con la ultima conexion que ira al campo de la bd 


                $_SESSION['visitas_DAW210_Login'] = $visitas;
                $_SESSION['ultConexion_DAW210_Login'] = $ultConexion;

             

                $query = "update usuario set numVisitas=numVisitas+1, fecha=:fechaActual where CodUsuario=:CodUsuario"; // hace una consulta para actualizar las visitas y la fecha 
                $result = $miDB->prepare($query); //prepara la consulta                 

                $fechaActual = new DateTime(); // crea un objeto datetime para la variable que vamos a utilizar 
                $result->bindParam(':fechaActual', $fechaActual->getTimestamp()); // guarda la fecha                

                $result->bindParam(':CodUsuario', $_POST['usuario']); // busca que coincida el usuairo con el de la bd 
                $result->execute(); // ejecutamos la consulta 


                Header("Location: codigoPHP/programa.php"); // y vamos a la pantalla de navegacion 
            } else {
                ?>


                <div class="login-page">
                    <div class="form">

                        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="text" placeholder="username" name="usuario" id="usuario" value="<?php
                            if (isset($_POST['usuario']) && is_null($aErrores['usuario'])) {
                                echo $_POST['usuario'];
                            }
                            ?>"/>
                            <input type="password" placeholder="password" name="contraseña" id="contraseña" value="<?php
                            if (isset($_POST['contraseña']) && is_null($aErrores['contraseña'])) {
                                echo $_POST['contraseña'];
                            }
                            ?>"/>
                            <input style="background-color:#1E5799;" type="submit" class="boton" name="Aceptar" value="Aceptar" >
                            <input type="submit" style="background-color:#1E5799;"  name="Registro" value="Registrarse" >

                        </form>
                    </div>
                </div>
                <?php
            }
        } catch (PDOException $e) { // si se produce algun error 
            print "Error de: " . $e->getMessage() . "<br/>";    // saca el mensaje de error  
            die(); // muere la sesion 
        } finally { // por ultimo 
            unset($miDB); // cierra la conexion con la base de datos
        }
        ?>
        <footer>
            <a href="../../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../../indexProyectoTema5.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


