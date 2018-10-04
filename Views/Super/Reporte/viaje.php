<div class="row">
	<div class="col-md-5">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">REPORTE DE VIAJES</h2>
	</div>
	<div class="col-md-7">
		<form class="form-inline">
			<div class="form-group">
		    		<label for="exampleInputEmail2">DESDE</label>
				<div class='input-group date' id='datetimepickermes1'>
       			   	<input  readonly type='text' value="<?php echo $resultado['desde']?>" class="form-control" placeholder=" <?php echo $resultado['desde']?>"/>
	       			<span class="input-group-addon">
	       			    	<span class="glyphicon glyphicon-calendar"></span>
	       		     </span>
       		     </div>
			</div>
		  	<div class="form-group">
		    		<label for="exampleInputEmail2">HASTA</label>
				<div class='input-group date' id='datetimepickermes2'>
       			   	<input  readonly type='text' value="<?php echo $resultado['hasta']?>" class="form-control" placeholder=" <?php echo $resultado['hasta']?>"/>
	       			<span class="input-group-addon">
	       			    	<span class="glyphicon glyphicon-calendar"></span>
	       		     </span>
       		     </div>
		  	</div>
			<button type="button" class="btn btn-info" name="button" id="buttonverporfecha">VER</button>
		</form>
	</div>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE PLANIFICACION -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="tableplanificacion" class="table table-striped table-condensed table-hover">
				<thead>
					<tr style="background-color: #313131">
						<th width="10%">Nro</th>
						<th width="40%">chofer</th>
						<th  width="20%">viajes</th>
						<th width="10%">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $aux=1; ?>
					<?php while($row=mysql_fetch_array($resultado["todos"])): ?>
						<tr>
							<td><h5><?php echo $aux;?></h5></td>
							<td style="text-align:left;padding-left:9px"><h5><?php echo $row['nombre'];?></h5></td>
							<td><h5><?php echo $row['total'];?> Viajes</h5></td>
							<td>
								<a  href="/<?php echo FOLDER;?>/Reporte/printonepdf/<?php echo $row['id_chofer'];?>?desde=<?php echo $resultado['desde'];?>&hasta=<?php echo $resultado['hasta'];?>" target="_blank"><button title="imprimir reporte" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
							</td>
						</tr>
						<?php $aux++; ?>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
			<?php if(mysql_num_rows($resultado["todos"])<1):?>
				<div class="col-md-12">
					<div class="alert alert-error alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS registrados.
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<script>
   	var id_planificacion_u;
    $(document).ready(function(){
	     $('#datetimepickermes1,#datetimepickermes2').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'});
	     $('#inputsearch').keyup(function(){
		     var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableplanificacion","No se encontraron VIAJES registrados.");});
	     $('#buttonverporfecha').click(function(){
		    window.location.href = "/<?php echo FOLDER;?>/Reporte/viaje?desde="+$('#datetimepickermes1 input').val()+"&hasta="+$('#datetimepickermes2 input').val();
	     });
	});
</script>
