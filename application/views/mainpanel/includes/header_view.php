<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Zona de Administración :: Sistemas de Tiempo ::</title>
        <base href="<?php echo base_url(); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sistemas de Tiempo">
        <meta name="author" content="Sistemas de Tiempo">
	<!-- jQuery UI -->
	<script src="assets/mainpanel/charisma/js/jquery-1.7.2.min.js"></script>   
	<!-- The styles -->
	<link id="bs-css" href="assets/mainpanel/charisma/css/bootstrap-united.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="assets/mainpanel/charisma/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/mainpanel/charisma/css/charisma-app.css" rel="stylesheet">
	<link href="assets/mainpanel/charisma/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='assets/mainpanel/charisma/css/fullcalendar.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='assets/mainpanel/charisma/css/chosen.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/uniform.default.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/colorbox.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.noty.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/noty_theme_default.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/elfinder.min.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/elfinder.theme.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/opa-icons.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/uploadify.css' rel='stylesheet'>
	<link rel="stylesheet" href="assets/mainpanel/charisma/colorpicker/css/colorpicker.css" type="text/css" />
	<link rel="stylesheet" href="assets/mainpanel/charisma/colorpicker/css/layout.css" type="text/css" />	

	<link href="assets/mainpanel/charisma/css/julio_css.css" rel="stylesheet">   

    <?php 
    if($current_section=='mensajes'){?>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
    <?php
	}
    ?> 
    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>    -->     
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

        <script src="assets/3rf3rf3rf3editor/ckeditor.js"></script>
        <!-- jQuery -->

		<link href="assets/mainpanel/charisma/css/jquery.datetimepicker.css" rel="stylesheet">     
</head>

<body onload="initialize()">
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="./"> 
                                    <!--<img alt="Charisma Logo" src="img/logo20.png" />--> <span>Sistemas de T.</span></a>
				
				<!-- theme selector starts -->
<!--				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Cambiar Tema</span>
						<span class="caret"></span>
					</a>-->
<!--					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>-->
				<!--</div>-->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
<!--						<li><a href="#">PERFIL</a></li>-->
						<li class="divider"></li>
						<li><a href="mainpanel/logout">SALIR</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
                                            <li><a href="<?php echo base_url(); ?>" target="_blank">Ir a la Web</a></li>
                                            <li><a href="javascript:void(0)">Bienvenido: <?php echo $this->session->userdata('nombre_admin'); ?></a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<div class="container-fluid">
		<div class="row-fluid">
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
                                <?php echo $lista_menu; ?>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->