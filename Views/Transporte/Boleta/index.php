<?php
	$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
?>
<div class="fab" data-target="#newboletaModal" data-toggle="modal" id="btnnewboletasign"> + </div>
<div class="row" style="margin-bottom:20px">
	<div class="col-md-5">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LISTA DE BOLETAS</h2>
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
<div class="row"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo count($resultado["boletas"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:red;margin-left:10px"><?php echo count($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableboletas" class="table table-striped table-condensed table-hover">
						<thead>
							<tr>
								<th width="20%" rowspan="2">unidad</th>
								<th width="25%" rowspan="2">chofer</th>
								<th width="15%" rowspan="2">vehiculo</th>
								<th width="20%" rowspan="2">responsables</td>
			                         <th width="10%" colspan="2" style="margin:0;padding:0">fecha</td>
								<th width="10%" rowspan="2">Opciones</th>
							</tr>
							<tr style="background:#616161">
								<th width="7%" style="margin:0;padding:0;font-size:.9em">desde</td>
			                         <th width="7%" style="margin:0;padding:0;font-size:.9em">hasta</td>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0;$i<count($resultado["boletas"]);$i++): ?>
								<tr>
									<td><h5><?php echo $resultado['boletas'][$i]['unidad'];?></h5></td>
									<td><h5><?php echo $resultado['boletas'][$i]['chofer'];?> <small> <?php echo $resultado['boletas'][$i]['brevet'];?></small></h5></td>
									<td><h5><?php echo $resultado['boletas'][$i]['tipo'];?> <small> <?php echo $resultado['boletas'][$i]['placa'];?></small></h5></td>
									<td style="text-transform:lowercase">
										<h5>
											<?php for ($j=0; $j < count($resultado['boletas'][$i]['responsables']); $j++) {
												if ($j==count($resultado['boletas'][$i]['responsables'])-1) {
													echo $resultado['boletas'][$i]['responsables'][$j]['nombre'];
												}else{
													echo $resultado['boletas'][$i]['responsables'][$j]['nombre'].", ";
												}

											} ?>
										</h5>
									</td>
									<td><h5><?php echo $resultado['boletas'][$i]['fecha_de'];?></h5></td>
									<td><h5><?php echo $resultado['boletas'][$i]['fecha_hasta'];?></h5></td>
									<td>
										<a data-target="#updateboletaModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado['boletas'][$i]['id'];?>)"><button title="editar boleta" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a target="_blank" href="/<?php echo FOLDER;?>/Boleta/printpdf/<?php echo $resultado['boletas'][$i]['id'];?> "><button title="imprimir boleta" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $resultado['boletas'][$i]['id'];?>)"><button title="dar de baja boleta" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(count($resultado["boletas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron BOLETAS registradas.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<tr>
								<th width="20%" rowspan="2">unidad</th>
								<th width="25%" rowspan="2">chofer</th>
								<th width="15%" rowspan="2">vehiculo</th>
								<th width="20%" rowspan="2">responsables</td>
			                         <th width="10%" colspan="2" style="margin:0;padding:0">fecha</td>
								<th width="10%" rowspan="2">Opciones</th>
							</tr>
							<tr style="background:#616161">
								<th width="7%" style="margin:0;padding:0;font-size:.9em">desde</td>
			                         <th width="7%" style="margin:0;padding:0;font-size:.9em">hasta</td>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0;$i<count($resultado["bajas"]);$i++): ?>
								<tr>
									<td><h5><?php echo $resultado['bajas'][$i]['unidad'];?></h5></td>
									<td><h5><?php echo $resultado['bajas'][$i]['chofer'];?> <small> <?php echo $resultado['bajas'][$i]['brevet'];?></small></h5></td>
									<td><h5><?php echo $resultado['bajas'][$i]['tipo'];?> <small> <?php echo $resultado['bajas'][$i]['placa'];?></small></h5></td>
									<td style="text-transform:lowercase">
										<h5>
											<?php for ($j=0; $j < count($resultado['bajas'][$i]['responsables']); $j++) {
												if ($j==count($resultado['bajas'][$i]['responsables'])-1) {
													echo $resultado['bajas'][$i]['responsables'][$j]['nombre'];
												}else{
													echo $resultado['bajas'][$i]['responsables'][$j]['nombre'].", ";
												}

											} ?>
										</h5>
									</td>
									<td><h5><?php echo $resultado['bajas'][$i]['fecha_de'];?></h5></td>
									<td><h5><?php echo $resultado['bajas'][$i]['fecha_hasta'];?></h5></td>
									<td>
										<a data-target="#updateboletaModal" data-toggle="modal" onclick="updateAjax(<?php echo $resultado['bajas'][$i]['id'];?>)"><button title="editar boleta" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="altaAjax(<?php echo $resultado['bajas'][$i]['id'];?>)"><button title="dar de alta boleta" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(count($resultado["bajas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron boletas dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
</div>

<?php 	include 'modalnewboleta.php';
		include 'modalupdateboleta.php';?>
<script>
	var typemodal="";
   	var id_chofer_u,id_boleta_u,id_responsables_u=[],id_boletaresponsable_u=[];
    $(document).ready(function(){
	     $('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableboletas","No se encontraron BOLETAS registradas.");});

		$('#buttonverporfecha').click(function(){
			window.location.href = "/<?php echo FOLDER;?>/Boleta?desde="+$('#datetimepickermes1 input').val()+"&hasta="+$('#datetimepickermes2 input').val();
		});

		$('#datetimepicker1,#datetimepicker2,#datetimepickermes1,#datetimepickermes2').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'});
		$('#datetimepicker1_u,#datetimepicker2_u').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'years'}).on('dp.change', function(e){ function_validate("false");});
		$('#inputobjetivo,#inputobjetivo_u,#inputlugar,#inputlugar_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>7){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputunidad,#inputunidad_u,#inputuso,#inputuso_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>5){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#btnnewboletasign').click(function(){typemodal="";});
		$('#btnregistrar').click(function(){
			var id_establecimiento=0,id_municipio=0,id_redsalud=0,tipo_lugar="departamental",ciudad="potosi",lugar="";
			if ($('.checklugar:checked').val()=="provincial") {
				tipo_lugar="provincial";
				id_establecimiento=$('#selectestablecimiento option:selected').attr('toggle');
				id_municipio=$('#selectmunicipio option:selected').attr('municipio');
				id_redsalud=$('#selectredsalud option:selected').val();
			}else{
				lugar=$('#inputlugar').val()
				tipo_lugar="departamental";
				ciudad=$('#selectdepartamento option:selected').val()
			}
			$.ajax({
				url: '<?php echo URL;?>Boleta/crear',
				type: 'post',
				data:{id_unidad:$('#selectunidad option:selected').val(),
					id_chofer:$('#selectchofer option:selected').val(),
					id_vehiculo:$('#selectvehiculo option:selected').val(),
					objetivo:$('#inputobjetivo').val(),
					uso:$('#inputuso').val(),
					fecha_de:$('#datetimepicker1 input').val(),
					fecha_hasta:$('#datetimepicker2 input').val(),
					id_responsable:$('#selectresponsable').val(),
					id_establecimiento:id_establecimiento,
					id_municipio:id_municipio,
					id_redsalud:id_redsalud,
					tipo_lugar:tipo_lugar,
					ciudad:ciudad,
					lugar:lugar},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){location.reload()}, 1000);
				}}});
		});
		$("#selectresponsable").change(function(){function_validate('true');});

		//UPDATE boleta
		$('#buttonupdate').click(function(){
			var resp=[],resp_id=[],resp_estado=[],values=$('#selectresponsable_u').val(),aux=0;for (var i = 0; i < id_responsables_u.length; i++) {aux=0;for (var j = 0; j < values.length; j++) {if(values[j]==id_responsables_u[i]){aux++;}}if(aux==0){ resp.push(id_responsables_u[i]);resp_estado.push("eliminar");resp_id.push(id_boletaresponsable_u[i]);}}var aux=0;for (var j = 0; j < values.length; j++) {aux=0;for (var i = 0; i < id_responsables_u.length; i++) {if(values[j]==id_responsables_u[i]){aux++;}}if(aux==0){ resp.push(values[j]);resp_estado.push("nuevo");}}
			var id_establecimiento=0,id_municipio=0,id_redsalud=0,tipo_lugar="departamental",ciudad="potosi",lugar="";
			if ($('.checklugar_u:checked').val()=="provincial") {
				tipo_lugar="provincial";id_establecimiento=$('#selectestablecimiento_u option:selected').attr('toggle');id_municipio=$('#selectmunicipio_u option:selected').attr('municipio');id_redsalud=$('#selectredsalud_u option:selected').val();
			}else{
				lugar=$('#inputlugar_u').val();ciudad=$('#selectdepartamento_u option:selected').val()
			}

			$.ajax({
				url: '<?php echo URL;?>Boleta/editar/'+id_boleta_u,
				type: 'post',
				data:{id_chofer:$('#selectchofer_u option:selected').val(),
					id_vehiculo:$('#selectvehiculo_u option:selected').val(),
					objetivo:$('#inputobjetivo_u').val(),
					id_unidad:$('#selectunidad_u option:selected').val(),
					uso:$('#inputuso_u').val(),
					fecha_de:$('#datetimepicker1_u input').val(),
					fecha_hasta:$('#datetimepicker2_u input').val(),
					id_responsable:resp,
					responsable_estado:resp_estado,
					id_boleta_responsable:resp_id,
					id_establecimiento:id_establecimiento,
					id_municipio:id_municipio,
					id_redsalud:id_redsalud,
					tipo_lugar:tipo_lugar,
					ciudad:ciudad,
					lugar:lugar},
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ location.reload() }, 1000);
				}
			});
		});
          $('#selectchofer_u,#selectvehiculo_u,#selectresponsable_u').change(function(){function_validate("false");});
		$('#selectresponsable_u').change(function(){function_validate('false');});

		$('.checklugar,.checklugar_u').change(function () {
			if ($('.checklugar'+typemodal+':checked').val()=="departamental") {
				$('.classdepartamental'+typemodal).show();
				$('.classprovincial'+typemodal).hide();
			}else{
				$('.classdepartamental'+typemodal).hide();
				$('.classprovincial'+typemodal).show();
			}
			function_validate($(this).attr('validate'));
		});
		$("#selectmunicipio option,#selectestablecimiento option,#selectcomunidad option").hide();
	     var seleccionado=$('#selectredsalud option:selected').val();
	     $("#selectmunicipio option[value="+seleccionado+"]").show().selectpicker('refresh');

		$("#selectmunicipio option,#selectestablecimiento option").hide();
	     var seleccionado=$('#selectredsalud option:selected').val();
	     $("#selectmunicipio option[value="+seleccionado+"]").show();

	     $('#selectredsalud,#selectredsalud_u').change(function(){
		     var seleccionado=$('#selectredsalud'+typemodal+' option:selected').val();
		     $("#selectmunicipio"+typemodal+" option,#selectestablecimiento"+typemodal+" option").hide();
		     $("#selectmunicipio"+typemodal+" option[value="+seleccionado+"]").show();
		     $("#selectmunicipio"+typemodal+",#selectestablecimiento"+typemodal).prop("selectedIndex", 0);
			$("#selectmunicipio"+typemodal+",#selectestablecimiento"+typemodal).selectpicker('refresh');
			function_validate($(this).attr('validate'));
	     });
	     $('#selectmunicipio,#selectmunicipio_u').change(function(){
		     var selecc=$('#selectmunicipio'+typemodal+' option:selected').attr('municipio');
		     $("#selectestablecimiento"+typemodal+" option").hide();
		     $("#selectestablecimiento"+typemodal+" option[value="+selecc+"]").show();
		     $("#selectestablecimiento"+typemodal).prop("selectedIndex", 0);
			$("#selectestablecimiento"+typemodal).selectpicker('refresh');
			function_validate($(this).attr('validate'));
	     });
	});
	function evaluar_responsables(){
		var values=$('#selectresponsable_u').val()|| [],aux=0;
		if (values.length>0) {
			if (values.length==id_responsables_u.length) {
				for (var i = 0; i < id_responsables_u.length; i++) {
					for (var j = 0; j < values.length; j++) {
						if(values[j]==id_responsables_u[i]){aux++;}
					}
				}
				if (aux!=id_responsables_u.length) {
					return true;
				}else{return false;}
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
	function updateAjax(val){
		typemodal="_u";
		small_error(".fila1_u",true);small_error(".fila2_u",true);$("#buttonupdate").attr('disabled', false);
		id_responsables_u=[];
		id_boletaresponsable_u=[];
		$.ajax({
			url: '<?php echo URL;?>Boleta/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				console.log(data);
				$('#inputobjetivo_u').val(data.boletas.objetivo.toLowerCase());$('#inputobjetivo_u').attr('placeholder',data.boletas.objetivo.toLowerCase());
				$('#selectunidad_u option[value='+data.boletas.id_unidad+']').attr('selected','selected');
				$('#inputuso_u').val(data.boletas.uso.toLowerCase());$('#inputuso_u').attr('placeholder',data.boletas.uso.toLowerCase());

				$('#datetimepicker1_u input').val(data.boletas.fecha_de);$('#datetimepicker1_u input').attr('placeholder',data.boletas.fecha_de);
				$('#datetimepicker2_u input').val(data.boletas.fecha_hasta);$('#datetimepicker2_u input').attr('placeholder',data.boletas.fecha_hasta);
				$('#selectvehiculo_u option[value='+data.boletas.id_vehiculo+']').attr('selected','selected');
				$('#selectchofer_u option[value='+data.boletas.id_chofer+']').attr('selected','selected');
				$('#selectresponsable_u').selectpicker('val', '');
				$("#selectresponsable_u").selectpicker('refresh');
				var i=0;
				while (i<data.responsables.length) {
					$('#selectresponsable_u option[value='+data.responsables[i].id_responsable+']').attr('selected','selected');
					id_responsables_u.push(data.responsables[i].id_responsable);
					id_boletaresponsable_u.push(data.responsables[i].id);
					i++;
					$("#selectresponsable_u").selectpicker('refresh');
				}
				$("#selectvehiculo_u,#selectchofer_u").selectpicker('refresh');
				$('.checklugar_u[value='+data.boletas.tipo_lugar+']').attr('checked',true);
				if (data.boletas.tipo_lugar=="departamental") {
					$('#inputlugar_u').val(data.boletas.lugares.toLowerCase());small_error(".fila3_u",true);
					$('#selectdepartamento_u option[value='+data.boletas.ciudad+']').attr('selected','selected');
					$('.classdepartamental'+typemodal).show();
					$('.classprovincial'+typemodal).hide();
					$("#selectmunicipio_u option,#selectestablecimiento_u option").hide();
					$("#selectmunicipio_u,#selectestablecimiento_u,#selectredsalud_u").prop("selectedIndex", 0);
					$("#selectmunicipio_u,#selectredsalud_u,#selectestablecimiento_u").selectpicker('refresh');
				}else{
					$('#inputlugar_u').val("");small_error(".fila3_u",false);
					$('.classdepartamental'+typemodal).hide();
					$('.classprovincial'+typemodal).show();
					$("#selectmunicipio_u option,#selectestablecimiento_u option").hide();
					$("#selectmunicipio_u option[value="+data.boletas.id_redsalud+"]").show();
					$("#selectestablecimiento_u option[value="+data.boletas.id_municipio+"]").show();
					$('#selectredsalud_u option[value='+data.boletas.id_redsalud+']').attr('selected','selected');
					$('#selectmunicipio_u option[municipio='+data.boletas.id_municipio+']').attr('selected','selected');
					$('#selectestablecimiento_u option[toggle='+data.boletas.id_establecimiento+']').attr('selected','selected');
					$("#selectmunicipio_u,#selectredsalud_u,#selectestablecimiento_u").selectpicker('refresh');
				}
				id_boleta_u=data.boletas.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja la Boleta?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Boleta/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ location.reload();}, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Boleta?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Boleta/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ location.reload();}, 1000);
					}
				}
			});
		});
	}
	function accion_tipo(tipo,row){
		if(($(tipo+' option:selected').val()==3)){
			$(".rowhidden_u").hide();
		}else{
			$(".rowhidden_u").show();
		}
	}

	function function_validate(validate){
		if(validate!="false"&&validate=="true"){
			if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('#selectresponsable').val()!=null)) {
				if ($('.checklugar:checked').val()=="provincial") {
					$("#btnregistrar").attr('disabled', false);
				}else{
					if ($('.fila3').hasClass('has-success')) {
						$("#btnregistrar").attr('disabled', false);
					}else{$("#btnregistrar").attr('disabled', true);}
				}
			}else{$("#btnregistrar").attr('disabled', true);}
		}else{
			if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('#selectresponsable_u').val()!=null){
				if ($('.checklugar_u:checked').val()=="departamental") {
					if ($('.fila3_u').hasClass('has-success')) {
						$("#buttonupdate").attr('disabled', false);
					}else{
						$("#buttonupdate").attr('disabled', true);
					}
				}else{
					$("#buttonupdate").attr('disabled', false);
				}
			}else{$("#buttonupdate").attr('disabled', true);}
		}
	}
</script>
