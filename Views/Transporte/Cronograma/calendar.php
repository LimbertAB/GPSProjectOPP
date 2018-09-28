<center>
     <h2>CRONOGRAMA GENERAL DE VIAJES</h2>
</center>
<div id='calendar'></div>
<?php include 'modalverboleta.php';?>
<style>table thead tr {background: none;}table>thead>tr>th {color: #827a90;font-weight: 600;}</style>
<script>
     var id_persona_u,id_user_u;
     var users_array=['Super Administrador','Administrador','Jefe de Transporte'];
     $(document).ready(function(){
          function getRandomColor() {var letters = '0123456789ABCDEF'.split(''),color = '#';for (var i = 0; i < 6; i++ ) {color += letters[Math.floor(Math.random() * 16)];}return color;} //random color
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
     function verboletaAjax(val){
		$.ajax({
			url: '<?php echo URL;?>Boleta/ver/'+val,
			type: 'get',
			success:function(obj){
				var data = JSON.parse(obj);
                    $('.unombre h5').text(data.boletas.nombre);
				$('.unombre p').text(data.boletas.brevet);
				$('.uactividad').text(data.boletas.objetivo);
				$('.uviaje').text(data.boletas.tipo + data.boletas.placa);
				$('.uciudad').text(data.boletas.lugares);
				$('.ulugar').text(data.boletas.lugar);
				$('.uestablecimiento').text(data.boletas.unidad);
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
</script>
