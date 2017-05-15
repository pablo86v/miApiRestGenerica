<?php
 class Alumno
{

//	Atributos
	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $foto;
	
//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$alumno){
			$consulta->bindValue(':id',$alumno->id, \PDO::PARAM_INT);
			$consulta->bindValue(':dni',$alumno->dni, \PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$alumno->nombre, \PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $alumno->apellido, \PDO::PARAM_STR);
			$consulta->bindValue(':foto', $alumno->foto, \PDO::PARAM_STR);
			return $consulta;
	}
	
//  Constructor
	public function __construct($dni=NULL) {
		if($dni != NULL){
			$obj = alumno::GetOne($dni,"alumno");
			
			$this->apellido = $obj->apellido;
			$this->nombre = $obj->nombre;
			$this->dni = $dni;
			$this->foto = $obj->foto;
		}
	}

//  ToString()	
  	public function ToString() {
		  return $this->apellido."-".$this->nombre."-".$this->dni."-".$this->foto;
	}

	

}//Class
