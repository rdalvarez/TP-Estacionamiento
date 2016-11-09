<?php
require_once('AccesoDatos');
/**
*  CLASE VEHICULO
*/
class Vehiculo
{
//--ATRIBUTOS
	public $id;
	public $patente;
	public $estacionado;
	public $usuario;
	public $fecha;
	public $hora;
//--------------------------------------------------------------------------------//

//--GETTERS Y SETTERS
  	public function GetId(){return $this->id;}
	public function GetPatente(){return $this->patente;}
	public function GetEstacionado(){return $this->estacionado;}
	public function GetUsuario(){return $this->usuario;}
	public function GetFecha(){return $this->fecha;}
	public function GetHora(){return $this->hora;}

	public function SetId($valor){$this->id = $valor;}
	public function SetPatente($valor){$this->patente = $valor;}
	public function SetEstacionado($valor){$this->estacionado = $valor;}
	public function SetUsuario($valor){$this->usuario = $valor;}
	public function SetFecha($valor){$this->fecha = $valor;}
	public function SetHora($valor){$this->hora = $valor;}
//--------------------------------------------------------------------------------//

//--CONSTRUCTOR
public function __construct($id=NULL){
	if ($id!=NULL) {
		$obj = Vehiculo::TraerUnCelular($id);
		$this->id = $obj->GetId();
		$this->patente = $obj->GetPatente();
		$this->estacionado =  $obj->GetEstacionado();
		$this->usuario = $obj->GetUsuario();
		$this->fecha = $obj->GetFecha();
		$this->hora = $obj->GetHora();
	}
}
//--------------------------------------------------------------------------------//
  	public static function BorrarVehiculoPorId($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from vehiculos WHERE id=:id");
		$consulta->bindValue(':id',$idParametro, PDO::PARAM_INT); 
		return $consulta->execute();
	}

	public static function BorrarVehiculoPorPatente($patente)
	{

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from vehiculos WHERE patente=:patente");	
		$consulta->bindValue(':patente',$patente, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();

	}

	public static function Modificar($objVehiculo)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("update vehiculos set 
			patente='$objVehiculo->patente',
			estacionado='$objVehiculo->estacionado', 
			fecha='$objVehiculo->fecha' 
			WHERE id='$objVehiculo->id'"
			);
		return $consulta->execute();
	}
	
  
	 public function InsertarElCd()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into vehiculos (titel,interpret,jahr)values('$this->titulo','$this->cantante','$this->año')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	  public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update vehiculos 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into vehiculos (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarCD()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarCdParametros();
	 		}else {
	 			$this->InsertarElCdParametros();
	 		}

	 }


  	public static function TraerTodoLosCds()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,titel as titulo, interpret as cantante,jahr as año from vehiculos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
	}

	public static function TraerUnCd($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from vehiculos where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
			return $cdBuscado;				

			
	}

	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from vehiculos  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from vehiculos  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	
	public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from vehiculos  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}
}

 ?>