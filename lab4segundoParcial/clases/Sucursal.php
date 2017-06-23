<?php
 class Sucursal
{

//	Atributos

	public $id;
	public $idEmpEncargado;
 	public $nombreSuc;
 	public $domicilio;
 	public $localidad;
 	public $coordenadas;
 	public $telefono;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$sucursal){
			$consulta->bindValue(':id'            , $sucursal->id             , \PDO::PARAM_INT);
			$consulta->bindValue(':idEmpEncargado', $sucursal->idEmpEncargado , \PDO::PARAM_INT);
			$consulta->bindValue(':nombreSuc'     , $sucursal->nombreSuc      , \PDO::PARAM_STR);
			$consulta->bindValue(':domicilio'     , $sucursal->domicilio      , \PDO::PARAM_STR);
			$consulta->bindValue(':localidad'     , $sucursal->localidad      , \PDO::PARAM_STR);
			$consulta->bindValue(':coordenadas'     , $sucursal->coordenadas      , \PDO::PARAM_STR);
			$consulta->bindValue(':telefono'     , $sucursal->telefono      , \PDO::PARAM_STR);

				
			return $consulta;
	}

}//Class
