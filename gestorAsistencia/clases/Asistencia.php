<?php
 class Asistencia
{

//	Atributos
	public $id;
	public $idCurso;
 	public $fecha_asistencia;
  	public $asistencia;
  	public $idAlumno;

//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$alumno){
			$consulta->bindValue(':id',$alumno->id, \PDO::PARAM_INT);
			$consulta->bindValue(':idCurso',$alumno->idCurso, \PDO::PARAM_STR);
			$consulta->bindValue(':fecha_asistencia',$alumno->fecha_asistencia, \PDO::PARAM_STR);
			$consulta->bindValue(':asistencia', $alumno->asistencia, \PDO::PARAM_STR);
			$consulta->bindValue(':idAlumno', $alumno->idAlumno, \PDO::PARAM_STR);
			
			return $consulta;
	}
	

	

}//Class
