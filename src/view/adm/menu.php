<nav>
	<h4>Bem vindo, <?= $_SESSION['userLogado']['nome']; ?></h4>
	<h4>Gerenciamento</h4>
	<ul class="vertical-menu">
		<li><a href="<?php echo _URLBASE_ ?>">Home</a></li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadPostagem">Postagem</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadComentario">Comentários</a>
		</li>
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
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadSeboLivro">SeboLivro</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadAutor">Autor</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadLivro">Livros</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadLivroAutor">Livros Autor</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadCategoria">Categorias</a>
		</li>
		<li>
			<a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadEditora">Editoras</a>
		</li>
		
		<li><a href="<?php echo _URLBASE_ ?>area/adm/sair">Sair</a></li>
	</ul>
<nav class="middle">
    <div class="Menu">
        <ul>
    <!-- Menu nivel 2 -->    
            <li class="item" id="RELATÓRIOS">
                <a href="#RELATÓRIOS" class="btn">RELATÓRIOS</a>
                <ul class="smenu">
                    <li><a href="#">Cadastro de Leitores</a></li>
                    <li><a href="#">Cadastro de Sebos</a></li>
                    <li><a href="#">Geral de Acervos</a></li>
                    <li><a href="#">Duvidas</a></li>
                </ul>
            </li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/tratamento" class="btn">TRATAMENTO DE DUVIDAS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/eventosComentarios" class="btn">EVENTOS E COMENTARIOS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/controleUsuario" class="btn">CONTROLE DE USUARIOS</a></li>
    <!-- Menu nivel 1 -->
            <li class="item">
                <a href="<?= _URLBASE_ ?>area/adm/pages/apagar" class="btn">APAGAR POSTAGENS INDEVIDAS</a>
                <ul class=smenu>
                    <li><a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadPostagem">Postagem</a></li>
                </ul>
            </li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/cadastraEvento" class="btn">CADASTRAR EVENTOS E NOTÍCIAS</a></li>

            <li class="item"><a href="Bloquear.html" class="btn">BLOQUEAR USUÁRIOS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/aprovarSebo" class="btn">APROVAR SEBOS PARCEIROS</a></li>

            <li class="item"><a href="ExcluirSebo.html" class="btn">EXCLUIR SEBOS PARCEIROS</a></li>

    <!-- Menu master -->
            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/aprovarISBN" class="btn">APROVAR CADASTROS SEM ISBN</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/banir" class="btn">BANIR USUARIOS</a></li>
            
            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/sair" class="btn">SAIR</a></li>
        </ul>
    </div>
</nav>