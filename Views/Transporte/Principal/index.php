<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding:0;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="row" style="background:#17c1e7;padding:0;margin:0">
        <div class="col-md-12">
            <img src="<?php echo URL; ?>public/images/icons/user_circle.png" alt="profile" class="center-block" width="110px" style="padding:10px;margin-top:0">
        </div>
        <h4 class="text-center" style="color:#fff;font-weight:600;margin-bottom:2px"> <?php echo $resultado['profile']['nombre'] ?></h4>
        <div class="col-md-12">
            <p class="col-md-5 col-lg-5 col-sm-5 col-xs-5" style="text-align:right;color:#2289b6;padding-left:0"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo $resultado['profile']['ci'] ?></p>
            <p class="col-md-7 col-lg-7 col-sm-7 col-xs-7" style="text-align:left;color:#2289b6;padding-right:0"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Jefatura de Administración</p>
        </div>
    </div>
    <div class="col-md-12" style="background:#f1f1f1">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><img src="<?php echo URL; ?>public/images/icons/status.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a style="cursor:pointer" href="/<?php echo FOLDER?>/Responsable"><img src="<?php echo URL; ?>public/images/icons/users.jpg" alt="profile" class="img-circle center-block" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-12">
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-left:0">Activo  <span class="glyphicon glyphicon-ok-sign" style="color: #3dd55e" aria-hidden="true"></span></p>
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-right:0">Responsables: <small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo mysql_num_rows($resultado["responsable"]);?></small></p>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a style="cursor:pointer" href="/<?php echo FOLDER?>/Vehiculo"><img src="<?php echo URL; ?>public/images/icons/car.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a style="cursor:pointer" href="/<?php echo FOLDER?>/Chofer"><img src="<?php echo URL; ?>public/images/icons/transfer.jpg" alt="profile" class="img-circle center-block" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-12">
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-left:0">Vehiculos: <small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo mysql_num_rows($resultado["vehiculo"]);?></small></p>
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-right:0">Choferes :<small style="font-size:1.5em;color:#31cfeb;font-weight:700"> <?php echo mysql_num_rows($resultado["chofer"]);?></small></p>

        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a style="cursor:pointer" href="/<?php echo FOLDER?>/Gps"><img src="<?php echo URL; ?>public/images/icons/location.jpg" alt="profile" class="img-circle center-block hexagon" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"><a data-target="#updateusuarioModal" data-toggle="modal" onclick="updateperfilAjax(<?php echo $resultado['profile']['id_usuario'];?>)"><img src="<?php echo URL; ?>public/images/icons/profile2.jpg" alt="profile" class="img-circle center-block" width="90px" style="margin-top:10px"></a></div>
        <div class="col-md-12">
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-left:0">Localizaciones</p>
            <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center" style="color:#313131;padding-right:0">Mi Perfil</p>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
     <div id='calendar'></div>
     <table id="todos" style="display:none">
          <tbody>
               <?php while($row=mysql_fetch_array($resultado["responsable"])): ?>
                    <tr><td><?php echo $row['id'];?></td><td><?php echo $row['ci'];?></td><td><?php echo ucwords(strtolower($row['nombre'])); ?></td><td>responsable</td></tr>
               <?php endwhile; ?>
               <?php while($row=mysql_fetch_array($resultado["chofer"])): ?>
                    <tr><td><?php echo $row['id'];?></td><td><?php echo $row['brevet'];?></td><td><?php echo ucwords(strtolower($row['nombre'])); ?></td><td>chofer</td></tr>
               <?php endwhile; ?>
               <?php while($row=mysql_fetch_array($resultado["vehiculo"])): ?>
                    <tr><td><?php echo $row['id'];?></td><td><?php echo $row['placa'];?></td><td><?php echo ucwords(strtolower($row['nombre'])); ?></td><td>vehiculo</td></tr>
               <?php endwhile; ?>
          </tbody>
     </table>
</div>
<style>table thead tr {background: none;}table>thead>tr>th {color: #827a90;font-weight: 600;}</style>
<?php include 'modalverchofer.php';include 'modalverresponsable.php';include 'modalvervehiculo.php';include 'modalverboleta.php';include 'modalupdateusuario.php';?>
<script>
     var id_persona_u,id_user_u;
     var users_array=['Super Administrador','Administrador','Jefe de Transporte'];
     $(document).ready(function(){
          $('#inputnombre_u').keypress(function(e){not_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error('.fila1_u',true);}else{small_error('.fila1_u',false);}function_validate();});
		$('#inputci_u').keypress(function(e){yes_number(e);}).keyup(function(){if($(this).val().trim().length>6){small_error('.fila2_u',true);}else{small_error('.fila2_u',false);}function_validate();});
		$('#inputpassword_u').keyup(function(){if($(this).val().trim().length>4){small_error('.fila3_u',true);}else{small_error('.fila3_u',false);}function_validate();});
          function function_validate(){
			if($('.fila1_u').hasClass('has-success') && $('.fila2_u').hasClass('has-success')){
				if (($('#inputpassword_u').val().trim()=="") || ($('.fila3_u').hasClass('has-success'))) {
					if(($('#inputnombre_u').attr('placeholder')!=$('#inputnombre_u').val().trim().toLowerCase()) ||
						($('#inputci_u').attr('placeholder')!=$('#inputci_u').val()) || ($('.fila3_u').hasClass('has-success'))
					){
						$("#buttonupdate").attr('disabled', false);
					}else{$("#buttonupdate").attr('disabled', true);}
				}else{$("#buttonupdate").attr('disabled', true);}
			}else{$("#buttonupdate").attr('disabled', true);}
		}
          $('#buttonupdate').click(function(){
			var ci_update="";
			if($('#inputci_u').val()!=$('#inputci_u').attr('placeholder')){
				ci_update=$('#inputci_u').val();
			}
			$.ajax({
				url: '<?php echo URL;?>Principal/editar/'+id_user_u,
				type: 'post',
				data:{
					nombre:$('#inputnombre_u').val(),ci:ci_update,password:$('#inputpassword_u').val(),id_persona:id_persona_u
				},
				success:function(obj){
					if (obj=="false") {
						$('#error_update').show();
					}else{
						swal("Mensaje de Alerta!", obj , "success");
						setInterval(function(){ location.reload()}, 1000);
					}
				}
			});
		});
          function getRandomColor() {var letters = '0123456789ABCDEF'.split(''),color = '#';for (var i = 0; i < 6; i++ ) {color += letters[Math.floor(Math.random() * 16)];}return color;} //random color
          $('#inputsearch').focusout(function() {
               var outn=setInterval(function(){ $('#searchprincipal').hide();clearInterval(outn);}, 150);
          })
          $('#inputsearch').focusin(function() {
               $('#searchprincipal').show();
          })
          $('#inputsearch').keyup(function(){
              $('#searchprincipal').empty();
              var data=$(this).val().toLowerCase().trim();
              SEARCH_PERSON(data,"todos","No se encontraron coincidencias");
          });
          function SEARCH_PERSON(DATA,TABLE,MESSAGE){
              var tabla_tr = document.getElementById(TABLE).getElementsByTagName("tbody")[0].rows;
              var filas=[];
              for(var i=0; i<tabla_tr.length; i++){
                    var tr = tabla_tr[i];
                    var textotr = (tr.innerText).toLowerCase();
                    if(textotr.indexOf(DATA)>0){
                         filas.push(tabla_tr[i]);
                    }
              }
              for (var i = 0; i < filas.length; i++) {
                    var id=filas[i].getElementsByTagName('td')[0].innerHTML,
                    cod=filas[i].getElementsByTagName('td')[1].innerHTML,
                    nombres=filas[i].getElementsByTagName('td')[2].innerHTML,
                    tipo=filas[i].getElementsByTagName('td')[3].innerHTML;
                    switch (tipo) {
                         case 'responsable':
                             $('#searchprincipal').append('<a href="#" class="list-group-item" style"padding:5px;" data-target="#verresponsableModal" data-toggle="modal" onclick="verResponsableAjax('+id+')"><p style="font-size:1.3em;font-weight:600" class="list-group-item-text">'+nombres+'</p><p class="list-group-item-text"><strong>CI: </strong>'+cod+'<strong> Tipo: </strong>'+tipo+'</p></a>');
                              break;
                         case 'chofer':
                             $('#searchprincipal').append('<a href="#" class="list-group-item" style"padding:5px;" data-target="#verchoferModal" data-toggle="modal" onclick="verChoferAjax('+id+')"><p style="font-size:1.3em;font-weight:600" class="list-group-item-text">'+nombres+'</p><p class="list-group-item-text"><strong>Brevet: </strong>'+cod+'<strong> Tipo: </strong>'+tipo+'</p></a>');
                              break;
                         case 'vehiculo':
                             $('#searchprincipal').append('<a href="#" class="list-group-item" style"padding:5px;" data-target="#vervehiculoModal" data-toggle="modal" onclick="verVehiculoAjax('+id+')"><p style="font-size:1.3em;font-weight:600" class="list-group-item-text">'+nombres+'</p><p class="list-group-item-text"><strong>Placa: </strong>'+cod+'<strong> Tipo: </strong>'+tipo+'</p></a>');
                              break;
                    }
               }
          }
          var datos = [],data = <?php echo json_encode($resultado['boletas'])?>;
    		for (var i = 0; i < data.length; i++) {
			var title=data[i].nombre.toUpperCase();
    			myObj = { "id":data[i].id, "title":title, "start":data[i].fecha_de,"end":data[i].fecha_hasta+" 23:59:00","description": 'OBJETIVO: '+data[i].objetivo.toLowerCase(),"color":getRandomColor()};
    			datos.push(myObj);}
    		$('#calendar').fullCalendar({
    			locale: 'es',
			defaultView: 'month',
    			header: {
    				left: 'prev, next, today',
    				center: 'title',
    				right: 'month, agendaWeek, agendaDay'
    			},
    			defaultDate: '<?php echo date('Y-m-d')?>',
    			navLinks: true,
    			eventLimit: true,
    			events: datos,
			resizable: true,
			editable:true,
			selectable:true,
			timeFormat: 'H(:mm)',
    			eventRender: function(event, element) {
    	            element.find('.fc-title').append("<br/>" + event.description);
		  	},
			eventClick: function(event) {
			     verboletaAjax(event.id);
				$('#verboletaModal').modal('show');
		     },
    		});
     });
     function verVehiculoAjax(val){
          $.ajax({
              url: '<?php echo URL;?>Vehiculo/ver/'+val,
              type: 'get',
              success:function(obj){
                   var data = JSON.parse(obj);
                   $('.vtipovehiculo').text(data.tipo);
                   $('.vmarca').text(data.marca);
                   $('.vplaca').text(data.placa);
                   $('.vage').text(data.age);
                   $('.vcolor').text(data.color);
                   if (data.estado=="1") {
                        $('.vestadovehiculo').text("Activo");
                   }else{
                         if (data.baja_detalle==null || data.baja_detalle=="") {
                             $('.vestadovehiculo').text("Dado de Baja");
                         }else{
                              $('.vestadovehiculo').text(data.baja_detalle);
                         }
                   }
              }
          });
          $('#buttonvergpsvehiculo').click(function(){
               window.location.href = "/<?php echo FOLDER;?>/Gps/ver_car/"+val;
          });
     }
     function verChoferAjax(val){
          $.ajax({
              url: '<?php echo URL;?>Chofer/ver/'+val,
              type: 'get',
              success:function(obj){
                   var data = JSON.parse(obj);
                   $('.vnombrechofer').text(data.nombre);
                   $('.vbrevet').text(data.brevet);
                   $('.vestadochofer').text(data.estado=="1"?("Activo"):("De Baja"));
              }
          });
          $('#buttonvergpschofer').click(function(){
               window.location.href = "/<?php echo FOLDER;?>/Gps/ver_people/"+val;
          });
     }
     function verResponsableAjax(val){
         $.ajax({
              url: '<?php echo URL;?>Responsable/ver/'+val,
              type: 'get',
              success:function(obj){
                   var data = JSON.parse(obj);
                   $('.vnombreresponsable').text(data.nombre+" "+data.apellido);
                   $('.vjefatura').text(data.jefatura.toLowerCase());
                   $('.vunidad').text(data.unidad.toLowerCase());
                   $('.vci').text(data.ci);
                   $('.vestadoresponsable').text(data.estado=="1"?("Activo"):("De Baja"));
              }
         });
     }
     function verboletaAjax(val){
          $.ajax({
			url: '<?php echo URL;?>Boleta/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
                    $('.unombre h5').text(data.boletas.nombre);
				$('.unombre p').text(data.boletas.brevet);
				$('.uactividad').text(data.boletas.objetivo);
				$('.uviaje').text(data.boletas.tipo +" ("+ data.boletas.placa+")");
				$('.uciudad').text(data.boletas.lugares);
                    if (data.boletas.establecimiento!=null){
                         $('.uciudad').text(data.boletas.establecimiento.toLowerCase());
                    }else{
                         if (data.boletas.municipio!=null) {
                              $('.uciudad').text(data.boletas.municipio.toLowerCase());
                         }else{
                              if (data.boletas.redsalud!=null) {
                                   $('.uciudad').text(data.boletas.redsalud.toLowerCase());
                              }
                         }
                    }
				$('.uestablecimiento').text(data.boletas.unidad.toLowerCase());
				$('.utipo').text(data.uso);
				$('.ufechahasta').text(data.boletas.fecha_hasta);
				$('.ufechade').text(data.boletas.fecha_de);
                    $('#row_responsables').empty();
                    var aux=0;
                    while (aux<data.responsables.length) {
                         $('#row_responsables').append('<div class="col-md-6"><h5 style="margin:0 0 0 20px;color:#a7a7a7;font-weight:200"><strong>'+ (parseInt(aux)+1) +'. </strong> '+data.responsables[aux].nombre.toLowerCase()+" "+ data.responsables[aux].apellido.toLowerCase()+'</h5></div>');
                         aux++;
                    }
			}
		});
     }
     function updateperfilAjax(val){
		small_error(".fila1_u",true);small_error(".fila2_u",true);small_error(".fila3_u",false);$("#buttonupdate").attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>Usuario/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
                    console.log(data);
				$('.unombre h5').text(data.nombre);$('.unombre p').text(data.ci);$('.unombre em').text(users_array[data.tipo]);$('.uunidad').text(data.tipo!=2 ? ("Sin Unidad"):("Unidad de Transportes"));$('.ujefatura').text(data.tipo!=2 ? ("Sin Jefatura"):("jefatura de Transportes"));$('.uestado').text(data.estado==1 ? ("Activo"):("Inactivo"));
				$('#inputnombre_u').val(data.nombre.toLowerCase());$('#inputnombre_u').attr('placeholder',data.nombre.toLowerCase());
				$('#inputci_u').val(data.ci);$('#inputci_u').attr('placeholder',data.ci);
				$('#inputpassword_u').val("");$('#inputpassword_u').removeClass('has-success').addClass('has-error');
				$('#selecttipo_u option[value='+data.tipo+']').attr('selected','selected');
				id_user_u=data.id;id_persona_u=data.id_persona;
			}
		});
	}
</script>
