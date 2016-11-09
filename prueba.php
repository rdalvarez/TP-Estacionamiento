<?php 

require_once 'clases/vehiculo.php';

$vehiculo = new vehiculo(7);
// $vehiculo->patente = "CCC-333";
// $vehiculo->estacionado = 1;
// $vehiculo->fecha = "2016-10-8";
// $vehiculo->hora = "10:10:00";

var_dump($vehiculo);

$string = $vehiculo->ToString();

echo $string;
 ?>