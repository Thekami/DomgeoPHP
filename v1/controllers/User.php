<?php  

	require_once("utilities/DBConnection.class.php");
	/**
	* 
	*/
	class User extends DBConnection{

		const SUCCESS = 1;
	    const MSG_SUCCESS = "success";

		const ACCESS_DENIED = 2;
	    const MSG_ACCESS_DENIED = "Acceso denegado";

	    const UNKNOW_ERROR = 3;
	    const MSG_UNKNOW_ERROR = "Internal Server error";

	    const ERROR_PARAMETROS = 4;
		const MSG_ERROR_PARAMETROS = "Error en la estructura de la peticion o en los parametros";

		
		public function post($info){

			return self::register();
		
		}

		private function register(){
			return;
		}

		private function login(){
			$body = $_POST['info'];

			// $body = file_get_contents('php://input');
	        $info = json_decode($body);

	        if(self::validateStructure($info))
	        	return self::auth($info);
	        else
		    	throw new ExceptionApi(self::ERROR_PARAMETROS, self::MSG_ERROR_PARAMETROS, 422);

		}

		private function auth($apikey){

			$consult   = "SELECT COUNT(id) count FROM users WHERE apikey = '$apikey'";
			$resultado = DBConnection::query_single_object($consult);

			if($resultado == NULL)
				return 'unknow_error';
		    else if($resultado->count == 0)
		    	return 'error';
		    else 
		    	return "success";
		
		}

		private function validateStructure($info){

			$response = FALSE;
			if ($info !== NULL && count($info) === 1 && 
				isset($info->username) && isset($info->password))
	    		$response = TRUE;

	    	return $response;

		}

	}

?>