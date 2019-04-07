
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/loginb.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">


    </head>
    <style>
         img{
            width:25px;
        }
    </style>
    <body>
        <h1>Ejercicio Mto. Departamentos</h1>	



        <?php
        /*
          Autor: Laura Fernandez
          Fecha 01/03/2019
          Comentarios: conexion a la base de datos
         */

        error_reporting(E_ALL);
        ini_set('display_errors', '0');

        require "core/181025validacionFormularios.php"; // incluimos la libreria de validacion
        require "config/configBDD.php";






        $miDB = new PDO(DSN, USER, PASS);               //creamos una variable para la conexion a la bd pdo 

        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hay algun error que lo muestre 

        
        ?>

         <div style="text-align:center;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <div>
                <table style="margin: 0 auto;">                                               
                    <tr>
                        <td>Introduzca una parte de la descripción a buscar:</td>
                        <td><input type="text" name="nombre" value="<?php
                                                  if (isset($_POST['nombre'])) {
                                                      echo $_POST['nombre'];
                                                  }
                                                  ?>">                               
                        </td>
                        <td><input type="submit" name="Buscar" value="Buscar"></td>
                    </tr>                        
                </table>   
                <input type="radio" name="Buscar" id="Alta" value="Alta"<?php if ($_POST['Buscar'] == "Alta") {
            echo "checked";
        } ?>>Alta
                <input type="radio" name="Buscar" id="Baja" value="Baja" <?php if ($_POST['Buscar'] == "Baja") {
            echo "checked";
        } ?>>Baja
                <input type="radio" name="Buscar" id="Todos" value="Todos" <?php if ($_POST['Buscar'] == "Todos" || $_POST['Buscar'] == null) {
            echo "checked";
        } ?>>Todos
            </div>

        </form> 
        <a href="codigoPHP/anadirDepartamentos.php"><button name="Añadir" value="Añadir">Añadir</button></a>
        <a href="codigoPHP/importarDepartamentos.php"><button name="Importar" value="Importar">Importar</button></a>
        <a href="codigoPHP/exportarDepartamentos.php"><button name="Exportar" value="Exportar">Exportar</button></a> <br><br>          
        <table class="tabla_datos" style="margin: 0 auto;">
            <tr>
                <th>Código</th>
                <th>Descripción</th> 
                <th>Opciones</th>
            </tr>
            <?php
      $nombre = $_POST['nombre'];
        
        $aFormulario = [    // iniciamos un array para los campos del formulario 
            'nombre' => null  //metemos el valor del campo    
        ]; 
        
        if (isset($_POST['Buscar']) && !is_null($nombre)) { // si pulsamos el boton haremos lo siguiente                       
            try {
             $miDB = new PDO(DSN, USER, PASS);               //creamos una variable para la conexion a la bd pdo 

        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // si hay algun error que lo muestre 
            
        if ($_POST['Buscar'] == "Baja") { //si pulsamos baja
                    $sql="SELECT * FROM Departamento WHERE fechaDeBaja<>'0001-01-01' and DescDepartamento like '%$nombre%'";  // query para encontrar el departamento con el nombre                                   
                } else { 
                    if ($_POST['Buscar'] == "Alta") {  // si le damos a alta
                        $sql="SELECT * FROM Departamento WHERE fechaDeBaja='0001-01-01' or fechaDeBaja is null and DescDepartamento like '%$nombre%'"; // query para encontrar el departamento con el nombre 
                    } else { 
                        $sql="SELECT * FROM Departamento WHERE DescDepartamento like '%$nombre%'"; // query para buscar solo por el nombre
                    } 
                }
            
                $result = $miDB->query($sql);   //Realizar el query, más tarde se ejecutará                
                $result->execute();   //Ejecutar la consulta
             
                while($datos=$result->fetchObject()){ // haremos un bucle
                    $fechaDeBaja=$datos->fechaDeBaja; // con la fecha de baja en la base de datos 
                ?>
                <tr>
                   <td class="codigo" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>><?php echo $datos->CodDepartamento ?></td>
                    <td class="descripcion" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>><?php echo $datos->DescDepartamento ?></td>
                    <td class="iconos" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>>
                        <a href="codigoPHP/borrarDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img class="borrar" src="images/Borrar.png"></a>
                        <a <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="display:none;" <?php } ?> href="codigoPHP/editarDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/editar.png"></a>
                        <a href="codigoPHP/verDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/ojo.png"></a>
                        <a <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="display:none;" <?php } ?> href="codigoPHP/bajaLogicaDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/baja.png"></a>
                        <a <?php if($fechaDeBaja=='0001-01-01' || $fechaDeBaja == null){ ?>style="display:none;" <?php } ?> href="codigoPHP/altaLogicaDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/alta.png"></a>
                    </td>
                </tr>
                    
                 <?php } 
                
            } catch (PDOException $e) {
                print "Error de: " . $e->getMessage() . "<br/>";    //Si no se ha realizado correctamente algo, salta el error (la excepción)
                die();
            }finally{
                unset($miDB); //cerramos la conexion con la base de datos
            }
        }else {                      
                $sql="SELECT * FROM Departamento";   //Introducir la consulta
                $result = $miDB->prepare($sql);  //Preparar la consulta para ser ejecutada
                $result->execute();   //Ejecutar la consulta y donde pone :nombre, ponemos %$nombre%, para decir que puede tener mas letras por ambos lados                  

                while($datos=$result->fetchObject()){
                    $fechaDeBaja=$datos->fechaDeBaja;
                  
                    ?>
                <tr>
                    <td class="codigo" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>><?php echo $datos->CodDepartamento ?></td>
                    <td class="descripcion" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>><?php echo $datos->DescDepartamento ?></td>
                    <td class="iconos" <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="background-color:#ff9999" <?php } ?>>
                        <a href="codigoPHP/borrarDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img class="borrar" src="images/Borrar.png"></a>
                        <a <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="display:none;" <?php } ?> href="codigoPHP/editarDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/editar.png"></a>
                        <a href="codigoPHP/verDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/ojo.png"></a>
                        <a <?php if($fechaDeBaja!='0001-01-01' && $fechaDeBaja != null){ ?>style="display:none;" <?php } ?> href="codigoPHP/bajaLogicaDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/baja.png"></a>
                        <a <?php if($fechaDeBaja=='0001-01-01' || $fechaDeBaja == null){ ?>style="display:none;" <?php } ?> href="codigoPHP/altaLogicaDepartamentos.php?CodDepartamento=<?php echo $datos->CodDepartamento ?>"><img src="images/alta.png"></a>
                    </td>
                </tr>
                <?php
                
                }
        }
       
        ?>       
            </table>         
        </div>
        
        <footer>
                <a href="../../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
                Volver al Index           
                <a href="../../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            </footer>
</html>


