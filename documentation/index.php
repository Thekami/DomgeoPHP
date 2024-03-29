<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documentation</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../assets/MDB/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/MDB/css/mdb.css">
	<link rel="stylesheet" href="../assets/MDB/css/style.css">
</head>
<body>
	
	<nav class="navbar navbar-toggleable-md navbar-dark bg-primary" style="margin-bottom: 50px;">
	    <div class="container">
	        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>
	        <a class="navbar-brand" href="../">
	            <strong>Documentacion</strong>
	        </a>
	        <div class="collapse navbar-collapse" id="navbarNav1">
	            <ul class="navbar-nav mr-auto">
	                <!-- <li id="lnk_create" class="lnk nav-item active">
	                    <a class="nav-link">Create <span class="sr-only">(current)</span></a>
	                </li>
	                <li id="lnk_read" class="lnk nav-item">
	                    <a class="nav-link">Read</a>
	                </li> -->

	                <!-- <li class="nav-item dropdown btn-group lnk" id="user">
	                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    	User
	                    </a>
	                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
	                        <a class="dropdown-item lnk-opt" id="user_login"> Login </a>
	                    </div>
	                </li> -->

	                <li class="nav-item dropdown btn-group lnk" id="geo">
	                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    	Peticiones
	                    </a>
	                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
	                        <a class="dropdown-item lnk-opt" id="estados_post"> Obtener Estados POST</a>
	                        <a class="dropdown-item lnk-opt" id="estados_get"> Obtener Estados GET </a>
							<a class="dropdown-item lnk-opt" id="municipios_post"> Obtener Municipios POST </a>
							<a class="dropdown-item lnk-opt" id="municipios_get"> Obtener Municipios GET </a>
	                    </div>
	                </li>
	            </ul>

	            <ul class="navbar-nav">
	               	<li class="nav-item active">
	                    <a class="nav-link" href="../">Ver registros <span class="sr-only"></span></a>
	                </li>
				</ul>

	        </div>
	    </div>
	</nav>

	<div class="container">
		
		<div class="row">

			<div class="col-md-12">
				
				<div class="card my-card" id="div_estados_post">
				    <div class="card-header primary-color white-text">
				        Obtener Estados POST
				    </div>
				    <div class="card-block">
				    	<h4 class="card-title">URL</h4>
						<code>
							http://localhost/domgeo/api/estados
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
							{"clave": "2"}
							<!-- </pre> -->
				        </code>

				        <br>
				        <br>


				        <h4 class="card-title">Headers (opción 1)</h4>
				        <code>
				        	Content-Type: text/plain
				        </code>
						<br>
				        <code>
				        	auth: 123
				        </code>

						<br>
						<br>

						<h4 class="card-title">Headers (opción 2)</h4>
						<code>
				        	Content-Type: multipart/form-data;
				        </code>
						<br>
				        <code>
				        	auth: 123
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

				<div class="card my-card" id="div_estados_get" hidden>
					<div class="card-header primary-color white-text">
				        Obtener Estados GET
				    </div>
				    <div class="card-block">
				    	<h4 class="card-title">URL</h4>
						<code>
							http://localhost/domgeo/api/estados/{id_estado}
						</code>
						
						<br>
						<br>

						<h4 class="card-title">Metodo</h4>
						<code>
							GET
						</code>
						
						<br>
						<br>

				        <h4 class="card-title">Headers</h4>
				        <code>
				        	auth: 123
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
				
				<div class="card my-card" id="div_municipios_post" hidden>
				    <div class="card-header primary-color white-text">
				        Obtener Municipios POST
				    </div>
				    <div class="card-block">
				    	<h4 class="card-title">URL</h4>
						<code>
							http://localhost/domgeo/api/municipios
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
							{"clave": "2"}
							<!-- </pre> -->
				        </code>

				        <br>
				        <br>


				        <h4 class="card-title">Headers (opción 1)</h4>
				        <code>
				        	Content-Type: text/plain
				        </code>
						<br>
				        <code>
				        	auth: 123
				        </code>

						<br>
						<br>

						<h4 class="card-title">Headers (opción 2)</h4>
						<code>
				        	Content-Type: multipart/form-data;
				        </code>
						<br>
				        <code>
				        	auth: 123
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
				
				<div class="card my-card" id="div_municipios_get" hidden>
					<div class="card-header primary-color white-text">
				        Obtener Municipios GET
				    </div>
				    <div class="card-block">
				    	<h4 class="card-title">URL</h4>
						<code>
							http://localhost/domgeo/api/municipios/{id_estado}
						</code>
						
						<br>
						<br>

						<h4 class="card-title">Metodo</h4>
						<code>
							GET
						</code>
						
						<br>
						<br>

				        <h4 class="card-title">Headers</h4>
				        <code>
				        	auth: 123
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
						
						<code> Status Code: 200 &nbsp; --> &nbsp; {"estado": 1, "mensaje": "Success"} </code><br>
						<code> Status Code: 403 &nbsp; --> &nbsp; {"estado": 2, "mensaje": "Acceso denegado"} </code><br>
						<code> Status Code: 500 &nbsp; --> &nbsp; {"estado": 3, "mensaje": "Internal Server Error"} </code><br>
						<code> Status Code: 422 &nbsp; --> &nbsp; {"estado": 4, "mensaje": "Error en la estructura de la peticion o en los parametros"} </code><br>

				    </div>
				</div>

			</div>


		</div>
	</div>
	
	<script src="../assets/MDB/js/jquery-2.2.3.min.js"></script>
	<script src="../assets/MDB/js/bootstrap.min.js"></script>
	<script src="../assets/MDB/js/mdb.min.js"></script>
	<script src="../assets/js/documentation.js"></script>
	
</body>
</html>