<?php

class Validador{

  public function validarRegistro($datos){

    $errores = [];

    if ($datos) {
      if (strlen($datos["nombre"])==0) {
        $errores[] = "El campo nombre se encuentra vacio";
      }
      if (strlen($datos["apellido"])==0) {
        $errores[] = "El campo apellido se encuentra vacio";
      }
      if (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email tiene un formato incorrecto";
      }
      if (strlen($datos["contrasenia"])<=6) {
        $errores[] ="La contraseña tiene menos de 6 caracteres";
      }
      if ($datos["contrasenia"] != $datos["recontras"]) {
        $errores[] = "Las contraseñas no coinciden";
      }
      // En esta seccion utilizo la  variable FILES para validar que la imagen que caegó el usuario haya llegado de forma correcta y tenga la extension correspondiente.
      if ($_FILES != null){
        if ($_FILES["avatar"]["error"]!=0){
          $errores["avatar"] = "No recibi la imagen";
        }
        $nombimg = $_FILES["avatar"]["name"];
        $ext = pathinfo($nombimg, PATHINFO_EXTENSION);
        if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
          $errores["avatar"] = "La extension del archivo es incorrecto";
        }
      }
    }
    return $errores;
  }

  public function validarLogin($datos, $usuario){

    if(password_verify($datos["contrasenia"], $usuario["contrasena"]) == false){
      $errores[] = "El usuario/contrasenia es incorrecto";
    }
    // La funcion retorna los errores
    return $errores;
  }

}



 ?>
