function imprimir_JsPdf(datos,URL,get_id,GEOCODE){
     var ALL_DATA=[],TYPE="";
     var lines=[],contadortotal=0,total=0,locations=[],descripciones=[],Numeracion=1,Numeracion_GPS=1,totalrutas=0;
     if (datos) {
          $.get(URL+'locations/'+datos.filename+'', function(data) {
               if (data.getElementsByTagName('trkseg')[0]!=null) {
                    ALL_DATA=data.getElementsByTagName('trkseg');
                    TYPE="trkpt";
                    total=ALL_DATA.length;
                    for (var i = 0; i < ALL_DATA.length; i++) {
                         totalrutas=totalrutas+ALL_DATA[i].getElementsByTagName('trkpt').length;
                    }
                    READ_LOCATION(ALL_DATA[0].getElementsByTagName('trkpt'));
               }else{
                    if (data.getElementsByTagName('rte')[0]!=null) {
                         ALL_DATA=data.getElementsByTagName('rte');
                         TYPE="rtept";
                         total=ALL_DATA.length;
                         for (var i = 0; i < ALL_DATA.length; i++) {
                              totalrutas=totalrutas+ALL_DATA[i].getElementsByTagName('rtept').length;
                         }
                         READ_LOCATION(ALL_DATA[0].getElementsByTagName('rtept'));
                    }else{
                         if (data.getElementsByTagName('wpt')!=null) {
                              ALL_DATA=data.getElementsByTagName('wpt');
                              total=1;totalrutas=ALL_DATA.length;
                              READ_LOCATION(ALL_DATA);
                         }
                    }
               }
          }).fail(function(e) {
              locations=[];
          });
     }
     function READ_LOCATION(locations){
          console.log("total",total,"contadortotal",contadortotal);
          for (var i = 0; i < locations.length; i++) {
               var rowlines=[];
               var fullfecha=locations[i].getElementsByTagName('time')[0] != undefined ? (locations[i].getElementsByTagName('time')[0].innerHTML.split("T")):(null);
               rowlines.push(Numeracion);rowlines.push(fullfecha != null ? (fullfecha[0]):("sin fecha"));rowlines.push(hora= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("sin hora"));
               Numeracion=Numeracion+1;
               lines.push(rowlines);
          }
          for (var i = 0; i <  locations.length; i++) {
               (function (i) {
                    setTimeout(function () {
                         GEOCODE.reverse().latlng([locations[i].getAttribute("lat"), locations[i].getAttribute("lon")]).run(function(error, result) {
                              Numeracion_GPS++;
                              descripciones.push(result.address.City+", "+result.address.Subregion+", "+result.address.Address);
                              $('#progress_row h6').text("Total Rutas:  "+totalrutas+"   ->   Avance: "+Numeracion_GPS+" de "+totalrutas);
                              var val=Numeracion_GPS/totalrutas;var percetage=Math.round(val*100);
                              console.log(percetage,"==",val);
                              $('#progress_download').css("width",percetage+"%");
                    		$('#progress_download').text((percetage-1)+"%");
                              if (i==locations.length-1) {
                                   contadortotal=contadortotal+1;
                                   if (contadortotal==total) {
                                        $('#progress_row').hide();
                                        $('#progress_download').css("width","0%");
                              		$('#progress_download').text("0%");
                                        Download_Render();
                                   }else{
                                        get_Locations_ROW(contadortotal);
                                   }
                              }
                         });
                    }, 550*i);
               })(i);
          };
     }
     function Download_Render(){
          for (var i = 0; i < lines.length; i++) {
               lines[i].push(descripciones[i]);
          }
          var chofer=datos.chofer.toLowerCase(),vehiculo=datos.vehiculo.toLowerCase(),inicio=descripciones[0].toString(),fin=descripciones[descripciones.length-1].toString(),fecha=datos.fecha,descripcion=datos.descripcion.toLowerCase();
          var doc = new jsPDF('p', '', 'letter');
          doc.setFontType("bold");
          doc.text(105, 20, 'REPORTE DE VIAJE', null, null, 'center');
          doc.setFontSize(11);
          doc.text(20, 30, 'CHOFER:');
          doc.text(105, 30, 'FECHA: ');
          doc.text(20, 35, 'VEHICULO: ');
          doc.text(105, 35, 'DESCRIPCIÓN: ');
          doc.text(20, 40, 'INICIO: ');
          doc.text(20, 45, 'FIN:');
          doc.setFontSize(9);
          doc.setFontType("normal");
          doc.text(39, 30, chofer);
          doc.text(42, 35, vehiculo);
          doc.text(35, 40, inicio);
          doc.text(30, 45, fin);
          doc.text(121, 30, fecha);
          doc.text(135, 35, descripcion);

          var columns = ["N°", "FECHA", "HORA", "DESCRIPCION"];
          doc.autoTable(columns, lines, {
              columnStyles: {
                  id: {fillColor: 200}
              },
              startY: 50,
              pageBreak: 'auto',
              styles:{
                   cellPadding: 1, // a number, array or object (see margin below)
                   font: "helvetica", // helvetica, times, courier
                   overflow: 'ellipsize', // visible, hidden, ellipsize or linebreak
                   halign: 'center', // left, center, right
                   valign: 'middle', // top, middle, bottom
                   columnWidth: 'auto'
              },
              theme: 'grid',
          });
          doc.save('reporte.pdf');
          $('#btnprint'+get_id).button('reset');
          $(".btn_all_print").attr('disabled', false);
     }
     function get_Locations_ROW(row){
          READ_LOCATION(ALL_DATA[row].getElementsByTagName(TYPE));
     }
}
