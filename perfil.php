<?php

require_once("autoload.php");

// var_dump($_SESSION);
// exit;

 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include_once("navbar.php"); ?>
    <div class="perfil">
      <h1>Bienvenido <?=$_SESSION["nombre"] . " " . $_SESSION["apellido"]?></h1>
      <img width="200" src="fotos/.<?=$_SESSION["avatar"]?>" alt="">
    </div>

      <?php if ($_SESSION["rol"] == "7"): ?>
        <div class="agregarProd">
        <a href="agregarProducto.php">Agregar Producto</a>
        </div>
      <?php endif; ?>

    <div class="cerrarsesion">
      <a href="cerrarsesion.php">Cerrar Sesion</a>
    </div>
  </body>
</html>
