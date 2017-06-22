<?php
 class Propiedad
{


//	Atributos

	public $id;
	public $idCliente;
	public $idSucursal;
	public $tipo;
	public $domicilio;
	public $localidad;
	public $coordenadas;
	public $cotizacion;
	public $imagenes;


//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$propiedad){
			$consulta->bindValue(':id'			, $propiedad->id		  , \PDO::PARAM_INT);
			$consulta->bindValue(':idCliente'	, $propiedad->idCliente	  , \PDO::PARAM_INT);
			$consulta->bindValue(':idSucursal'	, $propiedad->idSucursal  , \PDO::PARAM_INT);
			$consulta->bindValue(':tipo'    	, $propiedad->tipo   	  , \PDO::PARAM_STR);
			$consulta->bindValue(':domicilio'   , $propiedad->domicilio	  , \PDO::PARAM_STR);
			$consulta->bindValue(':localidad'   , $propiedad->localidad	  , \PDO::PARAM_STR);
			$consulta->bindValue(':coordenadas' , $propiedad->coordenadas , \PDO::PARAM_STR);
			$consulta->bindValue(':cotizacion'  , $propiedad->cotizacion  , \PDO::PARAM_STR);
			$consulta->bindValue(':imagenes'    , $propiedad->imagenes    , \PDO::PARAM_STR);

				
			return $consulta;
	}

}//Class
