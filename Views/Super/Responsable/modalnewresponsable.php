<div class="modal fade" id="newresponsableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO RESPONSABLE</h4>
			</div>
			<div class="modal-body" style="margin:0;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="row"  style="margin-left:40px;margin-right:40px;margin-top:25px;margin-bottom:25px">
						<div class="form-group  has-feedback has-error fila1">
							<label class="col-sm-2 control-label">Nombres</label>
							<div class="col-sm-10">
								<input type="text" id="inputnombre" class="form-control" placeholder="Ejemplo: Nicanor" validate=true toggle=".fila1">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila2">
							<label class="col-sm-2 control-label">Apellidos</label>
							<div class="col-sm-10">
								<input type="text" id="inputapellido" class="form-control" placeholder="Ejemplo:Condori Vargas" validate=true toggle=".fila2">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden=true></span>
							</div>
						</div>
						<div class="form-group  has-feedback has-error fila3">
							<label class="col-sm-2 control-label">Numero de Carnet</label>
							<div class="col-sm-10">
								<input type="text" id="inputci" autocomplete="false" class="form-control" placeholder="Ejemplo: 3690439" validate=true toggle=".fila3">
								<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
								<em style="color:#cf6666;display:none" id="error_registro">El Numero de ci ya esta en uso!</em>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Unidad</label>
							<div class="col-sm-10">
								<select id="selectunidad" class="form-control selectpicker show-tick" data-live-search="true">
	                                    	<?php while($row=mysql_fetch_array($resultado['unidades'])): ?>
	                                        	<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
	                                    	<?php endwhile; ?>
                                		</select>
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
