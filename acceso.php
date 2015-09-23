					<!DOCTYPE html>
					<html lang="es">
					<head>
					<meta charset="utf-8">
					<title>ACCESO</title>
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta name="description" content="">
					<meta name="author" content="">
					<link rel="shortcut icon" href="/codrise/compras/carga-de-datos/img/favicon.png">
					<link href="/codrise/compras/carga-de-datos/css/bootstrap.min.css" rel="stylesheet">
					<link href="/codrise/compras/carga-de-datos/css/login.css" rel="stylesheet">
					
					</head>
					<body>
					<div class="container">
					
					<form class="form-signin" role="form" method="POST" action="script_acceso_usuario.php"
					autocomplete="Off">
					<h2 class="form-signin-heading text-center text-primary">CODRISE</h2>
					<label for="inputEmail" class="sr-only">Usuario</label>
					<input type="text" id="inputText" class="form-control" placeholder="usuario" 
					required autofocus maxlength="8" name="usuario">
					<label for="inputPassword" class="sr-only">Contraseña</label>
					<input type="password" id="inputPassword" class="form-control" placeholder="contraseña" 
					required maxlength="8" name="contrasena">
				
					<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
					</form>
					</div>
					</body>
					</html>