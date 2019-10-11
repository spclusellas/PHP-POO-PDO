<?php

class ArmarRegistro{

  static public function armarUsuario($datos, $imagen){

    // Lo primero que hago es tomar la contraseña y la hasheo. Guardando esto en una variable
    $contraHash = password_hash($datos["contrasenia"], PASSWORD_DEFAULT);
    // Cre un array usuario  que en cada posicion recibira lo que el usuario ingreso en el formulario salvo en las posiciones de contraseña (va a recibir la contraseña previamente hasheada) y el avatar (recibira el nombre final de la imagen con el que fue guardado en el servidor.)
    $usuario = new Usuario($datos["nombre"], $datos["apellido"], $datos["email"], $contraHash, $datos["sexo"], $datos["pais"], $imagen);
    // La funcion retorna el array usuario con cada una de sus posiciones completadas.
    return $usuario;
  }

  // Esta funcion recibira el usuario previamente creado en la funcion anterior y lo guardara en formato JSON en el archivo asignado.
  static public function guardarUsuario($usuario){
    $json = json_encode($usuario);
    file_put_contents("usuarios.json",$json.PHP_EOL, FILE_APPEND);
  }

  static public function armarImagen($imagen){
    // Aca boy a guardar el nombre con el que el usuario subio su archivo en la variable nombre para despues, utilizando la funcion pathinfo poder extraer la extension del archivo.
    $nombre = $_FILES["avatar"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    // En la variable $archivoOrigen voy a guardar el archivo temporal en donde se encuentra guardada mi imagen en mi servidor.
    $archivoOrigen = $_FILES["avatar"]["tmp_name"];

    // La variable $rutaDestino va a contener toda la ruta hasta la carpeta donde guardaremos la imagen que suba el usuario.
    // La funcion dirname(__FILE__) nos va a devolver la ruta exacta hasta el lugar donde esta el archivo que estamos utilizando en este momento.
    // A esa ruta le agregué la carpeta fotos que va a ser la carpeta donde se guardaran estas imagenes
    $rutaDestino = dirname(__DIR__);
    $rutaDestino = $rutaDestino."/fotos/";

    // Utilizando la funcion uniqid() php va a crearle un nombre unico a mi imagen
    $nombreImg = uniqid();

    // En esta parte voy a guardar la ruta final de mi archivo que va a ser la ruta hastala carpeta fotos y ahi voy a ponerle el nombre creado en el paso anterios y ponerle la extension del archivo que la separe en los primeros pasos.
    $rutaDestino = $rutaDestino.".".$nombreImg.".".$ext;

    // Voy a subir el archivo que se encuentra en el tmp_name(que se guardo en la variable $archivoOrigen) en la ruta final creada en el paso anterior.
    move_uploaded_file ($archivoOrigen, $rutaDestino);

    // La funcion retornara el nombre final de la imagen con su extension.
    return $nombreImg.".".$ext;
  }

}
 ?>
