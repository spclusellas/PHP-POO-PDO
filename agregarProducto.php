<?php
require_once("autoload.php");

Autenticador::chequeoRol();

$categorias = $pdo->prepare("SELECT * FROM categorias");
$categorias->execute();
$arrayCategorias = $categorias->fetchAll(PDO::FETCH_ASSOC);
// var_dump($arrayCategorias);
// exit;

if ($_POST) {

  $sql = "INSERT INTO productos VALUES(default, :nombre, :precio, :descripcion, :categoria)";
  $agregarProducto = $pdo->prepare($sql);

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $categoria = $_POST["categoria"];

  $agregarProducto->bindValue(':nombre', $nombre);
  $agregarProducto->bindValue(':precio', $precio);
  $agregarProducto->bindValue(':descripcion', $descripcion);
  $agregarProducto->bindValue(':categoria', $categoria);

  $agregarProducto->execute();
}
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php require_once("navbar.php")?>

    <h2>Agregar Producto</h2>
    <form class="" action="agregarProducto.php" method="post">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value=""><br>
      <label for="precio">Precio</label>
      <input type="number" name="precio" value=""><br>
      <label for="">Descripcion</label><br>
      <textarea name="descripcion" rows="8" cols="80"></textarea><br>
      <select class="" name="categoria">
        <?php foreach ($arrayCategorias as $key => $categoria): ?>
          <option value=<?=$categoria["id"]?>><?=$categoria["nombre"]?></option>
        <?php endforeach; ?>
      </select><br>
      <button type="submit" name="button">Guardar</button>
    </form>

  </body>
</html>
