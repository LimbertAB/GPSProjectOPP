<?php $months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
?>
<script src="<?php echo URL;?>public/js/jspdf.debug.js"></script>
<script src="<?php echo URL;?>public/js/jspdfpluginautotable.js"></script>
<script src="<?php echo URL;?>public/js/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js" integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g==" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.css" integrity="sha512-v5YmWLm8KqAAmg5808pETiccEohtt8rPVMGQ1jA6jqkWVydV5Cuz3nJ9fQ7ittSxvuqsvI9RSGfVoKPaAJZ/AQ==" crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.js" integrity="sha512-zdT4Pc2tIrc6uoYly2Wp8jh6EPEWaveqqD3sT0lf5yei19BC1WulGuh5CesB0ldBKZieKGD7Qyf/G0jdSe016A==" crossorigin=""></script>
<script src="<?php echo URL;?>public/js/print.js"></script>

<div class="fab" data-target="#importgpsModal" data-toggle="modal"> + </div>
<div class="row">
	<div class="col-md-5">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LOCALIZACIONES GPS</h2>
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
			<table id="tablegps" class="table table-striped table-condensed table-hover">
				<thead>
					<tr style="background-color: #313131">
						<th width="6%">Nro</th>
						<th width="20%">chofer</th>
						<th width="20%">vehiculo</th>
						<th  width="30%">descripción</th>
						<th  width="10%">fecha</th>
						<th width="14%">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $aux=1; ?>
					<?php while($row=mysql_fetch_array($resultado["ubicaciones"])): ?>
						<tr>
							<td><h5><?php echo $aux;?></h5></td>
							<td style="text-align:left;padding-left:9px"><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_people/<?php echo $row['id_chofer'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a> <?php echo $row['nombre'];?> <small> <?php echo $row['brevet']?></small> </h5></td>
							<td style="text-align:left;padding-left:9px"><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_car/<?php echo $row['id_vehiculo'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a> <?php echo $row['tipo'];?> <small> <?php echo $row['placa']?></small> </h5></td>
							<td><h5><?php echo $row['descripcion'];?></h5></td>
							<td><h5><?php echo $row['fecha'];?></h5></td>
							<td>
								<button title="imprimir reporte" type="button" onclick="verAjax(<?php echo $row['id'] ?>)" id="btnprint<?php echo $row['id'] ?>" data-loading-text="Generando pdf..." class="btn btn-info btn-xs btn_all_print" autocomplete="off">Descargar</button>
								<a href="/<?php echo FOLDER?>/Gps/ver_gps/<?php echo $row['id']?>"><button type="button" class="btn btn-warning btn-xs"> ver gps</button></a>
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
<div class="col-md-12" id="progress_row" style="display:none">
	<div class="progress" style="margin:0">
	  	<div class="progress-bar progress-bar-success" role="progressbar"  id="progress_download" aria-valuemin="0" aria-valuemax="100" style="width: 1%;">1%</div>
	</div>
	<center>
		<h6 style="margin:2px">Ruta 1 de 500 (1) -> avance 0 de 1</h6>
	</center>
</div>
<div id="map" style="display:none"></div>
<?php include 'modalimportgps.php';?>
<script>
   	var id_planificacion_u;
     $(document).ready(function(){
		$('#datetimepicker1,#datetimepickermes1,#datetimepickermes2').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'});
	    $('#inputsearch').keyup(function(){
		var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablegps","No se encontraron VIAJES registrados.");});

		$('#buttonverporfecha').click(function(){
			window.location.href = "/<?php echo FOLDER;?>/Gps?desde="+$('#datetimepickermes1 input').val()+"&hasta="+$('#datetimepickermes2 input').val();
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
		$('#progress_row').show();
		$('#progress_download').css("width","0%");
		$('#progress_download').text("0%");
		var map = L.map('map').setView([40.725, -73.985], 13);
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);
		var geocodeService = L.esri.Geocoding.geocodeService();
		$(".btn_all_print").attr('disabled', true);
		var $btn = $('#btnprint'+val).button('loading');
		$.ajax({
			url: '<?php echo URL;?>Gps/printpdf/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				imprimir_JsPdf(data,"<?php echo URL?>",val,geocodeService);
			}
		});
	}
</script>
