<!DOCTYPE html>
<html>
<head>
	<title><?php $title ?? '' ?></title>
	
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	<!--SweetAlert-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script src="https://kit.fontawesome.com/d1dc657f99.js" crossorigin="anonymous"></script>
	
	<script src="<?= BASE_URL ?>assets/js/functions.js"></script>
	
	<link rel="stylesheet" type="text/css" href="./../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>views/client/style.css">
</head>
<body>
	
	<div id="main_menu">
		<ul>
			<li><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i>Inicio</a></li>
			<li><a href="<?= BASE_URL ?>productos">Productos</a></li>
			<li><a href="<?= BASE_URL ?>carrito">Carrito</a></li>
			<li><a href="<?= BASE_URL ?>perfil">Perfil</a></li>
			
			<?php //if($this->isLoggin()){ ?>
				<!--<li><a href="<?//= BASE_URL ?>perfil">Mi Perfil</a></li>-->
			<?php //}else{?>
				<!--<li><a href="<?//= BASE_URL ?>iniciarSesion">Iniciar Sesión</a></li>-->
			<?php //}?>
		</ul>
	</div>