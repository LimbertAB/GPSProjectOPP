<!DOCTYPE html>
<?php ob_start();$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
?>
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Reporte Mensual de Viajes</title>
          <style>
          html, body {
               height: 100%;
               font-family: Arial, Helvetica, sans-serif;
          }
          table td{
               border: 1px solid #8b8b8b;
          }
          p {
               font-family: Arial, Helvetica, sans-serif;
               text-align: justify;
               margin: 0;
               padding: 0;
               text-align: center;
          }
          h4 {
               font-family: Arial, Helvetica, sans-serif;
               font-weight: 600;
               font-size: .9em;
               margin: 2px 1px 2px 10px;
          }
          h6{
               font-weight: 200;
               font-size: .7em;
               margin: 0px;
               text-align: center;
          }
          td{
             line-height: 1.3em;
             padding: 0;
             margin: 0;
             text-align: center;
          }
          tr{
               padding: 0;
               margin: 0;
          }
          small{
               font-weight: 200;
               color: #757575;
               font-size: .98em;
          }
          h5{
               margin:3px;padding:0;
               font-weight:200;font-size: .7em;
          }
          h3{
               margin: 0;padding: 0;
          }
          </style>
     </head>
     <body >
          <img src="<?php echo URL;?>public/images/logos/logo.jpg" width="80px" style="position: absolute;top:-25px;z-index:10">
          <center><h3>REPORTE DE VIAJES <br> <small  style="font-size:.7em"> <?php echo "DESDE:".$resultado['desde']."  HASTA:".$resultado['hasta']; ?></small></h3></center>
          <h5 style="z-index:10;margin-top:20px">CHOFER: <small><?php echo $resultado['chofer']['nombre']?></small> </h5>
          <h5>BREVET: <small><?php echo $resultado['chofer']['brevet']?></small> </h5>
          <table width="100%" style="margin-top:6px"  width="100%" cellspacing="0" cellpadding="0">
               <thead style="background:#bdbdbd;text-align:center">
                    <tr>
                         <td width="15%" rowspan="2">VEHICULO</td>
                         <td width="14%" rowspan="2">LUGARES DE VISITA / MUNICIPIOS</td>
                         <td width="10%" rowspan="2">JEFATURA Y/O UNIDAD</td>
                         <td width="18%" rowspan="2">RESPONSABLES</td>
                         <td width="12%" colspan="2">FECHA</td>
                    </tr>
                    <tr>
                         <td width="7%">DE</td>
                         <td width="7%">HASTA</td>
                    </tr>
               </thead>
               <tbody>
                    <?php for($i=0;$i< count($resultado['boletas']);$i++){?>
                         <tr>
                              <td  style="text-align:left;padding-left:4px;text-transform: lowercase"><h5 style="line-height: 1.2em;"><?php echo $resultado['boletas'][$i]['vehiculo']; ?></h5></td>
                              <td  style="text-transform: lowercase">
                                   <h5 style="line-height: 1em;">
                                        <?php
                                        echo $resultado['boletas'][$i]['ciudad']." -  ".$resultado['boletas'][$i]['lugares'];
                                        if ($resultado['boletas'][$i]['establecimiento']!=null) {
                                             echo $resultado['boletas'][$i]['establecimiento'];
                                        }else{
                                             if ($resultado['boletas'][$i]['municipio']!=null) {
                                                  echo $resultado['boletas'][$i]['municipio'];
                                             }else{
                                                  if ($resultado['boletas'][$i]['redsalud']!=null) {
                                                       echo $resultado['boletas'][$i]['redsalud'];
                                                  }
                                             }
                                        }?>
                                   </h5>
                              </td>
                              <td  style="text-transform: lowercase"><h5 style="line-height: 1em;"><?php echo $resultado['boletas'][$i]['unidad']; ?></h5></td>
                              <td>
                                   <?php for($j=0;$j< count($resultado['boletas'][$i]['responsables']);$j++){?>
                                        <h5 style="margin:3px 5px 3px 5px;line-height: 1em;text-transform: lowercase;text-align:left"><strong><?php echo $j+1?>. </strong><?php echo $resultado['boletas'][$i]['responsables'][$j]["nombre"]; ?></h5>
                                   <?php } ?>
                              </td>
                              <td><h5><?php echo $resultado['boletas'][$i]['fecha_de']; ?></h5></td>
                              <td><h5><?php echo $resultado['boletas'][$i]['fecha_hasta']; ?></h5></td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>
     </body>
</html>
