<?php
	$users=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
?>
<div class="fab" data-target="#newusuarioModal" data-toggle="modal"> + </div>
<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE USUARIOS</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["usuarios"]);?></span></a></li>
				<li role="presentation"><a href="#administracion" aria-controls="administracion" role="tab" data-toggle="tab">ADMINISTRACIÓN<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["administracion"]);?></span></a></li>
				<li role="presentation"><a href="#jefatura" aria-controls="jefatura" role="tab" data-toggle="tab">JEFATURA<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["userjefatura"]);?></span></a></li>
				<li role="presentation"><a href="#unidad" aria-controls="unidad" role="tab" data-toggle="tab">UNIDAD<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["userunidad"]);?></span></a></li>
				<li role="presentation"><a href="#sinasignar" aria-controls="sinasignar" role="tab" data-toggle="tab">SIN ASIGNAR<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["sinasignar"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableusers" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">apellidos y nombres</th>
							<th width="25%">tipo</th>
							<th width="35%">cargo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["usuarios"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["usuarios"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="administracion" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">apellidos y nombres</th>
							<th width="25%">cargo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_assoc($resultado["administracion"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["administracion"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontro personas de ADMINISTRACION registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="jefatura" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">apellidos y nombres</th>
							<th width="25%">cargo</th>
							<th width="35%">jefatura</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_assoc($resultado["userjefatura"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['jefatura'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["userjefatura"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron encargados de JEFATURA registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
			<div id="unidad" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">apellidos y nombres</th>
							<th width="25%">cargo</th>
							<th width="35%">unidad</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["userunidad"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['unidad'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["userunidad"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
			<div id="sinasignar" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="10%">ci</th>
							<th width="45%">apellidos y nombres</th>
							<th width="35%">cargo</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["sinasignar"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["sinasignar"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS sin asignar.
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
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['apellido']))." ".ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5><?php echo ucwords(strtolower($row['cargo'])); ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="altaAjax(<?php echo $row['id'];?>)"><button title="dar de alta usuario" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
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
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron usuarios dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 	include 'modalnewusuario.php';
		include 'modalupdateusuario.php';?>
<script>
   	var id_lugar_u,id_cargo_u,id_user_u,psw_u,id_tipo_u;
	var users_array=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
    $(document).ready(function(){

	    	$('#selecttipo').change(function(){
			accion_tipo("#selecttipo",".inputrow1",".inputrow2");
	    	});
		$('#selecttipo_u').change(function(){
			accion_tipo("#selecttipo_u",".inputrow1_u",".inputrow2_u");
	    	});


		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableusers","No se encontraron USUARIOS registrados.");});

		$('#inputnombre,#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>2){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputapellido,#inputapellido_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputci,#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputpassword,#inputpassword_u').keyup(function(){if($(this).val().trim().length>4){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputtelefono,#inputtelefono_u').keypress(function(e){yes_number(e);}).keyup(function(){function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			var id_lugar=0;
			if ($('#selecttipo option:selected').val()==3) {
				id_lugar=$('#selectjefatura option:selected').val();
			}else{
				if (($('#selecttipo option:selected').val()==4)||($('#selecttipo option:selected').val()==5)){
					id_lugar=$('#selectunidad option:selected').val();
				}
			}
			$.ajax({
				url: '<?php echo URL;?>Usuario/crear',
				type: 'post',
				data:{nombre:$('#inputnombre').val(),apellido:$('#inputapellido').val(),ci:$('#inputci').val(),password:$('#inputpassword').val(),id_cargo:$('#selectcargo option:selected').val(),tipo:$('#selecttipo option:selected').val(),id_lugar:id_lugar,telefono:$('#inputtelefono').val(),},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Usuario"; }, 2000);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))&&($('.fila4').hasClass('has-success'))&&($('#selectcargo option').length>0)&&($('#selectunidad option').length>0)){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('.fila3_u').hasClass('has-success')){
					if (($('#inputpassword_u').val().trim()=="") || ($('.fila4_u').hasClass('has-success'))) {
						if($('#selecttipo_u option:selected').attr('value')==id_tipo_u){
							if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) ||
								($('#inputapellido_u').attr('placeholder')!=$('#inputapellido_u').val().toLowerCase()) ||
								($('#inputci_u').attr('placeholder')!=$('#inputci_u').val()) ||
			                  		($('#inputtelefono_u').attr('placeholder')!=$('#inputtelefono_u').val()) ||
			                  		($('#selectcargo_u option:selected').attr('value')!=id_cargo_u) ||
								($('#selectunidad_u option:selected').attr('value')!=id_lugar_u)
							){
								$("#buttonupdate").attr('disabled', false);
							}else{
								if(($('#selecttipo_u option:selected').val()==4)||($('#selecttipo_u option:selected').val()==5)){
									if($('#selectunidad_u option:selected').attr('value')!=id_lugar_u) {
										$("#buttonupdate").attr('disabled', false);
									}else{$("#buttonupdate").attr('disabled', true);}
								}else{
									if($('#selecttipo_u option:selected').val()==3){
										if ($('#selectjefatura_u option:selected').attr('value')!=id_lugar_u) {
											$("#buttonupdate").attr('disabled', false);
										}else{$("#buttonupdate").attr('disabled', true);}
									}
								}
							}
						}else{$("#buttonupdate").attr('disabled', false);}
					}else{$("#buttonupdate").attr('disabled', true);}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE usuario
		$('#buttonupdate').click(function(){
			var lugar_update=0;
			if(($('#selecttipo_u option:selected').val()==4)||($('#selecttipo_u option:selected').val()==5)){
				lugar_update=$('#selectunidad_u option:selected').val();
			}else{
				if($('#selecttipo_u option:selected').val()==3){
					lugar_update=$('#selectjefatura_u option:selected').val();
				}
			}
			$.ajax({
				url: '<?php echo URL;?>Usuario/editar/'+id_user_u,
				type: 'post',
				data:{
					nombre:$('#inputnombre_u').val(),apellido:$('#inputapellido_u').val(),
					ci_original:$('#inputci_u').val(),ci:$('#inputci_u').attr('placeholder'),
					id_cargo:$('#selectcargo_u option:selected').val(),id_lugar:lugar_update,
					telefono:$('#inputtelefono_u').val(),tipo:$('#selecttipo_u option:selected').val(),
					password:$('#inputpassword').val(),password_original:psw_u
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/planificationSoft/Usuario"; }, 1500);
					}
				}
			});
		});
         $('#selectcargo_u, #selectunidad_u, #selectjefatura_u, #selecttipo_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		$.ajax({
			url: '<?php echo URL;?>Usuario/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.unombre h5').html(data.nombre+"<br>"+data.apellido);$('.unombre p').text(data.ci);$('.unombre em').text(users_array[data.tipo]);$('.utelefono').text("(+591) "+data.telefono);$('.ucargo').text(data.cargo);$('.uunidad').text(data.unidad==null ? ("No Asignado"):(data.unidad));$('.ujefatura').text(data.jefatura==null ? ("No Asignado"):(data.jefatura));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputapellido_u').val(data.apellido.toLowerCase());$('#inputapellido_u').attr('placeholder',data.apellido.toLowerCase());
				$('#inputci_u').val(data.ci);$('#inputci_u').attr('placeholder',data.ci);
				$('#inputpassword_u').val("");$('#inputpassword_u').removeClass('has-success').addClass('has-error');
				$('#inputtelefono_u').val(data.telefono);$('#inputtelefono_u').attr('placeholder',data.telefono);
				$('#selectunidad_u option[value='+data.id_lugar+']').attr('selected','selected');
				$('#selectcargo_u option[value='+data.id_cargo+']').attr('selected','selected');
				$('#selecttipo_u option[value='+data.tipo+']').attr('selected','selected');
				$("#selectunidad_u,#selectcargo_u,#selecttipo_u").selectpicker('refresh');
				accion_tipo("#selecttipo_u",".inputrow1_u",".inputrow2_u");
				id_lugar_u=data.id_lugar;id_cargo_u=data.id_cargo;id_user_u=data.id;id_tipo_u=data.tipo;psw_u=data.password;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja al Usuario?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Usuario/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Usuario"; }, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Usuario?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Usuario/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Usuario"; }, 1000);
					}
				}
			});
		});
	}
</script>
