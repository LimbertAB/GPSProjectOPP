<div class="modal fade" id="updateunidadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
                    <div class="row">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:8px;margin-right:8px;z-index:100"><span aria-hidden="true">&times;</span></button>
	                   	<div class="col-md-3" height="100%" style="margin:0px;background:#0c2544;padding-top:40px;padding-left: 0;padding-right: 2px;z-index:-50;height: 590px;">
	                       	<img src="<?php echo URL;?>public/images/icons/64/home1.png" alt="profile" class="center-block" width="110px" style="padding:10px;margin-top:0px">
	                       	<center>
	                           	<h5 class="unombre" style="color: #f2fafd;margin-top:0;margin-bottom:10px;text-transform:uppercase;z-index:900">Unidad Arando Benavides de lo que venga wey</h5>
						</center>
	                       	<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/manager.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p style="margin:1px 0 1px 0;color:#afa95d;font-weight: 400;">JEFE DE UNIDAD</p>
							<p class="ujefe" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">Juan Colmillo</p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/group.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p style="margin:1px 0 1px 0;color:#afa95d;font-weight: 400;">TOTAL USUARIOS</p>
							<p class="uusuarios" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">2</p>

	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/status.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p style="margin:1px 0 1px 0;color:#afa95d;font-weight: 400;">ESTADO</p>
							<p class="uestado" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">Activo</p>
	                       	</center>
	                   	</div>
                        	<div class="col-md-9">
						<div class="row">
							<div class="col-md-3 col-sm-12 col-xs-12" style="margin:3px;padding:0">
								<center>
									<button type="button" class="btn btn-success btn-sm" disabled style="margin-right:3px">Guardar
									<button type="button" class="btn btn-danger btn-sm">Cancelar
								</center>
							</div>
							<div class="col-md-8 col-sm-12 col-xs-12" style="margin:4px">
								<div class="form-group has-success has-feedback">
								  	<input type="text" class="form-control input-sm" id="inputSuccess2" aria-describedby="inputSuccess2Status">
								  	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<center><h3 style="margin-top:0;color: #1cd2dc;font-weight: 700;">LISTA DE USUARIOS</h3></center>
						</div>
						<table class="table  table-bordered" id="tableunidad">
						</table>
						<div class="row" id="alert_empty_usuario"> <!-- SECTION EMPTY TABLE -->
							<div class="col-md-12">
								<div class="alert alert-error" role="alert">
									<strong>MENSAJE DE ALERTA!</strong> No se encontraron USUARIOS activos o registrados.
								</div>
							</div>
						</div>
                        	</div>
				</div>
               </div>
		</div>
	</div>
</div>
