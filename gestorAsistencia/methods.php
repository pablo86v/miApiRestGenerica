<?php

	//SLIM
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use \Firebase\JWT\JWT;

	require '.././_libs/vendor/autoload.php';
	require '.././_libs/JWT/autoload.php';
	require 'clases/_FuncionesEntidades.php';
	
	$configuration = [
		'settings' => [
			'displayErrorDetails' => true,
		],
	];
	//Asigno la configuración anterior
	$c = new \Slim\Container($configuration);
	//Inicializo la aplicación
	$app = new \Slim\App($c);


	
	// ******************************************************************
	// *************************  METODOS ABM  **************************
	// ******************************************************************

	$app->get('/all[/]', function ($request, $response, $args) {
			//Traigo  todos los items
			$datosRecibidos = $request->getQueryParams();
			$listado=\Funciones::GetAll($datosRecibidos["t"]);
    		return $response->write(json_encode($listado));

	});//get
	
	$app->put('/put[/]', function ($request, $response, $arg) {
		//Recibo los datos y los asigno a un nuevo usuario
		$datosRecibidos = $request->getQueryParams();
			
	    return $response->write(json_encode(Funciones::UpdateOne($datosRecibidos)));
		    
	});	//put

	$app->delete('/del/{id}', function ($request, $response, $arg) {
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
	});//delete

	$app->post('/post[/]', function ($request, $response, $arg) {
		
		//Datos recibidos por QueryString
		$datosRecibidosQS = $request->getQueryParams();
		
		//Datos recibidos por body
		$datosRecibidosBody = $request->getParsedBody();	
		
	    return $response->write(json_encode(Funciones::InsertOne($datosRecibidosQS,$datosRecibidosBody)));
			
	}); //post


	//Configuro options
	$app->options('/{routes:.+}', function ($request, $response, $args){
		return $response;
	});
	
	//Configuro headers
	$app->add(function ($req, $res, $next){
		$response = $next($req, $res);
		return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');		
	});
	
	

	
	// ******************************************************************
	// *************************  JWT  **********************************
	// ******************************************************************
	
	// Cuando le pego a esta url me devuelve un objeto json
	$app->get('/token[/]', function ($request, $response, $arg) {

		// $id = json_decode($arg['id']);
		// $usuarioToken = Usuario::TraerUnUsuario($id);

		$key = "example_key";
		$token = array(
			"iss" => "http://example.org",
			"aud" => "http://example.com",
			"iat" => 1356999524,
			"nbf" => 1357000000,
			// "data" => 
			// [
			// 	"email" => $usuarioToken->email,
			// 	"tipo" => $usuarioToken->tipo
			// ]
		);

		$jwt = JWT::encode($token, $key);
		$tok['token'] = $jwt;
		print_r(json_encode($tok));
		return;
		$decoded = JWT::decode($jwt, $key, array('HS256'));

		print_r($decoded);

		$decoded_array = (array) $decoded;

		JWT::$leeway = 60; // $leeway in seconds
		$decoded = JWT::decode($jwt, $key, array('HS256'));
           
	});//token

	
	
	$app->run();
?>

