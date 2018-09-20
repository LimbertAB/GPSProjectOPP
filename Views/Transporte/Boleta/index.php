<div class="fab" data-target="#newboletaModal" data-toggle="modal"> + </div>
<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE BOLETAS</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table id="tableboletas" class="table table-striped table-condensed table-hover">
						<thead>
                                   <th width="20%">unidad</th>
							<th width="30%">chofer</th>
							<th width="30%">vehiculo</th>
                                   <th width="10%">fecha</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["boletas"])): ?>
								<tr>
									<td><h5><?php echo $row['unidad'];?></h5></td>
									<td><h5><?php echo $row['chofer'];?> <small> <?php echo $row['brevet'];?></small></h5></td>
									<td><h5><?php echo $row['tipo'];?> <small> <?php echo $row['placa'];?></small></h5></td>
									<td><h5><?php echo $row['fecha_de'];?></h5></td>
									<td>
										<a data-target="#updateboletaModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar boleta" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a target="_blank" href="/<?php echo FOLDER;?>/Boleta/printpdf/<?php echo $row['id'];?> "><button title="dar de baja instructivo" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja boleta" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["boletas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron BOLETAS registradas.
							</div>
						</div>
					<?php endif;?>
				</div>

</div>

<?php 	include 'modalnewboleta.php';
		include 'modalupdateboleta.php';?>
<script>
   	var id_chofer_u,id_boleta_u,id_vehiculo_u,id_responsables_u=[],id_boletaresponsable_u=[];
    $(document).ready(function(){
		$('#datetimepicker1,#datetimepicker2').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'});

		$('#datetimepicker1_u,#datetimepicker2_u').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'years'}).on('dp.change', function(e){ function_validate("false");});

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableboletas","No se encontraron BOLETAS registradas.");});

		$('#inputobjetivo,#inputobjetivo_u,#inputlugar,#inputlugar_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>7){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputunidad,#inputunidad_u,#inputuso,#inputuso_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>5){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Boleta/crear',
				type: 'post',
				data:{id_chofer:$('#selectchofer option:selected').val(),
					id_vehiculo:$('#selectvehiculo option:selected').val(),
					objetivo:$('#inputobjetivo').val(),
					unidad:$('#inputunidad').val(),
					uso:$('#inputuso').val(),
					lugar:$('#inputlugar').val(),
					fecha_de:$('#datetimepicker1 input').val(),
					fecha_hasta:$('#datetimepicker2 input').val(),
					id_responsable:$('#selectresponsable').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Boleta"; }, 2000);
				}}});
		});
		$("#selectresponsable").change(function(){function_validate('true');});
		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))&&($('.fila4').hasClass('has-success'))&&($('#selectresponsable').val()!=null)){
					$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('.fila3_u').hasClass('has-success') && $('.fila4_u').hasClass('has-success') && $('#selectresponsable_u').val()!=null){
					if(($('#inputobjetivo_u').attr('placeholder')!=$('#inputobjetivo_u').val().trim().toLowerCase()) ||
						($('#inputunidad_u').attr('placeholder')!=$('#inputunidad_u').val().trim().toLowerCase()) ||
						($('#inputuso_u').attr('placeholder')!=$('#inputuso_u').val().trim().toLowerCase()) ||
						($('#inputlugar_u').attr('placeholder')!=$('#inputlugar_u').val().trim().toLowerCase()) ||
						($('#datetimepicker1_u input').attr('placeholder')!=$('#datetimepicker1_u input').val()) ||
						($('#datetimepicker2_u input').attr('placeholder')!=$('#datetimepicker2_u input').val()) ||
						($('#selectchofer_u option:selected').val()!=id_chofer_u) ||
						($('#selectvehiculo_u option:selected').val()!=id_vehiculo_u) ||
						(evaluar_responsables())
					){
						$("#buttonupdate").attr('disabled', false);
					}else{$("#buttonupdate").attr('disabled', true);}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE boleta
		$('#buttonupdate').click(function(){
			var resp=[],resp_id=[],resp_estado=[],values=$('#selectresponsable_u').val(),aux=0;
			for (var i = 0; i < id_responsables_u.length; i++) {  // [3,10]
				aux=0;
				for (var j = 0; j < values.length; j++) { // [ 4,5]
					if(values[j]==id_responsables_u[i]){aux++;}
				}
				if(aux==0){ resp.push(id_responsables_u[i]);resp_estado.push("eliminar");resp_id.push(id_boletaresponsable_u[i]);
				}
			}
			var aux=0;
			for (var j = 0; j < values.length; j++) {  // [ 4,5]
				aux=0;
				for (var i = 0; i < id_responsables_u.length; i++) {  // [3,10]
					if(values[j]==id_responsables_u[i]){aux++;}
				}
				if(aux==0){ resp.push(values[j]);resp_estado.push("nuevo");
				}
			}
			$.ajax({
				url: '<?php echo URL;?>Boleta/editar/'+id_boleta_u,
				type: 'post',
				data:{id_chofer:$('#selectchofer_u option:selected').val(),
					id_vehiculo:$('#selectvehiculo_u option:selected').val(),
					objetivo:$('#inputobjetivo_u').val(),
					unidad:$('#inputunidad_u').val(),
					uso:$('#inputuso_u').val(),
					lugar:$('#inputlugar_u').val(),
					fecha_de:$('#datetimepicker1_u input').val(),
					fecha_hasta:$('#datetimepicker2_u input').val(),
					id_responsable:resp,
					responsable_estado:resp_estado,
					id_boleta_responsable:resp_id,
				},
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Boleta"; }, 1500);
				}
			});
		});
          $('#selectchofer_u,#selectvehiculo_u,#selectresponsable_u').change(function(){function_validate("false");});
		$('#selectresponsable_u').change(function(){console.log(evaluar_responsables());});
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
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",true);small_error(".fila4_u",true);$("#buttonupdate").attr('disabled', true);
		id_responsables_u=[];
		id_boletaresponsable_u=[];
		$.ajax({
			url: '<?php echo URL;?>Boleta/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('#inputobjetivo_u').val(data.boletas.objetivo.toLowerCase());$('#inputobjetivo_u').attr('placeholder',data.boletas.objetivo.toLowerCase());
				$('#inputunidad_u').val(data.boletas.unidad.toLowerCase());$('#inputunidad_u').attr('placeholder',data.boletas.unidad.toLowerCase());
				$('#inputuso_u').val(data.boletas.uso.toLowerCase());$('#inputuso_u').attr('placeholder',data.boletas.uso.toLowerCase());
				$('#inputlugar_u').val(data.boletas.lugares.toLowerCase());$('#inputlugar_u').attr('placeholder',data.boletas.lugares.toLowerCase());
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
				id_vehiculo_u=data.boletas.id_vehiculo;id_chofer_u=data.boletas.id_chofer;id_boleta_u=data.boletas.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere Eliminar la Boleta?",
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
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Boleta"; }, 1000);
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
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Boleta"; }, 1000);
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
</script>
