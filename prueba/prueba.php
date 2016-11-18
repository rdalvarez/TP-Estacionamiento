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

$string = strtoupper($_GET['text']);
echo $string."\n";


$regExpre = "/^[A-Z]{3,3}\-[0-9]{3,3}$/" ;
$regExpre2 = "/^[A-Z]{2,2}\-?[0-9]{3,3}\-[A-Z]{2,2}$/";

$patente1 = preg_match($regExpre, $string);
$patente2 = preg_match($regExpre2, $string);

if ($patente1==1 || $patente2==1) {
	echo "\n VALIDADO \n";
}

var_dump($patente1);var_dump($patente2);

 ?>