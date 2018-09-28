<div class="modal fade" id="updateboletaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row" style="margin:0 10px 0 10px">
                   		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
                    	<?php mysql_data_seek($resultado['responsables'], 0);mysql_data_seek($resultado['choferes'], 0);mysql_data_seek($resultado['vehiculos'], 0);mysql_data_seek($resultado['unidades'], 0);?>
                       	<center><h3 style="margin-top:5px;color: #1cd2dc;font-weight: 700;">MODIFICAR BOLETA</h3></center>
				   	<form autocomplete="off">
						<div class="form-group has-feedback has-success fila2_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">UNIDAD</label>
							<select id="selectunidad_u" class="form-control selectpicker show-tick" data-live-search="true" validate=true>
								<?php while($row=mysql_fetch_array($resultado['unidades'])): ?>
									<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
								<?php endwhile;?>
							</select>
                            	</div>
						<div class="form-group has-feedback has-success fila1_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">OBJETIVO</label>
                                	<input type="text" id="inputobjetivo_u" class="form-control input-sm" validate="false" toggle=".fila1_u">
                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            	</div>
						<div class="form-group has-feedback has-success fila3_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">USO</label>
                                	<input type="text" id="inputuso_u" class="form-control input-sm" validate="false" toggle=".fila3_u">
                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            	</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:10px">
		                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">FECHA DE</label>
								<div class='input-group date' id='datetimepicker1_u'>
									<input readonly type='text' class="form-control"/>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
	                            	</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:10px">
		                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">FECHA HASTA</label>
								<div class='input-group date' id='datetimepicker2_u'>
									<input readonly type='text' class="form-control"/>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
	                            	</div>
						</div>
						<div class="form-group" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">RESPONSABLES</label>
							<div class='input-group'>
								<select id="selectresponsable_u" class="form-control selectpicker show-tick" multiple data-live-search="true" data-max-options="10" data-selected-text-format="count > 2">
									<?php while($row=mysql_fetch_array($resultado['responsables'])): ?>
										<option value=<?php echo $row['id'];?> data-subtext="<?php echo $row['ci'];?>"><?php echo ucwords(strtolower($row['nombre']))." ".ucwords(strtolower($row['apellido']));?></option>
									<?php endwhile;?>
								</select>
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							</div>
                            	</div>
						<div class="form-group" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CHOFER</label>
							<div class='input-group'>
								<select id="selectchofer_u" class="form-control selectpicker show-tick" data-live-search="true">
									<?php while($row=mysql_fetch_array($resultado['choferes'])): ?>
										<option value="<?php echo $row['id'];?>" data-subtext="<?php echo ucwords(strtolower($row['brevet']));?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
									<?php endwhile;?>
								</select>
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							</div>
                            	</div>
						<div class="form-group" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">VEHICULO</label>
							<div class='input-group'>
								<select class="form-control selectpicker show-tick" id="selectvehiculo_u" data-show-subtext="true" data-live-search="true">
									<?php while($row=mysql_fetch_array($resultado['vehiculos'])): ?>
										<option value="<?php echo $row['id'];?>"  data-subtext="<?php echo ucwords(strtolower($row['marca']));?>"><?php echo ucwords(strtoupper($row['tipo']));?> - <?php echo $row['placa'];?></option>
									<?php endwhile; ?>
								</select>
								<span class="input-group-addon"><span class="glyphicon glyphicon-bed"></span></span>
							</div>
                            	</div>
						<div class="panel-group" id="accordion3_u" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" style="background:#383838;height:50px;padding:0 0 10px 15px" id="heading1_u" href="#collapse5_u" data-parent="#accordion3_u">
									<div class="col-md-10 col-sm-10 col-xs-8" style="padding:0">
										<h4 class="panel-title" style="color:#fff;font-size:1.8em;font-weight:200"><img style="margin-right: 10px;padding:0" src="<?php echo URL;?>public/images/icons/64/car.png" width="50px">DESCRIPCIÓN DEL LUGAR</h4>
									</div>
								</div>
								<div id="collapse5_u" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1_u">
									<div class="panel-body">
										<div class="col-md-12" style="padding:0 20px 0 20px;">
											<center style="margin-bottom:15px">
												<label class="radio-inline" style="margin-right:20px">
												  	<input type="radio" name="inline"  class="checklugar_u" value="departamental" validate=false> INTER - DEPARTAMENTAL
												</label>
												<label class="radio-inline">
												  	<input type="radio" name="inline" class="checklugar_u" value="provincial" validate=false> INTER - MUNICIPAL
												</label>
											</center>
											<div class="form-group classdepartamental_u">
												<label>Ciudad</label>
												<select id="selectdepartamento_u" class="form-control">
													<option value="potosi">Potosí</option>
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
											<div class="form-group  has-feedback has-error fila3_u classdepartamental_u">
												<label>Descripción del lugar</label>
												<input type="text" id="inputlugar_u" class="form-control" placeholder="Ejemplo: Municipio de Cotagaita" validate=true toggle=".fila3_u">
												<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
											</div>
											<div class="form-group classprovincial_u" style="display:none">
												<label>Red De Salud</label>
												<select id="selectredsalud_u" class="form-control selectpicker show-tick" data-live-search="true" validate=false>
													<?php while($row=mysql_fetch_array($resultado['redsalud'])): ?>
														<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
											<div class="form-group classprovincial_u" style="display:none">
												<label>Municipio</label>
												<select id="selectmunicipio_u" class="form-control selectpicker show-tick" data-live-search="true" data-show-subtext="true" validate=false>
													<option disabled selected value> -- seleccione un municipio -- </option>
													<?php while($row=mysql_fetch_array($resultado['municipios'])): ?>
														<option value="<?php echo $row['id_redsalud'];?>" municipio="<?php echo $row['id'];?>" data-subtext="<?php echo ucwords(strtolower($row['redsalud']));?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
											<div class="form-group classprovincial_u" style="display:none">
												<label>Establecimiento</label>
												<select id="selectestablecimiento_u" class="form-control selectpicker show-tick" data-live-search="true" data-show-subtext="true" validate=false>
													<option disabled selected value> -- seleccione un establecimiento -- </option>
													<?php while($row=mysql_fetch_array($resultado['establecimientos'])): ?>
														<option value="<?php echo $row['id_municipio'];?>" toggle="<?php echo $row['id'];?>" data-subtext="<?php echo ucwords(strtolower($row['municipio']));?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
													<?php endwhile;?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                            	<center>
                                	<button class="btn btn-success" style="margin:10px 0 18px 0px" id="buttonupdate" type="button" disabled>Guardar</button>
                            	</center>
					</form>
				</div>
               </div>
		</div>
	</div>
</div>
