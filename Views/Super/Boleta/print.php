<!DOCTYPE html>
<?php ob_start();$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
     $mesde=$months[intval(date('m',strtotime($resultado['boletas']['fecha_de']))) - 1];$mesa=$months[intval(date('m',strtotime($resultado['boletas']['fecha_hasta']))) - 1];
?>
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Boleta N° <?php echo $resultado['boletas']['id'];?></title>
          <style>
               html, body {
                    height: 100%;
                    font-family: Arial, Helvetica, sans-serif;
               }
               #tablamargen td{
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
                    text-align: justify;
                    font-weight: 600;
                    font-size: .8em;
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
               }
               tr{
                    padding: 0;
                    margin: 0;
               }
               small{
                    font-weight: 200;
                    color: #313131;
                    font-size: .98em;
               }
          </style>
     </head>
     <body >
          <?php $responsables="";
               for($i=0;$i< count($resultado["responsables"]);$i++){
                    if ($i==count($resultado["responsables"])-1) {
                         $responsables=$responsables . $resultado['responsables'][$i]['nombre']." ".$resultado['responsables'][$i]['apellido'];
                    }else{
                         $responsables=$responsables . $resultado['responsables'][$i]['nombre']." ".$resultado['responsables'][$i]['apellido']." , ";
                    }
               }
          ?>
          <img src="<?php echo URL;?>public/images/logos/logo.png" width="140px" style="position: absolute;z-index:-100">
          <p style="text-align:right;margin:0;padding:0;font-size:.9em;font-weight:200">Nro 00<?php echo $resultado['boletas']['id'];?></p>
          <h4 style="margin:6px 0 0 110px;color:#313131">Servicio Departamental de Salud Potosí</h4>
          <em style="margin:0 0 0 110px;color:#636363;font-size:.8em">Unidad Administrativa: <?php echo $resultado['boletas']['unidad'];?></em>
          <center><h2 style="margin:10px 0 0 0">Autorización Para Uso de Vehículos</h2></center>

          <table width="100%" cellspacing="0" cellpadding="0" style="margin:10px 0 40px 0" id="tablamargen">
               <tr>
                    <td colspan="2" style="background:#a7a7a7"><h4 style="text-align:center;color:#fff">INFORMACIÓN DEL VIAJE</h4></td>
               </tr>
               <tr>
                    <td colspan="2"><h4>OBJETIVO: <small><?php echo $resultado['boletas']['objetivo'];?></small></h4></td>
               </tr>
               <tr>
                    <td colspan="2"><h4>RESPONSABLES: <small><?php echo $responsables?></small></h4></td>
               </tr>
               <tr>
                    <td width="65%"><h4>CHOFER: <small><?php echo $resultado['boletas']['nombre']." (".$resultado['boletas']['brevet'].")";?></small></h4></td>
                    <td width="35%" style="background:#a7a7a7"><h4 style="text-align:center;color:#fff">INFORMACIÓN DEL VEHÍCULO</h4></td>
               </tr>
               <tr>
                    <td><h4>LUGAR(ES) :<small><?php echo $resultado['boletas']['lugares'];?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>TIPO DE VEHÍCULO <small><?php echo $resultado['boletas']['tipo'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>USO: <small><?php echo $resultado['boletas']['uso'];?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>MARCA <small><?php echo $resultado['boletas']['marca'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>FECHA DE : <small><?php echo date('d - ', strtotime($resultado['boletas']['fecha_de'])).$mesde.date(' - Y', strtotime($resultado['boletas']['fecha_de']))?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>NUMERO DE PLACA <small><?php echo $resultado['boletas']['placa'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>FECHA HASTA : <small><?php echo date('d - ', strtotime($resultado['boletas']['fecha_hasta'])).$mesa.date(' - Y', strtotime($resultado['boletas']['fecha_hasta']))?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>COLOR <small><?php echo $resultado['boletas']['color'];?></small></h4></td>
               </tr>

          </table>
          <table width="100%"  style="margin:0 0 60px 0">
               <tr>
                    <td><p>........................................................</p></td>
                    <td><p>........................................................................</p></td>
               </tr>
               <tr>
                    <td><h6 style="margin-bottom:20px">RESPONSABLE DE TRANSPORTE SEDES - POTOSÍ</h6></td>
                    <td><h6 style="margin-bottom:20px">RESPONSABLE UNIDAD ADMINISTRATIVA SEDES - POTOSÍ</h6></td>
               </tr>
               <tr>
                    <td colspan="2"><p>....................................................................</p></td>
               </tr>
               <tr>
                    <td colspan="2"><h6>JEFE DEL DPTO. DE ADMINISTRACIÓN Y FINANZAS SEDES</h6></td>
               </tr>
          </table>
          <hr style="color:#ababab;margin:0;padding:0">

          <img src="<?php echo URL;?>public/images/logos/logo.png" width="140px" style="position: absolute;z-index:-100">
          <p style="text-align:right;margin:40px 0 0 0;padding:0;font-size:.9em;font-weight:200">Nro 00<?php echo $resultado['boletas']['id'];?></p>
          <h4 style="margin:6px 0 0 110px;color:#313131">Servicio Departamental de Salud Potosí</h4>
          <em style="margin:0 0 0 110px;color:#636363;font-size:.8em">Unidad Administrativa: <?php echo $resultado['boletas']['unidad'];?></em>
          <center><h2 style="margin:10px 0 0 0">Autorización Para Uso de Vehículos</h2></center>
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:10px 0 40px 0" id="tablamargen">
               <tr>
                    <td colspan="2" style="background:#a7a7a7"><h4 style="text-align:center;color:#fff">INFORMACIÓN DEL VIAJE</h4></td>
               </tr>
               <tr>
                    <td colspan="2"><h4>OBJETIVO: <small><?php echo $resultado['boletas']['objetivo'];?></small></h4></td>
               </tr>
               <tr>
                    <td colspan="2"><h4>RESPONSABLES: <small><?php echo $responsables?></small></h4></td>
               </tr>
               <tr>
                    <td width="65%"><h4>CHOFER: <small><?php echo $resultado['boletas']['nombre']." (".$resultado['boletas']['brevet'].")";?></small></h4></td>
                    <td width="35%" style="background:#a7a7a7"><h4 style="text-align:center;color:#fff">INFORMACIÓN DEL VEHÍCULO</h4></td>
               </tr>
               <tr>
                    <td><h4>LUGAR(ES) :<small><?php echo $resultado['boletas']['lugares'];?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>TIPO DE VEHÍCULO <small><?php echo $resultado['boletas']['tipo'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>USO: <small><?php echo $resultado['boletas']['uso'];?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>MARCA <small><?php echo $resultado['boletas']['marca'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>FECHA DE : <small><?php echo date('d - ', strtotime($resultado['boletas']['fecha_de'])).$mesde.date(' - Y', strtotime($resultado['boletas']['fecha_de']))?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>NUMERO DE PLACA <small><?php echo $resultado['boletas']['placa'];?></small></h4></td>
               </tr>
               <tr>
                    <td><h4>FECHA HASTA : <small><?php echo date('d - ', strtotime($resultado['boletas']['fecha_hasta'])).$mesa.date(' - Y', strtotime($resultado['boletas']['fecha_hasta']))?></small></h4></td>
                    <td style="background:#f2f2f2"><h4>COLOR <small><?php echo $resultado['boletas']['color'];?></small></h4></td>
               </tr>

          </table>
          <table width="100%"  style="margin:0 0 0 0">
               <tr>
                    <td><p>........................................................</p></td>
                    <td><p>........................................................................</p></td>
               </tr>
               <tr>
                    <td><h6 style="margin-bottom:20px">RESPONSABLE DE TRANSPORTE SEDES - POTOSÍ</h6></td>
                    <td><h6 style="margin-bottom:20px">RESPONSABLE UNIDAD ADMINISTRATIVA SEDES - POTOSÍ</h6></td>
               </tr>
               <tr>
                    <td colspan="2"><p>....................................................................</p></td>
               </tr>
               <tr>
                    <td colspan="2"><h6>JEFE DEL DPTO. DE ADMINISTRACIÓN Y FINANZAS SEDES</h6></td>
               </tr>
          </table>
     </body>
</html>
