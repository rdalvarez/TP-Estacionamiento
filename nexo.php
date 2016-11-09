<?php 
switch ($_POST['queHago']) {
	case 'FrmNuevoVehiculo':
		include("partes/FrmNuevoVehiculo.php");
		break;
	case 'FrmIngreso':
		include("partes/FrmIngreso.php");
		break;
	case '':
		break;
	default:
		echo ":(";
		break;
}

 ?>