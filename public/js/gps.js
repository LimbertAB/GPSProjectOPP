$(function(){

	//codigo para obtener valor de url
	$.urlParam = function(name){var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		return results[1] || 0;
	}
	var DirURL = window.location.pathname;
	//obtener nombre de ubicacion con latitud y longitud
	$.getJSON("http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=0&zoom=18&lat=" + -18.469744 + "&lon=" + -66.562618 + "&json_callback=?",
        function (response) {
        }
    );

	 var onlyThisDates = ['12-01-2017', '13-01-2017', '14-01-2017'];

            // $('#<%= txtDate.ClientID  %>').datepicker({
            //     beforeShowDay: enableSpecificDates,
            //     dateFormat: 'mm-dd-yy'
            // });


	//picker.enabledDates(onlyThisDates);
	var layerGroup;
	if(window.location.pathname=='/Location_GPS_principal'){
		var markers=[];
		for(var i=0;i<$('#todos tr').length;i++){
			var lat=$('#todos #fila'+i+' .latL').text();
			var lon=$('#todos #fila'+i+' .lonL').text();
			if((lat!='')&&(lon!='')){
				var mark1=L.marker([lat, lon]).bindPopup('<b>CODInterno: </b>'+$('#todos #fila'+i+' .codL').text()+'</b><br><b>PLACA: </b>'+$('#todos #fila'+i+' .plL').text()+'<br><b>TIPO: </b>'+$('#todos #fila'+i+' .tipL').text()+'<br><button type="button" class="btn btn-danger btn-xs markerbutton" style="margin:0 auto" onclick="doFunctioncar('+$('#todos #fila'+i+' .idL').text()+')">Ver Ubicaciones<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></button>').openPopup();
				markers.push(mark1);
			}

		}
		layerGroup=L.layerGroup(markers).addTo(map);
		$(".markerbutton:visible").click(function () {
	        console.log($(this).attr('id'));
	    });
	}
	// $('.tabResidencias a').click(function(){
	// 	var id=$(this).attr('href');
	// 	var markers=[];
	// 	map.removeLayer(layerGroup);
	// 	for(var i=0;i<$('#'+id+' tr').length;i++){
	// 		var lat=$('#'+id+' #fila'+i+' .latL').text();
	// 		var lon=$('#'+id+' #fila'+i+' .lonL').text();
	// 		if((lat!='')&&(lon!='')){
	// 			var mark1=L.marker([lat, lon]).bindPopup('<b>CODInterno: </b>'+$('#'+id+' #fila'+i+' .codL').text()+'</b><br><b>PLACA: </b>'+$('#'+id+' #fila'+i+' .plL').text()+'<br><b>TIPO: </b>'+$('#'+id+' #fila'+i+' .tipL').text()+'<br><button type="button" class="btn btn-danger btn-xs markerbutton" style="margin:0 auto" onclick="doFunctioncar('+$('#'+id+' #fila'+i+' .idL').text()+')">Ver Ubicaciones<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></button>').openPopup();
	// 			markers.push(mark1);
	// 		}
	// 	}
	// 	layerGroup=L.layerGroup(markers).addTo(map);
	// });

	// if(window.location.pathname=='/Location_GPS_car'){
	// 	var mark1=L.marker([51.5, -0.09]);
	// 	var markers=[];markers.push(mark1);
	// 	layerGroup=L.layerGroup(markers).addTo(map);
	// 	if($('#estadoLocationuser').text()=='true'){
	// 		$('#btnfecha').addClass('disabled');
	// 		socket.emit('damecordenadasdeunvehiculo',{idcar:$.urlParam('idVehiculo'),fecha:$('#btnfecha').text()});
	// 	}
	// }

	// socket.on('respuestadamecordenadasdeunvehiculo',function(valores){
	// 	console.log(valores)
	// 	var markers=[];
	// 	map.removeLayer(layerGroup);
	// 	$('#btnfecha').removeClass('disabled');
	// 	if(valores.responde==true){
	// 		for(var i=0;i<valores.latitud.length;i++){
	// 			var lat=valores.latitud[i];
	// 			var lon=valores.longitud[i];
	// 			var mark1=L.marker([lat, lon]).bindPopup('<b> Fecha: </b>'+valores.fecha[i]+'<br><b> Hora: </b>'+valores.hora[i]+'<br><b> Velocidad: </b>'+valores.velocidad[i]+'').openPopup();
	// 			markers.push(mark1);
	// 		}
	// 		layerGroup=L.layerGroup(markers).addTo(map);
	// 	}
	// 	else{
	// 		map.removeLayer(layerGroup);
	// 		console.log('no hay ubicaciones');
	// 	}
	// });
	var Localizaciones;
	if(window.location.pathname=='/Importar_Coordenadas'){
		$('body').css('background', '#008fd4');
		var fileInput = document.getElementById('fileInput');
		var fileDisplayArea = document.getElementById('fileDisplayArea');
		fileInput.addEventListener('change', function(e) {
			var file = fileInput.files[0];
			var textType = /text.*/;

			if (file.type.match(textType)) {
				$('#btnenviarcorrdenadasmemoria').removeClass('disabled');
				var reader = new FileReader();

				reader.onload = function(e) {
					fileDisplayArea.innerText = reader.result;
					Localizaciones=(fileDisplayArea.innerText).split("\n");
				}
				reader.readAsText(file);

			} else {
				$('#btnenviarcorrdenadasmemoria').addClass('disabled');
				fileDisplayArea.innerText = "ARCHIVO NO SOPORTADO!"
			}
		});
	}
	$('#btnenviarcorrdenadasmemoria').click(function(){
		if($(this).hasClass('disabled')){
			//boton disabled
		}else{
			var gpsdata=[];
			for (var i = 0; i < Localizaciones.length; i++) {
				if(Localizaciones[i]!=""){
					gpsdata.push(Localizaciones[i]);
				}
			};
			socket.emit('insertarcoordenadasmemoriacard',{'coordenadas':gpsdata,'idvehiculo':$.urlParam('idVehiculo')});
			$('#btnenviarcorrdenadasmemoria').addClass('disabled');
			console.log('antes de enviar',gpsdata);
		}
	});
	socket.on('respuestainsertarcoordenadasmemoriacard',function(data){
		if(data==true){
			console.log('estado',data);
			swal({
				title: "Satisfactorio!",
				text: "Los datos se guardaron correctamente!",
				type: "success",
				confirmButtonText: "Aceptar",
				closeOnConfirm: false
			},
			function(){
				location.reload();
			});
		}else{
			if (data==false){
				swal({
					title: "ERROR!",
					text: "Ocurrio un error de conexión intentelo nuevamente!",
					type: "error",
					confirmButtonText: "Aceptar",
					closeOnConfirm: false
				},
				function(){
					location.reload();
				});
			}else{
				swal({
					title: "ERROR!",
					text: "EL formato no es compatible!",
					type: "error",
					confirmButtonText: "Aceptar",
					closeOnConfirm: false
				},
				function(){
					location.reload();
				});
			}
		}
	});
})
