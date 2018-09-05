<!DOCTYPE html>
<?php ob_start();$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$mes=$months[intval($resultado['month']) - 1];
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
          <img src="<?php echo URL;?>public/images/logos/logo.png" width="140px" style="position: absolute;top:-25px;z-index:10">
          <center><h3>INFORME MENSUAL <br> <small> <?php echo $mes." ".$resultado['year']; ?></small></h3></center>
          <h5 style="z-index:10;margin-top:7px">CHOFER: <small><?php echo $resultado['chofer']['nombre']?></small> </h5>
          <h5>BREVET: <small><?php echo $resultado['chofer']['brevet']?></small> </h5>
          <table width="100%" style="margin-top:10px"  width="100%" cellspacing="0" cellpadding="0">
               <thead style="background:#bdbdbd;text-align:center">
                    <tr>
                         <td width="31%" rowspan="2">VEHICULO</td>
                         <td width="14%" rowspan="2">UNIDAD</td>
                         <td width="20%" rowspan="2">OBJETIVO</td>
                         <td width="25%" rowspan="2">LUGARES</td>
                         <td width="10%" colspan="2">FECHA</td>
                    </tr>
                    <tr>
                         <td width="7%">DE</td>
                         <td width="7%">HASTA</td>
                    </tr>
               </thead>
               <tbody>
                    <?php while($row=mysql_fetch_assoc($resultado["viajes"])): ?>
                         <tr>
                              <td style="text-align:left;padding-left:5px"><h5><?php echo $row['vehiculo']; ?> <small style="font-size:.8em"> <?php echo $row['marca'];?></small> </h5></td>
                              <td><h5><?php echo $row['unidad']; ?></h5></td>
                              <td><h5><?php echo $row['objetivo']; ?></h5></td>
                              <td><h5><?php echo $row['lugares']; ?></h5></td>
                              <td><h5><?php echo $row['fecha_de']; ?></h5></td>
                              <td><h5><?php echo $row['fecha_hasta']; ?></h5></td>
                         </tr>
                    <?php endwhile; ?>
               </tbody>
          </table>
     </body>
</html>
