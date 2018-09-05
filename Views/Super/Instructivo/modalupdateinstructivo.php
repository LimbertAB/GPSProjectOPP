<div class="modal fade" id="updateinstructivoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">ACTUALIZAR INSTRUCTIVO DE VIAJE</h4>
			</div>
			<div class="modal-body" style="margin:20px 40px 20px 40px;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">FECHA</label>
			            	<div class='input-group date' id='datetimepicker1_u'>
			                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d'); ?>"  validate="true"/>
			                	<span class="input-group-addon">
			                    	<span class="glyphicon glyphicon-calendar"></span>
			                	</span>
			            	</div>
			        	</div>
					<?php mysql_data_seek($resultado['choferes'], 0);?>
					<div class="form-group">
						<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CHOFER</label>
						<select id="selectchofer_u" class="form-control selectpicker show-tick " data-show-subtext="true" data-live-search="true">
                               	<?php while($row=mysql_fetch_array($resultado['choferes'])): ?>
                                   	<option value="<?php echo $row['id'];?>" data-subtext="<?php echo $row['brevet'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
                               	<?php endwhile; ?>
                      		</select>
					</div>
					<div class="form-group has-feedback has-success fila1_u">
							<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">DESCRIPCION</label>
							<textarea id="textareadescripcion_u" toggle=".fila1_u" validate="false" rows="8" maxlength="500" style="resize: none;padding:10px"  class="form-control"></textarea>
						</div>
				</form>
			</div>
			<div class="modal-footer" style="border-left:10px solid  #84da92;margin-top: 15px;padding:10px 0 10px 0">
				<div class="col-md-9">
					<h3 style="font-weight:200;color:#ff0000;margin:0;text-align:left">NOTA<span style="font-size:0.5em;font-style: italic;color:#777575;margin-left:15px">llene toda la información necesaria</span></h3>
				</div>
				<div class="col-md-3">
					<button class="btn btn-success" id="buttonupdate" data-loading-text="Registrando Planificacion..." disabled>ACTUALIZAR</button>
				</div>
	      	</div>
		</div>
	</div>
</div>
