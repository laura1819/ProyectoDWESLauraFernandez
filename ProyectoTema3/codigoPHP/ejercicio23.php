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
	
	
	
        <h1>Ejercicio 23</h1>
		   
          
               
    
          
              
   <?php 
   
   /**
		Autor: Laura Fernandez
		Realizado:22:10:2018;
		Comentarios:El programa muestra los datos que hemos introducido en la misma pagina y verifica las entradas
	*/
        
    $entradaOK=true; //Inicialización de la variable que nos indica que todo va bien 
    //Inicialización del array donde recogemos los errores 
   $aErrores=array(eNombre=>"" //Guarda los errores que pueda tener el campo nombre
                   ,eApellido1=>"", //Guarda los errores que pueda tener el campo de los apellidos
                    eApellido2=>"", //Guarda los errores que pueda tener el campo de los apellidos
                    eEdad=>""); //Guarda los errores que pueda tener el campo edad
   
    if(isset($_POST['enviar'])){ //Cargar valores por defecto en los campos del formulario 
        if($_POST['nombre']==null||$_POST['nombre']==""){ //  
            $entradaOK=false; //Cambiamos la variable de entradaok a false para indicar que algo no va bien
            $aErrores[eNombre]="Error en el nombre"; //Y si se da el error mostraremos el mensaje adecuado de error
        } 
        if($_POST['apellido1']==null||$_POST['apellido1']==""){ 
            $entradaOK=false; //Cambiamos la variable de entradaok a false para indicar que algo no va bien
            $aErrores[eApellido1]="Error en el primer apellido"; //Y si se da el error mostraremos el mensaje adecuado de error
        } 
        if($_POST['apellido2']==null||$_POST['apellido2']==""){ 
            $entradaOK=false; //Cambiamos la variable de entradaok a false para indicar que algo no va bien
            $aErrores[eApellido2]="Error en el segundo apellido"; //Y si se da el error mostraremos el mensaje adecuado de error
        } 
        if($_POST['edad']==null||$_POST['edad']==""){ 
            $entradaOK=false; //Cambiamos la variable de entradaok a false para indicar que algo no va bien
            $aErrores[eEdad]="Error en la edad"; //Y si se da el error mostraremos el mensaje adecuado de error
        } 
    }else{ 
        $entradaOK=false;     
    }     
    if($entradaOK){ // si la entrada de daros esta bien comenzamos con el tratamiento de datos
        $nombre=$_POST["nombre"];  //recoge los datos del campo nombre
        $edad=$_POST["edad"]; //recoge los datos del campo edad
        $apellido1=$_POST["apellido1"]; //recoge los datos del campo apellidos1
        $apellido2=$_POST["apellido2"]; //recoge los datos del campo apellidos2
		
		//Y por ultimo vamos a sacar los datos del formulario por pantalla
        print "Nombre: ".$nombre."<br />"; //imprime el valor del campo nombre
        print "Primer Apellido: ".$apellido1."<br />"; //imprime el valor del campo apellidos1 
        print "Segundo Apellido: ".$apellido2."<br />"; //imprime el valor del campo apellidos2
        print "Edad: ".$edad."<br />"; //imprime el valor del campo edad
    }else{
         
        ?> 
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
             
            Nombre:
			<input type="text" name="nombre" value="" />
			<?php if(($aErrores['eNombre']!="")){echo '<span style="color:red;">'.$aErrores["eNombre"].'</span>';} ?>
            <br><br> 
			
            Primer Apellido:
			<input type="text" name="apellido1" value="" />
			<?php if(($aErrores['eApellido1']!="")){echo '<span style="color:red;">'.$aErrores['eApellido1'].'</span>';} ?> 
            <br><br> 
			
            Segundo Apellido:
			<input type="text" name="apellido2" value="" />
			<?php if(($aErrores['eApellido2']!="")){echo '<span style="color:red;">'.$aErrores['eApellido2'].'</span>';} ?> 
            <br><br> 
			
            Edad:<input type="text" name="edad" value="" />
			<?php if(($aErrores['eEdad']!="")){echo  '<span style="color:red;">'.$aErrores['eEdad'].'</span>';} ?> 
            <br><br> 
			
            <input type="submit" value="enviar" name="enviar"/>    
        </form>               
             <br> 
     </div>          
        <?php  
    } 
        ?> 
        
   

</body>
</html>
