<?php
session_start();
 if (($_SESSION['valido']!=1) || (!isset($_SESSION['valido']))) 
 header('Location: ../sign-in.html');

$user = "robbyrca";
$password = "QWEqwe123!";
$database = "antivirus";
$table = "cuarentena";

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <title>CUARENTENA</title>
</head>
<body>
    <div class='container'>
    <header class='d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom'>
    <ul class='nav col-20 nav-pills'>
      <li class='nav-item'><a href='/' class='nav-link'>Home</a></li>
      <li class='nav-item'><a href='/dispositivos.php' class='nav-link'>Dispositivos</a></li>
      <li class='nav-item'><a href='/archivos.php' class='nav-link'>Archivos</a></li>
      <li class='nav-item'><a href='/cuarentena.php' class='nav-link active' aria-current='page'>Cuarentena</a></li>
      <li class='nav-item'><a href='/contacto.html' class='nav-link'>Contacto</a></li>
    </ul>
    <div class='col-md-0 text-end'>"?>
    <button type="button" onclick="location.href='../sign-in.html'"class="btn btn-primary">Sign-out</button>
  <?php echo "</div>
  </header>
      </div>";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<main class='container'>
  <div class='bg-light p-5 rounded mt-3'>
    <h1>¡IMPORTANTE!</h1>
    <p class='lead'>La descarga de todos los archivos que se encuentran en esta sección es bajo su responsabilidad, ya que han sido analizados y contienen virus.</p>
  </div>
</main>";
echo "<div class='px-5 py-0 my-5 text-left'><h2 class='pb-2 border-bottom '>CUARENTENA</h2></div>";
  echo"<div class='px-5 py-0 my-5 text-left'><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
   echo "<li>" . $row['path'] . " | " . $row['file'] . " | <a href='"$row['path']. $row['file'] . "'>descargar</a></li>";
   }
  echo "</ol></div>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
