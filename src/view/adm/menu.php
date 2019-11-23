<?php
$acessoUser = $_SESSION['userLogado']['acesso'] ?? "";
?>
<nav>
	<h4>Bem vindo, <?= $_SESSION['userLogado']['nome']; ?></h4>
	<h4>Gerenciamento</h4>
	<ul class="vertical-menu">
		<li><a href="<?= _URLBASE_ ?>">Home</a></li>

		<?php
		if ($acessoUser != 3) {
			?>
			<li>
				<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadPostagem">Postagem</a>
			</li>
			<li>
				<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadEvento">Eventos</a>
			</li>
		<?php
		}
		?>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadComentario">Comentários</a>
		</li>
		<?php
		if ($acessoUser == 1) {
		?>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadNacionalidade">Nacionalidade</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadPerfil">Perfil</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadUsuario">Usuários</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadCliente">Clientes</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadSebo">Sebos</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadSeboLivro">Acervo</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadAutor">Autor</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadLivro">Livros</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadLivroAutor">Livros Autor</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadCategoria">Categorias</a>
		</li>
		<li>
			<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadEditora">Editoras</a>
		</li>
		<?php
		}
		?>
		<li><a href="<?= _URLBASE_ ?>area/adm/sair">Sair</a></li>
	</ul>
</nav>