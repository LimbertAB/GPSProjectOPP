<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE USUARIOS RESPONSABLES DE VIAJES</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:<?php echo COLOR?>;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["responsables"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:<?php echo COLOR?>;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableresponsables" class="table table-striped table-condensed table-hover">
						<thead>
							<th>ci</th>
							<th>nombres y apellidos</th>
							<th>unidad</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["responsables"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre']))." ".ucwords(strtolower($row['apellido'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['unidad'])); ?></h5></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["responsables"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS RESPONSABLES DE VIAJES registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th>ci</th>
							<th>nombres y apellidos</th>
							<th>cargo</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["bajas"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre']))." ".ucwords(strtolower($row['apellido'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['unidad'])); ?></h5></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["bajas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron responsables dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
   	var id_unidad_u,id_responsable_u;
    $(document).ready(function(){
		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableresponsables","No se encontraron USUARIOS RESPONSABLES DE VIAJES registrados.");});
		$('#inputnombre,#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>2){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputapellido,#inputapellido_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>5){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputci,#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Responsable/crear',
				type: 'post',
				data:{nombre:$('#inputnombre').val(),apellido:$('#inputapellido').val(),ci:$('#inputci').val(),id_unidad:$('#selectunidad option:selected').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Responsable"; }, 2000);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('.fila3_u').hasClass('has-success')){
					if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) || ($('#inputapellido_u').attr('placeholder')!=$('#inputapellido_u').val().trim().toLowerCase()) || ($('#inputci_u').attr('placeholder')!=$('#inputci_u').val().trim().toLowerCase()) || ($('#selectunidad_u option:selected').val()!=id_unidad_u)){
						$("#buttonupdate").attr('disabled', false);
					}else{$("#buttonupdate").attr('disabled', true);}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE responsable
		$('#buttonupdate').click(function(){
			var ciactual="";
			if($('#inputci_u').val()!=$('#inputci_u').attr('placeholder')){
				ciactual=$('#inputci_u').val();
			}
			$.ajax({
				url: '<?php echo URL;?>Responsable/editar/'+id_responsable_u,
				type: 'post',
				data:{
					nombre:$('#inputnombre_u').val(),
					apellido:$('#inputapellido_u').val(),
					ci:ciactual,
					id_unidad:$('#selectunidad_u option:selected').val()
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update_ci').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Responsable"; }, 1500);
					}
				}
			});
		});
         $('#selectunidad_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",true);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Responsable/ver/'+val,
			type: 'get',
			success:function(obj){

				var data = JSON.parse(obj);
				console.log(data);
				$('.unombre h5').html(data.nombre+"<br>"+data.apellido);$('.uci').text(data.ci);$('.unombre em').text("Responsable");$('.uunidad').text(data.unidad);$('.ujefatura').text(data.jefatura);
				$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputapellido_u').val(data.apellido.toLowerCase());$('#inputapellido_u').attr('placeholder',data.apellido.toLowerCase());
				$('#inputci_u').val(data.ci);$('#inputci_u').attr('placeholder',data.ci);
				$('#selectunidad_u option[value='+data.id_unidad+']').attr('selected','selected');
				$("#selectunidad_u").selectpicker('refresh');
				id_unidad_u=data.id_unidad;id_responsable_u=data.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja al Responsable?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Responsable/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Responsable"; }, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Responsable?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Responsable/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Responsable"; }, 1000);
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
