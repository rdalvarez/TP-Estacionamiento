
<?php 
require_once 'clases/vehiculo.php';

$obj = new Vehiculo(6);
$obj->patente = "GGG-999";
$r = Vehiculo::Modificar($obj);

var_dump($r);

?>

<input type="hidden" name=""> hola