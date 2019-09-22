<nav>
	<h4>Bem vindo, <?= $_SESSION['userLogado']['nome']; ?></h4>
	<h4>Gerenciamento</h4>
	<ul class="vertical-menu">
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadNacionalidade">Nacionalidade</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadPerfil">Perfil</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadUsuario">Usuários</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadCliente">Clientes</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadSebo">Sebos</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadLivro">Livros</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadCategoria">Categorias</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadEditora">Editoras</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadAutor">Autor</a>
		</li>
		<li><a href="<?php echo _URLBASE_?>area/adm/sair">Sair</a></li>
	</ul>
</nav>