<?php 
switch ($_POST['queHago']) {
	case 'FrmNuevoVehiculo':
		include_once("partes/FrmNuevoVehiculo.php");
		break;

	case 'NuevoVehiculo':
		require_once'clases/vehiculo.php';
		$respuesta['Exito'] = FALSE;
		$respuesta['Mensaje'] = "Hubo un error al Agrear la nueva patente.";

		$vehiculo = $_POST['vehiculo'];	

		$objVehiculo = new Vehiculo();//OBJETO VEHICULO
		$objVehiculo->patente = $vehiculo['patente']; //PATENTE
		$objVehiculo->estacionado = 1;
		$objVehiculo->fecha = date("Y-m-d");
		$objVehiculo->hora = date("H:i:s");

		$r = Vehiculo::Insertar($objVehiculo);
		
		if ($r>0) {
			$respuesta['Exito'] = TRUE;
			$respuesta['Mensaje'] = "Se agrego un nuevo vehiculo correctamente.";
		}

		$json = json_encode($respuesta);

		echo $json;

		break;

	case 'VerGrilla':
		//include_once 'partes/FrmEstacionamiento.php';
		include_once 'partes/FrmGrillaDeVehiculos.php';

		break;
	default:
		echo ":(";
		break;
}

 ?>