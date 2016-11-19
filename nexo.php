<?php
session_start();
if (!isset($_POST['queHago']) && !isset($_SESSION['usuario'])) {
	header('Location: http://localhost:8080/php/');
	//header('Location: http://myestacionamiento.esy.es');
	return;
}

switch ($_POST['queHago']) {

	case 'FrmNuevoVehiculo': // CARGAR FORMULARIO PARA INGRESAR UN NUEVO VEHICULO
		include_once("partes/FrmNuevoVehiculo.php");
		break;

	case 'NuevoVehiculo': //BOTON DEL FORMULARIO PARA CARGAR LA PATENTE
		require_once'clases/vehiculo.php';

		$respuesta['Exito'] = FALSE;
		$respuesta['Mensaje'] = "Hubo un error al Agrear la nueva patente.";

		$vehiculo = $_POST['vehiculo']; //Recivo un array (1){["patente"] => string}
		$patente = strtoupper($vehiculo['patente']); // Paso todo a mayusculas

		$validacion = Vehiculo::ValidarPatente($patente); //retorna FALSE si esta bien la validacion

		if ($validacion) {
			$respuesta['Exito'] = FALSE;
			$respuesta['Mensaje'] = "ERROR: la patente ya se encuentra o no se reconoce como patente.\nSOLO SE ADMITE EL SIGUIENTE FORMATO: AAA-000 Y AA-000-AA.\nPor favor vuelva a intentar.";
			echo json_encode($respuesta);
			return;
		}				

		$objVehiculo = new Vehiculo();//OBJETO VEHICULO
		$objVehiculo->patente = $patente; //PATENTE
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

			$importe = 0.01;//seria 1 centavo por segundo
			$id = $_POST['id'];

			$objImporte = new Importes($id); //Usa el contructor de Vehiculo y asi obtengo los datos del auto estacionado

			if ($objImporte == NULL) {
				$respuesta['Mensaje'] = "Ocurrio un error inesperado.\n\nNo se pudo crear el importe.";
				echo json_encode($respuesta);
			}

			$objImporte->CalcularImporte($importe); //manualmente ingreso el Importe por SEGUNDO TRASNCURRIDO y setea el atributo (importe) de la clase 

			//GUARDO EL AUTO ESTACIONADO EN MI GRILLA DE IMPORTES
			$myId = Importes::InsertarImporte($objImporte);
			$horas = number_format($objImporte->tiempoTranscurrido/3600, 2, '.', '');//Convercion para que aparezca solo con 2 dijitos

			if ($myId>0) {				
				$respuesta['Exito'] = TRUE;
				$respuesta['Mensaje'] = "Se ingreso correctamente el pago.\nFecha y Hora de Salida:". $objImporte->fechaFinal . " - " . $objImporte->horaFinal ." \nPatente: " . $objImporte->patente . ".\nImporte: " . $objImporte->importe . " mangos." . "\nTiempo: " . $horas . "horas.";
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

			$validacion = Vehiculo::ValidarPatente($patente); //retorna FALSE si esta bien la validacion

			if ($validacion) {
				$respuesta['Exito'] = FALSE;
				$respuesta['Mensaje'] = "ERROR: la patente ya se encuentra o no se reconoce como patente.\nSOLO SE ADMITE EL SIGUIENTE FORMATO: AAA-000 Y AA-000-AA.\nPor favor vuelva a intentar.";
				echo json_encode($respuesta);
				return;
			}	

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
		
		require_once 'clases/vehiculo.php';

		$respuesta['Exito'] = FALSE;
		$respuesta['Mensaje'] = "ERROR INESPERADO: \n No se pudo borrar.";

		if (!isset($_POST['id'])) {
			echo json_encode($respuesta);
		}

		$id = $_POST['id'];

		$objVehiculo = new Vehiculo($id);

		if ($objVehiculo!=NULL) {
			$respuesta['Exito'] = TRUE;
			$respuesta['Mensaje'] = "Se pudo borrar el vehiculo.";
			$r = Vehiculo::BorrarVehiculoPorId($objVehiculo->id);			
		}

		echo json_encode($respuesta);

		break;

	case 'ValidarLogin':
		require_once'clases/usuario.php';

		$respuesta['Exito'] = FALSE;
		$respuesta['Mensaje'] = "ERROR VALIDAR USUARIO.";

		if (!isset($_POST['usuario']) && !isset($_POST['clave'])) {
			$respuesta['Mensaje'] = "NO SE ACEPTAN CAMPOS VACIOS";
			echo json_encode($respuesta);
		}

		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];

		$objUsuario = Usuario::TraerUnUsuarioPorParametro($usuario);

		if ($objUsuario != NULL) {
			if ($objUsuario->usuario == $usuario) {
				$respuesta['Exito'] = TRUE;
				$respuesta['Mensaje'] = "CORRECTO! \nSERAS RE-DIRECCIONADO A LA PAGINA.";
				$_SESSION['usuario'] = $objUsuario->usuario;
				$_SESSION['permiso'] = $objUsuario->permiso;
			}
		}


		echo json_encode($respuesta);

		break;

	case "FrmGrillaDeCobro":

		include_once 'partes/FrmGrillaDeCobro.php';
		break;

	default:
		echo ":(";
		break;
}

 ?>