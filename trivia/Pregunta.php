<?php
 class Pregunta
{

//	Atributos
	public $id;
	public $question;
 	public $answerId;
  	public $option1;
  	public $option2;
	public $option3;
	
//	Configurar parámetros para las consultas
	public function setQueryParams($consulta,$pregunta){
			$consulta->bindValue(':id',$pregunta->id, \PDO::PARAM_INT);
			$consulta->bindValue(':question',$pregunta->question, \PDO::PARAM_STR);
			$consulta->bindValue(':answerId', $pregunta->answerId, \PDO::PARAM_INT);
			$consulta->bindValue(':option1', $pregunta->option1, \PDO::PARAM_STR);
			$consulta->bindValue(':option2', $pregunta->option2, \PDO::PARAM_STR);
			$consulta->bindValue(':option3', $pregunta->option3, \PDO::PARAM_STR);
			return $consulta;
	}
	
//  Constructor
	public function __construct($id=NULL) {
		if($id != NULL){
			$obj = Pregunta::GetOne($id,"pregunta");
			
			$this->question = $obj->question;
			$this->answerId = $obj->answerId;
			$this->option1 = $option1;
			$this->option2 = $option2;
			$this->option3 = $option3;
		}
	}

//  ToString()	
  	// public function ToString() {
	// 	  return $this->question."-".$this->answerId;
	//   }

	

}//Class
