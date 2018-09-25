<a target="_blank" href="/<?php echo FOLDER;?>/Cronograma/printpdf/<?php echo  $resultado["cronograma"]['id']?>"><div class="fab"><span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size:.7em"></span></div></a>
<h2 class="text-center" style="margin:5px 0 1px 0;font-weight:300">LISTA DE BOLETAS DE CRONOGRAMA - <?php echo  $resultado["cronograma"]['id']?></h2>
<div class="row">
     <div class="col-md-4 col-md-offset-2">
          <h4>Fecha de: <small> <?php echo  $resultado["cronograma"]['fecha_de']?></small> </h4>
     </div>
     <div class="col-md-4">
          <h4>Fecha Hasta: <small> <?php echo  $resultado["cronograma"]['fecha_hasta']?></small></h4>
     </div>
</div>
<div class="row" style="margin:0"> <!-- SECTION TABLE USERS -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:0">
		<div class="table-responsive">
			<table id="tableboletas" class="table table-striped table-condensed table-hover">
                    <thead>
                         <tr style="background-color: #313131">
                              <th rowspan="20" width="20%" style="padding-bottom:10px;">vehiculo</th>
                              <th rowspan="20" width="20%" style="padding-bottom:10px;">chofer</th>
                              <th rowspan="15" width="10%" style="padding-bottom:10px;">lugar / municipio</th>
                              <th rowspan="15" width="10%" style="padding-bottom:10px;">objetivo</th>
                              <th rowspan="15" width="10%" style="padding-bottom:10px;">responsables</th>
                              <th width="10%" colspan="2" style="padding:0;margin:0">fecha</th>
                              <th rowspan="2" width="10%" style="padding-bottom:10px;">opción</th>
                         </tr>
                         <tr style="background-color: #555555">
                              <th width="8%" style="padding:0;margin:0;font-size:.9em">inicio</th>
                              <th width="8%" style="padding:0;margin:0;font-size:.9em">fin</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php for($i=0;$i< count($resultado['cronograma_boletas']);$i++){?>
                              <tr>
                                   <td  style="text-align:left;padding-left:4px;text-transform: lowercase;vertical-align:inherit"><h5 style="line-height: 1.2em;"><?php echo $resultado['cronograma_boletas'][$i]['vehiculo']; ?></h5></td>
                                   <td  style="text-align:left;padding-left:4px;text-transform: lowercase;vertical-align:inherit"><h5 style="line-height: 1.2em;"><?php echo $resultado['cronograma_boletas'][$i]['chofer']; ?></h5></td>
                                   <td  style="text-transform: lowercase;vertical-align:inherit"><h5 style="line-height: 1em;"><?php echo $resultado['cronograma_boletas'][$i]['lugares']; ?></h5></td>
                                   <td  style="text-transform: lowercase;vertical-align:inherit"><h5 style="line-height: 1em;"><?php echo $resultado['cronograma_boletas'][$i]['objetivo']; ?></h5></td>
                                   <td style="vertical-align:inherit">
                                        <?php for($j=0;$j< count($resultado['cronograma_boletas'][$i]['responsables']);$j++){?>
                                             <h5 style="margin:0px 2px 0px 2px;line-height: 1em;text-transform: lowercase;text-align:left"><strong><?php echo $j+1?>. </strong><?php echo $resultado['cronograma_boletas'][$i]['responsables'][$j]["nombre"]; ?></h5>
                                        <?php } ?>
                                   </td>
                                   <td style="vertical-align:inherit"><h5><?php echo $resultado['cronograma_boletas'][$i]['fecha_de']; ?></h5></td>
                                   <td style="vertical-align:inherit"><h5><?php echo $resultado['cronograma_boletas'][$i]['fecha_hasta']; ?></h5></td>
                                   <td style="vertical-align:inherit">
                                        <a data-target="#verboletaModal" data-toggle="modal" onclick="verAjax(<?php echo $resultado['cronograma_boletas'][$i]['id']?>)"><button title="ver boleta" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
                                        <a target="_blank" href="/<?php echo FOLDER;?>/Boleta/printpdf/<?php echo $resultado['cronograma_boletas'][$i]['id'];?> "><button title="imprimir boleta" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>
<?php include 'modalverboleta.php';?>
<div class="row" id="alert_empty"> <!-- SECTION EMPTY TABLE -->
     <?php if(count($resultado['cronograma_boletas'])<1):?>
          <div class="col-md-12">
               <div class="alert alert-error alert-dismissible" role="alert">
               <strong>MENSAJE DE ALERTA!</strong> No se encontraron BOLETAS registradas en este Cronograma.
               </div>
          </div>
     <?php endif;?>
</div>
<script>
   	var id_boleta=[];
    $(document).ready(function(){
          var aux= '<?php echo $resultado["cronograma"]['fecha_de']?>';
          var aux2= '<?php echo $resultado["cronograma"]['fecha_hasta']?>';
          $('#datetimepicker1 input').val(aux);$('#datetimepicker1 input').attr('placeholder',aux);
          $('#datetimepicker2 input').val(aux2);$('#datetimepicker2 input').attr('placeholder',aux2);

		$('#inputsearch').keyup(function(){$('#myTabs a[href="#todos"]').tab('show');
			var data=$(this).val().toLowerCase().trim();SEARCH_DATA(data,"tableboletas","No se encontraron coincidencias en este Cronograma");});
	});
     function verAjax(val){
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
