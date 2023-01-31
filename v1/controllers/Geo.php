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

			$action  = "Obtener".ucfirst($parametros[0]); // genero el nombre de la función a ejecutar (ObtenerEstados)
			$body    = file_get_contents('php://input'); // obtengo la información que venga en el body de la petición (raw del postman)
			$info    = array();
			$bandera = true;
			$param   = array(); // genera el parámetro.

			if($body !== "") // la petición fue realizada por JSON
				$info = json_decode($body, true); 
			elseif(count($_POST) > 0) // La petición fue realizada por form-data
				$info = $_POST;

			if(!empty($info)){
				$bandera = self::ValidaEstructura($info, $parametros[0]); // valida la estructura de los parámetros enviados
				foreach ($info as $key => $value) {
					array_push($param, $value); // Reorganiza los parámetros en una array sencillo
				}
			}

			if(!$bandera) // Si la estrucura de la petición NO es correcta
				throw new ExceptionApi(self::ERROR_PARAMETROS, self::MSG_ERROR_PARAMETROS, 422); // Manda una excepción controlada
			elseif(Main::authorization()) // Valida headers
				return self::$action($param); // Ejecuta el llamado a la función
			else
				throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403); // Manda una excepción controlada
		}
		
		private static function ObtenerEstados($data){

			if(empty($data))
				$consult = "SELECT * FROM vwGetEstados";
			else
				$consult = "SELECT * FROM vwGetEstados WHERE clave = {$data[0]}";
				
			if($res = DBConnection::query_assoc($consult)) // Ejecuta la consulta y retorna un array asociativo 
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);

		}

		private static function ObtenerMunicipios($data){
			echo '<pre>'; 
			print_r($data);
			echo '</pre>';
			exit;

			$consult = "CALL SP_GETMUNICIPIOS($edo)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function ObtenerLocalidades($data){

			echo '<pre>'; 
			print_r($data);
			echo '</pre>';
			exit;

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

		private static function ValidaEstructura($data, $metodo){

			$response = false;

			switch ($metodo) {
				case 'estados':
					$response = isset($data['clave']) && count($data) == 1 ? true : false;
					break;
				case 'municipios':
					$response = isset($data['estado']) && count($data) == 1 ? true : false;
					break;
				case 'localidades':
					if(isset($data['estado']) && isset($data['municipio']) && count($data) == 2)
						$response = true;
					elseif(isset($data['estado']) && count($data) == 1)
						$response = true;
					break;
				default:
					$response = false;
					break;
			}

	    	return $response;

		}

	
	}

?>