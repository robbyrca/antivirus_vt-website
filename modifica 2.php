<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifica</title>
</head>
<body>
    <?php
    if (isset($_REQUEST['modifica'])) {

        $nfilas = 0;
        $id = $_REQUEST['id'];
        $pas = $_REQUEST['pas'];

        //conexio servidor bd
        $conexion = mysql_connect ("rdbms.strato.de", "dbu1324294", "AdminBD13@") or die ("No se puede conectar con el servidor");

        //seleccionem la base de dades
        mysql_select_db("dbs5834792") or die("Error BD");



        //redactem consulta comprovacio existencia
        $sql="select * from usuarios where id = ".$id;
 
        //executem la consulta comprovacio exitencia
        $consulta = mysql_query ($sql, $conexion);

        //mostrar num de registres
        $nfilas = mysql_num_rows($consulta);


        if ($nfilas) {
             //redactem la consulta de modificacio
             $sql="update usuarios set password = '".md5($pas)."' where id = ".$id;
 
            //executem la consulta de modificacio
            $consulta = mysql_query ($sql, $conexion);

            echo "Registro modificado";
        }else echo "Registro no encontrado";
    }
    ?>
    <form action="modifica.php" method="post">
        ID: <input type="text" name="id"><br>
        PAS: <input type="text" name="pas"><br>
        <br><input type="submit" name="modifica" value="MODIFICA">
    </form>
</body>
</html>