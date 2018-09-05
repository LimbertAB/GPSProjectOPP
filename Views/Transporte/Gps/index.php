<?php $months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$mes=$months[intval($resultado['month']) - 1];
?>
<div class="col-md-12">
	<div class="col-md-10">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LOCALIZACIONES GPS <small> (<?php echo $resultado['day']."-".$mes."-".$resultado['year']?>)</small> </h2>
	</div>
	<div class="col-md-2">
	   <div class='input-group date' id='datetimepickermes'>
		   <input  readonly type='text' value="<?php echo $resultado['year']."-".$resultado['month']."-".$resultado['day'] ?>" class="form-control" placeholder=" <?php echo $resultado['year']."-".$resultado['month']."-".$resultado['day'] ?>"/>
		 <span class="input-group-addon">
		    <span class="glyphicon glyphicon-calendar"></span>
		 </span>
	   </div>
	</div>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE PLANIFICACION -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="tablegps" class="table table-striped table-condensed table-hover">
				<thead>
					<tr style="background-color: #313131">
						<th width="10%">Nro</th>
						<th width="40%">vehiculo</th>
						<th  width="20%">ubicaciones</th>
						<th width="20%">fecha</th>
						<th width="10%">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $aux=1; ?>
					<?php while($row=mysql_fetch_array($resultado["ubicaciones"])): ?>
						<tr>
							<td><h5><?php echo $aux;?></h5></td>
							<td style="text-align:left;padding-left:9px"><h5><?php echo $row['tipo'];?></h5></td>
							<td><h5><?php echo $row['total'];?> Ubicaciones</h5></td>
                                   <td><h5><?php echo $row['fecha'];?></h5></td>
							<td>
								<a  href="/<?php echo FOLDER;?>/Reporte/printonepdf/<?php echo $row['id_chofer'];?>?month=<?php echo $resultado['month'];?>?year=<?php echo $resultado['year'];?>"><button title="ver ubicaciones" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></button></a>
								<a  href="/<?php echo FOLDER;?>/Reporte/printonepdf/<?php echo $row['id_chofer'];?>?month=<?php echo $resultado['month'];?>?year=<?php echo $resultado['year'];?>" target="_blank"><button title="imprimir reporte" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
							</td>
						</tr>
						<?php $aux++; ?>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
			<?php if(mysql_num_rows($resultado["ubicaciones"])<1):?>
				<div class="col-md-12">
					<div class="alert alert-error alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>MENSAJE DE ALERTA!</strong> No se encontraron ubicaciones GPS registrados este dia.
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<script>
   	var id_planificacion_u;
    $(document).ready(function(){
	    $('#inputsearch').keyup(function(){
		    var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablegps","No se encontraron VIAJES registrados.");});

		$('#datetimepickermes').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'}).on('dp.change', function(e){
			var placeholder=$('#datetimepickermes input').attr('placeholder'),input=$('#datetimepickermes input').val(),entero=parseInt(e.date._d.getMonth())+1,au= entero < 10 ? ("0" + entero) : (entero);
			var dia=parseInt(e.date._d.getDay()),diaactual= dia < 10 ? ("0" + dia) : (dia);
			console.log(dia,diaactual);
			// console.log(e.date._d.getFullYear());
			// console.log(au);
			//if (placeholder.toString()!=input.toString()) {
				//window.location.href = "/<?php echo FOLDER;?>/Gps?year="+e.date._d.getFullYear()+"&month="+au;
			//}
		});
	});
</script>
