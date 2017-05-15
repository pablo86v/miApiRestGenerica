<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	
	require 'vendor/autoload.php';
	require 'clases/FuncionesEntidades.php';

	$app = new \Slim\App;
	

	$app->get('/ge[/]', function ($request, $response, $args) {
			//Traigo  todos los items
			$datosRecibidos = $request->getQueryParams();
			$listado=\Funciones::GetAll($datosRecibidos["t"]);
    		return $response->write(json_encode($listado));

	});

	$app->put('/pu[/]', function ($request, $response, $arg) {
		//Recibo los datos y los asigno a un nuevo usuario
		$datosRecibidos = $request->getQueryParams();
			
	    return $response->write(json_encode(Funciones::UpdateOne($datosRecibidos)));
	    
	    
	});	

	$app->delete('/de/{id}', function ($request, $response, $arg) {
		$datosRecibidos = $request->getQueryParams();
		$id = json_decode($arg['id']);
		//Busco el Persona mediante el id
	    $objEntidad = Funciones::GetOne($id,$datosRecibidos['t']); 
		//Si no se encontró grabo un mensaje
	    if($objEntidad == null)
	    {
	    	$response->write("Registro no encontrado");
	    }
	    else
	    {
			//Sino borro el registro y muestro los datos 
	    	Funciones::DeleteOne($id,$datosRecibidos['t']);
	    	$response->write(json_encode($objEntidad));
	    }
	    return $response;
	});

	
	$app->post('/po', function ($request, $response, $arg) {
		$datosRecibidos = $request->getQueryParams();
		return $response->write(json_encode(Funciones::InsertOne($datosRecibidos)));
			
	});




	$app->options('/{routes:.+}', function ($request, $response, $args) {
		return $response;
	});

	$app->add(function ($req, $res, $next) {
		$response = $next($req, $res);
		return $response
				->withHeader('Access-Control-Allow-Origin', '*')
				->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
				->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	});


	/*

	$app->get('/login[/]', function ($request, $response, $arg) {
		//Los datos que recibo los meto en $datosRecibidos
	    $datosRecibidos = $request->getQueryParams();
		//Creo un nuevo Persona y le asigno los datos recibidos
	    $Persona = new Persona();
	    $Persona->Persona = $datosRecibidos['Persona'];
	    $Persona->password = $datosRecibidos['password'];
		//Llamo a el método que busca si el Persona y la contraseña existen, devuelve true or false
	    $estaRegistrado = Persona::EstaRegistrado($Persona);
		//Devuelvo el mensaje (true o false) encodeado a json
	    return $response->write(json_encode($estaRegistrado));
	});
	
	*/

	$app->run();



?>