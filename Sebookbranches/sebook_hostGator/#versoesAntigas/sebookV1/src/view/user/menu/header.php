<header>
	<div class="menuGroup">
		<a class="logo" href="<?php echo _URLBASE_ ?>">
			<img src="<?php echo _IMGBASE_ ?>logoSebookCor.png" alt="SebooK">
		</a>
		<?php
		$sql = new \Util\Sql($conn);

		$autenticadorController = new \Controller\AutentificadorController($sql);

		$autenticadorController->toggleLogin();
		$autenticadorController->efetuarLogOut();

		?>

	</div>
	<nav class="navDesk">
		<ul>
			<li>
				<a href="<?php echo _URLBASE_ ?>">HOME</a>
			</li>
			<li>
				<a href="<?php echo _URLBASE_ ?>area/user/menuHome/sebos">SEBOS</a>
			</li>
			<li>
				<a href="<?php echo _URLBASE_ ?>area/user/menuHome/livros">LIVROS</a>
			</li>
			<li>
				<a href="<?php echo _URLBASE_ ?>area/user/menuHome/quemSomos">QUEM SOMOS</a>
			</li>
			<li>
				<a href="<?php echo _URLBASE_ ?>area/user/menuHome/ajuda">FAQ</a>
			</li>
		</ul>
		</ul>
	</nav>
</header>