<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Laura Fernandez</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="webroot/css/estilos.css"/>
		<link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    </head>
    <style>
        h4{
            color:white;
            text-align: center;
        }
       
    </style>
    <body>
		
                
               
        <h1 style="text-align: center">Ejercicios del Tema 5</h1>
	
       
        
        
        <table>
                <tr>
                    <td>Scripts de Creacion base de datos Desarrollo</td>
                    <td><a href="scriptDB/crearBDE.sql">Creacion</a></td>
                    <td><a href="scriptDB/ejecutar.sql">Carga Inicial</a></td>
                     <td><a href="scriptDB/borrarBD.sql">Borrado</a></td>
                     <td><a href="mostrarCodigo/muestraScripts.php">MostrarCodigo</a></td>
                </tr>
                <tr>
                    <td>Scripts de Creacion base de datos Explotacion</td>
                    <td><a href="scriptDB/crearBD.sql">Creacion</a></td>
                    <td><a href="scriptDB/ejecutar.sql">Carga Inicial</a></td>
                     <td><a href="scriptDB/borrarBD.sql">Borrado</a></td>
                     <td><a href="mostrarCodigo/muestraScriptsE.php">MostrarCodigo</a></td>
                </tr>
                <tr>
                    <td>Archivos de configuracion base de datos</td>
                    <td><a href="mostrarCodigo/muestraConfig.php">Desarrollo</a></td>
                    <td><a href="mostrarCodigo/muestraConfigE.php">Explotacion</a></td>
                   
                </tr>
                
              
        </table>        
                
        <div>
            <table border="1">
                <tr>
                    <td>Mostrar php info.</td>
                    <td><a href="codigoPHP/ejercicio00.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio00.php">Mostrar Codigo</a></td>
                    
                </tr>
                        
                <tr style="background-color:#8896C7">
                    <td>1.-Desarrollo de un control de acceso con identificación del usuario basado en la función header().</td>
                    <td><a href="codigoPHP/ejercicio01.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio01.php">Mostrar Codigo</a></td>
                   
                </tr>
                                
                <tr>
                    <td>2.-Desarrollo de un control de acceso con identificación del usuario basado en el uso de una tabla “Usuario” de la base de datos. (PDO).</td>
                    <td><a href="codigoPHP/ejercicio02.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio02.php">Mostrar Codigo</a></td>
                    
                </tr>
                 <tr  style="background-color:#8896C7">
                    <td>3.-Desarrollo de una aplicación con control de acceso e identificación del usuario basado en un formulario (Login.php) con un botón de “Entrar” y en el uso de una tabla “Usuario” de la base de datos (PDO). En el caso de que tecleemos un usuario y password correctos se abrirá otra página (Programa.php) donde tendremos un botón de “Salir” que nos devolverá al Login.php (Funionalidad Logoff que nos redirige automáticamente a la página de autenticación).</td>
                    <td><a href="codigoPHP/ProyectoLoginLogoff/login.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio03.php">Mostrar Codigo</a></td>
                    
                </tr>
               </tr>
                 <tr>
                    <td>4.-Mantenimiento departamentos con login logoff.</td>
                    <td><a href="codigoPHP/MtoDepartamentos/login.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio04.php">Mostrar Codigo</a></td>
                    
                </tr>

            </table>
	
     </body>
     
     <footer>
            Laura Fernandez
            <a href="http://DAW-USGIT.sauces.local/laura.ferfer.7/ProyectoDWESLauraFernandez" target="black"><i class="fab fa-gitlab"></i></a>
            <a href="https://github.com/laura1819/ProyectoDWESLauraFernandez" target="black"><i class="fab fa-github"></i></a>
            <a href="../indexProyectoDWES.php"><i class="fas fa-home"></i></a>
        </footer>
</html>
