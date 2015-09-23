									<!DOCTYPE html>
									<html lang="es">
									<head>
									<?php 
									$Requerimiento=$_REQUEST['rq'];
									function ceros($numero, $ceros=2){
									return sprintf("%0".$ceros."s", $numero ); 
									}
									$Numero= ceros($Requerimiento, 10);
									
									include('../header.php');?>
									</head>
									<body>
									
									
									
									<div class="container">
									
									<div class="row clearfix">
									<div class="col-md-4 column">
									</div>
									<div class="col-md-4 column">
									<img src="../img/aprobado.png" alt="" class="img-responsive">
									<h3 class="text-primary">El requerimiento 
									<?php echo $Numero; ?> fue insertado exitosamente.</h3>
									
									<a href="/codrise/compras/carga-de-datos/archivo/pages/cargar" 
									class="btn btn-success">Cargar mas datos.</a>
									</div>
								
									</div>
									
									</div>
									</body>
									</html>