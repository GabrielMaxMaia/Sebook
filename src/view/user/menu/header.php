<header>
	<div class="menuGroup">
		<a class="logo" href="<?php echo _URLBASE_ ?>">
			<img src="<?php echo _IMGBASE_ ?>logoSebookCor.png" alt="SebooK">
		</a>
		<?php
		$sql = new \Util\Sql($conn);

		$autenticadorController = new \Controller\AutentificadorController($sql);

		// $IdSessaoUser = $_SESSION['userLogado']['acesso'] ?? "";

		if($acessoUser != "" && $acessoUser != 5){
			$clienteDAO = new Model\ClienteDAO($sql);
			$clienteDAO->setIdUsuario($IdUser);
			$resultPerfil = $clienteDAO->listarClienteId();
			$img = $resultPerfil['urlFotoCliente'];
			// var_dump($resultUsarioPerfil);
		}else if($acessoUser!= "" && $acessoUser == 5){
			$seboDAO = new Model\SeboDAO($sql);
			$seboDAO->setIdUsuario($IdUser);
			$resultPerfil = $seboDAO->listarSeboId();
			$img = $resultPerfil['urlFotoSebo'];
		}else{
			$img = "";
		}
		$autenticadorController->toggleLogin($img);
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
				<a href="<?php echo _URLBASE_ ?>area/user/pages/postListar">POSTAGENS</a>
			</li>
			<?php
			if ($acessoUser != 4 && $acessoUser != null && $acessoUser != "") {
				echo "<li>
						<a href='"._URLBASE_."area/user/pages/postCriar'>CRIAR POSTAGEM</a></a>
					 </li>";
			}
			?>
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