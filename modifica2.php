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
        $change = $_REQUEST["selectOption"];
        //echo($change);

        if ($change=="LOG:"){
            //echo("change log");
            $log = $_REQUEST['selectName'];
            //echo($log);

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
                $sql="update usuarios set usuario = '".($log)."' where id = ".$id;
  
                //executem la consulta de modificacio
                $consulta = mysql_query ($sql, $conexion);
 
                echo "Registro modificado";
            }else echo "Registro no encontrado";

        
        }else {
            //echo ("change pas");
            $pas = md5($_REQUEST['selectName']);
            //echo($pas);
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
                $sql="update usuarios set password = '".($pas)."' where id = ".$id;
 
                //executem la consulta de modificacio
                $consulta = mysql_query ($sql, $conexion);

                echo "Registro modificado";
                }else echo "Registro no encontrado";
    
        }
        
    }
    ?>
    <form action="modifica2.php" method="post">
        ID: <input type="text" name="id"><br>
        <br><label>Tria una opcio a canviar: </label><br>
        <select name="selectOption">
           <option name="log">LOG:</option>
           <option name ="pas">PAS:</option>
           <input type="text" name="selectName"><br>
        </select>
        <br><input type="submit" name="modifica" value="MODIFICAR">
    </form>
    <br><form action='test.php' method='post'><input type='submit' name='volver' value='TORNAR'>
</body>
</html>