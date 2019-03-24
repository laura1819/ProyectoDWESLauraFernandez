<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>
        <h1>HIJUEEEPUTA FORMULARIOS</h1>
        <?php
        
        
        $entradaOk = true;
        
        $aErrores = array ('enombre' => "",'apellido' => "",'epass' => "");
        
        
        if(isset($_POST['enviar'])){
            if($_POST['nombre']==null||$_POST['nombre']==""){
                $entradaOk = false;
                $aErrores['enombre']="mal wey";
            }
            if ($_POST['apellido']==null||$_POST['apellido']==""){
                $entradaOk = false;
                $aErrores['apellido']="maaaaaaaal wey";
            }
            if($_POST['pass']==null||$_POST['pass']==""){
                $entradaOk = false;
                $aErrores['epass']="suuper mal wey";
            }
        }else{
            $entradaOk = false;
        }
        
        if($entradaOk){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $pass = $_POST['pass'];
            
            echo "nombrecito : " . $_POST['nombre'] . "<br>";
            echo "epellidito : " . $_POST['apellido'] . "<br>";
            echo "eecontraseñññita : " . $_POST['pass'] . "<br>";
        }else {
        
        
        
        
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            nombrecitowey <input name="nombre" type="text" value="<?php echo $_POST['nombre'] ?>"> <?php if(($aErrores['enombre']!="")){echo '<span style="color:red;">'.$aErrores["enombre"].'</span>';} ?><br>
            apellidowey <input name="apellido" type="text"><br>
            passowey <input name="pass" type="text"><br>
            <input type="submit" name="enviar">
        </form>	
        <?php } ?>
    </body>
</html>
