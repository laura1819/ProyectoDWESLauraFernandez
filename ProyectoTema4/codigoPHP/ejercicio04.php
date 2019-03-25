
<!DOCTYPE html>
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
        <h1>Ejercicio 4</h1>
        <p>


            <?php
            /*
              Autor: Laura Fernandez
              Fecha 17/03/2019
              Comentarios: muestra el programa la hora en Oporto formateada en portugues
             */



            setlocale(LC_TIME, 'pt_PT.UTF-8'); //selecionamos el idioma en este caso pt de portugal
            date_default_timezone_set('Europe/Lisbon'); // selecionamos la zona horaria que tiene portugal
            echo "<b>Fecha en Oporto separado con / : </b> " . date("Y/m/d") . "<br>"; // sacar por pantalla la fecha con diferente formato
            echo "<b>Fecha en Oporto separado con . :  </b>" . date("Y.m.d") . "<br>"; // sacar por pantalla la fecha con diferente formato
            echo "<b>Fecha en Oporto separado con - :  </b>" . date("Y-m-d") . "<br>"; // sacar por pantalla la fecha con diferente formato
            echo "<br>";
            echo "<b>Fecha en Oporto sacado con date(l) :  </b>" . date("l"). "<br>"; // sacar el dia de la semana con date (l)
            echo "<b>Hora en Oporto sacdo con date(H:i:sa): </b>" . date('H:i:sa') . "<br>"; // sacamos por pantalla la hora en oporto
            echo "<b>Fecha en Oporto sacado con date(l jS \of F Y h:i:s A) :  </b>" .  date('l jS \of F Y h:i:s A') . "<br>"; // sacar com date dia mes año y fecha
             echo "<br>";
            echo "<b>Fecha Oporto sacado con strftime : </b>" . strftime("%A %d de %B del %Y"); // sacamos por pantalla la fecha en oporto
                                                                                                 //strftime — Formatea una fecha/hora local según una configuración local
            ?>                                                                                 
        </p>

    </body>
</html>