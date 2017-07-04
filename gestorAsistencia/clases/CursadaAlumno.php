<?php
 class CursadaAlumno
{

//	Atributos

	public $id;
	public $idCursada;
 	public $idAlumno;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta  , $cursadaAlumno){
			$consulta->bindValue(':id'        , $cursadaAlumno->id        , \PDO::PARAM_INT);
			$consulta->bindValue(':idCursada' , $cursadaAlumno->idCursada , \PDO::PARAM_INT);
			$consulta->bindValue(':idAlumno'  , $cursadaAlumno->idAlumno  , \PDO::PARAM_INT);
			
			return $consulta;
	}

}//Class
