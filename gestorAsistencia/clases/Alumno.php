<?php
 class Alumno
{

//	Atributos
	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $legajo;
	
//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$alumno){
			$consulta->bindValue(':id',$alumno->id, \PDO::PARAM_INT);
			$consulta->bindValue(':dni',$alumno->dni, \PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$alumno->nombre, \PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $alumno->apellido, \PDO::PARAM_STR);
			$consulta->bindValue(':legajo', $alumno->legajo, \PDO::PARAM_STR);
			return $consulta;
	}
	


}//Class
