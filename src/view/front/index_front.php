<!DOCTYPE html>
<html>
<html lang="pt_br">
<head>
	<title>Home | Início</title>

	<meta charset=UTF-8>
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<meta name=description content="">
	<meta name=keywords content="Modelo PHP HTML5 CSS3">
	<meta name=author content='Giovani Wingter'>
	<meta name=modelo-plao content='integracao php mysql poo html5 css3'>

	<!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
	<link rel="shortcut icon" href="" type="image/x-icon">


	<!-- CSS PADRÃO -->
	<link href="<?php echo _URLBASE_?>public/css/estilo_front.css" rel=stylesheet>

	<!-- Telas Responsivas -->
	<link rel=stylesheet media="screen and (max-width:480px)" href="<?php echo _URLBASE_ ?>public/css/estilo_front_480.css">
	<link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="<?php echo _URLBASE_ ?>public/css/estilo_front_768.css">
	<link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="<?php echo _URLBASE_ ?>public/css/estilo_front_1024.css">
	<link rel=stylesheet media="screen and (min-width:1025px)" href="<?php echo _URLBASE_ ?>public/css/estilo_front_1025.css">
    
	<!-- Auxiliares -->
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">

</head>

<body>
	<header>
		<h1>Games
			<sub>4</sub>All</h1>
	</header>

	<div class="row">

		<aside class="col-3 menu">
			<ul>
				<li>Tiro em primeira pessoa</li>
				<li>Tiro em terceira pessoa</li>
				<li>RPG</li>
				<li>Automóveis</li>
				<li>Motovelocidade</li>
			</ul>
		</aside>

		<main class="col-9">

			<section class="grid-container">
				<div class='grid-item'>
					<h5>Call of Duty - Infinite Warfare</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/cod_iw.jfif'>
					</picture>
					<h6>R$ 80,00</h6>
					<button class='button'>Comprar</button>
				</div>
				<div class='grid-item'>
					<h5>DragonBall Z Fighter</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/dbz.jfif'>
					</picture>
					<h6>R$ 120,00</h6>
					<button class='button'>Comprar</button>
				</div>
				<div class='grid-item'>
					<h5>DragonBall 2 - Xenoverse</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/dbz2.jfif'>
					</picture>
					<h6>R$ 100,00</h6>
					<button class='button'>Comprar</button>
				</div>
				<div class='grid-item'>
					<h5>FarCry Primal</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/fcp.jfif'>
					</picture>
					<h6>R$ 99,99</h6>
					<button class='button'>Comprar</button>
				</div>
				<div class='grid-item'>
					<h5>God of War</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/gow.jfif'>
					</picture>
					<h6>R$ 85,00</h6>
					<button class='button'>Comprar</button>
				</div>
				<div class='grid-item'>
					<h5>GhostRecon</h5>
					<picture>
						<img src='<?php echo _URLBASE_?>public/capas_jogos/gr.jfif'>
					</picture>
					<h6>R$ 135,00</h6>
					<button class='button'>Comprar</button>
				</div>
			</section>
			<section class="notificador">
				<ul>
					<li>
						<a class='active' href='<?php echo _URLBASE_?>/pagina/1'>1</a>
					</li>
					<li>
						<a href='<?php echo _URLBASE_?>pagina/2'>2</a>
					</li>
				</ul>
			</section>
		</main>


	</div>

	<footer>
		<ul class="icons">
			<li>
				<a href="#">
					<img src="public/img/icon1.jpg" alt="">Facebook</a>
			</li>
			<li>
				<a href="#">
					<img src="public/img/icon2.jpg" alt="">Twitter</a>
			</li>
			<li>
				<a href="#">
					<img src="public/img/icon3.jpg" alt="">LinkedIn</a>
			</li>
		</ul>
	</footer>
</body>

</html>