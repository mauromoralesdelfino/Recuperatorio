<?php
class usuario
{

	public $id;
 	public $nombre;
  	public $correo;
  	public $clave;
  	public $tipo;
  	

public static function TraerTodosLosUsuarios()
{

$objetoAcccesDatos = AccesoDatos::dameUnObjetoAcceso();
$consulta = $objetoAcccesDatos->RetornarConsulta("CALL TraerTodosLosUsuarios()");
$consulta->execute();
 return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");

}

public function BorrarUsuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario(:id)"); 
      $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);    
      $consulta->execute();
      return $consulta->rowCount();
   }

 public function InsertarElUsuarioParametros()
 {
 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (id,nombre,correo,clave,tipo)values(:id,:nombre,:correo,:clave,:tipo)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
 }

 public function ModificarUsuarioParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarUsuarioParametros(:id,:nombre,:correo,:clave,:tipo)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
				$consulta->execute();		
				return $consulta->execute();
	 }

 public function GuardarUsuario()
 {
   
 	if ($this->id>0) 
 	{
 		
 		$this->ModificarUsuarioParametros();
 	}else
 	{
 		$this->InsertarElUsuarioParametros();
 	}

 }

	public static function TraerUsuario($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, correo as correo,clave as clave,tipo as tipo from usuario where id = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;
	}

public static function validarusuario($correo,$clave)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario WHERE correo=:correo AND clave=:clave");
            $consulta->bindValue(':correo',$correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
            $consulta->execute();   
            $cdBuscado= $consulta->fetchObject('usuario');
            return $cdBuscado;        
            //return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
     }
}//clase


?>


