var imgData = 'data:image/jpeg;base64,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';
var lines=[],contadortotal=0,total=0,contador=0,locations=[],isPaused = true,descripciones=[];
function imprimir_JsPdf(datos,URL,button){
     if (datos) {
          $.get(URL+'locations/'+datos.filename+'', function(data) {
               if (data.getElementsByTagName('trkseg')[0]!=null) {
                    total=data.getElementsByTagName('trkseg').length;
                    for (var i = 0; i < data.getElementsByTagName('trkseg').length; i++) {
                         locations=data.getElementsByTagName('trkseg')[i].getElementsByTagName('trkpt');
                         READ_LOCATION(locations);
                    }
               }else{
                    if (data.getElementsByTagName('rte')[0]!=null) {
                         total=data.getElementsByTagName('rte').length;
                         for (var i = 0; i < data.getElementsByTagName('rte').length; i++) {
                              locations=data.getElementsByTagName('rte')[i].getElementsByTagName('rtept');
                              READ_LOCATION(locations);
                         }
                    }else{
                         if (data.getElementsByTagName('wpt')!=null) {
                              total=1;locations=data.getElementsByTagName('wpt');
                              READ_LOCATION(locations);
                         }
                    }
               }
          }).fail(function(e) {
              locations=[];
          });
     }
     function READ_LOCATION(locations){
          contadortotal++;contadorrow=locations.length;contador=0;
          for (var i = 0; i < locations.length; i++) {
               var rowlines=[];
               var fullfecha=locations[i].getElementsByTagName('time')[0] != undefined ? (locations[i].getElementsByTagName('time')[0].innerHTML.split("T")):(null);
               rowlines.push(i+1);rowlines.push(fullfecha != null ? (fullfecha[0]):("sin fecha"));rowlines.push(hora= fullfecha != null ? (fullfecha[1].substring(0,fullfecha[1].length-1)):("sin hora"));
               lines.push(rowlines);
          }
          for (var i = 0; i < locations.length; i++) {
               if (isPaused) {
                    isPaused=false;
                    try {
                         $.getJSON("http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=0&zoom=17&lat=" + locations[i].getAttribute("lat")+ "&lon=" + locations[i].getAttribute("lon") + "&json_callback=?",function (response) {
                              contador=contador+1;
                              isPaused=true;
                              descripciones.push(response.display_name);
                              if(total==contadortotal && contador==contadorrow){
                                   for (var i = 0; i < lines.length; i++) {
                                        lines[i].push(descripciones[i]);
                                   }
                                   var chofer=datos.chofer.toLowerCase(),vehiculo=datos.vehiculo.toLowerCase(),fecha=datos.fecha,inicio=descripciones[0].toString(),fin=descripciones[descripciones.length-1].toString(),descripcion=datos.descripcion.toLowerCase();
                                   var doc = new jsPDF('p', '', 'letter');
                                   //doc.addImage(imgData, 'JPEG', 15, 8, 40, 20);
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

                                   var $btn = $('#btnprint').button('loading');
                                   button.button('reset');
                              }
                         });
                    } catch (e) {
                         console.log("llego");
                         button.button('reset');
                    } finally {
                         console.log("lleg3333o");
                         isPaused=true;
                    }
               }
          }
     }
}

$(function(){
     console.log("aqui en jQuery");
});
