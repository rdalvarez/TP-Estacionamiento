<?php 
switch ($_POST['queHago']) {
	case 'NuevoAuto':
			include("partes/FrmAltaAuto.php");
		break;
	
	default:
		echo ":(";
		break;
}

 ?>