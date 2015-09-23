



	<?php
	//Proceso de conexiÃ³n con la base de datos
	include('bd/conexion.php');
	$link=Conectarse();

	//Iniciar SesiÃ³n
	session_start();

	//Validar si se estÃ¡ ingresando con sesiÃ³n correctamente
	if (!$_SESSION){
	echo '<script language = javascript>
	alert("usuario no autenticado")
	self.location = "/codrise/compras/carga-de-datos/acceso"
	</script>';
	}

	$id_usuario = $_SESSION['id_usuario'];

	$consulta= "SELECT apellidos,dni FROM [020BDCOMUN].DBO.USUARIOS
	WHERE id_usuario='".$id_usuario."'"; 
	$resultado= mssql_query($consulta,$link) or die (mssql_error());
	$fila=mssql_fetch_array($resultado);
	$apellidos = $fila['apellidos'];
	$edad = $fila['edad'];
	?>

	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<title>.:CARGA DE DATOS:.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

	<link href="/codrise/compras/carga-de-datos/css/bootstrap.min.css" rel="stylesheet">
	<link href="/codrise/compras/carga-de-datos/css/style.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" 
	href="/codrise/compras/carga-de-datos/img/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" 
	href="/codrise/compras/carga-de-datos/img/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" 
	href="/codrise/compras/carga-de-datos/img/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" 
	href="/codrise/compras/carga-de-datos/img/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="/codrise/compras/carga-de-datos/img/favicon.png">

	<script type="text/javascript" src="/codrise/compras/carga-de-datos/js/jquery.min.js"></script>
	<script type="text/javascript" src="/codrise/compras/carga-de-datos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/codrise/compras/carga-de-datos/js/scripts.js"></script>

	<!-- Inicio Script convertir en mayuscula al ingresar	-->
	<script language    =""="JavaScript">
	function conMayusculas(field) {
	field.value         = field.value.toUpperCase()
	}
	</script>
	<!-- Fin Script convertir en mayuscula al ingresar-->
	</head>

	<body>
	<div class="container">
	<div class="row clearfix">
	<div class="col-md-12 column">
	<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse"
	data-target="#bs-example-navbar-collapse-1"> 
	<span class="sr-only">Toggle navigation</span><span class="icon-bar">
	</span><span class="icon-bar"></span><span class="icon-bar"></span></button>
	<a class="navbar-brand" href="/codrise/compras/carga-de-datos/home">INICIO</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROCESOS<strong class="caret"></strong></a>
	<ul class="dropdown-menu">
	<li>
	<a href="/codrise/compras/carga-de-datos/archivo/pages/cargar">Carga de archivos</a>
	</li>
	<li>
	<a href="/codrise/compras/carga-de-datos/archivo/pages/consulta">Consulta de archivos</a>
	</li>
	</ul>
	</li>
	</ul>
	<form class="navbar-form navbar-left" role="search" disabled>
	<div class="form-group">
	<input type="text" class="form-control">
	</div> <button type="submit" class="btn btn-default" disabled="">Buscar</button>
	</form>
	<ul class="nav navbar-nav navbar-right">
	<li>
	<a href="#"><i class="glyphicon glyphicon-user text-success">
	</i><?php echo $_SESSION['nombres'].' '.utf8_encode($_SESSION['apellidos']); ?></a>
	</li>
	<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret"></strong></a>
	<ul class="dropdown-menu">
	<li>
	<a href="/codrise/compras/carga-de-datos/adios">Salir</a>
	</li>

	</ul>
	</li>
	</ul>
	</div>

	</nav>
	</div>
	</div>
	</div>
	</body>
	</html>
