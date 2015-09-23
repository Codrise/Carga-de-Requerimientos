
	<meta charset="UTF-8">

	
	<?php 
	session_start();
	
	if ($_SESSION['nombres'])
	{	
	session_destroy();
	?>
	
	
	
	
	<script language = javascript>
	alert("Su sesión ha terminado correctamente")
	self.location = "/codrise/compras/carga-de-datos/"
	</script>
	

	
	
	<?php
	
	}
	else
	{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor registrese")
	self.location = "/codrise/compras/carga-de-datos/"
	</script>';}
	?>
	
	
