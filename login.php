<?php
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Benvingut/da</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="sign-in.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
</head>
<body class="text-center">
    <form action="test.php" method="post" data-bitwarden-watching="1">
        <h1 class="h3 mb-3 fw-normal">Benvigut/da</h1>
        <div class="form-floating">
            <input required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login">
            <label for="floatingInput"></label>
        </div>
        <div class="form-floating">
            <input required type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
            <label for="floatingPassword"></label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" value="ENVIAR" NAME="enviar">Log In</button>
        <button class="w-100 btn btn-lg btn-primary" type="submit" value="ALTA" NAME="alta">Crear un compte</button>
    </form>
</body>
</html>
