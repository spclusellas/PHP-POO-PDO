<?php

require_once("autoload.php");

$productos = $pdo->prepare("SELECT * FROM productos WHERE id=:id");
$productos->bindValue(':id', $_GET["id"]);
$productos->execute();
$arrayProducto = $productos->fetchAll(PDO::FETCH_ASSOC);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include_once("navbar.php"); ?>

    <?php foreach ($arrayProducto as $key => $producto): ?>
      <div class="detalleProd">
      <h4><?=$producto["nombre"]?></h4>
      <p>$ <?=$producto["precio"]?></p>
      <p><?=$producto["descripcion"]?></p>
      </div>
    <?php endforeach; ?>

  </body>
</html>
