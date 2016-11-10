<?php 

require_once 'clases/vehiculo.php';

//$vehiculo = new vehiculo(8);
// $vehiculo->patente = "CCC-333";
// $vehiculo->estacionado = 1;
// $vehiculo->fecha = "2016-10-8";
// $vehiculo->hora = "10:10:00";


//$r = Vehiculo::Modificar($vehiculo);

$r = Vehiculo::TraerUnVehiculoPorPatente("SSS-111");

var_dump($r);

 ?>