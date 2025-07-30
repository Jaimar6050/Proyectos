<!DOCTYPE html>
<html lang="es">
<head>
	<title>MVC Tecnologias Web 2</title>
	<link rel="shortcut icon" href="http://sa.updspotosi.edu.bo/img/upds.jpg" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
	<header>
	<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
  	<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="/producto/">Productos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/producto/create">Crear Producto</a>
					</li>
				</ul>
    	</div>
  	</div>
	</nav>
	</header>
	<main class="mx-auto" style="width: 800px;">
<?php
require '../vendor/autoload.php';
$router = require '../src/Routes/index.php';
?>
	</main>
</body>

