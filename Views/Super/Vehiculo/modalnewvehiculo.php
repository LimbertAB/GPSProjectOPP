<div class="modal fade" id="newvehiculoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO VEHICULO</h4>
			</div>
			<div class="modal-body" style="margin:0;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="row"  style="margin-left:40px;margin-right:40px;margin-top:25px;margin-bottom:25px">
						<div class="form-group">
							<label class="col-sm-2 control-label">Marca</label>
							<div class="col-sm-10">
								<select id="selectmarca" class="form-control selectpicker show-tick" data-live-search="true">
									<?php while($row=mysql_fetch_array($resultado['marcas'])): ?>
										<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila1">
							<label class="col-sm-2 control-label">Tipo</label>
							<div class="col-sm-10">
								<input type="text" id="inputtipo" class="form-control" placeholder="Ejemplo: Camioneta" validate=true toggle=".fila1">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila2">
							<label class="col-sm-2 control-label">Placa</label>
							<div class="col-sm-10">
								<input type="text" id="inputplaca" class="form-control" placeholder="Ejemplo: 1342-TGX" validate=true toggle=".fila2">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
								<em style="color:#cf6666;display:none" id="error_registro">La placa del vehiculo ya esta en uso!</em>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila3">
							<label class="col-sm-2 control-label">Color</label>
							<div class="col-sm-10">
								<input type="text" id="inputcolor" class="form-control" placeholder="Ejemplo: Amarillo" validate=true toggle=".fila3">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							</div>
						</div>
				        	<div class="form-group">
							<label class="col-sm-2 control-label">Año</label>
							<div class="col-sm-10">
					            	<div class='input-group date' id='datetimepicker'>
					                	<input readonly type='text' class="form-control" value="<?php echo date('Y'); ?>"/>
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
							</div>
				        	</div>
						<center>
							<button class="btn btn-warning btn-lg" type="button" style="margin-bottom:15px" id="btnregistrar" disabled>REGISTRAR</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
