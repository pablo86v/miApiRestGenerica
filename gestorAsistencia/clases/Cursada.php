<?php
 class Cursada
{

//	Atributos

	public $id;
	public $idCurso;
 	public $asignatura;
  	public $profesor;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$cursada){
			$consulta->bindValue(':id'          , $cursada->id          , \PDO::PARAM_INT);
			$consulta->bindValue(':idCurso'     , $cursada->idCurso     , \PDO::PARAM_INT);
			$consulta->bindValue(':asignatura'  , $cursada->asignatura  , \PDO::PARAM_STR);
			$consulta->bindValue(':profesor'    , $cursada->profesor    , \PDO::PARAM_STR);
				
			return $consulta;
	}

}//Class
