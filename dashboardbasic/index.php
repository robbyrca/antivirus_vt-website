<?php
session_start();
 if (($_SESSION['valido']!=1) || (!isset($_SESSION['valido']))) 
 header('Location: ../sign-in.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ANTIVIRUS-VT</title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <ul class="nav col-20 nav-pills">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/dispositivos.php" class="nav-link">Dispositivos</a></li>
            <li class="nav-item"><a href="/archivos.php" class="nav-link">Archivos</a></li>
            <li class="nav-item"><a href="/cuarentena.php" class="nav-link">Cuarentena</a></li>
          </ul>
          <div class="col-md-0 text-end">
            <button type="button" onclick="location.href='../sign-in.html'"class="btn btn-primary">Sign-out</button>
          </div>
        </header>
      </div>
     
      <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">ANTIVIRUS</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
              <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
            </div>
            <h3 class="fs-2">Dispositivos</h3>
            <p>Base de datos de los dispositivos que se han conectado</p>
            <a href="/dispositivos.php" class="icon-link d-inline-flex align-items-center">
              Ir a la página
              <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
              <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
            </div>
            <h3 class="fs-2">Archivos</h3>
            <p>Descarga los archivos que se han analizado favorablemente.</p>
            <a href="/archivos.php" class="icon-link d-inline-flex align-items-center">
              Ir a la página
              <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
        </div>
      </div>
   
</body>
</html>
