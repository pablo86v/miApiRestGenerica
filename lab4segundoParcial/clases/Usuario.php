<?php
 class Usuario
{

//	Atributos

	public $id;
	public $nombreUsuario;
 	public $password;
  	public $email;
  	public $tipoUsuario;
  	

//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$usuario){
			$consulta->bindValue(':id'            , $usuario->id             , \PDO::PARAM_INT);
			$consulta->bindValue(':nombreUsuario', $usuario->nombreUsuario , \PDO::PARAM_STR);
			$consulta->bindValue(':password'      , $usuario->password       , \PDO::PARAM_STR);
			$consulta->bindValue(':email'         , $usuario->email          , \PDO::PARAM_STR);
			$consulta->bindValue(':tipoUsuario'   , $usuario->tipoUsuario    , \PDO::PARAM_STR);
			
				
			return $consulta;
	}

}//Class
