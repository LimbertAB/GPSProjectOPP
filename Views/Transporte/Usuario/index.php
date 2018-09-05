<?php
	$users=['Super Administrador','Administrador','Jefe de Transporte'];
?>
<div class="fab" data-target="#newusuarioModal" data-toggle="modal"> + </div>
<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE USUARIOS</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">Todos<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["usuarios"]);?></span></a></li>
				<li role="presentation"><a href="#super" aria-controls="super" role="tab" data-toggle="tab">Super Administrador<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["super"]);?></span></a></li>
				<li role="presentation"><a href="#administrador" aria-controls="administrador" role="tab" data-toggle="tab">Administrador<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["administrador"]);?></span></a></li>
				<li role="presentation"><a href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab">Jefe Transporte<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["transporte"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableusers" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="55%">nombres y apellidos</th>
							<th width="30%">tipo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["usuarios"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id_persona'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
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
	          <div id="super" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="55%">nombres y apellidos</th>
							<th width="30%">tipo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_assoc($resultado["super"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id_persona'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["super"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontro usuarios con cargo de Super Administrador registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="administrador" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="55%">nombres y apellidos</th>
							<th width="30%">tipo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_assoc($resultado["administrador"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id_persona'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["administrador"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron usuarios con cargo de ADMINISTRADOR registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
			<div id="transporte" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="9%">ci</th>
							<th width="25%">nombres y apellidos</th>
							<th width="25%">unidad</th>
							<th width="25%">tipo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["transporte"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?><small style="color:#05cce0"><?php echo " (".$users[$row['tipo']].")";?></small></h5></td>
									<td><h5>Unidad de Transporte</h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id_persona'];?>)"><button title="dar de baja usuario" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["transporte"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron Encargados de Transportes registrados.
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
							<th width="55%">nombres y apellidos</th>
							<th width="30%">tipo</th>
							<th width="6%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["bajas"])): ?>
								<tr>
									<td><h5><?php echo $row['ci'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['nombre'])); ?></h5></td>
									<td><h5><?php echo $users[$row['tipo']]; ?></h5></td>
									<td>
										<a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar usuario" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="altaAjax(<?php echo $row['id_persona'];?>)"><button title="dar de alta usuario" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
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
   	var id_persona_u,id_user_u,id_tipo_u;
	var users_array=['Super Administrador','Administrador','Jefe de Transporte'];
    $(document).ready(function(){

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableusers","No se encontraron USUARIOS registrados.");});

		$('#inputnombre,#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputci,#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputpassword,#inputpassword_u').keyup(function(){if($(this).val().trim().length>4){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Usuario/crear',
				type: 'post',
				data:{nombre:$('#inputnombre').val(),ci:$('#inputci').val(),password:$('#inputpassword').val(),tipo:$('#selecttipo option:selected').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Usuario"; }, 2000);
				}}});
		});
		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success')){
					if (($('#inputpassword_u').val().trim()=="") || ($('.fila3_u').hasClass('has-success'))) {
						if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) ||
							($('#inputci_u').attr('placeholder')!=$('#inputci_u').val()) || ($('#selecttipo_u option:selected').attr('value')!=id_tipo_u) || ($('.fila3_u').hasClass('has-success'))
						){
							$("#buttonupdate").attr('disabled', false);
						}else{$("#buttonupdate").attr('disabled', true);}
					}else{$("#buttonupdate").attr('disabled', true);}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE usuario
		$('#buttonupdate').click(function(){
			var ci_update="";
			if($('#inputci_u').val()!=$('#inputci_u').attr('placeholder')){
				ci_update=$('#inputci_u').val();
			}
			$.ajax({
				url: '<?php echo URL;?>Usuario/editar/'+id_user_u,
				type: 'post',
				data:{
					nombre:$('#inputnombre_u').val(),ci:ci_update,tipo:$('#selecttipo_u option:selected').val(),password:$('#inputpassword').val(),id_persona:id_persona_u
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Usuario"; }, 1500);
					}
				}
			});
		});
         $('#selecttipo_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",false);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Usuario/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.unombre h5').text(data.nombre);$('.unombre p').text(data.ci);$('.unombre em').text(users_array[data.tipo]);$('.uunidad').text(data.tipo!=2 ? ("Sin Unidad"):("Unidad de Transportes"));$('.ujefatura').text(data.tipo!=2 ? ("Sin Jefatura"):("jefatura de Transportes"));$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputci_u').val(data.ci);$('#inputci_u').attr('placeholder',data.ci);
				$('#inputpassword_u').val("");$('#inputpassword_u').removeClass('has-success').addClass('has-error');
				$('#selecttipo_u option[value='+data.tipo+']').attr('selected','selected');
				id_user_u=data.id;id_tipo_u=data.tipo;id_persona_u=data.id_persona;
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
