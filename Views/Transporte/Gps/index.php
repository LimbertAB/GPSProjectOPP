<?php $months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$mes=$months[intval($resultado['month']) - 1];
?>
<script src="<?php echo URL;?>public/js/jspdf.debug.js"></script>
<script src="<?php echo URL;?>public/js/jspdfpluginautotable.js"></script>
<script src="<?php echo URL;?>public/js/print.js"></script>
<div class="fab" data-target="#importgpsModal" data-toggle="modal"> + </div>
<div class="col-md-12">
	<div class="col-md-10">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LOCALIZACIONES GPS <small> (<?php echo $resultado['day']."-".$mes."-".$resultado['year']?>)</small> </h2>
	</div>
	<div class="col-md-2" style="padding:0 10px 0 10px">
		<div class='input-group date' id='datetimepickermes1'>
			<input  readonly type='text' value="<?php echo $resultado['date']?>" class="form-control" placeholder="<?php echo $resultado['date']?>"/>
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
						<th width="6%">Nro</th>
						<th width="28%">chofer</th>
						<th width="25%">vehiculo</th>
						<th  width="31%">descripción</th>
						<th width="10%">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $aux=1; ?>
					<?php while($row=mysql_fetch_array($resultado["ubicaciones"])): ?>
						<tr>
							<td><h5><?php echo $aux;?></h5></td>
							<td style="text-align:left;padding-left:9px"><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_people/<?php echo $row['id_chofer'];?>?date=<?php echo $resultado['year'].$resultado['month'].$resultado['day'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a> <?php echo $row['nombre'];?> <small> <?php echo $row['brevet']?></small> </h5></td>
							<td style="text-align:left;padding-left:9px"><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_car/<?php echo $row['id_vehiculo'];?>?date=<?php echo $resultado['year'].$resultado['month'].$resultado['day'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a> <?php echo $row['tipo'];?> <small> <?php echo $row['placa']?></small> </h5></td>
							<td><h5><?php echo $row['descripcion'];?> Ubicaciones</h5></td>
							<td>
								<button title="imprimir reporte" type="button" onclick="verAjax(<?php echo $row['id'] ?>)" id="btnprint" data-loading-text="Generando pdf..." class="btn btn-info btn-sm" autocomplete="off">Descargar</button>
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
<?php include 'modalimportgps.php';?>
<script>
   	var id_planificacion_u;
    $(document).ready(function(){
	    $('#inputsearch').keyup(function(){
		var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablegps","No se encontraron VIAJES registrados.");});
		$('#datetimepickermes1').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'}).on('dp.change', function(e){
    			var placeholder=$('#datetimepickermes1 input').attr('placeholder'),input=$('#datetimepickermes1 input').val(),entero=parseInt(e.date._d.getMonth())+1,au= entero < 10 ? ("0" + entero) : (entero);
    			var dia=parseInt(e.date._d.getDate()),diaactual= dia < 10 ? ("0" + dia) : (dia);
    			if (placeholder.toString()!=input.toString()) {
    				window.location.href = "/<?php echo FOLDER;?>/Gps?date="+e.date._d.getFullYear()+au+diaactual;
    			}
    		});
		$('#textareaobjetivo').keyup(function(){console.log($(this).val().trim().length);if ($(this).val().trim().length>5) {$("#buttonregistrar").attr('disabled', false);validate_sinsmall('.fila1',true);}else{$("#buttonregistrar").attr('disabled', true);validate_sinsmall('.fila1',false);}});
	});
	function registrarAjax(){
		var parametros=new FormData($('#formularioimportar')[0]);
		$.ajax({
			data:parametros,
			url: '<?php echo URL;?>Gps/crear',
			type:"POST",
			contentType:false,
			processData:false,
			success:function(obj){
				if (obj=="false") {
				}else{
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ location.reload();}, 1000);
				}
			}
		});
	}
	function verAjax(val){
		var $btn = $('#btnprint').button('loading');
		$.ajax({
			url: '<?php echo URL;?>Gps/printpdf/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				imprimir_JsPdf(data,"<?php echo URL?>");
			}
		});
	}
</script>
