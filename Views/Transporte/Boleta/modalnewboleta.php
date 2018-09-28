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
						<div class="form-group">
							<label class="col-sm-2 control-label">Unidad</label>
							<div class="col-sm-10">
								<select id="selectunidad" class="form-control selectpicker show-tick" data-live-search="true" validate=true>
									<?php while($row=mysql_fetch_array($resultado['unidades'])): ?>
										<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
									<?php endwhile;?>
								</select>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila1">
							<label class="col-sm-2 control-label">Objetivo</label>
							<div class="col-sm-10">
								<input type="text" id="inputobjetivo" class="form-control" placeholder="Ejemplo: capacitacion seguimiento y vigilancia" validate=true toggle=".fila1">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-success fila2">
							<label class="col-sm-2 control-label">Uso</label>
							<div class="col-sm-10">
								<input type="text" id="inputuso" class="form-control" placeholder="Ejemplo: Oficial" validate=true toggle=".fila2" value="Oficial">
								<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden=true></span>
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
									<select id="selectresponsable" class="form-control selectpicker show-tick" multiple data-live-search="true" data-max-options="10" data-selected-text-format="count > 2">
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
						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" style="background:#383838;height:50px;padding:0 0 10px 15px" id="heading1" href="#collapse5" data-parent="#accordion3">
									<div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
										<h4 class="panel-title" style="color:#fff;font-size:1.8em;font-weight:200"><img style="margin-right: 10px;padding:0" src="<?php echo URL;?>public/images/icons/64/car.png" width="50px">DESCRIPCIÓN DEL LUGAR</h4>
									</div>
								</div>
								<div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
									<div class="panel-body">
										<div class="col-md-12" style="padding:0 20px 0 20px;">
											<center style="margin-bottom:15px">
												<label class="radio-inline" style="margin-right:20px">
												  	<input type="radio" checked name="inline"  class="checklugar" value="departamental" validate=true> INTER - DEPARTAMENTAL
												</label>
												<label class="radio-inline">
												  	<input type="radio" name="inline" class="checklugar" value="provincial" validate=true> INTER - MUNICIPAL
												</label>
											</center>
											<div class="form-group classdepartamental">
												<label>Ciudad</label>
												<select id="selectdepartamento" class="form-control">
													<option value="lapaz">La Paz</option>
													<option value="cochabamba">Cochabamba</option>
													<option value="santacruz">Santa Cruz</option>
													<option value="tarija">Tarija</option>
													<option value="chuquisaca">Chuquisaca</option>
													<option value="oruro">Oruro</option>
													<option value="beni">Beni</option>
													<option value="pando">Pando</option>
												</select>
											</div>
											<div class="form-group  has-feedback has-error fila3 classdepartamental">
												<label>Descripción del lugar</label>
												<input type="text" id="inputlugar" class="form-control" placeholder="Ejemplo: Municipio de Cotagaita" validate=true toggle=".fila3">
												<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
											</div>
											<div class="form-group classprovincial" style="display:none">
												<label>Red De Salud</label>
												<select id="selectredsalud" class="form-control selectpicker show-tick" data-live-search="true" validate=true>
													<?php while($row=mysql_fetch_array($resultado['redsalud'])): ?>
														<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
											<div class="form-group classprovincial" style="display:none">
												<label>Municipio</label>
												<select id="selectmunicipio" class="form-control selectpicker show-tick" data-live-search="true" data-show-subtext="true" validate=true>
													<option disabled selected value> -- seleccione un municipio -- </option>
													<?php while($row=mysql_fetch_array($resultado['municipios'])): ?>
														<option value="<?php echo $row['id_redsalud'];?>" municipio="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
											<div class="form-group classprovincial" style="display:none">
												<label>Establecimiento</label>
												<select id="selectestablecimiento" class="form-control selectpicker show-tick" data-live-search="true" data-show-subtext="true">
													<option disabled selected value> -- seleccione un establecimiento -- </option>
													<?php while($row=mysql_fetch_array($resultado['establecimientos'])): ?>
														<option value="<?php echo $row['id_municipio'];?>" toggle="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
										</div>
									</div>
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
