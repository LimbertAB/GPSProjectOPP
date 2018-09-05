<div class="row">
	<h2 class="text-center" style="margin:20px 0 1px 0;font-weight:300">LISTA DE VEHICULOS</h2>
</div>
<div class="row" style="margin:10px"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12">
	          <ul class="nav nav-tabs nav-justified" id="myTabs">
	               <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">TODOS<span class="badge" style="background:#4893f3;margin-left:10px;color:#fff"><?php echo mysql_num_rows($resultado["vehiculos"]);?></span></a></li>
				<li role="presentation"><a href="#baja" aria-controls="baja" role="tab" data-toggle="tab">BAJAS<span class="badge" style="background:#4893f3;margin-left:10px"><?php echo mysql_num_rows($resultado["bajas"]);?></span></a></li>
	          </ul>
	     </div>
		<div class="col-md-12 tab-content" style="margin:0px">
	          <div id="todos" role="tabpanel" class="tab-pane active">
				<div class="table-responsive">
					<table id="tablecars" class="table table-striped table-condensed table-hover">
						<thead>
							<th width="5%">n°</th>
							<th width="40%">marca</th>
							<th width="30%">tipo</th>
							<th width="10%">placa</th>
							<th width="15%">color</th>
						</thead>
						<?php $num=1;?>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["vehiculos"])): ?>
								<tr>
									<td><h5><?php echo $num;?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['marca']));?><small style="color:#05cce0"><?php echo " (".$row['age'].")";?></small></h5></td>
									<td><h5><?php echo $row['tipo']; ?></h5></td>
									<td><h5><?php echo $row['placa']; ?></h5></td>
									<td><h5><?php echo $row['color']; ?></h5></td>
								</tr>
								<?php $num++;?>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["vehiculos"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron VEHICULOS registrados.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
	          <div id="baja" role="tabpanel" class="tab-pane">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<th width="5%">n°</th>
							<th width="40%">marca</th>
							<th width="30%">tipo</th>
							<th width="10%">placa</th>
							<th width="15%">color</th>
						</thead>
						<?php $num=1;?>
						<tbody>
							<?php while($row=mysql_fetch_array($resultado["bajas"])): ?>
								<tr>
									<td><h5><?php echo $num;?></h5></td>
									<td style="text-align:left;padding-left:9px"><h5><?php echo ucwords(strtolower($row['marca']));?><small style="color:#05cce0"><?php echo " (".$row['age'].")";?></small></h5></td>
									<td><h5><?php echo $row['tipo']; ?></h5></td>
									<td><h5><?php echo $row['placa']; ?></h5></td>
									<td><h5><?php echo $row['color']; ?></h5></td>
								</tr>
								<?php $num++;?>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div class="row"> <!-- SECTION EMPTY TABLE -->
					<?php if(mysql_num_rows($resultado["bajas"])<1):?>
						<div class="col-md-12">
							<div class="alert alert-error alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>MENSAJE DE ALERTA!</strong> No se encontraron vehiculos dados de BAJA.
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
   	var id_lugar_u,id_car_u;
    $(document).ready(function(){

		$('#datetimepicker').datetimepicker({locale: 'es',format: 'YYYY',ignoreReadonly: true,viewMode: 'years'});
		$('#datetimepicker_u').datetimepicker({locale: 'es',format: 'YYYY',ignoreReadonly: true,viewMode: 'years'}).on('dp.change', function(e){ function_validate("false");});

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tablecars","No se encontraron VEHICULOS registrados.");});

		$('#inputtipo,#inputcolor,#inputtipo_u,#inputcolor_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>2){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});
		$('#inputplaca,#inputplaca_u').keypress(function(e){key_placa(e);}).keyup(function(){if($(this).val().trim().length>6 && $(this).val().trim().length<11){small_error($(this).attr('toggle'),true);}else{small_error($(this).attr('toggle'),false);}function_validate($(this).attr('validate'));});

		$('#btnregistrar').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Vehiculo/crear',
				type: 'post',
				data:{tipo:$('#inputtipo').val(),placa:$('#inputplaca').val(),color:$('#inputcolor').val(),id_marca:$('#selectmarca option:selected').val(),age:$('#datetimepicker input').val(),},
					success:function(obj){if (obj=="false") {$('#error_registro').show();}else{
						swal("Mensaje de Alerta!", obj , "success");
					setInterval(function(){ window.location.href = "/<?php echo FOLDER; ?>/Vehiculo"; }, 2000);
				}}});
		});

		function function_validate(validate){
			if(validate!="false"&&validate=="true"){
				if(($('.fila1').hasClass('has-success'))&&($('.fila2').hasClass('has-success'))&&($('.fila3').hasClass('has-success'))){
						$("#btnregistrar").attr('disabled', false);}else{$("#btnregistrar").attr('disabled', true);}
			}else{
				if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success') && $('.fila3_u').hasClass('has-success')){
					if(($('#inputtipo_u').attr('placeholder')!=$('#inputtipo_u').val().trim().toLowerCase()) ||
						($('#inputplaca_u').attr('placeholder')!=$('#inputplaca_u').val().toLowerCase()) ||
						($('#inputcolor_u').attr('placeholder')!=$('#inputcolor_u').val().toLowerCase()) ||
						($('#datetimepicker_u input').attr('placeholder')!=$('#datetimepicker_u input').val()) ||
	                  		($('#selectmarca_u option:selected').val()!=id_marca_u)
					){
						$("#buttonupdate").attr('disabled', false);
					}else{
						$("#buttonupdate").attr('disabled', true);
					}
				}else{$("#buttonupdate").attr('disabled', true);}
			}
		}
		//UPDATE vehiculo
		$('#buttonupdate').click(function(){
			$.ajax({
				url: '<?php echo URL;?>Vehiculo/editar/'+id_car_u,
				type: 'post',
				data:{
					tipo:$('#inputtipo_u').val(),placa:$('#inputplaca_u').val(),
					color:$('#inputcolor_u').val(),
					placa_original:$('#inputplaca_u').attr('placeholder'),
					id_marca:$('#selectmarca_u option:selected').val(),
					age:$('#datetimepicker_u input').val(),
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Vehiculo"; }, 1500);
					}
				}
			});
		});
          $('#selectmarca_u').change(function(){function_validate("false");});
	});
	function updateAjax(val){
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",true);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Vehiculo/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
				$('.umarca h5').text(data.marca);
				$('.umarca p').text(data.age);
				$('.umarca em').text(data.tipo.toLowerCase());
				$('.uplaca').text(data.placa);$('.ucargo').text(data.cargo);
				$('.ucolor').text(data.color);
				$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));
				$('#inputtipo_u').val(data.tipo.toLowerCase());$('#inputtipo_u').attr('placeholder',data.tipo.toLowerCase());
				$('#inputplaca_u').val(data.placa.toLowerCase());$('#inputplaca_u').attr('placeholder',data.placa.toLowerCase());
				$('#inputcolor_u').val(data.color.toLowerCase());$('#inputcolor_u').attr('placeholder',data.color.toLowerCase());
				$('#datetimepicker_u input').val(data.age);$('#datetimepicker_u input').attr('placeholder',data.age);

				$('#selectmarca_u option[value='+data.id_marca+']').attr('selected','selected');
				$("#selectmarca_u").selectpicker('refresh');
				id_marca_u=data.id_marca;id_car_u=data.id;
			}
		});
	}
	function bajaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de baja al Vehiculo?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#d93333",
			confirmButtonText: "Dar de Baja!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Vehiculo/eliminar/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Vehiculo"; }, 1000);
					}
				}
			});
		});
	}
	function altaAjax(val){
		swal({
			title: "¿Estás seguro?",
			text: "Esta Seguro que quiere dar de alta al Vehiculo?",
			type: "warning",
			showCancelButton: true,confirmButtonColor: "#24be66",
			confirmButtonText: "Dar de Alta!",
			closeOnConfirm: false
		},function(){
			$.ajax({
				url: '<?php echo URL;?>Vehiculo/alta/'+val,
				type: 'get',
				success:function(obj){
					if (obj=="false") {
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ window.location.href = "/<?php echo FOLDER;?>/Vehiculo"; }, 1000);
					}
				}
			});
		});
	}
</script>
