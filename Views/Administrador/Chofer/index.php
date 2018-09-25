<?php
	$users=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
?>
<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE CHOFERES</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:<?php echo COLOR?>;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["choferes"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:<?php echo COLOR?>;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tablechoferes" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="15%">brevet</th>
							<th width="30%">nombres y apellidos</th>
							<th width="45%">unidad</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["choferes"])): ?>
								<tr>
									<td><h5><?php echo $row['brevet'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['unidad'])); ?></h5></td>
									<td><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_people/<?php echo $row['id'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a></h5></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["choferes"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron CHOFERES registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">apellidos y nombres</th>
							<th width="25%">cargo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["bajas"])): ?>
								<tr>
									<td><h5><?php echo $row['brevet'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['unidad'])); ?></h5></td>
									<td>
										<td><h5> <a  href="/<?php echo FOLDER;?>/Gps/ver_people/<?php echo $row['id'];?>"><span title="ver ubicaciones" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a></h5></td>
									</td>
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
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron choferes dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
   	var id_unidad_u,id_chofer_u,id_tipo_u;
	var users_array=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
    $(document).ready(function(){
		$('#selecttipo_u').change(function(){
			accion_tipo("#selecttipo_u");
	    	});
		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablechoferes","No se encontraron CHOFERES registrados.");});

		$('#inputnombre,#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>7){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputbrevet,#inputbrevet_u').keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputpassword_u').keyup(function(){if($(this).val().trim().length>4){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});


		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Chofer/crear',
				type: 'post',
				data:{nombre:$('#inputnombre').val(),brevet:$('#inputbrevet').val(),id_unidad:$('#selectunidad option:selected').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Chofer"; }, 2000);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success')){
					if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) ||
						($('#inputbrevet_u').attr('placeholder')!=$('#inputbrevet_u').val().trim().toLowerCase()) ||
						($('#selectunidad_u option:selected').val()!=id_unidad_u) ||
						($('#selecttipo_u option:selected').val()==2)
					){
						if ($('#selecttipo_u option:selected').val()==3) {
							$("#buttonupdate").attr('disabled', false);
						}else{
							if(($('.fila3_u').hasClass('has-success')) && ($('.fila4_u').hasClass('has-success'))) {
								$("#buttonupdate").attr('disabled', false);
							}else{$("#buttonupdate").attr('disabled', true);}
						}
					}else{$("#buttonupdate").attr('disabled', true);}

				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE chofer
		$('#buttonupdate').click(function(){
			var brevetactual="";
			if($('#inputbrevet_u').val()!=$('#inputbrevet_u').attr('placeholder')){
				brevetactual=$('#inputbrevet_u').val();
			}
			$.ajax({
				url: '<?php echo URL;?>Chofer/editar/'+id_chofer_u,
				type: 'post',
				data:{
					nombre:$('#inputnombre_u').val(),
					brevet:brevetactual,
					id_unidad:$('#selectunidad_u option:selected').val(),
					ci:$('#inputci_u').val(),tipo:$('#selecttipo_u option:selected').val(),
					password:$('#inputpassword_u').val()
				},
				success:function(obj){
					if (obj=="brevet") {
						$('#error_update_brevet').show();
					}else{
						if (obj=="ci") {
							$('#error_update_ci').show();
						}else{
							swal("Mensaje de Alerta!", obj , "success");
							setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Chofer"; }, 1500);
						}
					}
				}
			});
		});
         $('#selectunidad_u,#selecttipo_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		small_error(".fila4_u",false);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Chofer/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.unombre h5').text(data.nombre);$('.ubrevet').text(data.brevet);$('.unombre em').text("Chofer");$('.ucargo').text(data.cargo);$('.uunidad').text(data.unidad==null ? ("No Asignado"):(data.unidad));$('.ujefatura').text(data.jefatura==null ? ("No Asignado"):(data.jefatura));
				$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputbrevet_u').val(data.brevet);$('#inputbrevet_u').attr('placeholder',data.brevet);
				$('#inputpassword_u,#inputci_u').val("");$('#inputpassword_u').removeClass('has-success').addClass('has-error');
				$('#selectunidad_u option[value='+data.id_unidad+']').attr('selected','selected');
				$('#selecttipo_u option:eq(0)').prop('selected', 'selected');
				$("#selectunidad_u").selectpicker('refresh');
				accion_tipo("#selecttipo_u");
				id_unidad_u=data.id_unidad;id_chofer_u=data.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja al Chofer?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Chofer/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Chofer"; }, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Chofer?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Chofer/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Chofer"; }, 1000);
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
