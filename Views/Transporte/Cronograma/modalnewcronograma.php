<div class="modal fade" id="newcronogramaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO CRONOGRAMA</h4>
			</div>
			<div class="modal-body" style="margin:20px 20px 20px 20px;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="row" style="margin:0px">
						<div class="col-md-4 col-md-offset-1">
							<div class="form-group">
								<label>Fecha inicio</label>
					            	<div class='input-group date' id='datetimepicker1'>
					                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d'); ?>"  validate="true"/>
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
					        	</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label>Fecha Fin</label>
					            	<div class='input-group date' id='datetimepicker2'>
					                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d'); ?>"  validate="true"/>
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
					        	</div>
						</div>
					</div>
					<div class="row" style="margin:0"> <!-- SECTION TABLE USERS -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:0;padding:0">
							<div class="table-responsive">
								<table id="tableboletas" class="table table-striped table-condensed table-hover">
									<thead>
										<tr style="background-color: #313131">
											<th rowspan="2" width="25%" style="padding-bottom:10px;">chofer</th>
											<th width="25%" rowspan="2" style="padding-bottom:10px;">vehiculo</th>
											<th rowspan="2" width="12%" style="padding-bottom:10px;">actividad</th>
											<th rowspan="2" width="12%" style="padding-bottom:10px;">lugares</th>
											<th colspan="2" width="21%" style="padding:0px;">fecha</th>
											<th rowspan="2" width="5%" style="padding-bottom:10px;">add</th>
										</tr>
										<tr style="background-color: #555555">
											<th width="8%" style="padding:0;margin:0;font-size:.9em">inicio</th>
											<th width="8%" style="padding:0;margin:0;font-size:.9em">fin</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0;$i<count($resultado["boletas"]);$i++){
											if($resultado["boletas"][$i]['validate']){
												if($resultado["boletas"][$i]['id_cronograma']==null){?>
								                    	<tr class="danger">
												<?php }else{?>
													<tr class="success">
												<?php } ?>
												<td><h5><?php echo $resultado["boletas"][$i]['chofer'];?></h5></td>
												<td><h5><?php echo $resultado["boletas"][$i]['vehiculo'];?></h5></td>
												<td><h5><?php echo $resultado["boletas"][$i]['objetivo'];?></h5></td>
												<td><h5><?php echo $resultado["boletas"][$i]['lugares'];?></h5></td>
												<td><h5><?php echo $resultado["boletas"][$i]['fecha_de'];?></h5></td>
												<td><h5><?php echo $resultado["boletas"][$i]['fecha_hasta'];?></h5></td>
												<td><input type="checkbox" class="btn-danger checkadd" name="lista[]" value="<?php echo $resultado["boletas"][$i]['id']?>"></td>
											</tr>
										<?php }}?>
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
					</div>
				</form>
			</div>
			<div class="modal-footer" style="border-left:10px solid  #84da92;margin-top: 15px;padding:10px 0 10px 0">
				<div class="col-md-9">
					<h3 style="font-weight:200;color:#ff0000;margin:0;text-align:left">NOTA<span style="font-size:0.5em;font-style: italic;color:#777575;margin-left:15px">Seleccione al menos una boleta</span></h3>
				</div>
				<div class="col-md-3">
					<button class="btn btn-success" id="btnregistrar" disabled>REGISTRAR</button>
				</div>
	      	</div>
		</div>
	</div>
</div>
