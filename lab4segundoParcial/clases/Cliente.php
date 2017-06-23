<?php
 class Cliente
{


//	Atributos

	public $id;
	public $idPersona;
	public $idUsuario;



//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$cliente){
			$consulta->bindValue(':id'            ,$cliente->id            , \PDO::PARAM_INT);
			$consulta->bindValue(':idPersona'     ,$cliente->idPersona     , \PDO::PARAM_INT);
			$consulta->bindValue(':idUsuario'     ,$cliente->idUsuario     , \PDO::PARAM_INT);
					

				
			return $consulta;
	}

}//Class
