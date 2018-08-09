<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SEDES | www.sedes.com</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" href="<?php echo URL;?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/sweetalert.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/admin.css">

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
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header" style="position:fixed;width:100%">
				<!-- Logo -->
				<a href="" class="logo" style="background-color: #0aacfb;">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini">
						<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">

					</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg">
						<div class="col-md-2" style="padding:0">
							<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">
						</div>
						<div class="col-md-10" style="padding-left:5px;paddding-right:0px">
							<h6 style="margin-top:12px;margin-bottom:0;color:#484a56">Limbert Arando Benavides</h6>
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
								<h3 style="color:#0aacfb;margin-bottom:0;margin-top:13px;margin-left:20px;font-weight:600">SERVÍCIO DEPARTAMENTAL DE SALUD</h3>
							</div>
						</div>
						<div class="col-md-5 col-sm-10 col-xs-10" style="padding:0" >
							<div class="col-md-9 col-sm-9 col-xs-9" style="padding:0">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1" style="font-size: 1.9em;margin-top:8px;padding-left:5px;color:#ffebb0;background-color: transparent !important;border:none !important;"></span>
									<input type="text" class="form-control" style="font-family:Arial, FontAwesome" id="inputsearch" aria-describedby="inputSuccess2Status" placeholder="Buscar...">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3" style="padding:0">
								<input type="button" value="BUSCAR" id="btnsearch">
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
							<a href="#">
								<i class="fa fa-medkit"></i>
								<span>Actividades</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href=""><i class="fa fa-circle-o"></i>Especialidades</a></li>
								<li><a href=""><i class="fa fa-circle-o"></i>Servicios</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-h-square"></i>
								<span>Lugares</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="/<?php echo FOLDER; ?>/Jefatura"><i class="fa fa-circle-o"></i>Jefaturas</a></li>
								<li><a href="/<?php echo FOLDER; ?>/Unidad"><i class="fa fa-circle-o"></i>Unidades</a></li>
							</ul>
						<li class="treeview">
							<a href="/<?php echo FOLDER; ?>/Vehiculo" style="cursor:pointer">
								<i class="fa fa-ambulance"></i><span>Vehiculos</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-file"></i>
								<span>Reportes</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href=""><i class="fa fa-circle-o"></i>Jefatura</a></li>
								<li><a href=""><i class="fa fa-circle-o"></i>Unidad</a></li>
								<li><a href=""><i class="fa fa-circle-o"></i>Usuario</a></li>
							</ul>
						</li>
						<li>
							<a href="/<?php echo FOLDER; ?>/Usuario" style="cursor:pointer">
								<i class="fa fa-user-md"></i><span>Usuarios</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-wrench"></i>
								<span>Configuraciones</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i>Usuarios</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i>Vehiculos</a></li>
							</ul>
						</li>
						<li>
							<a href="#" style="cursor:pointer">
								<i class="fa fa-bell"></i> <span>Notificaciones</span>
								<small class="label pull-right bg-red" style="display:none" id="cantobject"></small>
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
