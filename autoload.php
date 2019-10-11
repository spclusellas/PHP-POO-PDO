<?php

session_start();

require_once("clases/Autenticador.php");
require_once("clases/BaseDeDatos.php");
require_once("clases/Producto.php");
require_once("clases/BaseMySQL.php");
require_once("clases/Usuario.php");
require_once("clases/Validador.php");
require_once("clases/ArmarRegistro.php");

$host = "localhost";
$bd = "e-commerce-derqui";
$usuario = "root";
$password = "root";
$puerto = "8889";
$charset = "utf8mb4";

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);

$validador = new Validador();

 ?>
