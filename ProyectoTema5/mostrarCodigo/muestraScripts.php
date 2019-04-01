<?php
    echo "<h1>Los Scripts de la Base De Datos</h1>";
    
    echo "<h2>El script de creacion</h2>";
    
    highlight_file("../scriptDB/crearBD.sql");
    
    echo "<h2>El script de la carga inicial</h2>";

    highlight_file("../scriptDB/ejecutarBD.sql");

    echo "<h2>El script de borrado</h2>";
    
    highlight_file("../scriptDB/borrarBD.sql");
?>