<link rel="stylesheet" href="<?php echo URL; ?>public/css/leaflet.css">
<script src="<?php echo URL;?>public/js/leaflet.js"></script>
<div class="row">
     <div id="mimapa" style="height:85vh;"></div>
</div>
<script>
   	var id_planificacion_u,locations,lugarinicial=[],lugarfinal=[]; //2018-05-02-090909-1.gpx
     var fecha_start="Sin Fecha",hora_start="Sin Hora",altura_start="Sin Altura",fecha_end="Sin Fecha",hora_end="Sin Hora",altura_end="Sin Altura";
     $(document).ready(function(){
          $('#hidegps,#btnsearch,#hidetittlegps').hide();
          $('#datetimepickermes,#btninfogps,#showtittlegps').show();
		$('#datetimepickermes').datetimepicker({locale: 'es',format: 'YYYY-MM-DD',ignoreReadonly: true,viewMode: 'days'}).on('dp.change', function(e){
			var placeholder=$('#datetimepickermes input').attr('placeholder'),input=$('#datetimepickermes input').val(),entero=parseInt(e.date._d.getMonth())+1,au= entero < 10 ? ("0" + entero) : (entero);
			var dia=parseInt(e.date._d.getDate()),diaactual= dia < 10 ? ("0" + dia) : (dia);
			if (placeholder.toString()!=input.toString()) {
				window.location.href = "/<?php echo FOLDER;?>/Gps/<?php echo $resultado['mode']==1 ? "ver_car":"ver_people" ?>/<?php echo $resultado['objeto']['id'] ?>?date="+e.date._d.getFullYear()+au+diaactual;
			}
		});

          var mbAttr = 'Edit For © <a href="http://mapbox.com">Limbert AB</a>';mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibGltYmVydGFiIiwiYSI6ImNpcG9mMnV3ZDAxcHZmdG0zOWc1NjV2aGwifQ.89smGLtgJWmUKgd7B0cV1Q';
          var satellite =  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {attribution: mbAttr});
          var map = L.map('mimapa', {center: [-20.550508894195627, -66.62109375],zoom:7, maxZoom: 17, layers:satellite});

          map.createPane('labels');
          map.getPane('labels').style.zIndex = 650;
          map.getPane('labels').style.pointerEvents = 'none';

          var positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                  attribution:mbAttr,
                  pane: 'labels'
          }).addTo(map);

          $('#avatarNombre').append('<span class="glyphicon glyphicon-user"></span>');

     	var deafult=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: mbAttr});
     	var polyline = L.polyline(functionPuntos(), {color: '#0065fc',opacity:6.0}).addTo(map);//DIBUJO DEL MAPA DE POTOSI


     	var baseMaps = {"SATELITE":satellite,"DEFAULT": deafult};//Titulos Mapas
     	L.control.layers(baseMaps).addTo(map);


          var database = <?php echo json_encode($resultado['locaciones']) ?>;
          if (database) {
               $('.descripcion').text(database.descripcion);
               $('.objeto').text(database.nombre);
               var filename=database.filename;
               $.get('<?php echo URL?>locations/'+filename+'', function(data) {
                    if (data.getElementsByTagName('trkseg')[0]!=null) {
                         var tam=data.getElementsByTagName('trkseg').length-1,tam2=data.getElementsByTagName('trkseg')[tam].getElementsByTagName('trkpt').length-1;

                         var fullfecha=data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getElementsByTagName('time')[0].innerHTML.split("T");
                         fecha_start= fullfecha != null ? (fullfecha[0]):("sin fecha"),hora_start= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("Sin hora");
                         altura_start=data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getElementsByTagName('ele')[0] != undefined ? (data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getElementsByTagName('ele')[0].innerHTML+" m.s.n.m "):("Sin Altitud");

                         fullfecha=data.getElementsByTagName('trkseg')[tam].getElementsByTagName('trkpt')[tam2].getElementsByTagName('time')[0].innerHTML.split("T");
                         fecha_end= fullfecha != null ? (fullfecha[0]):("Sin Fecha"),hora_end= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("Sin hora");
                         altura_end=data.getElementsByTagName('trkseg')[tam].getElementsByTagName('trkpt')[tam2].getElementsByTagName('ele')[0] != undefined ? (data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getElementsByTagName('ele')[0].innerHTML+" m.s.n.m "):("Sin Altitud");

                         lugarinicial.push(data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getAttribute("lat"));lugarinicial.push(data.getElementsByTagName('trkseg')[0].getElementsByTagName('trkpt')[0].getAttribute("lon"));
                         lugarfinal.push(data.getElementsByTagName('trkseg')[tam].getElementsByTagName('trkpt')[tam2].getAttribute("lat"));lugarfinal.push(data.getElementsByTagName('trkseg')[tam].getElementsByTagName('trkpt')[tam2].getAttribute("lon"));
                         for (var i = 0; i < data.getElementsByTagName('trkseg').length; i++) {
                              locations=data.getElementsByTagName('trkseg')[i].getElementsByTagName('trkpt');
                              READ_LOCATION();
                         }
                    }else{
                         if (data.getElementsByTagName('rte')[0]!=null) {
                              var tam=data.getElementsByTagName('rte').length-1,tam2=data.getElementsByTagName('rte')[tam].getElementsByTagName('rtept').length-1;
                              var fullfecha=data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getElementsByTagName('time')[0].innerHTML.split("T");
                              fecha_start= fullfecha != null ? (fullfecha[0]):("sin fecha"),hora_start= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("Sin hora");
                              altura_start=data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getElementsByTagName('ele')[0] != undefined ? (data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getElementsByTagName('ele')[0].innerHTML+" m.s.n.m "):("Sin Altitud");
                              fullfecha=data.getElementsByTagName('rte')[tam].getElementsByTagName('rtept')[tam2].getElementsByTagName('time')[0].innerHTML.split("T");
                              fecha_end= fullfecha != null ? (fullfecha[0]):("Sin Fecha"),hora_end= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("Sin hora");
                              altura_end=data.getElementsByTagName('rte')[tam].getElementsByTagName('rtept')[tam2].getElementsByTagName('ele')[0] != undefined ? (data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getElementsByTagName('ele')[0].innerHTML+" m.s.n.m "):("Sin Altitud");

                              lugarinicial.push(data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getAttribute("lat"));lugarinicial.push(data.getElementsByTagName('rte')[0].getElementsByTagName('rtept')[0].getAttribute("lon"));
                              lugarfinal.push(data.getElementsByTagName('rte')[tam].getElementsByTagName('rtept')[tam2].getAttribute("lat"));lugarfinal.push(data.getElementsByTagName('rte')[tam].getElementsByTagName('rtept')[tam2].getAttribute("lon"));
                              for (var i = 0; i < data.getElementsByTagName('rte').length; i++) {
                                   locations=data.getElementsByTagName('rte')[i].getElementsByTagName('rtept');
                                   READ_LOCATION();
                              }
                         }else{
                              if (data.getElementsByTagName('wpt')!=null) {
                                   lugarinicial.push(data.getElementsByTagName('wpt')[0].getAttribute("lat"));lugarinicial.push(data.getElementsByTagName('wpt')[0].getAttribute("lon"));
                                   lugarfinal.push(data.getElementsByTagName('wpt')[data.getElementsByTagName('wpt').length-1].getAttribute("lat"));lugarfinal.push(data.getElementsByTagName('wpt')[data.getElementsByTagName('wpt').length-1].getAttribute("lon"));
                                   locations=data.getElementsByTagName('wpt');
                                   READ_LOCATION();
                              }
                         }
                    }
               }).fail(function(e) {
                   locations=[];
               });
          }
          //var markerSize = L.icon({iconUrl: '<?php echo URL?>public/images/logos/marker-icon.png',iconSize: [25, 50], });
          var SmallIcon = L.Icon.extend({
              options: {
                  shadowUrl: '<?php echo URL?>public/images/logos/marker-shadow.png',
                  iconSize:     [15, 20],
                  shadowSize:   [15, 20],
                  iconAnchor:   [7, 20],
                  shadowAnchor: [7, 20],
                  popupAnchor:  [0, -20]
              }
          });
          var LargeIcon = L.Icon.extend({
              options: {
                  shadowUrl: '<?php echo URL?>public/images/logos/marker-shadow.png',
                  iconSize:     [30, 35],
                  shadowSize:   [35, 40],
                  iconAnchor:   [15, 35],
                  shadowAnchor: [15, 35],
                  popupAnchor:  [0,-35]
              }
          });
          var markers=[],lines=[];
          var blueIcon = new SmallIcon({iconUrl: '<?php echo URL?>public/images/icons/marker-icon.png'});
          var redIcon = new LargeIcon({iconUrl: '<?php echo URL?>public/images/icons/marker-red.png'});
          var greenIcon = new LargeIcon({iconUrl: '<?php echo URL?>public/images/icons/marker-green.png'});

          function READ_LOCATION(){
               var acercamiento=17,animation={animate:true,duration:5.0,noMoveStart:true},zoom={animate:true};
               for (var i = 0; i < locations.length; i++) {
                    var fullfecha=locations[i].getElementsByTagName('time')[0] != undefined ? (locations[i].getElementsByTagName('time')[0].innerHTML.split("T")):(null),
                    fecha= fullfecha != null ? (fullfecha[0]):("sin fecha"),hora= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("sin hora"),
                    altitud=locations[i].getElementsByTagName('ele')[0] != undefined ? (locations[i].getElementsByTagName('ele')[0].innerHTML+" m.s.n.m "):("sin altitud"),
                    rowlines=[],lat=locations[i].getAttribute("lat"),lon=locations[i].getAttribute("lon");rowlines.push(parseFloat(lat));rowlines.push(parseFloat(lon));lines.push(rowlines);
                    var mark1=L.marker([lat, lon], {icon: blueIcon}).bindPopup('<b> Fecha: </b>'+fecha+'<br><b> Hora: </b>'+hora+'<br><b> Altitud: </b>'+altitud).openPopup();
                    mark1.setZIndexOffset(1);
                    markers.push(mark1);
               }
               layerGroup=L.layerGroup(markers).addTo(map);
               var polygon = L.polyline(lines,{color: "#ff0000",weight:2.3,opacity:6.0}).addTo(map);
               map.setView([lugarinicial[0], lugarinicial[1]],acercamiento, {zoom:zoom}, { pan: animation}); getData();

               var mark_start=L.marker([lugarinicial[0],lugarinicial[1]], {icon: greenIcon}).addTo(map).bindPopup('<b> Fecha: </b>'+fecha_start+'<br><b> Hora: </b>'+hora_start+'<br><b> Altitud: </b>'+altura_start),
               mark_end=L.marker([lugarfinal[0],lugarfinal[1]], {icon: redIcon}).addTo(map).bindPopup('<b> Fecha: </b>'+fecha_end+'<br><b> Hora: </b>'+hora_end+'<br><b> Altitud: </b>'+altura_end);
               mark_start.setZIndexOffset(1000);mark_end.setZIndexOffset(900);
          }
          function getData(){
               $.getJSON("http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=0&zoom=18&lat=" + lugarinicial[0]+ "&lon=" + lugarinicial[1] + "&json_callback=?",function (response) {
                    $('.lugarinicial').text(response.display_name);
               });
               $.getJSON("http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=0&zoom=18&lat=" + lugarfinal[0]+ "&lon=" + lugarfinal[1] + "&json_callback=?",function (response) {
                    $('.lugarfinal').text(response.display_name);
               });

          };


          // var smallIcon = L.Icon.extend({
          //     options: {
          //         shadowUrl: '<?php echo URL?>public/images/logos/marker-shadow.png',
          //         iconSize:     [20, 20],
          //         shadowSize:   [30, 30]
          //     }
          // });

    // create marker object, pass custom icon as option, add to map
    //var mark1 = L.marker([lat, lon], {icon: markerSize}).addTo(map);

          $('#btninfogps').focusout(function() {var outn=setInterval(function(){$('#panelinfo_gps').hide();clearInterval(outn);}, 400);});
          $('#btninfogps').focusin(function() {$('#panelinfo_gps').show();});
});
</script>
