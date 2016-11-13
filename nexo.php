<?php 
switch ($_POST['queHago']) {

	case 'FrmNuevoVehiculo': // CARGAR FORMULARIO PARA INGRESAR UN NUEVO VEHICULO
		include_once("partes/FrmNuevoVehiculo.php");
		break;

	case 'NuevoVehiculo': //BOTON DEL FORMULARIO PARA CARGAR LA PATENTE
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

	case 'VerGrilla'://MUESTRO TODOS LOS VEHICULOS ESTACIONADOS
		include_once 'partes/FrmGrillaDeVehiculos.php';
		break;

	case 'CobrarVehiculo':
			require_once'clases/vehiculo.php';

			$importe = 0.2;
			$id = $_POST['id'];

			$respuesta['Exito'] = FALSE;
			$respuesta['Mensaje'] = "No se pudo cobrar.";

			$objImporte = new Importes($id);
			$objImporte->CalcularImporte(0.1); //Importe por SEGUNDO TRASNCURRIDO

			if ($objVehiculo !== NULL) {
				$respuesta['Exito'] = TRUE;
				$respuesta['Mensaje'] = "Se cobro la siguiguiente patente: ".$objImporte->patente."\nImporte: ".." mangos";
			}

			echo json_encode($respuesta);

		break;

	case 'EditarVehiculo':
		echo "EDITAR :" . $_POST['id'];
		break;

	case 'BorrarVehiculo';
		echo "BORRAR :" . $_POST['id'];
		break;

	default:
		echo ":(";
		break;
}

 ?>