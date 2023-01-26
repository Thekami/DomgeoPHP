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
		
		public static function post($parametros){

			$action = 'get'.ucfirst($parametros[0]);

			if(Main::authorization())
				return self::$action();
			else
				throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403);

		}

		
		private static function getEstados(){
			$consult = "SELECT cveEdo as clave, nombre FROM estado"; 
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);

		}

		private static function getMunicipios(){
			$info = json_decode($_POST['info']);
			$edo  = $info->edo;

			$consult = "CALL SP_GETMUNICIPIOS($edo)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function getLocalidades(){
			$info = json_decode($_POST['info']);
			$edo  = $info->edo;
			$mun  = $info->mun;

			$consult = "CALL SP_GETLOCALIDADES($edo, $mun)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

		private static function getAsentamientos(){
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

		private static function getCodigopostal(){
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

		private static function getInfocp(){
			$info = json_decode($_POST['info']);
			$cp  = $info->cp;

			$consult = "CALL SP_GETINFO($cp)";
			
			if($res = DBConnection::query_assoc($consult))
				return ["estado" => self::SUCCESS, "datos" => $res];
			else
				throw new ExceptionApi(self::NOT_FOUND, self::MSG_NOT_FOUND, 200);
		}

	
	}

?>