<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documentation</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../../assets/MDB/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/MDB/css/mdb.css">
	<link rel="stylesheet" href="../../assets/MDB/css/style.css">
</head>
<body>
	
	<?php include('../nav.php'); ?>

	<div class="container">
		
		<div class="row">

			<div class="col-md-12">
				
				<div class="card my-card" id="div_geo_create">
				    <div class="card-header primary-color white-text">
				        Create
				    </div>
				    <div class="card-block">
				    	<h4 class="card-title">URL</h4>
						<code>
							http://www.tecnologiascositec.com/volanteoAPI/v1/geo
						</code>
						
						<br>
						<br>

						<h4 class="card-title">Metodo</h4>
						<code>
							POST
						</code>
						
						<br>
						<br>

				        <h4 class="card-title">Parametros</h4>
				        <code>
							
				        	<!-- <pre> -->
							var info = "[{
								"id_device": "1",
								"id_service": "1",
								"id_proveedor": "1",
								"latitud": "19.2752434",
								"longitud": "-103.7309078",
								"date_time": "2017-04-17 10:45:05"
							}, {
								"id_device": "2",
								"id_service": "1",
								"id_proveedor": "2",
								"latitud": "19.273437",
								"longitud": "-103.730384",
								"date_time": "2017-04-17 10:55:15"
							}]";
														<!-- </pre> -->
				        </code>

				        <br>
				        <br>


				        <h4 class="card-title">Headers</h4>
				        <code>
				        	Content-Type: application/x-www-form-urlencoded
				        </code>

				        <br>

				        <code>
				        	Cositec: *********
				        </code>

						<br>
				        <br>


				        <h4 class="card-title">Respuestas</h4>
						
						<code> Status Code: 200 &nbsp; --> &nbsp; {"estado": 1, "mensaje": "Success"} </code><br>
						<code> Status Code: 403 &nbsp; --> &nbsp; {"estado": 2, "mensaje": "Acceso denegado"} </code><br>
						<code> Status Code: 500 &nbsp; --> &nbsp; {"estado": 3, "mensaje": "Internal Server Error"} </code><br>
						<code> Status Code: 422 &nbsp; --> &nbsp; {"estado": 4, "mensaje": "Error en la estructura de la peticion o en los parametros"} </code><br>

					</div>
				</div>

				<div class="card my-card" id="div_geo_read" hidden>
				    <div class="card-header primary-color white-text">
				        Read
				    </div>
				    <div class="card-block">

				    	<h4 class="card-title">URL</h4>
						<code> http://www.tecnologiascositec.com/volanteoAPI/v1/geo </code>
						<br>
						<code> http://www.tecnologiascositec.com/volanteoAPI/v1/geo/id </code>

						<br>
						<br>

						<h4 class="card-title">Metodo</h4>
						<code>
							GET
						</code>
						
						<br>
						<br>

						<h4 class="card-title">Parametros</h4>
				        <code> Ninguno </code>
				        
				        <br>
				        <br>

				        <h4 class="card-title">Headers</h4>
				        <code>
				        	Content-Type: application/x-www-form-urlencoded
				        </code>

				        <br>

				        <code>
				        	Cositec: *********
				        </code>


				        <br>
				        <br>


				        <h4 class="card-title">Respuestas</h4>
						
						<code> Status Code: 200 &nbsp; --> &nbsp; {"estado": 1, "mensaje": "Success"} </code><br>
						<code> Status Code: 403 &nbsp; --> &nbsp; {"estado": 2, "mensaje": "Acceso denegado"} </code><br>
						<code> Status Code: 500 &nbsp; --> &nbsp; {"estado": 3, "mensaje": "Internal Server Error"} </code><br>
						<code> Status Code: 422 &nbsp; --> &nbsp; {"estado": 4, "mensaje": "Error en la estructura de la peticion o en los parametros"} </code><br>
						<code> Status Code: 404 &nbsp; --> &nbsp; {"estado": 5, "mensaje": "Id no encontrado"} </code><br>


				    </div>
				</div>

				<div class="card my-card" id="div_user_login" hidden>
				    <div class="card-header primary-color white-text">
				        Login
				    </div>
				    <div class="card-block">

				    	<h4 class="card-title">URL</h4>
						<code> http://www.tecnologiascositec.com/volanteoAPI/v1/user/login </code>

						<br>
						<br>

						<h4 class="card-title">Metodo</h4>
						<code>
							POST
						</code>
						
						<br>
						<br>

						<h4 class="card-title">Parametros</h4>
				        <code> 
							var info = {"username": "email@midominio.com", "password": "miRFC"}
				        </code>
				        
				        <br>
				        <br>

				        <h4 class="card-title">Headers</h4>
				        <code>
				        	Content-Type: application/x-www-form-urlencoded
				        </code>

				        <br>

				        <code>
				        	Cositec: *********
				        </code>

				        <br>
				        <br>


				        <h4 class="card-title">Respuestas</h4>
						
						<code> Status Code: 200 &nbsp; --> &nbsp; {"estado": 1, "mensaje": {"status": "success","idproveedor": "1","servicios": [1,2,3,4,5]}} </code><br>
						<code> Status Code: 403 &nbsp; --> &nbsp; {"estado": 2, "mensaje": {"status": Acceso denegado"}} </code><br>
						<code> Status Code: 500 &nbsp; --> &nbsp; {"estado": 3, "mensaje": {"status": Internal Server Error"}} </code><br>
						<code> Status Code: 422 &nbsp; --> &nbsp; {"estado": 4, "mensaje": {"status": "Error en la estructura de la peticion o en los parametros"}} </code><br>
				    </div>
				</div>

			</div>


		</div>
	</div>
	
	<script src="../../assets/MDB/js/jquery-2.2.3.min.js"></script>
	<script src="../../assets/MDB/js/bootstrap.min.js"></script>
	<script src="../../assets/MDB/js/mdb.min.js"></script>
	<!-- <script src="../../js/documentation.js"></script> -->
	
</body>
</html>