<?php
 class Usuario
{

//	Atributos

	public $id;
	public $nombre_usuario;
 	public $password;
  	public $email;
  	public $telefono;
  	public $tipoUsuario;
  	

//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$usuario){
			$consulta->bindValue(':id'            , $usuario->id             , \PDO::PARAM_INT);
			$consulta->bindValue(':nombre_usuario', $usuario->nombre_usuario , \PDO::PARAM_STR);
			$consulta->bindValue(':password'      , $usuario->password       , \PDO::PARAM_STR);
			$consulta->bindValue(':email'         , $usuario->email          , \PDO::PARAM_STR);
			$consulta->bindValue(':telefono'      , $usuario->telefono       , \PDO::PARAM_STR);
			$consulta->bindValue(':tipoUsuario'   , $usuario->tipoUsuario    , \PDO::PARAM_STR);
			
				
			return $consulta;
	}

}//Class
