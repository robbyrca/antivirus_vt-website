<?php
    //if (isset($_REQUEST['volver'])){
     //   echo "<br>1. <a href='alta.php'>Alta</a>";
     //   echo "<br>2. <a href='baja.php'>Baja</a>";
      //  echo "<br>3. <a href='consulta.php'>Consulta</a>";
     //   echo "<br>4. <a href='modifica2.php'>Modifica</a>";
     //   echo "<br><br><form><a href='login_form.html'/><input type='button' value='SORTIR'></a>";
    //}

    if (isset($_REQUEST['baja'])) {

        $nfilas = 0;
        $id = $_REQUEST['id'];
    
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
             //redactem la consulta d'eliminacio
             $sql="delete from usuarios where id = ".$id;
 
            //executem la consulta d'eliminacio
            $consulta = mysql_query ($sql, $conexion);

            echo "Registro eliminado";
        }else echo "Registro no encontrado";

        echo("<form action='baja.php' method='post'>
        ID: <input type='text' name='id'><br>
        <br><input type='submit' name='baja' value='BAJA'>
        </form>");
        echo "<br><form action='test.php' method='post'><input type='submit' name='volver' value='TORNAR'>";
    }else{
    echo("<form action='baja.php' method='post'>
       ID: <input type='text'name='id'><br>
       <br><input type='submit' name='baja' value='BAJA'>
       </form>");
       echo "<br><form action='test.php' method='post'><input type='submit' name='volver' value='TORNAR'>";
    }
?>