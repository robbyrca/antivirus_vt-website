<?php
$user = "robbyrca";
$password = "QWEqwe123!";
$database = "antivirus";
$table = "archivos";

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <title>ARCHIVOS</title>
</head>
<body>
    <div class='container'>
        <header class='d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom'>
          <ul class='nav nav-pills'>
            <li class='nav-item'><a href='/home.html' class='nav-link'>Home</a></li>
            <li class='nav-item'><a href='/dispositivos.php' class='nav-link'>Dispositivos</a></li>
            <li class='nav-item'><a href='/archivos.php' class='nav-link active' aria-current='page'>Archivos</a></li>
            <li class='nav-item'><a href='/cuarentena.php' class='nav-link'>Cuarentena</a></li>
            <li class='nav-item'><a href='/contacto.html' class='nav-link'>Contacto</a></li>
          </ul>
        </header>
      </div>";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "
  <div class='px-5 py-0 my-5 text-left'><h2 class='pb-2 border-bottom '>ARCHIVOS</h2></div>";
  echo"<div class='px-5 py-0 my-5 text-left'><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
   echo "<li>" . $row['mountpoint'] . " | " . $row['content'] . " | <a href='/archivos/". $row['filename'] . "'>descargar</a></li>";
   }
  echo "</ol></div>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
