<?php
	$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	$mes=$months[intval($resultado['month']) - 1];
?>
<div class="row">
	<div class="col-md-9">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LISTA DE GRONOGRAMAS <small> (<?php echo $mes."-".$resultado['year'];?>)</small> </h2>
	</div>
	<div class="col-md-2">
	   <div class='input-group date' id='datetimepickermes1'>
		   <input  readonly type='text' value="<?php echo $resultado['year']."-".$resultado['month'] ?>" class="form-control" placeholder=" <?php echo $resultado['year']."-".$resultado['month'] ?>"/>
		 <span class="input-group-addon">
		    <span class="glyphicon glyphicon-calendar"></span>
	    </span>
	   </div>
	</div>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="tableboletas" class="table table-striped table-condensed table-hover">
				<thead>
					<tr style="background-color: #313131">
						<th rowspan="2" width="10%" style="padding-bottom:10px;">N°</th>
						<th width="15%" colspan="2" style="padding:0;margin:0">fecha</th>
						<th rowspan="2" width="40%" style="padding-bottom:10px;">cantidad de registros</th>
						<th rowspan="2" width="10%" style="padding-bottom:10px;">Opciones</th>
					</tr>
					<tr style="background-color: #555555">
						<th width="20%" style="padding:0;margin:0;font-size:.9em">inicio</th>
						<th width="20%" style="padding:0;margin:0;font-size:.9em">fin</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($resultado["cronogramas"]);$i++): ?>
						<tr>
							<td><h5><?php echo ($i)+1;?></h5></td>
							<td><h5><?php echo $resultado["cronogramas"][$i]['fecha_de'];?></h5></td>
							<td><h5><?php echo $resultado["cronogramas"][$i]['fecha_hasta'];?></h5></td>
							<td><h5><?php echo $resultado["cronogramas"][$i]['total'];?> Boletas</h5></td>
							<td>
								<a href="/<?php echo FOLDER;?>/Cronograma/ver/<?php echo $resultado["cronogramas"][$i]['id'];?>"><button title="ver cronograma" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
								<a target="_blank" href="/<?php echo FOLDER;?>/Cronograma/printpdf/<?php echo $resultado["cronogramas"][$i]['id'];?> "><button title="imprimir cronograma" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
							</td>
						</tr>
					<?php endfor; ?>
				</tbody>
			</table>
		</div>
		<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
			<?php if(count($resultado["cronogramas"])<1):?>
				<div class="col-md-12">
					<div class="alert alert-error alert-dismissible" role="alert">
					<strong>MENSAJE DE ALERTA!</strong> No se encontraron CRONOGRAMAS registradas.
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
	     $('#datetimepickermes1').datetimepicker({locale: 'es',format: 'YYYY-MM',ignoreReadonly: true,viewMode: 'months'}).on('dp.change', function(e){
		     var placeholder=$('#datetimepickermes1 input').attr('placeholder'),input=$('#datetimepickermes1 input').val(),entero=parseInt(e.date._d.getMonth())+1,au= entero < 10 ? ("0" + entero) : (entero);
		     if (placeholder.toString()!=input.toString()) {
			     window.location.href = "/<?php echo FOLDER;?>/Cronograma?date="+e.date._d.getFullYear()+au;
		     }
	     });
		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableboletas","No se encontraron CRONOGRAMAS registrados.");});
	});

</script>
