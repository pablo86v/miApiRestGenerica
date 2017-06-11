<?php
 class Usuario
{

//	Atributos
	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $tipo;
	public $password;
	
//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$alumno){
			$consulta->bindValue(':id',$alumno->id, \PDO::PARAM_INT);
			$consulta->bindValue(':dni',$alumno->dni, \PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$alumno->nombre, \PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $alumno->apellido, \PDO::PARAM_STR);
			$consulta->bindValue(':tipo', $alumno->tipo, \PDO::PARAM_STR);
			$consulta->bindValue(':password', $alumno->password, \PDO::PARAM_STR);
			
			return $consulta;
	}

	

}//Class
