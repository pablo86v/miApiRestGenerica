<?php
 class Persona
{

//	Atributos

	public $id;
	public $nombre;
 	public $apellido;
  	public $dni;
  	public $foto;

//	Configurar parámetros para las consultas
	public function setParams($consulta,$persona){
			$consulta->bindValue(':id',$persona->id, \PDO::PARAM_INT);
			$consulta->bindValue(':dni',$persona->dni, \PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$persona->nombre, \PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $persona->apellido, \PDO::PARAM_STR);
			$consulta->bindValue(':foto', $persona->foto, \PDO::PARAM_STR);
			return $consulta;
	}

//  Constructor
	public function __construct($dni=NULL) {
		if($dni != NULL){
			$obj = Persona::GetOne($dni,"persona");
			
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
