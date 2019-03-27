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
		
                
               
        <h1 style="text-align: center">Ejercicios del Tema 4</h1>
	
       
        
        
        <table>
                <tr>
                    <td>Scripts de Creacion base de datos</td>
                    <td><a href="scriptDB/crearBD.sql">Creacion</a></td>
                    <td><a href="scriptDB/ejecutar.sql">Carga Inicial</a></td>
                     <td><a href="scriptDB/borrarBD.sql">Borrado</a></td>
                     <td><a href="mostrarCodigo/muestraScripts.php">MostrarCodigo</a></td>
                </tr>
                
              
        </table>        
                
        <div>
            <table border="1">
                <tr>
                    <td>1.-Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                    <td><a href="codigoPHP/ejercicio01.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio01.php">Mostrar código</a></td>
                    
                </tr>
                        
                <tr style="background-color:#8896C7">
                    <td>2.-Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                    <td><a href="codigoPHP/ejercicio02.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio02.php">Mostrar código</a></td>
                   
                </tr>
                                
                <tr>
                    <td>3.-Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                    <td><a href="codigoPHP/ejercicio03.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio03.php">Mostrar código</a></td>
                    
                </tr>
                <tr style="background-color:#8896C7">
                    <td>4.-Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento).</td>
                    <td><a href="codigoPHP/ejercicio04.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio04.php">Mostrar código</a></td>
                </tr>
                <tr>
                    <td>5.-Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                    <td><a href="codigoPHP/ejercicio05.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio05.php">Mostrar código</a></td>
                </tr>
                <tr style="background-color:#8896C7">
                    <td>6.-Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.</td>
                    <td><a href="codigoPHP/ejercicio06.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio06.php">Mostrar código</a></td>
                </tr>
                <tr>
                    <td>7.-Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla Departamento de nuestra base de datos (IMPORTAR).</td>
                    <td><a href="codigoPHP/ejercicio07.php">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio07.php">Mostrar código</a></td>
                </tr>
                <tr style="background-color:#8896C7">
                    <td>8.-Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un fichero departamento.xml (COPIA DE SEGURIDAD / EXPORTAR).</td>
                    <td><a href="codigoPHP/ejercicio08.php">Exportar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio08.php">Mostrar código</a></td>
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
