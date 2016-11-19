<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="GET" action="">
	<input type="text" name="text" id="text">
<input type="submit" name="submit" id="submit">
</form>

</body>
</html>


<?php 
require_once '../clases/vehiculo.php';


$pat = $_GET['text'];

$res = Vehiculo::ValidarPatente($pat);

var_dump($res);
 ?>