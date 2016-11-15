<?php 
session_start();

	$_SESSION['usuario']=null;
	$_SESSION['permiso']=null;

session_destroy();
 ?>