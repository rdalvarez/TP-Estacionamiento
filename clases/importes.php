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

	function __construct($id=NULL)
	{
		if ($id!=NULL) {
			parent::__construct($id);

			if ($this->id!=NULL) {
				$this->fechaFinal = date("Y-m-d");
				$this->horaFinal = date("H:i:s");
				$this->tiempoTranscurrido = $this->CalcularTiempoTranscurrido();
				$this->importe = 1; //Quiero ingresarle el importe por fuera asi puedo modificar por cuanto quiero cobrar por segundo
			}

		}		
	}

	private function CalcularTiempoTranscurrido(){
		return (strtotime($this->fechaFinal . " " . $this->horaFinal) - strtotime($this->fecha . " " . $this->hora));
	}

	public function CalcularImporte($montoPorSegundo){
		$this->importe = $this->tiempoTranscurrido * $montoPorSegundo;
	}

	public static function InsertarImporte($objImporte){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into importes 
			(patente,fecha,hora,fechaFinal,horaFinal,tiempoTranscurrido,importe) 
			values (:patente,:fecha,:hora,:fechaFinal,:horaFinal,:tiempoTranscurrido,:importe) ");
		$consulta->bindValue(':patente',$objImporte->patente, PDO::PARAM_STR);
		$consulta->bindValue(':fecha',$objImporte->fecha, PDO::PARAM_STR);
		$consulta->bindValue(':hora',$objImporte->hora, PDO::PARAM_STR);
		$consulta->bindValue(':fechaFinal',$objImporte->fechaFinal, PDO::PARAM_STR);
		$consulta->bindValue(':horaFinal',$objImporte->horaFinal, PDO::PARAM_STR);
		$consulta->bindValue(':tiempoTranscurrido',$objImporte->tiempoTranscurrido, PDO::PARAM_STR);
		$consulta->bindValue(':importe',$objImporte->importe, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function TraerTodosLosImportes(){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("select * from importes");
		$consulta->execute();			
		$arrImportes = $consulta->fetchAll(PDO::FETCH_CLASS, "Importes");	
		return $arrImportes;	
	}

}


 ?>