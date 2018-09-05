<div class="modal fade" id="updateboletaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row" style="margin:0 10px 0 10px">
                   		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
                    	<?php mysql_data_seek($resultado['responsables'], 0);mysql_data_seek($resultado['choferes'], 0);mysql_data_seek($resultado['vehiculos'], 0);?>
                       	<center><h3 style="margin-top:5px;color: #1cd2dc;font-weight: 700;">MODIFICAR BOLETA</h3></center>
				   	<form autocomplete="off">
						<div class="form-group has-feedback has-success fila1_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">OBJETIVO</label>
                                	<input type="text" id="inputobjetivo_u" class="form-control input-sm" validate="false" toggle=".fila1_u">
                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            	</div>
						<div class="form-group has-feedback has-success fila2_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">UNIDAD</label>
                                	<input type="text" id="inputunidad_u" class="form-control input-sm" validate="false" toggle=".fila2_u">
                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            	</div>
						<div class="form-group has-feedback has-success fila3_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">USO</label>
                                	<input type="text" id="inputuso_u" class="form-control input-sm" validate="false" toggle=".fila3_u">
                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            	</div>
						<div class="form-group has-feedback has-success fila4_u" style="margin-bottom:10px">
	                              <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">LUGARES</label>
                                	<input type="text" id="inputlugar_u" class="form-control input-sm" validate="false" toggle=".fila4_u">
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
                            	<center>
                                	<button class="btn btn-success" style="margin:10px 0 18px 0px" id="buttonupdate" type="button" disabled>Guardar</button>
                            	</center>
					</form>
				</div>
               </div>
		</div>
	</div>
</div>
