<?php 

require_once 'clases/usuario.php';


$obj = new Usuario();

$obj->id = 1;
$obj->usuario = "admin@test.com";
$obj->clave = "micontraseñaTest";
$obj->permiso = "admin";

$r = Usuario::TraerUnUsuarioPorId($obj->id);
var_dump($r);
var_dump($obj);

 ?>