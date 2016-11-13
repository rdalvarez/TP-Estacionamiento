<?php
if (!isset($_POST['queHago'])) {
	header('Location: http://localhost/php/');
	return;
}else
{
	session_start();
}

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
			
			require_once 'clases/importes.php';

			$respuesta['Exito'] = FALSE;
			$respuesta['Mensaje'] = "ERROR INESPERADO:\nNo se pudo Cobrar.";

			$importe = 0.2;
			$id = $_POST['id'];

			$objImporte = new Importes($id); //Usa el contructor de Vehiculo y asi obtengo los datos del auto estacionado

			if ($objImporte == NULL) {
				$respuesta['Mensaje'] = "Ocurrio un error inesperado.\n\nNo se pudo crear el importe.";
				echo json_encode($respuesta);
			}

			$objImporte->CalcularImporte(0.1); //manualmente ingreso el Importe por SEGUNDO TRASNCURRIDO y setea el atributo (importe) de la clase 

			//GUARDO EL AUTO ESTACIONADO EN MI GRILLA DE IMPORTES
			$myId = Importes::InsertarImporte($objImporte);

			if ($myId>0) {				
				$respuesta['Exito'] = TRUE;
				$respuesta['Mensaje'] = "Se ingreso correctamente el pago. \nPatente: " . $objImporte->patente . ".\nImporte: " . $objImporte->importe . " mangos." . "\nMinutos Transcurridos: ". $objImporte->tiempoTranscurrido/60;
			}
			//BORRO EL AUTO ESTACIONADO
			$r = Vehiculo::BorrarVehiculoPorId($id);
			if (!$r) {
				$respuesta['Mensaje'] = "Ocurrio un error inesperado. \nSe ingreso el pago PERO EL AUTO SIGUE ESTACIONADO.";
			}
			

			echo json_encode($respuesta);

		break;

	case 'FrmEditarVehiculo':

		$_SESSION["FID"] = $_POST['id'];

		include_once 'partes/FrmEditarVehiculo.php';

		break;

	case 'EditarVehiculo':

			require_once 'clases/vehiculo.php';

			$respuesta['Exito'] = FALSE;
			$respuesta['Mensaje'] = "ERROR INESPERADO: \n No se pudo modificar la Patente.";

			if (!isset($_POST['id']) && !isset($_POST['patente'])) {
				echo json_encode($respuesta);
			}

			$id = $_POST['id'];//Donde esta 
			$patente = $_POST['patente']; //Nueva patente

			$objVehiculo = new Vehiculo($id); // Obtengo patente a modificar

			if ($objVehiculo != NULL) {

				$respuesta['Exito'] = TRUE;
				$respuesta['Mensaje'] = "Se pudo editar correctamente el Vehiculo.\n" . $objVehiculo->patente . " => " . $patente;
				$objVehiculo->patente = $patente;

				$r = Vehiculo::Modificar($objVehiculo);
			}			

			echo json_encode($respuesta);

		break;

	case 'BorrarVehiculo':
		echo "BORRAR :" . $_POST['id'];
		break;

	default:
		echo ":(";
		break;
}

 ?>