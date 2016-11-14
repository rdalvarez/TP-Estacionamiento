<?php 
require_once 'clases/AccesoDatos.php';
/**
*  CLASE USUARIOS
*/
class Usuario
{	
//--ATRIBUTOS
	public $id;
	public $usuario;
	public $clave;
	public $permiso;
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR	
	public function __construct()
	{

	}
//--------------------------------------------------------------------------------//
//--METODOS STATICOS
	public static function InsertarUsuario($objUsuario){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 	
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuarios (usuario,clave,permiso) values (:usuario,:clave,:permiso)");
		$consulta->bindValue(':usuario',$objUsuario->usuario, PDO::PARAM_STR);
		$consulta->bindValue(':clave',$objUsuario->clave, PDO::PARAM_STR);
		$consulta->bindValue(':permiso',$objUsuario->permiso, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

  	public static function BorrarUsuarioId($id){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from usuarios WHERE id=:id");
		$consulta->bindValue(':id',$id, PDO::PARAM_INT); 
		return $consulta->execute();
	}

	public static function TraerUnUsuarioPorId ($idParametro){	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("select * from usuarios where id =:id");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$usuarioBuscado = $consulta->fetchObject('usuario');
		return $usuarioBuscado;					
	}

	public static function TraerUnUsuarioPorParametro($usuarioParametro){
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select * from usuarios where usuario =:usuario");
		$consulta->bindValue(':usuario', $usuarioParametro, PDO::PARAM_STR);
		$consulta->execute();
		$usuarioBuscado = $consulta->fetchObject('usuario');
		return $usuarioBuscado;
	}

	public static function TraerTodosLosUsuarios()	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios");
		$consulta->execute();			
		$arrUsuarios= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");	
		return $arrUsuarios;
	}
//--------------------------------------------------------------------------------//




}
 ?>