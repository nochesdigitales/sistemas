<?php
	date_default_timezone_set('America/Caracas');

?>

<section class="container">
<div class="row">
	<div class="col-md-11"><br><br>
	<h1>Inicio</h1>

						<form>
<div class="row">
<div class="col-md-3">


</div>
<div class="col-md-2">
<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
</div>
<div class="col-md-2">
<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
</div>

<div class="col-md-2">
<input type="submit" class="btn btn-info btn-block" value="Procesar">
<input type="submit" class="btn btn-info btn-block" value="Reiniciar" onclick = "location='menuacade.php'">
<a href="index.php" class="btn btn-danger btn-block">Regresar</a>	
</div>

</div>
</form>

	</div>
	</div>
<br><!--- -->
<div class="row">
	
	<div class="col-md-11">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>

<?php 

$sd = "";
$ed = "";


if($_GET["sd"]!=""&&$_GET["ed"]!=""):
$sd = strtotime($_GET["sd"]);
$ed = strtotime($_GET["ed"]);
endif;
else:
	$dateB = new DateTime(date('Y-m-d')); 
	$dateA = $dateB->sub(DateInterval::createFromDateString('28 days'));
	$sd= strtotime(date_format($dateA,"Y-m-d"));
	$ed = strtotime(date("Y-m-d"));
	//$ed = strtotime(date("Y-m-d"));
endif;

if($sd!=""&&$ed!=""):
?>
<div class="panel panel-default">
<div class="panel-heading">Grafica</div>
<div id="graph" class="animate" data-animate="fadeInUp" ></div>
</div>
<script>

<?php 
echo "var c=0;";
echo "var dates=Array();";
echo "var data=Array();";
echo "var total=Array();";
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  $operations = OperationData::getSumByKindDate(date("Y-m-d",$i),1);
  $res = OperationData::getSumByKindDate(date("Y-m-d",$i),2);
//  echo $operations[0]->t;
  $sr = $res[0]->t!=null?$res[0]->t:0;
  $sl = $operations[0]->t!=null?$operations[0]->t:0;
  echo "dates[c]=\"".date("Y-m-d",$i)."\";";
  echo "data[c]=".($sl-($sr)).";";
  echo "total[c]={x: dates[c],y: data[c]};";
  echo "c++;";
}
?>
// Use Morris.Area instead of Morris.Line
Morris.Area({
  element: 'graph',
  data: total,
  xkey: 'x',
  ykeys: ['y',],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>


<div class="box box-primary">
<table class="table table-bordered">
	<thead>
		<th>Fecha</th>
		<th>Ingresos</th>
		<th>Gastos</th>
		<th>Ganancia</th>
	</thead>
			<?php 
$restotal=0;
$selltotal = 0;
$spendtotal = 0;
for($i=$sd;$i<=$ed;$i+=(60*60*24)):
  $operations = OperationData::getSumByKindDate(date("Y-m-d",$i),1);
  $res = OperationData::getSumByKindDate(date("Y-m-d",$i),2);
			 ?>
			 <?php if(count($operations)>0):?>
			 	<?php  ?>

	<tr>
		<td><?php echo date("Y-m-d",$i); ?></td>
		<td>Bs <?php echo number_format($operations[0]->t,2,'.',','); ?></td>
		<td>Bs<?php echo number_format($res[0]->t,2,'.',','); ?></td>
		<td>Bs<?php echo number_format($operations[0]->t-($res[0]->t),2,'.',','); ?></td>
	</tr>
<?php
$restotal+= ($res[0]->t);
$selltotal+= ($operations[0]->t);
// endforeach; ?>
			 <?php else:
			 ?>
<div class="jumbotron">
	<h2>No hay operaciones</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
</div>
			 <?php endif; ?>
			<?php endfor;?>
	<tr>
		<td>Total</td>
		<td>Bs<?php echo number_format($selltotal,2,'.',','); ?></td>
		<td>Bs<?php echo number_format($restotal,2,'.',','); ?></td>
		<td>Bs<?php echo number_format($selltotal-($spendtotal+$restotal),2,'.',','); ?></td>
	</tr>
</table>
</div>
<?php else:?>
<div class="jumbotron">
	<h2>Fecha Incorrectas</h2>
	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>


	</div>
</div>

<br><br><br><br>
</section>