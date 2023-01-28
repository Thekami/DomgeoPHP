<?php  

	require_once("utilities/DBConnection.class.php");

	/**
	* 
	*/
	class Geo extends DBConnection{

		const SUCCESS = 1;
	    const MSG_SUCCESS = "Success";

		const ACCESS_DENIED = 2;
	    const MSG_ACCESS_DENIED = "Acceso denegado";

	    const UNKNOW_ERROR = 3;
	    const MSG_UNKNOW_ERROR = "Internal Server error";

	    const ERROR_PARAMETROS = 4;
		const MSG_ERROR_PARAMETROS = "Error en la estructura de la peticion o en los parametros";

		const NOT_FOUND = 5;
	    const MSG_NOT_FOUND = "No se encontraron resultados";
		
		public static function get($parametros){

			$action = "get".ucfirst($parametros[0]); // genero el nombre de la función a ejecutar (ObtenerEstados)

			if(Main::authorization()) // Valida headers
				return self::$action($parametros[1]); // Ejecuta el llamado a la función
			else
				throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403); // Manda una excepción controlada

		}
		
		public static function post($parametros){

			$action = "Obtener".ucfirst($parametros[0]); // genero el nombre de la función a ejecutar (ObtenerEstados)
			$body = file_get_contents('php://input'); // obtengo la información que venga en el body de la petición (raw del postman)
			$param = null;

			if($body !== ""){ // valida si la petición fue realiazada mediante json 
				$info = json_decode($body); // convierte el json en array de objetos
				if(isset($info->clave)) // valida que exista el identificador "clave"
					$param = $info->clave; // genera el parámero.
				else
					throw new ExceptionApi(self::ERROR_PARAMETROS, self::MSG_ERROR_PARAMETROS, 422); // Manda una excepción controlada
			}

			if(Main::authorization()) // Valida headers
				return self::$action($param); // Ejecuta el llamado a la función
			else
				throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403); // Manda una excepción controlada
		}
		
		private static function ObtenerEstados($clave = null){

			/* si no llega el parámetro, quiere decir que la petición se hizo por form-data o que se quieren leer todos los registros */

			if (is_null($clave)) { // Si no llega el parámetro
				if (count($_POST) > 0) { // Verifico que por POST haya llegado algo
					if (isset($_POST['clave'])) // Verifica que exista el identificador clave
						$consult = "SELECT * FROM vwGetEstados WHERE clave = " . $_POST['clave']; // Genera la consulta para ver un dato en especifico
					else
						throw new ExceptionApi(self::ERROR_PARAMETROS, self::MSG_ERROR_PARAMETROS, 422); // Manda una excepción controlada
				} else {
					$consult = "SELECT * FROM vwGetEstados"; // Genera consulta para ver todos los datos
				}
			}
			else{ // Si llegó el parámetro (petición realizada mediante JSON)
				$consult = "SELECT * FROM vwGetEstados WHERE clave = {$clave}"; // Genera la consulta para ver un dato en especifico
			}
				
			if($res = DBConnection::query_assoc($consult)) // Ejecuta la consulta y retorna un array asociativo 
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);

		}

		private static function ObtenerMunicipios($data){

			$consult = "CALL SP_GETMUNICIPIOS($edo)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function ObtenerLocalidades(){
			$info = json_decode($_POST['info']);
			$edo  = $info->edo;
			$mun  = $info->mun;

			$consult = "CALL SP_GETLOCALIDADES($edo, $mun)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function ObtenerAsentamientos(){
			$info = json_decode($_POST['info']);
			$edo  = $info->edo;
			$mun  = $info->mun;
			$loc  = $info->loc;

			$consult = "CALL SP_GETASENTAMIENTOS($edo, $mun,$loc)";//echo $consult;exit;

			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);

		}

		private static function ObtenerCodigopostal(){
			$info = json_decode($_POST['info']);
			$edo  = $info->edo;
			$mun  = $info->mun;
			$loc  = $info->loc;
			$asen = $info->asen;

			$consult = "CALL SP_GETCP($edo, $mun, $loc, $asen)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function ObtenerInfocp(){
			$info = json_decode($_POST['info']);
			$cp  = $info->cp;

			$consult = "CALL SP_GETINFO($cp)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function ValidaEstructuraEstado($data){
			
			$response = FALSE;
			if ($data !== NULL && count($data) == 1 && isset($data['clave']))
	    		$response = TRUE;

	    	return $response;

		}

	
	}

?>