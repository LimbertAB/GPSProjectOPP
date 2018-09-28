<div class="modal fade" id="updatevehiculoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row">
	                   	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
	                   	<div class="col-md-4" height="100%" style="margin:0px;background:#0c2544;padding:15px 3px 0px 3px;z-index:-50;height: 505px;">
	                       	<img src="<?php echo URL;?>public/images/icons/64/car.png" alt="profile" class="center-block" width="110px" style="padding:10px;margin-top:0px">
	                       	<center class="umarca">
	                           	<h5  style="color: #f2fafd;margin-top:0;margin-bottom:0px;text-transform:uppercase;z-index:900">Limbert <br> Arando Benavides</h5>
						  	<p style="margin-bottom:0;color:#f7e70e;font-weight: 700;">2018</p>
							<em style="margin-bottom:15px;color:#36bb5d;font-weight: 700;"> Administrador</em>
						</center>
	                       	<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/plate.png" width="40px" style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uplaca" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">3545-trt</p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/paint.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="ucolor" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">rojo</p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/repair.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uestado" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">activo</p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/origin.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uorigen" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5">activo</p>
	                       	</center>
	                   	</div>
	                    <?php mysql_data_seek($resultado['marcas'], 0);?>
	                   	<div class="col-md-8">
	                       	<center><h3 style="margin-top:5px;color: #1cd2dc;font-weight: 700;">MODIFICAR VEHICULO</h3></center>
					   	<form autocomplete="off">
							<div class="form-group" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">MARCA</label>
	                                	<select id="selectmarca_u" class="form-control selectpicker show-tick" data-live-search="true">
	                                    	<?php while($row=mysql_fetch_array($resultado['marcas'])): ?>
	                                        	<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
	                                    	<?php endwhile; ?>
	                                	</select>
	                            	</div>
	                            	<div class="form-group has-feedback has-success fila1_u" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">TIPO</label>
	                                	<input type="text" id="inputtipo_u" class="form-control" validate="false" toggle=".fila1_u">
	                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                            	</div>
							<div class="form-group has-feedback has-success fila2_u" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">PLACA</label>
	                                	<input type="text" id="inputplaca_u" class="form-control" toggle=".fila2_u">
	                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								<em style="color:#cf6666;display:none" id="error_update">La placa del vehiculo ya esta en uso!</em>
	                            	</div>
	                            	<div class="form-group has-feedback has-success fila3_u" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">COLOR</label>
	                                	<input type="text" id="inputcolor_u" class="form-control" validate="false" toggle=".fila3_u">
	                                	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                            	</div>
	                            	<div class="form-group" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">AÑO</label>
								<div class='input-group date' id='datetimepicker_u'>
					                	<input type='text' class="form-control" />
					                	<span class="input-group-addon">
					                    	<span class="glyphicon glyphicon-calendar"></span>
					                	</span>
					            	</div>
	                            	</div>
							<div class="form-group" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">ORIGEN</label>
	                                	<input type="text" id="inputorigen_u" class="form-control" validate="false">
	                            	</div>
	                            	<center>
	                                	<button class="btn btn-success" style="margin:20px 0 18px 0px" id="buttonupdate" type="button" disabled>Actualizar</button>
	                            	</center>
						</form>
	                   	</div>
				</div>
               </div>
		</div>
	</div>
</div>
