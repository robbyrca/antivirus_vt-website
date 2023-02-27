<?php

    $user = "robbyrca";
    $password = "QWEqwe123!";
    $database = "intranet";
    $table = "usuarios";

    //Definir cte
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //conexio servidor bd
    $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    echo ("1");
    //variable del formulario
    $log = $_REQUEST['login'];
    $pas = md5($_REQUEST['pass']);
    echo ("2");
    //eliminar igual del camp pass
    $log = str_replace("=", "", $log);
    $log = str_replace("'", "", $log);
    $pas = str_replace("=", "", $pas);
    $pas = str_replace("'", "", $pas);
    echo ("3");
    if (isset($_REQUEST['volver'])){
        echo "<br>1. <a href='alta.php'>Alta</a>";
        echo "<br>2. <a href='baja.php'>Baja</a>";
        echo "<br>3. <a href='consulta.php'>Consulta</a>";
        echo "<br>4. <a href='modifica2.php'>Modifica</a>";
        echo "<br><br><form><a href='login_form.html'/><input type='button' value='SORTIR'></a>";
    }
    echo ("4");
    if (isset($_REQUEST['volver2'])){
        header('Location: login.php');
    }

    if(isset($_REQUEST['volver3'])){
        header("Location: alta.php");
    }
    echo ("5");
    //comprovem si venim del buto enviar
    if (isset($_REQUEST['enviar'])){
        //prepar query
        $sql="select * from usuarios where user='".$log."' and pass='".$pas."'";

        //echo $sql;
        $consulta = $db->prepare($sql);
       //preparar la execucio
       //$consulta = mysql_query ($sql, $db);

      //mostrar num de registres
       //$nfilas = mysql_num_rows($consulta);
        $consulta->execute();
        
      //comprobar si existeixen registres
      if (!$consulta->execute()){
          echo "Usuario no v&aacute;lido";
      }else{
            //echo "Usuario v&aacute;lido";
            echo "<br>1. <a href='alta.php'>Alta</a>";
            echo "<br>2. <a href='baja.php'>Baja</a>";
            echo "<br>3. <a href='consulta.php'>Consulta</a>";
            echo "<br>4. <a href='modifica2.php'>Modifica</a>";
            echo "<br><br><form><a href='login_form.html'/><input type='button' value='SORTIR'></a>";
        }
    }
    echo ("6");
    //comprovem si venim del buto alta
    if (isset($_REQUEST['alta'])){
        //prepar query
        $sql="insert into usuarios (user, pass) values ('".$log."','".$pas."');";
        echo("7.1");
        echo($sql);
        //confirmacion de alta
        //$consulta = PDO::query ($sql, $db);
        $consulta = $db->prepare($sql);
        echo("7.2"); 
        //echo $sql;
        $consulta->execute();
        echo "Usuario dado de ALTA";
        echo "<br><form action='test.php' method='post'><input type='submit' name='volver2' value='TORNAR'>";
        echo("7.3");
        mail($log,'Email ALTA','Bienvenido/a '.$log);

    }
    if (isset($_REQUEST['alta2'])){
        //prepar query
        $sql="insert into usuarios (user, pass) values ('".$log."','".$pas."')";
        echo("7");
        //confirmacion de alta
        $consulta = $db->prepare ($sql);
        $consulta->execute();
        //echo $sql;
        echo "Usuario dado de ALTA";
        echo "<br><form action='test.php' method='post'><input type='submit' name='volver3' value='TORNAR'>";
        mail($log,'Email ALTA','Bienvenido/a '.$log);
    }
?>