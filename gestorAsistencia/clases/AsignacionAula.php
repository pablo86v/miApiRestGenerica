<?php
 class AsignacionAula
{

//	Atributos

	public $id;
	public $numeroAula;
 	public $dia;
  	public $idCursada;
  	


//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$asignacionAula){
			$consulta->bindValue(':id'         , $asignacionAula->id          , \PDO::PARAM_INT);
			$consulta->bindValue(':numeroAula' , $asignacionAula->numeroAula  , \PDO::PARAM_INT);
			$consulta->bindValue(':dia'        , $asignacionAula->dia         , \PDO::PARAM_STR);
			$consulta->bindValue(':idCursada'  , $asignacionAula->idCursada   , \PDO::PARAM_INT);
		
			return $consulta;
	}

}//Class
