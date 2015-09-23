			<?php 
			//Proceso de conexiÃ³n con la base de datos
			include('bd/conexion.php');
			$link=Conectarse();
			//Inicio de variables de sesiÃ³n
			if (!isset($_SESSION)) {
			session_start();
			}
			
			//Recibir los datos ingresados en el formulario
			$usuario= $_POST['usuario'];
			$contrasena= $_POST['contrasena'];
			
			//Consultar si los datos son estÃ¡n guardados en la base de datos
			$consulta= "SELECT * FROM [020BDCOMUN].DBO.USUARIOS
			WHERE usuario='".$usuario."' AND contrasena='".$contrasena."'"; 
			$resultado= mssql_query($consulta,$link) or die (mssql_error());
			$fila=mssql_fetch_array($resultado);
			
			
			if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
			{
			echo '<script language = javascript>
			alert("Usuario o Password errados, por favor verifique.")
			self.location = "/codrise/compras/carga-de-datos/"
			</script>';
			}
			else //opcion2: Usuario logueado correctamente
			{
			//Definimos las variables de sesiÃ³n y redirigimos a la pÃ¡gina de usuario
			$_SESSION['id_usuario'] = $fila['id_usuario'];
			$_SESSION['nombres'] = $fila['nombres'];
			$_SESSION['apellidos'] = $fila['apellidos'];
			$_SESSION['starsoft'] = $fila['starsoft'];
			
			
			header("Location: /codrise/compras/carga-de-datos/home");
			}
			?>