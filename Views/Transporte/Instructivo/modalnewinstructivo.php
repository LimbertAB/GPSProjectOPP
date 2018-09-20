<div class="modal fade" id="newinstructivoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background:#3fd2e0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color:#fff">REGISTRO DE NUEVO INSTRUCTIVO DE VIAJE</h4>
			</div>
			<div class="modal-body" style="margin:20px 40px 20px 40px;padding:0">
				<form  class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<label>Fecha</label>
			            	<div class='input-group date' id='datetimepicker1'>
			                	<input readonly type='text' class="form-control" value="<?php echo date('Y-m-d'); ?>"  validate="true"/>
			                	<span class="input-group-addon">
			                    	<span class="glyphicon glyphicon-calendar"></span>
			                	</span>
			            	</div>
			        	</div>
					<div class="form-group">
						<label>Chofer</label>
						<select id="selectchofer" class="form-control selectpicker show-tick " data-show-subtext="true" data-live-search="true">
                               	<?php while($row=mysql_fetch_array($resultado['choferes'])): ?>
                                   	<option value="<?php echo $row['id'];?>" data-subtext="<?php echo $row['brevet'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
                               	<?php endwhile; ?>
                      		</select>
					</div>
					<div class="form-group has-feedback has-success fila1">
						<label>Descripción</label>
						<textarea id="textareadescripcion" toggle=".fila1" validate="true" rows="8" placeholder="La unidad de Transportes, dependiente de la Unidad Administrativa y jefatura del Departamento de Administración y Finanzas del Servicio Departamental de Salud Potosi.." maxlength="500" style="resize: none;padding:10px"  class="form-control">La unidad de Transportes, dependiente de la Unidad Administrativa y jefatura del Departamento de Administraci&oacute;n y Finanzas del Servicio Departamental de Salud Potos&iacute;, instruye a usted realizar el apoyo como conductor para el viaje a los municipios de Llallagua y Ocuri para el traslado t&eacute;cnico de planificaci&oacute;n Dr. Gary Barrios Garcia que realizara seguimiento y monitoreo de los proyectos de salud del 5 al 7 de julio de la presente gesti&oacute;n.</textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer" style="border-left:10px solid  #84da92;margin-top: 15px;padding:10px 0 10px 0">
				<div class="col-md-9">
					<h3 style="font-weight:200;color:#ff0000;margin:0;text-align:left">NOTA<span style="font-size:0.5em;font-style: italic;color:#777575;margin-left:15px">llene toda la información necesaria</span></h3>
				</div>
				<div class="col-md-3">
					<button class="btn btn-success" id="btnregistrar" data-loading-text="Registrando Planificacion...">REGISTRAR</button>
				</div>
	      	</div>
		</div>
	</div>
</div>
