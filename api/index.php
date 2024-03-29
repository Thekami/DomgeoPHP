<?php  

	require_once("views/JsonView.php");
	require_once("views/XmlView.php");
	require_once("controllers/Geo.php");
	require_once("controllers/User.php");
	require_once("utilities/ExceptionApi.php");

	// Constantes de estado
	const UNKNOW_URL = 2;
	const UNKNOW_RESOURCE = 3;
	const FORBIDDEN_METHOD = 4;

	const MSG_UNKNOW_URL = "No se reconoce la petición";
	const MSG_UNKNOW_RESOURCE = "No se reconoce el recurso al que intentas acceder";
	const MSG_FORBIDDEN_METHOD = "Método no permitido";

	// Preparar formato de vista que retornará
	$formato = isset($_GET['formato']) ? $_GET['formato'] : 'json';

	switch ($formato) {
	    case 'xml':
	        $vista = new XmlView();
	        break;
	    case 'json':
	    default:
	        $vista = new JsonView();
	}

	// Preparar manejo de excepciones
	set_exception_handler(function ($exception) use ($vista) {
	    $cuerpo = array(
	        "estado" => $exception->estado,
	        "mensaje" => $exception->getMessage()
	    );
	    if ($exception->getCode())
	        $vista->estado = $exception->getCode();
	    else
	        $vista->estado = 500;
	    
	    $vista->imprimir($cuerpo);
	});

	// Extraer segmento de la url
	if (isset($_GET['PATH_INFO']))
	    $parametros = explode('/', $_GET['PATH_INFO']);
	else
	    throw new ExceptionApi(UNKNOW_URL, MSG_UNKNOW_URL);

	// Obtener recurso
	$recurso = $parametros[0];

	$recursos_existentes = array('estados', 'municipios', 'localidades', 'asentamientos', 'codigopostal', 'infocp');
	

	// Comprobar si existe el recurso
	if (!in_array($recurso, $recursos_existentes))
		throw new ExceptionApi(UNKNOW_RESOURCE, MSG_UNKNOW_RESOURCE, 404);

	$metodo = strtolower($_SERVER['REQUEST_METHOD']);
// echo '<pre>'; 
// print_r($parametros);
// echo '</pre>';
// exit;
	// Filtrar método
	switch ($metodo) {
	    case 'get':
	    case 'post':
	    case 'put':
	    case 'delete':
	        if (method_exists('Geo', $metodo)) {
	            $respuesta = call_user_func(array('Geo', $metodo), $parametros);
	        //  $respuesta = call_user_func(array($nombreclase, 'nombrefuncion'), 'parametro');

	            $vista->imprimir($respuesta);
	            break;
	        }
	    default:
	        // Método no aceptado
	        $vista->estado = 405;
	        $cuerpo = [
	            "estado" => FORBIDDEN_METHOD,
	            "mensaje" => MSG_FORBIDDEN_METHOD
	        ];
	        $vista->imprimir($cuerpo);

	}
?>