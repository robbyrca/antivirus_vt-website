<?php
    //conexio servidor bd
    $conexion = mysql_connect ("rdbms.strato.de", "dbu1324294", "AdminBD13@")   or die ("No se puede conectar con el servidor");

    //seleccio bd
    mysql_select_db("dbs5834792") or die("Error BD");

    //prepar query
    $sql="select * from usuarios";

    //preparar la execucio
    $consulta = mysql_query ($sql, $conexion);

    //mostrar num de registres
    $nfilas = mysql_num_rows($consulta);
    //echo "N&uacute;mero de filas: ".$nfilas;

    //comprobar si existeixen registres
    if ($nfilas == 0) echo "No hi ha cap registre";
    else echo "N&uacute;mero de files: ".$nfilas."<br>"."<br>"."Resultats:";

    //mostrar campos
    while($fila = mysql_fetch_array($consulta)) {
        echo "<br>"."&nbsp"."&nbsp".$fila['usuario']."-".$fila['password'];
    }

    //tancar conexio
    mysql_close ($conexion);
?>
