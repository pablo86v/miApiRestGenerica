<?php
 class Persona
{

//	Atributos

	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $foto;
	public $sexo;
	public $password;

//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$persona){
			$consulta->bindValue(':id',$persona->id, \PDO::PARAM_INT);
			$consulta->bindValue(':dni',$persona->dni, \PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$persona->nombre, \PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $persona->apellido, \PDO::PARAM_STR);
			$consulta->bindValue(':foto', $persona->foto, \PDO::PARAM_STR);
			$consulta->bindValue(':sexo', $persona->sexo, \PDO::PARAM_STR);
			$consulta->bindValue(':password',$persona->password,\PDO::PARAM_STR);
			return $consulta;
	}

}//Class
