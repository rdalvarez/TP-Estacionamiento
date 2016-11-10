<?php 
switch ($_POST['queHago']) {
	case 'FrmNuevoVehiculo':
		include("partes/FrmNuevoVehiculo.php");
		break;

	case 'NuevoVehiculo':
		require_once'clases/vehiculo.php';
		$respuesta['Exito'] = TRUE;
		$respuesta['Mensaje'] = "Se agrego un nuevo vehiculo correctamente.";

		$vehiculo = $_POST['vehiculo'];	

		$objVehiculo = new Vehiculo();//OBJETO VEHICULO
		$objVehiculo->patente = $vehiculo['patente']; //PATENTE
		$objVehiculo->estacionado = 1;
		$objVehiculo->fecha = date("Y-m-d");
		$objVehiculo->hora = date("H:i:s");

		var_dump($objVehiculo);

		break;

	case '':
		break;
	default:
		echo ":(";
		break;
}

 ?>