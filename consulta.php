<?php
    session_start();
    if(isset($_REQUEST['baja'])){
        $nfilas = 0;
        $id = $_SESSION['idghost'];

        //conexio servidor bd
        $conexion = mysql_connect ("rdbms.strato.de", "dbu1324294", "AdminBD13@") or die ("No se puede conectar con el servidor");

        //seleccio bd
        mysql_select_db("dbs5834792") or die("Error BD");

        //redactem la consulta
        $sql="select * from usuarios;";

        //executem la consulta
        $consulta = mysql_query ($sql, $conexion);

        //calcular numero de reg's
        $nfilas = mysql_num_rows($consulta);
        

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

            echo "Registro eliminado"."<br>";
        }else echo "Registro no encontrado";

     }if(isset($_REQUEST['volver'])){
        header("Location: volver.php");        
    }

    if(isset($_REQUEST['modifica2'])){
        $nfilas = 0;
        $id = $_SESSION['idghost2'];
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

    if(isset($_REQUEST['modifica'])){
        $id = $_SESSION['idghost'];
        $_SESSION['idghost2']=$id;
        echo("<form action='consulta.php' method='post'>
        <label>Tria una opcio a canviar: </label><br>
        <select name='selectOption'>
           <option name='log'>LOG:</option>
           <option name ='pas'>PAS:</option>
           <input type='text' name='selectName'><br>
        </select>
        <br><input type='submit' name='modifica2' value='MODIFICAR'>
    </form>
    <form action='consulta.php' method='post'><input type='submit' name='volver2' value='TORNAR'>");
    

    }else{
        //conexio servidor bd
        $conexion = mysql_connect ("rdbms.strato.de", "dbu1324294", "AdminBD13@") or die ("No se puede conectar con el servidor");

        //seleccio bd
        mysql_select_db("dbs5834792") or die("Error BD");

        //redactem la consulta
        $sql="select * from usuarios;";

        //executem la consulta
        $consulta = mysql_query ($sql, $conexion);

        //calcular numero de reg's
        $nfilas = mysql_num_rows($consulta);

        $idghost=0;

        //mostrem la consulta
        for ($i=0; $i<$nfilas; $i++) {
            $fila = mysql_fetch_array($consulta);
            $idghost=$fila['id'];
            $_SESSION["idghost"]=$idghost;
            echo $fila ['id']."-".$fila['usuario']."-".$fila['password']." "."<form action='consulta.php' method='post'><input type='submit' name='baja' value='ELIMINAR'>"." "."<form action='consulta.php' method='post'><input type='submit' name='modifica' value='MODIFICAR'>"."<br>"."<br>";
        }
        echo "<br><form action='consulta.php' method='post'><input type='submit' name='volver' value='TORNAR'>";
    }

?>