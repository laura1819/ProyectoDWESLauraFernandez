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
        <h1>Ejercicio 4</h1>	
        
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <b>Introduce Descripcion :</b> <input type="text" name="descripcion" value="<?php echo $_POST['descripcion'];?>" style="WIDTH: 328px;"><label style='color: red;'><?php echo $aErrores['descripcion']; ?></label></br></br>
            <input type="submit" name="enviar" value="enviar"></br></br>
        </form>
       
        <?php
        /*
          Autor: Laura Fernandez
          Fecha 35/03/3019
          Comentarios: conexion a la base de datos
         */

        include '../config/configBD.php';
        include "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        
        $aErrores = [
            'descripcion' => ""
        ];
        
        $aFormulario = [
            'descripcion' => ""
        ];
        
        $entradaOk = true;
        
        if(isset($_POST['enviar'])){
            $aErrores['descripcion'] = validacionFormularios::comprobarAlfanumerico($_POST['descripcion'],255,3,1);
        
        foreach ($aErrores as $campo=>$error){
            if($error != null){
                $entradaOk=false;
                $_POST[$campo] = "";
            }
        }
        }else{
            $entradaOk = false;
        }
        
        if($entradaOk){
            $aFormulario['descripcion'] = $_POST['descripcion'];
            try {
                $myBD = new PDO(DSN,USER,PASS);
                
                $consulta = $myBD->query("select * from Departamento where DescDepartamento like '%$aFormulario[descripcion]%' or DescDepartamento like '$aFormulario[descripcion]%' or DescDepartamento like '%$aFormulario[descripcion]'");
                
                if($consulta->rowCount()==0){
                    echo "<label style='color: red;'>No hay ningun registro con esa descripcion</label>";
                }else{
                    echo "<b>Registros encontrados : </b>" . $consulta->rowCount() . "</br></br>";
                }
                
                while($registro = $consulta->fetchObject()){
                    echo "<b>El codigo es :</b>" . $registro->CodDepartamento  . "<b>  Su descripcion es: </b>" . $registro->DescDepartamento . "</br>";
                }
                    
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            } finally {
                unset($myBD);
            }

        }
        
        
        
        ?>
        
       
        
    </body>
    <footer>
          <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
            Volver al Index           
            <a href="../indexProyectoTema4.php"><i class="fas fa-undo"></i></a>
        </footer>
</html>


