<?php
include_once('autoload.php');
include_once('paises.php');

if ($_POST){

  $errores = $validador->validarRegistro($_POST);

  if (count($errores) == 0) {

      $usuario = BaseMySQL::buscarPorEmail($_POST["email"], $pdo, 'usuarios');

      if ($usuario != null) {
        $errores[] = "El email ya se encuentra registrado";
      } else {

        $avatar = ArmarRegistro::armarImagen($_FILES);

        $usuario = ArmarRegistro::armarUsuario($_POST, $avatar);

        BaseMYSQL::guardarUsuario($pdo, $usuario);

        header("Location:login.php");

        exit;
      }
  }
}


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Mi Formulario</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <header>
       <?php require_once('navbar.php') ?>
     </header>
     <h1>Formulario de Registro</h1>
     <ul>
       <?php if (isset($errores)): ?>
         <?php foreach ($errores as $key => $error): ?>
             <li class="alert alert-danger"><?=$error?></li>
         <?php endforeach; ?>
       <?php endif; ?>
      </ul>
      <form class="mx-a ml-5" action="registro.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="">
        <br>
        <label for="apellido">Apellido</label><br>
        <input type="text" name="apellido" value=""><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" value=""><br>
        <label for="contrasenia">Contraseña:</label><br>
        <input type="password" name="contrasenia"><br>
        <label for="recontras">Confirmar Contraseña:</label><br>
        <input type="password" name="recontras"><br>
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" value="M">Mujer
        <input type="radio" name="sexo" value="H">Hombre
        <input type="radio" name="sexo" value="O">Otro
        <br>
        <label for="pais">Pais de nacimiento:</label><br>
        <select class="" name="pais">
          <?php foreach ($paises as $codigo => $pais) : ?>
            <?php if ($_POST["pais"] == $codigo): ?>
              <option value=<?=$codigo?> selected><?=$pais?></option>
              <?php else: ?>
              <option value=<?=$codigo?>><?=$pais?></option>
            <?php endif; ?>
          <?php endforeach ?>
        </select><br>
          <label for="avatar">Avatar</label>
          <input type="file" name="avatar" >
          <br>
        <button type="submit" name="button">Enviar Formilario</button>
      </form>
   </body>
 </html>
