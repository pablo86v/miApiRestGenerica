<?php
 class Sucursal
{

//	Atributos

	public $id;
	public $idSucursal;
 	public $idEmpleado;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$sucursal){
			$consulta->bindValue(':id'         , $sucursal->id         , \PDO::PARAM_INT);
			$consulta->bindValue(':idSucursal' , $sucursal->idSucursal , \PDO::PARAM_INT);
			$consulta->bindValue(':idEmpleado' , $sucursal->idEmpleado , \PDO::PARAM_INT);

				
			return $consulta;
	}

}//Class
