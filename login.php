<?php
require_once("autoload.php");

if ($_POST) {
  $usuario = BaseMySQL::buscarPorEmail($_POST["email"], $pdo, 'usuarios');
  if ($usuario == null) {
    $errores[] = "El usuario no existe";
  } else {
    $errores = $validador->validarLogin($_POST, $usuario);
    if (count($errores) == 0) {
      Autenticador::seteoUsuario($usuario);
      header("Location:perfil.php");
    }
  }
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <header>
       <?php require_once('navbar.php') ?>
     </header>
     <h1>Formulario de Login</h1>
     <?php if (isset($errores)): ?>
       <?php foreach ($errores as $key => $error): ?>
           <li class="alert alert-danger"><?=$error?></li>
       <?php endforeach; ?>
     <?php endif; ?>
     <form class="" action="login.php" method="post">
       <label for="email">Email:</label>
       <input type="email" name="email" value=""><br>
       <label for="contrasenia">Contraseña:</label>
       <input type="password" name="contrasenia" value=""><br>
       <input type="checkbox" name="recordar" value="S"> Recordar Usuario <br>
       <button type="submit" name="button">Iniciar Sesion</button>
     </form>
