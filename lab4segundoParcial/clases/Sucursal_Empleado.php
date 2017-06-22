<?php
 class Sucursal_Empleado
{
	

//	Atributos

	public $id;
	public $idSucursal;
	public $idEmpleado;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$sucursal_empleado){
			$consulta->bindValue(':id'         , $sucursal_empleado->id         , \PDO::PARAM_INT);
			$consulta->bindValue(':idSucursal' , $sucursal_empleado->idSucursal , \PDO::PARAM_STR);
			$consulta->bindValue(':idEmpleado' , $sucursal_empleado->idEmpleado , \PDO::PARAM_STR);

				
			return $consulta;
	}

}//Class
