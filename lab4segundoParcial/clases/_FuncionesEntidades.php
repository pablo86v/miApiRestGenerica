<?php

require_once "_AccesoDatos.php";

require_once "Usuario.php";
require_once "Persona.php";
require_once "Cliente.php";
require_once "Empleado.php";
require_once "Sucursal.php";
require_once "Sucursal_Empleado.php";
require_once "Propiedad.php";
require_once "Reserva_Venta.php";


class Funciones
{

//****************************************************************
//**********   AGREGAR LAS CLASES AL SWITCH  *********************
//****************************************************************

     public static function getObjEntidad($EntityName){
        switch (trim($EntityName)) 
        {
			case "usuario":
			$objEntidad = new Usuario();
			break;
		
			case "persona":
			$objEntidad = new Persona();
			break;

			case "cliente":
			$objEntidad = new Cliente();
			break;

			case "empleado":
			$objEntidad = new Empleado();
			break;

			case "sucursal":
			$objEntidad = new Sucursal();
			break;

			case "sucursal_empleado":
			$objEntidad = new Sucursal_Empleado();
			break;

			case "propiedad":
			$objEntidad = new Propiedad();
			break;

			case "reserva_venta":
			$objEntidad = new Reserva_Venta();
			break;
				
        }//switch   
        return  $objEntidad;
    }




//******************************************************************
//************* METODOS DE CLASE *****   NO MODIFICAR  *************
//******************************************************************


	 public static function GetAll($EntityName)	{

    	$objetoAccesoDato = \AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta =$objetoAccesoDato->RetornarConsulta('select * from ' .$EntityName);
		$consulta->execute();		
		$arrObjEntidad= $consulta->fetchAll(\PDO::FETCH_CLASS, $EntityName );	
		
		return $arrObjEntidad;
		
	}
	 
	 
	public static function UpdateOne($datosRecibidos)	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$objEntidad = Funciones::getObjEntidad ($datosRecibidos['t']);
	
		//Consulto los atributos de la clase para armar la query	    	
		$vars_clase = get_class_vars(get_class($objEntidad));
		$myQuery = "update " . $datosRecibidos['t'] . " set ";
		foreach ($vars_clase as $nombre => $valor) {
				//Armo la query UPDATE según los atributos de mi objeto
				if ($nombre != null and $nombre != "id"){$myQuery .= $nombre . "=:" . $nombre . ",";}
				//Bindeo los atributos de mi objeto con el array recibido por queryString para configurar parametros en setQueryParams(..)
				$objEntidad->$nombre = $datosRecibidos[$nombre];
		}
		
		$myQuery = rtrim($myQuery,",")." where  id=:id ";
		$consulta =$objetoAccesoDato->RetornarConsulta($myQuery);
		$objEntidad->setQueryParams($consulta,$objEntidad);
		
		return $consulta->execute();
			
	}


	public static function GetOne($idParametro,$EntityName) {	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$objEntidad = Funciones::getObjEntidad ($EntityName);
		
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from " . $EntityName . " where id =:id");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$objEntidad= $consulta->fetchObject($EntityName);
		
		return $objEntidad;						
	 }


	public static function DeleteOne($idParametro,$EntityName)	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from " . $EntityName ." WHERE id=:id");	
        $consulta->bindValue(':id',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		
		return $consulta->rowCount();
	}


	public static function InsertOne($datosRecibidosQS,$datosRecibidosBody)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
 		$objEntidad = Funciones::getObjEntidad ($datosRecibidosQS['t']);
			
	    	//Consulto los atributos de la clase para armar la query	    	
			$vars_clase = get_class_vars(get_class($objEntidad));
			$myQuery = "insert into " . $datosRecibidosQS['t'] ." (" ;
			$myQueryAux ;
			foreach ($vars_clase as $nombre => $valor) {
					//Armo la query según los atributos de mi objeto
					if ($nombre != null ){
						$myQuery .= $nombre .  ",";
						$myQueryAux .= ":".$nombre.","; 
						//Bindeo los atributos de mi objeto con el array recibido por queryString para configurar parametros en setQueryParams(..)
						$objEntidad->$nombre = $datosRecibidosBody[$nombre];
						}
			}
			
			$myQuery = rtrim($myQuery,",").") values (" . rtrim($myQueryAux,",") . ")" ;
							
			$consulta =$objetoAccesoDato->RetornarConsulta($myQuery);
			$objEntidad->setQueryParams($consulta,$objEntidad);
			$consulta->execute();
			
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
	}//InsertOne
   
  


}//Class
