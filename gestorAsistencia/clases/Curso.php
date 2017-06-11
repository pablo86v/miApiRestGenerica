<?php
 class Curso
{

//	Atributos
	public $id;
	public $asignatura;
 	public $anio_lectivo;
  	public $turno;
	
//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$alumno){
			$consulta->bindValue(':id',$alumno->id, \PDO::PARAM_INT);
			$consulta->bindValue(':turno',$alumno->turno, \PDO::PARAM_STR);
			$consulta->bindValue(':asignatura',$alumno->asignatura, \PDO::PARAM_STR);
			$consulta->bindValue(':anio_lectivo', $alumno->año_lectivo, \PDO::PARAM_STR);
			
			return $consulta;
	}
	
	

}//Class
