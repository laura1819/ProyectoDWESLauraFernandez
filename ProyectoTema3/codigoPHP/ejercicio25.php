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
	
	
	
        <h1>Ejercicio 25 Plantilla para formularios</h1>
		
		 <?php
               /**
          Autor: Laura Fernandez
          @since: 23/10/2018
          Comentarios: el programa crea un formulario y muestra los datos introducidos en la misma página verificando las entradas de datos.
         */
                    
                    require_once "../core/181024validacionFormularios.php"; // la libreria en comun para validar los datos
				
                    $entradaOK=true; //Inicialización de la variable que nos indica que todo va bien 
                    $aErrores=[ //Inicialización del array donde recogemos los errores 
                        "alfb"=>null,  // guarda los errores del campo 
                        "alfn"=>null, // guarda los errores del campo 
						"entero"=>null, // guarda los errores del campo 
						"float"=>null, // guarda los errores del campo 
                        "email"=>null, // guarda los errores del campo 
						"url"=>null, // guarda los errores del campo 
						"fecha"=>null, // guarda los errores del campo 
                        "tel"=>null, // guarda los errores del campo 
						"dni"=>null, // guarda los errores del campo
						"cp"=>null, // guarda los errores del campo
						"contraseña"=>null, // guarda los errores del campo
						"radiobutton"=>null  // guarda los errores del campo
						
						
						
                    ];
                    
                    $aFormulario=[ // array de los valores que contienen los campos del formulario cuando estos estan bien
                        "alfb"=>null, // guarda el valor del campo cuando este es correcto
                        "alfn"=>null, // guarda el valor del campo cuando este es correcto
						"entero"=>null, // guarda el valor del campo cuando este es correcto
						"float"=>null, // guarda el valor del campo cuando este es correcto
                        "email"=>null, // guarda el valor del campo cuando este es correcto
						"url"=>null, // guarda el valor del campo cuando este es correcto
						"fecha"=>null, // guarda el valor del campo cuando este es correcto
                        "tel"=>null, // guarda el valor del campo cuando este es correcto
						"dni"=>null, // guarda el valor del campo cuando este es correcto
						"cp"=>null, // guarda el valor del campo cuando este es correcto
						"contraseña"=>null, // guarda el valor del campo cuando este es correcto
						"radiobutton"=>null // guarda el valor del campo cuando este es correcto
                    ];
                    
                    
                    if (!empty($_POST['enviar'])) { //Para cada campo del formulario: Validar entrada y actuar en consecuencia 
                        $aErrores["alfb"]=validacionFormularios::comprobarAlfabetico($_POST['alfb'],25,3,1); //el array de los errores coje el mensaje de error para el campo de la libreria
                        $aErrores["alfn"]=validacionFormularios::comprobarAlfanumerico($_POST['alfn'],25,3,1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["entero"]=validacionFormularios::comprobarEntero($_POST['entero'],10,1,1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["float"]=validacionFormularios::comprobarFloat($_POST['float'],10,1,1); //el array de los errores coje el mensaje de error para el campo de la libreria
                        $aErrores["email"]=validacionFormularios::validarEmail($_POST['email'],25,4,1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["url"]=validacionFormularios::validarURL($_POST['url'],1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["fecha"]=validacionFormularios::validarFecha($_POST['fecha'],1); //el array de los errores coje el mensaje de error para el campo de la libreria
                        $aErrores["tel"]=validacionFormularios::validaTelefono($_POST['tel'],1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["dni"]=validacionFormularios::validarDni($_POST['dni'], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["cp"]=validacionFormularios::validarCp($_POST["cp"], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["contraseña"]=validacionFormularios::comprobarAlfanumerico($_POST['contraseña'],50,3,1); //el array de los errores coje el mensaje de error para el campo de la libreria
						$aErrores["radiobutton"]=validacionFormularios::validarRadioB($_POST["radiobutton"], 1); //el array de los errores coje el mensaje de error para el campo de la libreria
					 
                        foreach($aErrores as $error){ // Busca algun mensaje de error en el recorriendo el array de errores
                            if($error !=null){
                                $entradaOK=false; //si encuentra algun error se cambiaria a false la entradaok
                            }
                        }
                    } else {   
                        $entradaOK=false;		// cuando encontremos un error
				
                    }
					
					
 
                    if ($entradaOK){  //Tratamiento de datos OK

                        $aFormulario["alfb"] = $_POST['alfb']; // recoge el valor del campo una vez que ya ha pasado la validacion
                        $aFormulario["alfn"] = $_POST['alfn']; // recoge el valor del campo una vez que ya ha pasado la validacion
						$aFormulario["entero"] = $_POST['entero'];// recoge el valor del campo una vez que ya ha pasado la validacion
						$aFormulario["float"] = $_POST['float'];// recoge el valor del campo una vez que ya ha pasado la validacion
                        $aFormulario["email"] = $_POST['email'];// recoge el valor del campo una vez que ya ha pasado la validacion
						$aFormulario["url"] = $_POST['url'];// recoge el valor del campo una vez que ya ha pasado la validacion
						$aFormulario["fecha"] = $_POST['fecha'];// recoge el valor del campo una vez que ya ha pasado la validacion
                        $aFormulario["tel"] = $_POST['tel'];// recoge el valor del campo una vez que ya ha pasado la validacion
			    		$aFormulario["dni"] = $_POST['dni'];// recoge el valor del campo una vez que ya ha pasado la validacion
						$aFormulario["cp"] = $_POST['cp'];// recoge el valor del campo una vez que ya ha pasado la validacion		
						 $aFormulario["contraseña"] = $_POST['contraseña']; // recoge el valor del campo una vez que ya ha pasado la validacion		
						$aFormulario["radiobutton"] = $_POST['radiobutton']; // recoge el valor del campo una vez que ya ha pasado la validacion
						
                        //Imprimimos los datos correctamente
                        print "alfb: ".$aFormulario["alfb"]."<br />";   //saca por pantalla el valor del campo alfabetico
                        print "alfn: ".$aFormulario["alfn"]."<br />"; //saca por pantalla el valor del campo alfanumerico
						print "entero: ".$aFormulario["entero"]."<br />"; //saca por pantalla el valor del campo entero
						print "float: ".$aFormulario["float"]."<br />"; //saca por pantalla el valor del campo float
                        print "email: ".$aFormulario["email"]."<br />"; //saca por pantalla el valor del campo email
						print "url: ".$aFormulario["url"]."<br />"; //saca por pantalla el valor del campo url
						print "fecha: ".$aFormulario["fecha"]."<br />"; //saca por pantalla el valor del campo fecha
                        print "Telefono: ".$aFormulario["tel"]."<br />"; //saca por pantalla el valor del campo telefono
					    print "Dni: ".$aFormulario["dni"]."<br />";//saca por pantalla el valor del campo dni
						print "Codigo postal: ".$aFormulario["cp"]."<br />";//saca por pantalla el valor del campo cp
						print "Contraseña: ".$aFormulario["contraseña"]."<br />";//saca por pantalla el valor del campo cp
						print "Campo Radiobuton: ".$aFormulario["radiobutton"]."<br />";//saca por pantalla el valor del campo cp
                        
                    }else{  
                ?>
                    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"/>
                    
                        Comprobar alfabetico: 
						<input type="text" name="alfb" 
								value="<?php if(isset($_POST["alfb"])&& is_null($aErrores["alfb"])){echo $_POST["alfb"];}?>"/> 
                        <label style="color: red;"><?php   echo $aErrores["alfb"]; ?>*</label><br><br>
                        
                        Comprobar alfanumerico:
						<input type="text" name="alfn" 
							value="<?php if(isset($_POST["alfn"])&& is_null($aErrores["alfn"])){echo $_POST["alfn"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["alfn"];   ?>*</label><br><br>
						
						Comprobar entero:
						<input type="text" name="entero" 
							value="<?php if(isset($_POST["entero"])&& is_null($aErrores["entero"])){echo $_POST["entero"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["entero"];   ?>*</label><br><br>
						
						Comprobar float:
						<input type="text" name="float" 
							value="<?php if(isset($_POST["float"])&& is_null($aErrores["float"])){echo $_POST["float"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["float"];   ?>*</label><br><br>
                 
                        Comprobar email:
						<input type="text" name="email"  
							value="<?php if(isset($_POST["email"])&& is_null($aErrores["email"])){echo $_POST["email"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["email"];   ?>*</label><br><br>
						
						
                        Comprobar URL:
						<input type="text" name="url"  
							value="<?php if(isset($_POST["url"])&& is_null($aErrores["url"])){echo $_POST["url"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["url"];   ?>*</label><br><br>
						
						Comprobar Fecha:
						<input type="text" name="fecha"  
							value="<?php if(isset($_POST["fecha"])&& is_null($aErrores["fecha"])){echo $_POST["fecha"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["fecha"];   ?>*</label><br><br>
                        
                        Comprobar telefono: 
						<input type="text" name="tel"  
							value="<?php if(isset($_POST["tel"])&& is_null($aErrores["tel"])){echo $_POST["tel"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["tel"];   ?>*</label><br><br>
                        
						Comprobar dni: 
						<input type="text" name="dni"  
							value="<?php if(isset($_POST["dni"])&& is_null($aErrores["dni"])){echo $_POST["dni"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["dni"];   ?>*</label><br><br>			
						
						Comprobar Codigo postal: 
						<input type="text" name="cp"  
							value="<?php if(isset($_POST["cp"])&& is_null($aErrores["cp"])){echo $_POST["cp"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["cp"];   ?>*</label><br><br>
							
						Comprobar Contraseña: 
						<input type="password" name="contraseña"  
							value="<?php if(isset($_POST["contraseña"])&& is_null($aErrores["contraseña"])){echo $_POST["contraseña"];}?>"/>
                        <label style="color: red;"><?php   echo $aErrores["contraseña"];   ?>*</label><br><br>	
							
						
						
                        <label>Radio button </label>
						<input type="radio" name="radiobutton" value="opcion 1" <?php if (isset($_POST["radiobutton"])) echo "checked";?>><label>Opcion 1</label>
						<input type="radio" name="radiobutton" value="opcion 2" <?php if (isset($_POST["radiobutton"])) echo "checked";?>><label>Opcion 2</label>
						<label style="color: red;"><?php echo $aErrores["radiobutton"]?>*</label><br><br>
							
						
                                
                        <input type="submit" value="Enviar" name="enviar"/>
                    
                    </form>
                <?php
                    }
                ?>
	

	</body>
</html>
