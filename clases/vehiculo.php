<?php
require_once 'AccesoDatos.php';
/**
*  CLASE VEHICULO
*/
class Vehiculo
{
//--ATRIBUTOS
	public $id;
	public $patente;
	public $fecha;
	public $hora;
//--------------------------------------------------------------------------------//

//--GETTERS Y SETTERS
  	public function GetId(){return $this->id;}
	public function GetPatente(){return $this->patente;}
	public function GetFecha(){return $this->fecha;}
	public function GetHora(){return $this->hora;}

	public function SetId($valor){$this->id = $valor;}
	public function SetPatente($valor){$this->patente = $valor;}
	public function SetFecha($valor){$this->fecha = $valor;}
	public function SetHora($valor){$this->hora = $valor;}
//--------------------------------------------------------------------------------//

//--CONSTRUCTOR
public function __construct($id=NULL){
	if ($id!=NULL) {
		$obj = Vehiculo::TraerUnVehiculo($id); //Si no lo encuentra retorna un Bool FALSE
		if ($obj) {
			$this->id = $obj->GetId();
			$this->patente = $obj->GetPatente();
			$this->fecha = $obj->GetFecha();
			$this->hora = $obj->GetHora();
		}

	}
}
//--------------------------------------------------------------------------------//
//--METODOS
  	public static function BorrarVehiculoPorId($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from vehiculos WHERE id=:id");
		$consulta->bindValue(':id',$id, PDO::PARAM_INT); 
		return $consulta->execute();
	}

	public static function BorrarVehiculoPorPatente($patente){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from vehiculos WHERE patente=:patente");	
		$consulta->bindValue(':patente',$patente, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();

	}

	public static function Modificar($vehiculo){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("update vehiculos set 
			patente='$vehiculo->patente', 
			fecha='$vehiculo->fecha',
			hora='$vehiculo->hora'
			WHERE id='$vehiculo->id'");
		return $consulta->execute();
	}
	
	public static function Insertar($vehiculo){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 	
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into vehiculos (patente,fecha,hora) values (:patente,:fecha,:hora) ");
		$consulta->bindValue(':patente',$vehiculo->patente, PDO::PARAM_STR);
		$consulta->bindValue(':fecha',$vehiculo->fecha, PDO::PARAM_STR);
		$consulta->bindValue(':hora',$vehiculo->hora, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function TraerUnVehiculo ($idParametro){	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("select * from vehiculos where id =:id");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$vehiculoBuscado = $consulta->fetchObject('vehiculo');
		return $vehiculoBuscado;					
	}

	public static function TraerUnVehiculoPorPatente($patente){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select * from vehiculos where patente =:patente");
		$consulta->bindValue(':patente', $patente, PDO::PARAM_STR);
		$consulta->execute();
		$arrVehiculos= $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");	
		return $arrVehiculos;
	}
	
	public static function TraerTodosLosVehiculos()	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from vehiculos order by id DESC");
		$consulta->execute();			
		$arrVehiculos= $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");	
		return $arrVehiculos;
	}

	public function ToString(){
		return $this->id." - ".$this->patente." - ".$this->fecha." - ".$this->hora."\r\n";
	}


	//DEVUELVO FALSE SI TODO ESTA OK------------------------//
	public static function ValidarPatente($stringPatente){

	$res = TRUE;

	//VALIDO FORMATO
	$regExpre = "/^[A-Z]{3,3}\-[0-9]{3,3}$/" ; // AAA-000
	$regExpre2 = "/^[A-Z]{2,2}\-?[0-9]{3,3}\-[A-Z]{2,2}$/"; // AA-000-AA

	$patente1 = preg_match($regExpre, $stringPatente); //Si es valido devuelve 1
	$patente2 = preg_match($regExpre2, $stringPatente);

	if ($patente1==1 || $patente2==1) { //SI ALGUNO DE LOS 2 ES IGUAL a 1 ENTRO
		$res = FALSE;
	}

	//VALIDO SI ESTA EN LA DB
	$val = empty(Vehiculo::TraerUnVehiculoPorPatente($stringPatente)); //FALSE si tiene datos - TRUE si esta vacio

	if (!$val)
		$res = TRUE;
	

	return $res;

	}
}

 ?>