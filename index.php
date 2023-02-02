<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visualizacion de registros</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/MDB/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/MDB/css/mdb.css">
	<link rel="stylesheet" href="assets/MDB/css/style.css">
</head>
<body>

	<nav class="navbar navbar-toggleable-md navbar-dark bg-primary" style="margin-bottom: 50px;">
	    <div class="container">
	        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>
	        <a class="navbar-brand" href="#">
	            <strong>Visualizacion de registros</strong>
	        </a>
	        <div class="collapse navbar-collapse" id="navbarNav1">
	            <ul class="navbar-nav mr-auto">
	               
	            </ul>
	            <ul class="navbar-nav">

					<li class="nav-item dropdown btn-group active">
	                    <a class="nav-link " href="documentation/">
	                    	Ver documentación
	                    </a>
	                </li>
	               	
	                <!-- <li class="nav-item dropdown btn-group active">
	                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    	Documentación
	                    </a>
	                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
	                        <a class="dropdown-item" href="documentation/v1/"> Versión 1 </a>
	                        <a class="dropdown-item" href="documentation/v2/"> Versión 2 </a>
	                        <a class="dropdown-item" href="documentation/v1/"> Versión 3 </a>
	                    </div>
	                </li> -->
	                
				</ul>
	        </div>
	    </div>
	</nav>

	<div class="container">
		
		<div class="row">
			
			<div id="tableContainer" class="table-responsive">
				<table id="table" class="table table-striped">
					<thead id="thead"></thead>
					<tbody id="tbody"></tbody>
				</table>
			</div>

		</div>

	</div>
	
	<script src="assets/MDB/js/jquery-2.2.3.min.js"></script>
	<script src="assets/MDB/js/bootstrap.min.js"></script>
	<script src="assets/MDB/js/mdb.min.js"></script>
	<script src="js/jQueryTables.js" type="text/javascript"></script>
	<script src="js/index.js" ></script>

</body>
</html>