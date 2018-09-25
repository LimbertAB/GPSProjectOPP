<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SEDES | www.sedes.com</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php echo URL;?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/sweetalert.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/admin.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/gps.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/fullcalendar.min.css">
		<script src="<?php echo URL;?>public/js/jQuery-2.1.4.min.js"></script>
		<script src="<?php echo URL;?>public/js/moment.min.js"></script>
		<script src="<?php echo URL;?>public/js/app.min.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap-datetimepicker.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap-select.min.js"></script>
		<script src="<?php echo URL;?>public/js/es.js"></script>
		<script src="<?php echo URL;?>public/js/sweetalert.min.js"></script>
		<script src="<?php echo URL;?>public/js/Chart.bundle.min.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
		<script src="<?php echo URL;?>public/js/admin.js"></script>
		<script src="<?php echo URL;?>public/js/puntos.js"></script>
		<script src="<?php echo URL;?>public/js/fullcalendar.min.js"></script>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header" style="position:fixed;width:100%">
				<!-- Logo -->
				<a href="" class="logo col-md-12 hidden-xs" style="background-color: #0aacfb;">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini">
						<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">

					</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg">
						<div class="col-md-2" style="padding:0">
							<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">
						</div>
						<?php $session=Session::getSession('Usuario');?>
						<div class="col-md-10" style="padding-left:5px;paddding-right:0px">
							<h6 style="margin-top:12px;margin-bottom:0;color:#484a56"><?php echo $session['nombre']?></h6>
							<h5 style="margin-top:0px;font-weight:700">ADMINISTRADOR</h5>
						</div>
					</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation" style="background-color: #ffffff;">
					<!-- Sidebar toggle button-->
					<div class="col-md-12">
						<div class="col-md-1 col-sm-2 col-xs-2" style="padding:0">
							<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="font-size:1.5em;padding-top:10px;padding-bottom:10px">
								<span class="sr-only"></span>
							</a>
						</div>
						<div class="col-md-6 hidden-sm hidden-xs" style="padding:0">
							<div style="float:left">
								<h3 id="hidetittlegps" style="color:#0aacfb;margin-bottom:0;margin-top:13px;margin-left:20px;font-weight:600">SERVÍCIO DEPARTAMENTAL DE SALUD</h3>
								<h4 id="showtittlegps" style="color:#0aacfb;margin-bottom:0;margin-top:16px;margin-left:10px;font-weight:700;display:none;text-transform:capitalize"><?php echo isset($resultado['objeto']['nombre']) ? $resultado['objeto']['nombre']:"";?> <small> <?php echo  isset($resultado['objeto']['document']) ? $resultado['objeto']['document'] : "";?></small></h4>
							</div>
						</div>
						<div class="col-md-5 col-sm-10 col-xs-10" style="padding:0" >
							<div class="col-md-9 col-sm-9 col-xs-9" style="padding:0">
								<div class='input-group date' id='datetimepickermes' style="margin-top:8px;display:none">
						  		   	<input  readonly type='text' value="<?php echo isset($resultado['date']) ? $resultado['date']:""?>" class="form-control" placeholder="<?php echo isset($resultado['date']) ? $resultado['date']:""?>"/>
						  		 	<span class="input-group-addon">
						  		    		<span class="glyphicon glyphicon-calendar"></span>
						  		 	</span>
						  	     </div>
								<div class="input-group" id="hidegps">
									<span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1" style="font-size: 1.9em;margin-top:8px;padding-left:5px;color:#ffebb0;background-color: transparent !important;border:none !important;"></span>
									<input type="text" class="form-control" style="font-family:Arial, FontAwesome" id="inputsearch" aria-describedby="inputSuccess2Status" placeholder="Buscar...">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3" style="padding:0">
								<button type="button" class="btn btn-info" name="button" id="btninfogps" style="margin:8px 0 0 30px;display:none;display:right">Info  <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
								<input type="button" value="BUSCAR" id="btnsearch">
							</div>
							<div class="list-group col-md-8 col-sm-8 col-xs-8" style="position:absolute;top:46px;left:55px;max-height:400px;overflow-y: auto;padding-right: 0px" id="searchprincipal">
							</div>
							<div class="panel panel-default" style="position:absolute;top:43px;right:-10px;width: 300px;padding-right: 0px;display:none" id="panelinfo_gps">
							  	<div class="panel-heading" style="background:#00cee5">
									<?php $img=['people','car2'] ?>
								  	<img src="<?php echo URL; ?>public/images/icons/<?php echo $img[isset($resultado['mode'])?$resultado['mode']:0]?>.jpg" alt="profile" class="center-block" width="90px" style="margin-top:0px">
							    		<h3 class="panel-title text-center" style="color:#fff;font-weight:400;font-size:.9em;line-height: 12px;text-transform:uppercase;margin-bottom:5px"><?php echo isset($resultado['objeto']['nombre']) ? $resultado['objeto']['nombre']:"";?></h3>
									<div class="row">
										<div class="col-md-12">
								              <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="text-align:right;color:#757777;padding-left:0;margin:0;line-height: 12px;"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> <?php echo isset($resultado['objeto']['marca']) ? $resultado['objeto']['marca']:"Chofer";?></p>
								              <p class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="text-align:left;color:#757777;padding-right:0;margin:0"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> <?php echo isset($resultado['objeto']['document']) ? $resultado['objeto']['document']:"";?></p>
								          </div>
									</div>
							  	</div>
							  	<div class="panel-body" style="padding:10px 15px 10px 15px;overflow-y: auto;max-height:60vh;" >
									<div class="row">
										<div class="col-md-2 col-lg-2 hidden-sm hidden-xs">
											<?php $img1=['car','005-man'] ?>
											<img src="<?php echo URL; ?>public/images/icons//32/<?php echo $img1[isset($resultado['mode'])?$resultado['mode']:0]?>.png" alt="profile" class="center-block" width="30px" style="margin-top:0px">
										</div>
										<div class="col-md-10">
											<p style="margin:0;font-size:.8em;line-height: 8px;color:#00cee5">CHOFER</p>
											<p style="color:#737373;margin:0" class="objeto">Chofer no encontrado</p>
										</div>
									</div><hr style="margin:10px 0 10px 0">
									<div class="row">
										<div class="col-md-2 col-lg-2 hidden-sm hidden-xs" style="vertical-align:inherit;height:100%">
											<img src="<?php echo URL; ?>public/images/icons//32/internadofecha.png" alt="profile" class="center-block" width="30px" style="margin-top:0px;vertical-align:inherit">
										</div>
										<div class="col-md-10">
											<p style="margin:0;font-size:.8em;line-height: 8px;color:#00cee5">FECHA</p>
											<p style="color:#737373;margin:0"><?php echo isset($resultado['date']) ? $resultado['date']:"";?></p>
										</div>
									</div><hr style="margin:10px 0 10px 0">
									<div class="row">
										<div class="col-md-2 col-lg-2 hidden-sm hidden-xs" style="vertical-align:inherit;height:100%">
											<img src="<?php echo URL; ?>public/images/icons//32/007-man-1.png" alt="profile" class="center-block" width="30px" style="margin-top:0px;vertical-align:inherit">
										</div>
										<div class="col-md-10">
											<p style="margin:0;font-size:.8em;line-height: 8px;color:#00cee5">DECRIPCIÓN</p>
											<p style="line-height: 14px;color:#737373;margin:0" class="descripcion">Sin descripción</p>
										</div>
									</div><hr style="margin:10px 0 10px 0">
									<div class="row">
										<div class="col-md-2 col-lg-2 hidden-sm hidden-xs" style="vertical-align:inherit;height:100%">
											<img src="<?php echo URL; ?>public/images/icons//32/pointer1.png" alt="profile" class="center-block" width="30px" style="margin-top:0px;vertical-align:inherit">
										</div>
										<div class="col-md-10">
											<p style="margin:0;font-size:.8em;line-height: 8px;color:#00cee5">LUGAR INICIAL</p>
											<p style="line-height: 14px;color:#737373;margin:0" class="lugarinicial">Sin localizaciones</p>
										</div>
									</div><hr style="margin:10px 0 10px 0">
									<div class="row">
										<div class="col-md-2 col-lg-2 hidden-sm hidden-xs" style="vertical-align:inherit;height:100%">
											<img src="<?php echo URL; ?>public/images/icons//32/pointer.png" alt="profile" class="center-block" width="30px" style="margin-top:0px;vertical-align:inherit">
										</div>
										<div class="col-md-10">
											<p style="margin:0;font-size:.8em;line-height: 8px;color:#00cee5">LUGAR FINAL</p>
											<p style="line-height: 14px;color:#737373;margin:0" class="lugarfinal">Sin localizaciones</p>
										</div>
									</div>
							  	</div>
							</div>
						</div>
					</div>
				</nav>
			</header>
			<!-- columna izquierda. contenidos y  logos -->
			<aside class="main-sidebar" style="background-color: #1a161d;">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar" style="position:fixed;width:230px">
					<!-- Sidebar user panel -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header" style="padding-top:0;padding-bottom:0"></li>
						<li>
							<a href="/<?php echo FOLDER; ?>/Principal">
								<i class="fa fa-home"></i> <span>Inicio</span>
							</a>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Responsable">
								<i class="fa fa-group"></i>
								<span>Responsables</span>
							</a>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Chofer">
								<i class="fa fa-street-view"></i>
								<span>Choferes</span>
							</a>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Vehiculo" style="cursor:pointer">
								<i class="fa fa-car"></i><span>Vehiculos</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-institution"></i>
								<span>Lugares</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="/<?php echo FOLDER; ?>/Jefatura"><i class="fa fa-circle-o"></i>Jefaturas</a></li>
								<li><a href="/<?php echo FOLDER; ?>/Unidad"><i class="fa fa-circle-o"></i>Unidades</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Gps" style="cursor:pointer">
								<i class="fa fa-map-marker"></i><span>GPS</span>
							</a>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Cronograma" style="cursor:pointer">
								<i class="fa fa-calendar-check-o"></i><span>Cronogramas</span>
							</a>
						</li>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Reporte/viaje" style="cursor:pointer">
								<i class="fa fa-file"></i><span>Reporte de Viajes</span>
							</a>
						</li>
						<li>
							<a href="/<?php echo FOLDER; ?>/Usuario" style="cursor:pointer">
								<i class="fa fa-group"></i><span>Usuarios</span>
							</a>
						</li>
						<li>
							<a href="/<?php echo FOLDER;?>/Usuario/destroySession" style="cursor:pointer">
								<i class="fa fa-sign-out"></i> <span>Salir</span>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			<!--Contenido-->
			<div class="content-wrapper" id="contenedor" style="margin-top:50px">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<!--Contenido-->
