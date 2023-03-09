<?php

    $user = "robbyrca";
    $password = "QWEqwe123!";
    $database = "intranet";
    $table = "usuarios";

    //Definir cte
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    try{
        //conexio servidor bd
        $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    
    //variable del formulario
    $log = $_REQUEST['login'];
    $pas = md5($_REQUEST['pass']);
    
    //eliminar igual del camp pass
    $log = str_replace("=", "", $log);
    $log = str_replace("'", "", $log);
    $pas = str_replace("=", "", $pas);
    $pas = str_replace("'", "", $pas);

    if (isset($_REQUEST['volver'])){
        echo "<br>1. <a href='alta.php'>Alta</a>";
        echo "<br>2. <a href='baja.php'>Baja</a>";
        echo "<br>3. <a href='consulta.php'>Consulta</a>";
        echo "<br>4. <a href='modifica2.php'>Modifica</a>";
        echo "<br><br><form><a href='login_form.html'/><input type='button' value='SORTIR'></a>";
    }

    if (isset($_REQUEST['volver2'])){
        header('Location: login.php');
    }

    if(isset($_REQUEST['volver3'])){
        header("Location: alta.php");
    }
    //comprovem si venim del buto enviar
    if (isset($_REQUEST['enviar'])){
        //prepar query
        $sql = "select role from usuarios where user='".$log."' and pass='".$pas."'";
        $nfilas=0;
        foreach($db->query($sql) as $result){
            if ($result) $nfilas++;
        }
        $dbh = null;
        print  ($nfilas);
        print_r($result);
        if ($nfilas!=0){
            if($result[0]=='admin'){
                print('You are admin');
                echo "<br><br><form><a href='login.php'/><input type='button' value='SORTIR'></a>";
            }else{
                print ('You are basic');
                //echo "Usuario v&aacute;lido";
                #echo "<br>1. <a href='alta.php'>Alta</a>";
                #echo "<br>2. <a href='baja.php'>Baja</a>";
                #echo "<br>3. <a href='consulta.php'>Consulta</a>";
                #echo "<br>4. <a href='modifica2.php'>Modifica</a>";
                echo "<br><br><form><a href='login.php'/><input type='button' value='SORTIR'></a>";
            }
        }else{
            echo " Usuario no v&aacute;lido";
            echo "<br><br><form><a href='login.php'/><input type='button' value='SORTIR'></a>";
        }
    }
    
    //comprovem si venim del buto alta
    if (isset($_REQUEST['alta'])){
        //prepar query
        $sql="insert into usuarios (user, pass) values ('".$log."','".$pas."');";
        //confirmacion de alta
        //$consulta = PDO::query ($sql, $db);
        $db->query($sql);
        //echo $sql;
        echo "Usuario dado de ALTA";
        echo "<br><form action='test.php' method='post'><input type='submit' name='volver2' value='TORNAR'>";
        #mail($log,'Email ALTA','Bienvenido/a '.$log);

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