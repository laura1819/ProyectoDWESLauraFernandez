<!DOCTYPE html>
<html>
    <head>
        <title>Laura Fernandez</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
        <style>
            h1{
                font-family: 'Charmonman', cursive;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 8</h1>				
      
		 <?php 
        /* 
         *  @author: Laura Fernandez 
         *   Fecha 25/03/2019 
         *  Descripción: Exportar departamentos del examen 
         */                         
       define('IPDB', 'mysql:host=127.0.0.1;dbname=DAW210_DBDepartamentos');   // pasamos los parametros de conexion               
        define('USER', 'usuarioDAW210DBDepartamentos'); // le pasamos el usuario de la base de datos
        define('PASS', 'paso'); // le pasamos la contraseña
        try {                            
            $miDB = new PDO(IPDB, USER, PASS); // iniciamos la variable como pdo y le pasamos lo de la conexion
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// si tenemos algun error que nos lo saque por pantalla
            
            if (isset($_POST['Aceptar'])) {   // si hemos pulsado en aceptar entonces
                    
                    $fichero = new DOMDocument();   // creamos el objeto del dom
                     
              
                    $fichero->formatOutput = true; // al fichero le damos el formato xml
                     
               // CREAMOS LA ESTRUCTURA DEL XML
                    $departamentos = $fichero->createElement('departamentos'); // crea,mos el elemento raiz que sera departaentos
                    $departamentos = $fichero->appendChild($departamentos); // y le añadimos al hijo
           
                    $sql = $miDB->query('select * from Departamento');  // hacemos un select de departamentos 
                    
                    //Recorremos el todos los registros 
                    while ($registro = $sql->fetchObject()) { // bucle para meter todos los departamentos
                         
                        //Creamos el elemento departamento por cada registro 
                        $departamento = $fichero->createElement('departamento'); // creamos un departamento pot cada registro
                        $departamento = $departamentos->appendChild($departamento); // le añadimos el hijo de su raiz
                         
                 
                        $CodDepartamento = $fichero->createElement('CodDepartamento', $registro->CodDepartamento); // creamos el codigo para cada registro 
                        $CodDepartamento = $departamento->appendChild($CodDepartamento);  // le añadimos como hijo de departamento
                         
                                 
                        $DescDepartamento = $fichero->createElement('DescDepartamento', $registro->DescDepartamento); // creamos el elemento por cada descripcion 
                        $DescDepartamento = $departamento->appendChild($DescDepartamento); // le añadimos al hijo del departamento
                         
                                   
                        $FechaDeBaja = $fichero->createElement('FechaDeBaja', $registro->FechaDeBaja); // creamos fecha baja por cada registro
                        $FechaDeBaja = $departamento->appendChild($FechaDeBaja); // le añadimos como hijo de departamento
                    } 
       
                    $fichero->saveXML();  // lo guardamos como xml
                     
               
                    if ($fichero->save('../tmp/tuplas.xml')!=0) { // la ruta donde se va guardar  
                        echo "<p>Se ha guardado la base de datos en el servidor</p>";  // mensaje de que se ha guardado
                    } else {  // y si no
                        echo "<p>No pudo guardarse la base de datos</p>";  //sacamos el mensaje por pantalla de que no se guardo
                    }  
                }  
                }catch(PDOException $e){ // y si tenemos algun error
                    echo "Error: ".$e->getMessage()."<br>"; //Se muestra el mensaje de error 
                    echo "Codigo de error: ".$e->getCode(); //Se muestra el código de error 
                }finally{ 
                    unset($miDB); // cerramos la conexion 
                }      
        ?> 
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post"> 
            <p>¿Quieres exportar la base de datos?</p>               
            <input type="button" name="cancelar" value="Salir" onclick="location='../indexProyectoTema4.php'"> 
            <input type="submit" name="Aceptar" value="Aceptar">     
        </form> 
            
		 
		 

		 
   
		
		
		
      </body>         
</html>

