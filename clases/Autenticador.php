<?php

class Autenticador{

  static public function seteoUsuario($usuario){
    $_SESSION["nombre"] = $usuario["nombre"];
    $_SESSION["apellido"] = $usuario["apellido"];
    $_SESSION["email"] = $usuario["email"];
    $_SESSION["sexo"] = $usuario["sexo"];
    $_SESSION["pais"] = $usuario["pais"];
    $_SESSION["avatar"] = $usuario["avatar"];
    $_SESSION["rol"] = $usuario["rol"];
  }

  static function chequeoRol(){
    if ($_SESSION["rol"] != 7) {
      header("Location:listadoProductos.php");
    }
  }
}

 ?>
