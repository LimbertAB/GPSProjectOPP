<div class="modal fade" id="importgpsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding:0 15px 0 15px;z-index:20">
				<div class="row">
	                   	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
	                    <div class="col-md-4" height="100%" style="margin:0px;background:#0c2544;padding-top:10px;padding-left: 0;padding-right: 2px;z-index:-50;height: 420px;">
						<center><img src="<?php echo URL;?>public/images/icons/64/transfering.png"  style="padding:15px 0 5px 0;margin-top:0px;width:50px"><br><p class="ujefatura" style="font-size: .9em;font-weight: 200;color:#cde9e5"><strong style="color:#dbf246;font-weight:400">PASO 1: </strong> conectar dispositivo</p></center>
						<center><img src="<?php echo URL;?>public/images/icons/64/folder.png"  style="padding:15px 0 5px 0;margin-top:0px;width:40px"><br><p class="ujefatura" style="font-size: .9em;font-weight: 200;color:#cde9e5"><strong style="color:#dbf246;font-weight:400">PASO 2: </strong> buscar carpeta /Garmin/GPX</p></center>
						<center><img src="<?php echo URL;?>public/images/icons/64/map-location.png"  style="padding:15px 0 5px 0;margin-top:0px;width:45px"><br><p class="ujefatura" style="font-size: .9em;font-weight: 200;color:#cde9e5"><strong style="color:#dbf246;font-weight:400">PASO 3: </strong> seleccione archivo "/ .gpx"</p></center>
						<center><img src="<?php echo URL;?>public/images/icons/64/ambulance.png"  style="padding:15px 0 5px 0;margin-top:0px;width:50px"><br><p class="ujefatura" style="font-size: .9em;font-weight: 200;color:#cde9e5"><strong style="color:#dbf246;font-weight:400">PASO 4: </strong> completar formulario</p></center>
	                   	</div>
	                   	<div class="col-md-8">
	                       	<center><h3 style="margin:15px 0 0 0;color: #1cd2dc;font-weight: 700;">IMPORTAR LOCALIZACIONES</h3></center>
					   	<form autocomplete="off" name="formularioimportar" id="formularioimportar" enctype="multipart/form-data" method="post">
	                            	<div class="form-group" style="margin:0">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin:15px 0 2px 0">FECHA</label>
							  	<div class='input-group date' id='datetimepicker1'>
					  				<input  readonly name="fecha" type='text' value="<?php echo date('Y-m-d')?>" class="form-control"/>
					  				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					  			</div>
							</div>
							<div class="form-group" style="margin:0">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin:15px 0 2px 0">SELECCIONE EL ARCHIVO</label>
							  	<div class='input-group'>
					  				<input id="fileInput" name="archivo" type="file" accept=".gpx"/>
					  				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					  			</div>
							</div>
							<div class="form-group" style="margin:0">
								<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin:15px 0 2px 0">SELECCIONE CHOFER</label>
								<div class='input-group'>
									<select class="form-control selectpicker show-tick" name="id_chofer" data-live-search="true" data-show-subtext="true">
										<?php while($row=mysql_fetch_array($resultado['choferes'])): ?>
											<option value="<?php echo $row['id'];?>"  data-subtext="<?php echo ucwords(strtolower($row['brevet']));?>"><?php echo ucwords(strtoupper($row['nombre']));?></option>
										<?php endwhile; ?>
									</select>
									<span class="input-group-addon"><span class="glyphicon glyphicon-bed"></span></span>
								</div>
							</div>
							<div class="form-group" style="margin:0">
								<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin:15px 0 2px 0">SELECCIONE VEHICULO</label>
								<div class='input-group'>
									<select class="form-control selectpicker show-tick" name="id_vehiculo" data-live-search="true" data-show-subtext="true">
										<?php while($row=mysql_fetch_array($resultado['vehiculos'])): ?>
											<option value="<?php echo $row['id'];?>"  data-subtext="<?php echo ucwords(strtolower($row['marca']));?>"><?php echo ucwords(strtoupper($row['tipo']));?> - <?php echo $row['placa'];?></option>
										<?php endwhile; ?>
									</select>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-bed"></span>
									</span>
								</div>
							</div>
							<div class="form-group has-feedback has-error fila1"  style="margin:0">
								<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin:15px 0 2px 0">DESCRIPCION</label>
								<textarea id="textareaobjetivo" toggle=".fila1_i" name="descripcion" validate="true" rows="2" placeholder="EJEMPLO: localizacion de viaje a villazon" maxlength="100" style="resize: none;padding:10px"  class="form-control"></textarea>
							</div>
						</form>
	                   	</div>
				</div>
               </div>
			<div class="modal-footer" style="border-left:10px solid  #84da92;margin:0;padding:5px 0 5px 0">
					<div class="col-md-9">
						<h3 style="font-weight:200;color:#ff0000;margin:0;text-align:left">NOTA<span style="font-size:0.5em;font-style: italic;color:#777575;margin-left:15px">el boton de "GUARDAR" de habilitara una vez llene toda la información</span></h3>
					</div>
					<div class="col-md-3">
						<button class="btn btn-success" style="margin:0" id="buttonregistrar" type="button" onclick="registrarAjax()">GUARDAR</button>
					</div>
	      	</div>
		</div>
	</div>
</div>
