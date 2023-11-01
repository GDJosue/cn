<!DOCTYPE HTML>
<html>
	<head>	
		<title>Caballo Negro Chess Club</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="<?=base_url?>images/logoCNCCsf.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?=base_url?>assets/css/main.css" />
	</head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-QE3Z12X3TG"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-QE3Z12X3TG');
    </script>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="<?=base_url?>inicio/inicio">Caballo Negro Chess Club</a></h1>
						<nav class="links">
							<ul>
								<li><a href="<?=base_url?>inicio/inicio">¿Quiénes somos?</a></li>
								<li><a href="<?=base_url?>inicio/salonFama">Miembros CNCC</a></li>
								<li><a href="<?=base_url?>torneo/tablaRendimiento">Tabla de rendimiento</a></li>
								<?php if (isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true): ?>
								<li><a href="<?=base_url?>administracion/index">Administración</a></li>
								<?php endif; ?>
								<li><a href="<?=base_url?>noticias/inicio">Noticias</a></li>
								<?php if (!isset($_SESSION["identidad"])): ?>
								<li><a href="<?=base_url?>usuario/login">Ingresar</a></li>
								<?php else: ?>
								<li><a href="<?=base_url?>usuario/index"><?php echo $_SESSION["identidad"] -> username; ?></a></li>
								<?php endif; ?>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>