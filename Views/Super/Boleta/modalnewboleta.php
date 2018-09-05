<div class="modal fade" id="newboletaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#6fc13d;padding:5px 5px 5px 15px">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff"><strong>REGISTRO DE NUEVA BOLETA</strong></h4>
			</div>
			<div class="modal-body" style="margin:0;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="row"  style="margin-left:40px;margin-right:40px;margin-top:25px;margin-bottom:25px">
						<div class="form-group  has-feedback has-error fila1">
							<label class="col-sm-2 control-label">Objetivo</label>
							<div class="col-sm-10">
								<input type="text" id="inputobjetivo" class="form-control" placeholder="Ejemplo: capacitacion seguimiento y vigilancia" validate=true toggle=".fila1">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-success fila2">
							<label class="col-sm-2 control-label">Unidad</label>
							<div class="col-sm-10">
								<input type="text" id="inputunidad" class="form-control" placeholder="Ejemplo: SEDES POTOSI" validate=true toggle=".fila2" value="SEDES POTOSI">
								<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-success fila3">
							<label class="col-sm-2 control-label">Uso</label>
							<div class="col-sm-10">
								<input type="text" id="inputuso" class="form-control" placeholder="Ejemplo: Oficial" validate=true toggle=".fila3" value="Oficial">
								<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila4">
							<label class="col-sm-2 control-label">Lugares</label>
							<div class="col-sm-10">
								<input type="text" id="inputlugar" class="form-control" placeholder="Ejemplo: Municipio de Cotagaita" validate=true toggle=".fila4">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Fecha de</label>
							<div class="col-sm-10" >
					            	<div class='input-group date' id='datetimepicker1'>
					                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d');?>"/>
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
							</div>
				        	</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Hasta</label>
							<div class="col-sm-10">
					            	<div class='input-group date' id='datetimepicker2'>
					                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d'); ?>"/>
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
							</div>
				        	</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Responsables</label>
							<div class="col-sm-10">
								<div class='input-group'>
									<select id="selectresponsable" class="form-control selectpicker show-tick" multiple data-live-search="true" data-max-options="4" data-selected-text-format="count > 2">
										<?php while($row=mysql_fetch_array($resultado['responsables'])): ?>
											<option value=<?php echo $row['id'];?> data-subtext="<?php echo $row['ci'];?>"><?php echo ucwords(strtolower($row['nombre']))." ".ucwords(strtolower($row['apellido']));?></option>
										<?php endwhile;?>
									</select>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Chofer</label>
							<div class="col-sm-10">
								<div class='input-group'>
									<select id="selectchofer" class="form-control selectpicker show-tick" data-live-search="true">
										<?php while($row=mysql_fetch_array($resultado['choferes'])): ?>
											<option value="<?php echo $row['id'];?>" data-subtext="<?php echo ucwords(strtolower($row['brevet']));?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
										<?php endwhile;?>
									</select>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Vehiculo</label>
							<div class="col-sm-10">
								<div class='input-group'>
									<select class="form-control selectpicker show-tick" id="selectvehiculo" data-live-search="true" data-show-subtext="true">
										<?php while($row=mysql_fetch_array($resultado['vehiculos'])): ?>
											<option value="<?php echo $row['id'];?>"  data-subtext="<?php echo ucwords(strtolower($row['marca']));?>"><?php echo ucwords(strtoupper($row['tipo']));?> - <?php echo $row['placa'];?></option>
										<?php endwhile; ?>
									</select>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-bed"></span>
									</span>
								</div>
							</div>
						</div>
						<center>
							<button class="btn btn-success" type="button" style="margin-bottom:15px" id="btnregistrar" disabled>REGISTRAR</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
