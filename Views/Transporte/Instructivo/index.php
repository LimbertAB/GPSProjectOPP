<?php
	$users=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
	$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
?>
<div class="fab" data-target="#newinstructivoModal" data-toggle="modal"> + </div>
<div class="row">
	<div class="col-md-5">
		<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LISTA DE INSTRUCTIVOS</h2>
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
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:red;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["instructivos"]);?></span></a></li>
	               <li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:red;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tableinstructivos" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="20%">chofer</th>
							<th width="63%">descripción</th>
							<th width="7%">fecha</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["instructivos"])): ?>
								<tr>
									<td style="vertical-align:middle"><h5><?php echo $row['nombre'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['descripcion'])); ?></h5></td>
									<td style="vertical-align:middle"><h5><?php echo ucwords(strtolower($row['fecha'])); ?></h5></td>
									<td style="vertical-align:middle">
										<a data-target="#updateinstructivoModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar instructivo" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a target="_blank" href="/<?php echo FOLDER;?>/Instructivo/printpdf/<?php echo $row['id'];?> "><button title="imprimir instructivo" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
										<a  onclick="bajaAjax(<?php echo $row['id'];?>)"><button title="dar de baja instructivo" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["instructivos"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>MENSAJE DE ALERTA!</strong> No se encontraron instructivos registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="20%">chofer</th>
							<th width="63%">descripción</th>
							<th width="7%">fecha</th>
							<th width="10%">Opciones</th>
						</thead>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["bajas"])): ?>
								<tr>
									<td style="vertical-align:middle"><h5><?php echo $row['nombre'];?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['descripcion'])); ?></h5></td>
									<td style="vertical-align:middle"><h5><?php echo ucwords(strtolower($row['fecha'])); ?></h5></td>
									<td style="vertical-align:middle">
										<a data-target="#updateinstructivoModal" data-toggle="modal" onclick="updateAjax(<?php echo $row['id'];?>)"><button title="editar instructivo" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
										<a  onclick="altaAjax(<?php echo $row['id'];?>)"><button title="dar de alta instructivo" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>
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
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron instructivos dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 	include 'modalnewinstructivo.php';
		include 'modalupdateinstructivo.php';?>
<script>
   	var id_chofer_u,id_instructivo_u,id_tipo_u;
	var users_array=['Administrador','Director','Planificador','Jefe de Jefatura','Jefe de Unidad','Normal'];
    $(document).ready(function(){
	    $('#buttonverporfecha').click(function(){
		    window.location.href = "/<?php echo FOLDER;?>/Instructivo?desde="+$('#datetimepickermes1 input').val()+"&hasta="+$('#datetimepickermes2 input').val();
	    });
	    $('#datetimepicker1,#datetimepickermes1,#datetimepickermes2').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'});
	    $('#datetimepicker1_u').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'}).on('dp.change', function(e){ function_validate("false");});
		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableinstructivos","No se encontraron CHOFERES registrados.");});

		$('#textareadescripcion,#textareadescripcion_u').keyup(function(){if($(this).val().trim().length>30){validate_sinsmall($(this).attr('toggle'),true);}else{validate_sinsmall($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Instructivo/crear',
				type: 'post',
				data:{fecha:$('#datetimepicker1 input').val(),descripcion:$('#textareadescripcion').val(),id_chofer:$('#selectchofer option:selected').val()},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Instructivo"; }, 1500);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if($('.fila1').hasClass('has-success')){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success')){
					if(($('#datetimepicker1_u input').attr('placeholder')!=$('#datetimepicker1_u input').val()) ||
						($('#textareadescripcion_u').attr('placeholder')!=$('#textareadescripcion_u').val().trim().toLowerCase()) ||
						($('#selectchofer_u option:selected').val()!=id_chofer_u)
					){
						$("#buttonupdate").attr('disabled', false);
					}else{$("#buttonupdate").attr('disabled', true);}

				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE instructivo
		$('#buttonupdate').click(function(){

			$.ajax({
				url: '<?php echo URL;?>Instructivo/editar/'+id_instructivo_u,
				type: 'post',
				data:{
					fecha:$('#datetimepicker1_u input').val(),descripcion:$('#textareadescripcion_u').val(),id_chofer:$('#selectchofer_u option:selected').val()
				},
				success:function(obj){
					swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Instructivo"; }, 1500);
				}
			});
		});
         $('#selectchofer_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		small_error(".fila4_u",false);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Instructivo/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('#textareadescripcion_u').val(data.descripcion.toLowerCase());$('#textareadescripcion_u').attr('placeholder',data.descripcion.toLowerCase());
				$('#datetimepicker1_u input').val(data.fecha);$('#datetimepicker1_u input').attr('placeholder',data.fecha);
				$('#selectchofer_u option[value='+data.id_chofer+']').attr('selected','selected');
				$("#selectchofer_u").selectpicker('refresh');
				id_chofer_u=data.id_chofer;id_instructivo_u=data.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja el Instructivo?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Instructivo/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ location.reload(); }, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta el Instructivo?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Instructivo/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ location.reload(); }, 1000);
					}
				}
			});
		});
	}
</script>
