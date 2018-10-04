<!DOCTYPE html>
<?php ob_start();$months=["Enero","Febrero","Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
     $mes=$months[intval(date('m',strtotime($resultado['fecha']))) - 1];
?>
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Instructivo N° <?php echo $resultado['id'];?></title>
          <style>
               *{ font-family: verdana, sans-serif !important;}
               html, body {
                    height: 100%;
               }
               p {
                    line-height: 1.5em;
                    font-family: "Courier";
                    text-align: justify;
               }
               td{
                    line-height: 1.3em;
               }
          </style>
     </head>
     <body  style="margin:0 0 0 35px">
          <img src="<?php echo URL;?>public/images/logos/logo.jpg" width="90px" style="position: absolute;">
          <table width="100%" style="margin:30px 0 0 0">
               <tr>
                    <td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td>
                    <td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td><td width="10%"></td>
               </tr>
               <tr>
                    <td colspan="10"><div align="center"> <u><h2 style="line-height:30px">INSTRUCTIVO DE VIAJE <br> SEDES / UNI / TRANSP./ 0<?php echo $resultado['codigo']." / ".date('Y', strtotime($resultado['fecha']))?></h2></u></div><br><br></td>
               </tr>
               <tr>
                    <td colspan="2"><b>A : </b> <br></td>
                    <td colspan="8">Sr. <?php echo ucwords(strtolower($resultado['nombre']))?><br><b>CONDUCTOR SEDES-POTOSI</b><br><br></td>
               </tr>
               <tr>
                    <td colspan="2"><b>DE:</b><br> </td>
                    <td colspan="8"> Sr. <?php echo ucwords(strtolower($resultado['usuario']))?><br> <b>RESPONSABLE TRANSPORTES SEDES POTOSI</b><br><br></td>
               </tr>
               <tr>
                    <td colspan="2"><b>FECHA: </b></td>
                    <td colspan="8"><?php echo date('d-', strtotime($resultado['fecha'])).$mes.date('-Y', strtotime($resultado['fecha']))?></td>
               </tr>
          </table>
          <hr style="color:#c1c1c1;background:#c1c1c1">
          <p><?php echo $resultado['descripcion'];?></p><br>
          <p>El incumplimiento ser&aacute; sujeto a la aplicaci&oacute;n de las disposiciones en actual vigencia, con este motivo, saludo a usted con las consideraciones m&aacute;s distinguidas.</p></td>
          <br><br><br><br><br><p>Atentamente,</p>
     </body>
</html>
