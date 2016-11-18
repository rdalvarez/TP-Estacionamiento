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

$string = $_GET['text'];

$r = ereg("-", $string);

if ($r != FALSE) {
	echo "tiene - ";
}

var_dump($r);

 ?>