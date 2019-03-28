<?php

         /*
          Autor: Laura Fernandez
          Fecha 35/03/2019
          Comentarios: conexion a la base de datos
         */
         include '../config/configBD.php';
        try {
            // parametros de la connexion a la base de datos
            $myBD = new PDO(DSN, USER, PASS); 
            $myBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //creamos un objeto del DOM 
            $fichero = new DOMDocument(); 
            $fichero->formatOutput = true; // le damos formato al fichero 
            
            //CREACION DEL FICHERO
                //creamos el elemento con un "hijo"
            $departamentos = $fichero->createElement('departamentos'); 
            $departamentos = $fichero->appendChild($departamentos); 
            
            //hacemos la consulta y la ejecutamos para sacar los campos
            $consulta = $myBD->prepare('select * from Departamento'); 
            $consulta->execute();
            
            $fechaHoy = date('Ymd'); // creamos una variable con la fecha para introducirla en el nombre del fichero
            
            while ($registro = $consulta->fetchObject()) {  // creamos un bucle para sacar todos los elementos en la estructura xml
                $departamento = $fichero->createElement('departamento'); 
                $departamento = $departamentos->appendChild($departamento); 
                $CodDepartamento = $fichero->createElement('CodDepartamento', $registro->CodDepartamento); 
                $CodDepartamento = $departamento->appendChild($CodDepartamento); 
                $DescDepartamento = $fichero->createElement('DescDepartamento', $registro->DescDepartamento); 
                $DescDepartamento = $departamento->appendChild($DescDepartamento); 
              
            }
            // para guardar el fichero 
            $fichero->saveXML(); // crea el fichero tras la representacion del DOM 
            if ($fichero->save("../tmp/" . $fechaHoy . "Departamentos.xml") != 0) { //donde guardaremos en local el fichero
                header('Content-Type: text/xml'); 
                header("Content-Disposition: attachment; filename=" . $fechaHoy . "Departamentos.xml"); //descargar
                readfile("../tmp/" . $fechaHoy . "Departamentos.xml"); // mostrar desde el fichero del servidor en el navegador el documento xml si este no se descarga
            } else {
                echo "<p>No pudo guardarse la base de datos</p>";
            }
        } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; 
        } finally {
            unset($myBD); 
        }
        ?>
