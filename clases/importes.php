<?php 
require_once 'clases/vehiculo.php';

/**
* 	
*/
class Importes extends Vehiculo
{	
	public $fechaFinal;
	public $horaFinal;
	public $tiempoTranscurrido;
	public $importe;

	function __construct($id)
	{
		parent::__construct($id);
		$this->fechaFinal = date("Y-m-d");
		$this->horaFinal = date("H:i:s");
		$this->tiempoTranscurrido = $this->CalcularTiempoTranscurrido();
		$this->importe = 1; //Quiero ingresarle el importe por fuera asi puedo modificar por cuanto quiero cobrar por segundo
	}

	private function CalcularTiempoTranscurrido(){
		return (strtotime($this->fechaFinal . " " . $this->horaFinal) - strtotime($this->fecha . " " . $this->hora));
	}

	public function CalcularImporte($montoPorSegundo){
		$this->importe = $this->tiempoTranscurrido * $montoPorSegundo;
	}



}


 ?>