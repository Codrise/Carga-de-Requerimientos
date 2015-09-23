



	<?php
	//Proceso de conexiÃ³n con la base de datos
	include('../bd/conexion.php');
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
