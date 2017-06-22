<?php
 class Empleado
{


//	Atributos

	public $id;
	public $idPersona;
	public $cuil;
	public $legajo;
	public $categoria;
	public $estado;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$empleado){
			$consulta->bindValue(':id'        , $empleado->id         , \PDO::PARAM_INT);
			$consulta->bindValue(':idPersona' , $empleado->idPersona  , \PDO::PARAM_INT);
			$consulta->bindValue(':cuil'      , $empleado->cuil       , \PDO::PARAM_STR);
			$consulta->bindValue(':legajo'    , $empleado->legajo     , \PDO::PARAM_STR);
			$consulta->bindValue(':categoria' , $empleado->categoria  , \PDO::PARAM_STR);
			$consulta->bindValue(':estado'    , $empleado->estado     , \PDO::PARAM_STR);
			
			
				
			return $consulta;
	}

}//Class
