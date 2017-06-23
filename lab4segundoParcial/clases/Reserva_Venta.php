<?php
 class Reserva_Venta
{
	

//	Atributos

	public $id          ;
	public $idPropiedad ;
	public $idUsuario	;
	public $idSucursal	;
	public $fecha_ini	;
	public $fecha_fin	;
	public $monto		;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$reserva_venta){
			$consulta->bindValue(':id'           , $reserva_venta->id           , \PDO::PARAM_INT);
			$consulta->bindValue(':idPropiedad'  , $reserva_venta->idPropiedad  , \PDO::PARAM_INT);
			$consulta->bindValue(':idUsuario'    , $reserva_venta->idUsuario    , \PDO::PARAM_INT);
			$consulta->bindValue(':idSucursal'   , $reserva_venta->idSucursal   , \PDO::PARAM_INT);
			$consulta->bindValue(':fecha_ini'    , $reserva_venta->fecha_ini    , \PDO::PARAM_STR);
			$consulta->bindValue(':fecha_fin'    , $reserva_venta->fecha_fin    , \PDO::PARAM_STR);
			$consulta->bindValue(':fecha_fin'    , $reserva_venta->fecha_fin    , \PDO::PARAM_STR);
			$consulta->bindValue(':monto'        , $reserva_venta->monto        , \PDO::PARAM_STR);

				
			return $consulta;
	}

}//Class
