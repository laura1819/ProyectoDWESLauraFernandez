<?php

echo '<h1>Scripts de la base de datos</h1>';
echo '<h2>Creacion</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/scriptDB/CreaDAW210_DBLogInLogOffTema5.sql");
echo '<h2>Carga inicial</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/scriptDB/CargaInicialDAW210_DBLogInLogOffTema5.sql");
echo '<h2>Borrado</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/scriptDB/BorraDAW210_DBLogInLogOffTema5.sql");

echo '<h1>Codigo del programa</h1>';
echo '<h2>Login</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/login.php");

echo '<h2>Alta Logica departamentos</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/altaLogicaDepartamentos.php");

echo '<h2>Añadir departamentos</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/anadirDepartamentos.php");

echo '<h2>Baja logica</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/bajaLogicaDepartamentos.php");

echo '<h2>Borrar departamento</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/borrarDepartamentos.php");

echo '<h2>Editar departamento</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/editarDepartamentos.php");

echo '<h2>Exportar departamento</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/exportarDepartamentos.php");

echo '<h2>Importar departamento</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/importarDepartamentos.php");

echo '<h2>Ver departamento</h2>';
highlight_file("../codigoPHP/MtoDepartamentos/codigoPHP/verDepartamentos.php");
?>