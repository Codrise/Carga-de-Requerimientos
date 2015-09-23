<!DOCTYPE html>
<html lang                 ="es">
<head>
<?php include('../../header.php'); ?>
<?php //include('../../bd/conexion.php'); ?>
<meta charset              ="UTF-8">
</head>
<body>

<div class                 ="container">
<div class                 ="row clearfix">
<div class                 ="col-md-4 column">
<form 
action                     ="/codrise/compras/carga-de-datos/registrar/grabar-requerimiento.php"
method="POST" autocomplete="Off">
<label for                 ="">Requerimiento:</label>
<?php $Starsoft=$_SESSION['starsoft'];
//echo "$Starsoft"; ?>
<select name               ="requerimiento" class="form-control" required>
<option value              ="">Selecciona el requerimiento...</option>
<?php
$link                      =Conectarse();
$Sql                       ="SELECT C.NROREQUI,C.CODSOLIC FROM [010BDCOMUN].DBO.REQUISC 
AS C INNER JOIN [010BDCOMUN].DBO.REQUISD AS D 
ON  C.NROREQUI=D.NROREQUI WHERE DESCPRO='RQEXCEL' AND codpro='TEXTO' 
AND CODSOLIC='$Starsoft'
order by NROREQUI";
$result                    =mssql_query($Sql) or die(mssql_error());
while ($row                =mssql_fetch_array($result)) {
?>
<option value              ="<?php echo $row['NROREQUI']?>">
<?php echo $row['NROREQUI'];?></option>
<?php }?>
</select>
<label for                 ="">Nro. de Máquina:</label>
<input type                ="text" name="maquina"  class="form-control" 
onchange                   ="conMayusculas(this)"  required>
</div>
<div class                 ="col-md-4 column">
<label for                 ="">Orden de fabricación:</label>
<select name               ="orden" class="form-control" required>
<option value              ="">Seleccione la o/t...</option>
<?php
$link                      =Conectarse();
$Sql                       ="SELECT OF_COD,OF_ARTNOM,OF_ESTADO FROM [010BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO            ='ACTIVO' ORDER BY OF_COD";
$result                    =mssql_query($Sql) or die(mssql_error());
while ($row                =mssql_fetch_array($result)) {
?>
<option value              ="<?php echo $row['OF_COD']?>">
<?php echo $row['OF_COD'];?></option>
<?php }?>
</select>
<label for                 ="">Centro de Costo:</label>
<select name               ="centro" class="form-control" required>
<option value              ="">Seleccione el centro de costo...</option>
<?php
$link                      =Conectarse();
$Sql                       ="SELECT  CENCOST_CODIGO,CENCOST_DESCRIPCION,
(CENCOST_DESCRIPCION+' - '+CENCOST_CODIGO)as fullname
from [010BDCONTABILIDAD].DBO.CENTRO_COSTOS

order by  CENCOST_CODIGO";
$result                    =mssql_query($Sql) or die(mssql_error());
while ($row                =mssql_fetch_array($result)) {
?>
<option value              ="<?php echo $row['CENCOST_CODIGO']?>">
<?php echo $row['fullname'];?></option>
<?php }?>
</select>

<!-- incio modal grabar	 -->
<div class                 ="modal fade" id="modal-container-160169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class                 ="modal-dialog">
<div class                 ="modal-content">
<div class                 ="modal-header">
<button type               ="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class                  ="modal-title" id="myModalLabel">
Confirmación...
</h4>
</div>
<div class                 ="modal-body">
Tenga en cuenta que solo se grabaran  los registros que tengan el simbolo
<i class                   ="glyphicon glyphicon-ok-circle text-primary"></i>.</br>
¿Esta seguro de proceder con la carga de datos?
</div>
<div class                 ="modal-footer">

<button type               ="submit" class="btn btn-primary">SI</button>
<button type               ="button" class="btn btn-default" data-dismiss="modal">NO</button> 
</form>
</div>
</div>

</div>

</div>
<!-- 	fin modal grabar -->
</div>
<div class                 ="col-md-2 column">
<br>	
<a id                      ="modal-160169" href="#modal-container-160169" 
role                       ="button" class="btn btn-primary" data-toggle="modal">Grabar</a>

</div>
<div class                 ="col-md-2 column">
<ul class                  ="nav navbar-nav navbar-right">
<li>
<a href                    ="#"><i class="glyphicon glyphicon-cog">
</i></a>
</li>
<li class                  ="dropdown">
<a href                    ="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret">
</strong></a>
<ul class                  ="dropdown-menu">
<li>
<a id                      ="modal-681841" href="#modal-container-681841" 
role                       ="button" class="btn btn-danger" 
data-toggle                ="modal">Liberar</a>
</li>

</ul>
</li>
</ul>
</div>
</div>


<div class                 ="row clearfix">
<div class                 ="col-md-12 column">
<p></p>
<div class                 ="table-responsive">

<table class               ="table table-bordered table-condensed">
<thead>
<tr class                  ="success">
<th>ITEM</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UNIDAD</th>
<th>CANT.</th>

<th><i class               ="glyphicon glyphicon-eye-open"></i></th>
<!-- 	
<th><span class            ="glyphicon glyphicon-refresh text-priamary"></span></th> -->
</tr>
</thead>
<!-- Vatiable de sesion -->
<?php 
$usuario                   =$_SESSION['id_usuario'];
?>
<?php 
$link                      =Conectarse();

$sql                       ="SELECT (ROW_NUMBER() OVER(ORDER BY CODIGODATOS_RQ))AS ITEM,
CASE WHEN RTRIM(ACODIGO)   = '' THEN 'NO'
ELSE ISNULL(ACODIGO, 'NO') END EXISTE
,CODIGODATOS_RQ,CANTDATOS_RQ,AUNIDAD,ADESCRI FROM [020BDCOMUN].DBO.DATOS_RQ AS D
LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON
D.CODIGODATOS_RQ           =M.ACODIGO  WHERE D.USUARIO='$usuario'
";  
$result                    = mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result) ==0) die("NO TENEMOS DATOS PARA MOSTRAR");

while($row                 =mssql_fetch_array($result))
{

?>
<tbody>
<tr class                  ="active">
<?php 	
$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;

$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;
?>
<td><?php echo utf8_encode($row[ITEM]); ?>  </td>
<td><?php echo utf8_encode($row[CODIGODATOS_RQ]); ?>  </td>
<td><?php echo utf8_encode($row[ADESCRI]); ?>  </td>
<td><?php echo utf8_encode($row[AUNIDAD]); ?>  </td>
<td><?php echo utf8_encode($row[CANTDATOS_RQ]); ?>  </td>
<td>
<?php 	
if ($row[EXISTE]           =='NO') {
?>
<i class                   ="glyphicon glyphicon-remove-circle text-danger"></i>
<?php
}

ELSE	{
?>
<i class                   ="glyphicon glyphicon-ok-circle text-primary"></i>
<?php
}

?>  
</td>

<!-- 			 
<td>	<a id              ="modal-11978" href='<?php echo $txtxa;?>' role="button" 
class                      ="btn" data-toggle="modal">
<span class                ="glyphicon glyphicon-refresh text-success"></span></a></td> 
-->


</tr>

<?php 
$i                         =$i+1;
$j                         =$j+1; 

}?>
</tbody>
</table>
</div>
</div>
</div>
</div>





<div class                 ="modal fade" id="modal-container-681841" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class                 ="modal-dialog">
<div class                 ="modal-content">
<div class                 ="modal-header">
<button type               ="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class                  ="modal-title" id="myModalLabel">
Confirmación...
</h4>
</div>
<div class                 ="modal-body">
<p>Este proceso eliminara toda la data cargada.</p>
<p>¿Desea continuar...?</p>
</div>
<div class                 ="modal-footer">
<a href                    ="/codrise/compras/carga-de-datos/eliminar/liberar-data-excel.php" class="btn btn-primary">SI</a>
<button type               ="button" class="btn btn-default" data-dismiss="modal">NO</button>

</div>
</div>

</div>

</div>
</body>
</html>