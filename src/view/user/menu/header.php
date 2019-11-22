<header class="topoHeader">
	<div class="menuGroup">
		<a class="logo" href="<?= _URLBASE_ ?>">
			<img src="<?= _URLBASE_ ?>public/icon/logoSebook.svg" alt="SebooK">
		</a>
		<?php
		$sql = new \Util\Sql($conn);

		$autenticadorController = new \Controller\AutentificadorController($sql);

		// $IdSessaoUser = $_SESSION['userLogado']['acesso'] ?? "";

		if ($acessoUser != "" && $acessoUser != 5) {
			$clienteDAO = new Model\ClienteDAO($sql);
			$clienteDAO->setIdUsuario($idUser);
			$resultPerfil = $clienteDAO->listarClienteId();
			$img = $resultPerfil['urlFoto'];
			// var_dump($resultUsarioPerfil);
		} else if ($acessoUser != "" && $acessoUser == 5) {
			$seboDAO = new Model\SeboDAO($sql);
			$seboDAO->setIdUsuario($idUser);
			$resultPerfil = $seboDAO->listarSeboId();
			$img = $resultPerfil['urlFoto'];
		} else {
			$img = "";
		}
		$autenticadorController->toggleLogin($img);
		$autenticadorController->efetuarLogOut();

		?>
	</div>
	<nav class="navDesk">
		<ul>
			<li>
				<a href="<?= _URLBASE_ ?>">HOME</a>
			</li>
			<li>
				<a href="<?= _URLBASE_ ?>area/user/menuHome/sebos">SEBOS</a>
			</li>
			<li>
				<a href="<?= _URLBASE_ ?>area/user/menuHome/livros">LIVROS</a>
			</li>
			<li class="A">
				<a href="<?= _URLBASE_ ?>area/user/pages/postListar">POSTAGENS</a>

				<?php
				if ($acessoUser != 4 && $acessoUser != null && $acessoUser != "") {
					echo "<ul class='listaMenuA'>
						<li class='listaMenuA'>
							<a href='" . _URLBASE_ . "area/user/pages/postCriar'>CRIAR POSTAGEM</a></a>
						</li>
						</ul>";
				}
				?>
			</li>
			<li class="B">
				<a href="<?= _URLBASE_ ?>area/user/pages/eventoListar">EVENTOS</a>

				<?php
				if ($acessoUser != 4 && $acessoUser != null && $acessoUser != "") {
					echo "<ul class='listaMenuB'>
						<li class='listaMenuB'>
							<a href='" . _URLBASE_ . "area/user/pages/eventoCriar'>CRIAR EVENTO</a></a>
						</li>
						</ul>";
				}
				?>
			</li>

			<!--
				<li>	
				<a href="<?= _URLBASE_ ?>area/user/menuHome/quemSomos">QUEM SOMOS</a>
				</li>
				<li>
					<a href="<?= _URLBASE_ ?>area/user/menuHome/ajuda">FAQ</a>
				</li>
				<li>
					<a href="<?= _URLBASE_ ?>area/user/geoLocalizacao/maisProximo">MAPA</a>
				</li>
			!-->
		</ul>
	</nav>
</header>