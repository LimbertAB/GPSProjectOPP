<div class="modal fade" id="updatechoferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
               <div class="modal-body" style="padding-top:0;padding-bottom:0;z-index:20">
				<div class="row">
	                   	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 5px;z-index:100;position:absolute"><span aria-hidden="true">&times;</span></button>
	                   	<div class="col-md-4" height="100%" style="margin:0px;background:#0c2544;padding-top:25px;padding-left: 0;padding-right: 2px;z-index:-50;height: 530px;">
	                       	<img src="<?php echo URL;?>public/images/icons/64/man.png" alt="profile" class="center-block" width="110px" style="padding:10px;margin-top:0px">
	                       	<center class="unombre">
	                           	<h5  style="color: #f2fafd;margin-top:0;margin-bottom:0px;text-transform:uppercase;z-index:900"></h5>
							<em style="margin-bottom:15px;color:#36bb5d;font-weight: 700;"></em>
						</center>
	                       	<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/big-id-card.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="ubrevet" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/hotel.png"  style="padding:15px 0 5px 0;margin-top:0px">
		                         <br><p class="ujefatura" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/home.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uunidad" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
						<center>
	                           	<img src="<?php echo URL;?>public/images/icons/32/repair.png"  style="padding:15px 0 5px 0;margin-top:0px">
	                           	<br><p class="uestado" style="line-height: .95em !important;text-transform: lowercase;color:#cde9e5"></p>
	                       	</center>
	                   	</div>
	                    <?php mysql_data_seek($resultado['unidades'], 0);?>
	                   	<div class="col-md-8">
	                       	<center><h3 style="margin-top:5px;color: #1cd2dc;font-weight: 700;">MODIFICAR USUARIO</h3></center>
					   	<form autocomplete="off">
	                            	<div class="form-group has-feedback has-success fila1_u" style="margin-bottom:10px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">NOMBRES</label>
	                                <input type="text" id="inputnombre_u" class="form-control" validate="false" toggle=".fila1_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                            	</div>
	                            	<div class="form-group has-feedback has-success fila2_u" style="margin-bottom:10px">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">BREVET</label>
	                                <input type="text"  id="inputbrevet_u" class="form-control" validate="false" toggle=".fila2_u">
	                                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  <em style="color:#cf6666;display:none" id="error_update_brevet">El Numero de Brevet ya esta en uso!</em>
							</div>
	                            	<div class="form-group" style="margin-bottom:10px">
	                                	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">UNIDAD</label>
	                                	<select id="selectunidad_u" class="form-control selectpicker show-tick" data-live-search="true">
	                                    	<?php while($row=mysql_fetch_array($resultado['unidades'])): ?>
	                                        	<option value="<?php echo $row['id'];?>"><?php echo ucwords(strtolower($row['nombre']));?></option>
	                                    	<?php endwhile; ?>
	                                	</select>
	                            	</div>
							<div class="form-group">
								<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">TIPO</label>
								<select id="selecttipo_u" class="form-control">
									<option value=3>Chofer</option>
									<option value=2>Jefe de Transporte</option>
								</select>
							</div>
							<div class="form-group has-feedback has-error fila3_u rowhidden_u" style="margin-bottom:10px;display:none">
	                                <label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">NÚMERO DE CARNET</label>
	                                <input type="number" autocomplete="false" id="inputci_u" min="1000000" class="form-control" placeholder="Ejemplo: 5560430" validate="false" toggle=".fila3_u">
	                                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
	                            	</div>
						   	<div class="form-group has-feedback has-error fila4_u rowhidden_u"  style="margin-bottom:10px;display:none">
	                            	<label style="color:#3fd2e0;font-weight:400;font-family:arial;font-size:.8em;margin-bottom:2px">CONTRASEÑA</label>
	                                <input type="password" autocomplete="false" autocorrect="off" class="form-control" id="inputpassword_u" validate="false" placeholder="Minimo 5 caracteres" toggle=".fila4_u">
	                                <span toggle="#inputpassword_u" id="togglepassword_u" class="fa fa-fw fa-eye field-icon"></span>
							  <em style="color:#cf6666;display:none" id="error_update_ci">El carnet de identidad ya esta en uso!</em>
						   	</div>
	                            	<center>
	                                	<button class="btn btn-warning" style="margin:10px 0 18px 0px" id="buttonupdate" type="button" disabled>Guardar</button>
	                            	</center>
						</form>
	                   	</div>
				</div>
               </div>
		</div>
	</div>
</div>
