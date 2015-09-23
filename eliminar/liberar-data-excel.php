
	
	<?php 
	
	include("../bd/conexion.php");

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

	
 //Variable de sesion 

	$usuario                   =$_SESSION['id_usuario'];


	$Sql="DELETE FROM [020BDCOMUN].DBO.DATOS_RQ WHERE USUARIO='$usuario'";
	
	
	$result         =mssql_query($Sql);
	
	if (!$result){echo "Error al guardar";}
	else{
	
	
	?>
	
	<script>
	alert('El proceso se realizo exitosamente');
	</script>
	<script>
	
	window.location = "/codrise/compras/carga-de-datos/archivo/pages/cargar";
	</script>
	
	<?php
	
	}
	
