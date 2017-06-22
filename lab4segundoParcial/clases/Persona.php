<?php
 class Persona
{

//	Atributos

	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $telefono;
  	public $domicilio;
  	public $localidad;


//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$persona){
			$consulta->bindValue(':id'        , $persona->id        , \PDO::PARAM_INT);
			$consulta->bindValue(':nombre'    , $persona->nombre    , \PDO::PARAM_STR);
			$consulta->bindValue(':apellido'  , $persona->apellido  , \PDO::PARAM_STR);
			$consulta->bindValue(':dni'       , $persona->dni       , \PDO::PARAM_STR);
			$consulta->bindValue(':telefono'  , $persona->telefono  , \PDO::PARAM_STR);
			$consulta->bindValue(':domicilio' , $persona->domicilio , \PDO::PARAM_STR);
			$consulta->bindValue(':localidad' , $persona->localidad , \PDO::PARAM_STR);
				
			return $consulta;
	}

}//Class
