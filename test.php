<?php
    session_start();
    $user = "robbyrca";
    $password = "QWEqwe123!";
    $database = "antivirus";
    $table = "usuarios";

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
        if ($nfilas!=0){
	   $_SESSION['valido']=1;
            if($result[0]=='admin'){
		header("Location: dashboard/");
            }else{
                print ('Bienvenido!');
                echo "<br><br><form><a href='sign-in.html'/><input type='button' value='SORTIR'></a>";
            }
        }else{
            echo " Usuario no v&aacute;lido";
            echo "<br><br><form><a href='sign-in.html/><input type='button' value='SORTIR'></a>";
        }
    }
    
    //comprovem si venim del buto alta
    if (isset($_REQUEST['alta'])){
        //prepar query
        $sql="insert into usuarios (user, pass) values ('".$log."','".$pas."');";
        //confirmacion de alta
        $db->query($sql);
        echo "Usuario dado de ALTA";
        echo "<br><form action='test.php' method='post'><input type='submit' name='volver2' value='TORNAR'>";

    }
?>
