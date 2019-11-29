<?php
    var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!--<link rel="stylesheet" href="http://sebook/css/slick.css">-->
    <link rel="stylesheet" href="http://sebook/public/css/usuario.css">
            <title>Sebook</title>

    <!--Aplicando comentário-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="containerScroll">
        <header>
	<div class="menuGroup">
		<a class="logo" href="http://sebook/">
			<img src="http://sebook/public/img/logoSebookCor.png" alt="SebooK">
		</a>
		<b> Bem vindo Master</b></a><a class='pefil' href='http://sebook/area/user/pages/perfilLeitor'>Editar Perfil</a><a class='pefil' href='http://sebook/area/adm'>Adm</a><a href='http://sebook/area/adm/sair'>Sair</a>
	</div>
	<nav class="navDesk">
		<ul>
			<li>
				<a href="http://sebook/">HOME</a>
			</li>
			<li>
				<a href="http://sebook/area/user/menuHome/sebos">SEBOS</a>
			</li>
			<li>
				<a href="http://sebook/area/user/menuHome/livros">LIVROS</a>
			</li>
			<li>
				<a href="http://sebook/area/user/menuHome/quemSomos">QUEM SOMOS</a>
			</li>
			<li>
				<a href="http://sebook/area/user/menuHome/ajuda">FAQ</a>
			</li>
		</ul>
		</ul>
	</nav>
</header>        <div id="containerTemplate">
            <div class="Social-Bar">
    <a href="#">
        <img src="http://sebook/public/icon/facebookSVG.svg" class="icon icon-facebook" target="">
    </a>
    <a href="#">
        <img src="http://sebook/public/icon/instagramSVG.svg" class="icon icon-instagram" target="">
    </a>
    <a href="#">
        <img src="http://sebook/public/icon/twitterSVG.svg" class="icon icon-twitter" target="">
    </a>
</div>                <article class="home">
                    <section>
                        <!-- Perfil -->
<section class="cadastro">
	<div class="container">
		<form action="" method="post" name="atualizarCampos">

			<input type="hidden" name="idUsuario" id="idUsuario" value="15">

			<div class="formItem">
				<label for="nomeUsuario">Nome</label>
				<input type="text" name="nomeUsuario" id="nomeUsuario" >
			</div>

			<div class="formItem">
				<label for="nomeUsuario">Sobrenome</label>
				<input type="text" name="sobrenomeUsuario" id="sobrenomeUsuario" >
			</div>

			<div class="formItem">
				<label for="emailUsuario">E-mail</label>
				<input type="text" name="emailUsuario" id="emailUsuario" >
			</div>

			<div class="formItem">
				<label for="nascCliente">Data de Nascimento</label>
								<input type="text" name="nascCliente" id="nascCliente" >
			</div>

			<div class="formItem">
				<label for="sexoCliente">Sexo</label>
				<select class="" name="sexoCliente" id="sexoCliente">
					<optgroup label="Sexo">
						<option value='M' >M</option><option value='F' >F</option>					</optgroup>
				</select>
			</div>

			<div class="formItem">
				<label for="cpfCliente">CPF</label>
				<input type="text" name="cpfCliente" id="cpfCliente" value="">
			</div>
			<div class="formItem">
				<label for="cepCliente">CEP</label>
				<input type="text" name="cepCliente" id="cepCliente" value="">
			</div>
			<div class="formItem">
				<label for="logradouroCliente">Logradouro</label>
				<select name="logradouroCliente" id="logradouroCliente">
					<option  value='AL'>ALAMEDA</option><option  value='AV'>AVENIDA</option><option  value='BC'>BECO</option><option  value='BL'>BLOCO</option><option  value='CAM'>CAMINHO</option><option  value='EST'>ESTAÇÃO</option><option  value='FAZ'>FAZENDA</option><option  value='GL'>GALERIA</option><option  value='LD'>LADEIRA</option><option  value='LGO'>LARGO</option><option  value='PÇA'>PRAÇA</option><option  value='PRQ'>PARQUE</option><option  value='PR'>PRAIA</option><option  value='KM'>QUILÔMETRO</option><option  value='ROD'>RODOVIA</option><option  value='R'>RUA</option><option  value='SQD'>SUPER QUADRA</option><option  value='TRV'>TRAVESSA</option><option  value='VD'>VIADUTO</option><option  value='VL'>VILA</option>				</select>
			</div>

			<div class="formItem">
				<label for="numComplCliente">Número</label>
				<input type="text" name="numComplCliente" id="numComplCliente" value="">
			</div>
			<div class="formItem">
				<label for="complEndCliente">Complemento</label>
				<input type="text" name="complEndCliente" id="complEndCliente" value="">
			</div>

			<!--Foto campo escondifo-->
			<input type="hidden" name="urlFotoCliente" id="urlFotoCliente" value="">

			<input type="submit" name="atualizar" value="Atualizar">
		</form>

		<!--Formulário de foto-->
		<div class="img">
			<form action="http://sebook/src/view/adm/cadastro/cadUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">
				<input type="file" name="urlFotoCliente">
				<!-- <input type="file" name="arqImagem"> -->
				<input class="button" type="submit" value="Carregar">
			</form>
			<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
		</div>
		<div class="imgCadastro">
			<picture>
				<img id="imgAvatar" src="http://sebook/" alt="Avatar" class="avatar">
			</picture>
		</div>

		<!--Modal-->
		<label class="btn-modal-cadastre" for="modal-cadastre">Trocar senha?</label>
		<section class="modal">
			<input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
			<div class="modal-wrap" aria-hidden="true" role="dialog">
				<label class="modal-overlay" for="modal-cadastre"></label>
				<div class="modal-dialog">
					<div class="modal-header">
						<h2>Mudar sua senha</h2>
						<label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
					</div>
					<div class="modal-body">
						<form name="mudarSenha" method="post">
							<label for="senhaAtual">Senha Atual</label>
							<input type="password" name="senhaAtual" id="senhaAtual">
							<label for="senhaNova">Nova senha</label>
							<input type="password" name="senhaNova">
							<input type="submit" name="trocarSenha">
						</form>
					</div>
					<div class="modal-footer">
						<label class="btn btn-primary" for="modal-cadastre">Fechar</label>
					</div>
				</div>
			</div>
		</section>
			</div>
</section>                    </section>
                </article>
                    </div>
        <footer id="rodape">
	<div class="container-footer-all">

		<div class="container-body">
			<div class="coluna1">
				<h1>Mais Informações do site</h1>
				<p>
					SebooK é uma Plataforma Web dedicada aos amantes de livros usados com a principal missão de fornecer acesso ágil e eficiente
					aos leitores na busca por livros em sua região. Oferecemos um sistema de Gestão de Acervos para os donos de sebos parceiros.
					Promovemos interação entre sebos e leitores sob um enfoque social - através da Economia Solidária - incentivando assim
					o consumo sustentável, pois, além de garantir economia ao leitor, trará visibilidade aos empreendedores desse mercado,
					estimulando e fomentando de forma ecológica o consumo dessas obras dentro e fora dos grandes centros.
				</p>

			</div>
			<div class="coluna2">
				<h1>Redes Sociais</h1>
				<div class="row">
					<a href="#face">
						<img src="http://sebook/public/icon/facebookSVG.svg" alt="">
						<label>Facebook</label>
					</a>
				</div>
				<div class="row">
					<a href="#twitter">
						<img src="http://sebook/public/icon/twitterSVG.svg" alt="">
						<label>Twitter</label>
					</a>
				</div>
				<div class="row">
					<a href="#instagram">
						<img src="http://sebook/public/icon/instagramSVG.svg" alt="">
						<label>Instagram</label>
					</a>
				</div>
			</div>
			<div class="coluna3">
				<h1>Contato</h1>
				<div class="row2">
					<a href="#contato">
						<img src="http://sebook/public/icon/homeSVG.svg" alt="">
						<label>Entre em contato conosco</label>
					</a>
				</div>
				<div class="row2">
					<img src="http://sebook/public/icon/emailSVG.svg" alt="">
					<label>
						Caixa Postal 5180,
						<br>São Paulo - SP - Brasil
						<br>CEP: 01311-100
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="container-footer">
		<div class="footer">
			<div class="copyright">
				<p>
					@ 2019 Todos os direitos Reservados |
					<a href="">Sebook</a>
				</p>
			</div>

			<div class="informar">
				<a href="">Informação Companhia </a> |
				<a href="">Privações e Politica </a> |
				<a href="">Termos e Condições</a>
			</div>
		</div>
	</div>

</footer>

<div class="master1">
	<nav class="menuMobile">
		<a href="http://sebook/" class="home">
			<img src="http://sebook/public/icon/homeSVG.svg" alt="Home" title="Página inicial">
		</a>
		<a href="http://sebook/area/user/pages/busca" class="search">
			<img src="http://sebook/public/icon/buscaSVG.svg" alt="Buscar" title="Buscar">
		</a>
		<div class="menu">
			<input type="checkbox" id="menuH">
			<label for="menuH">
				<img src="http://sebook/public/icon/menuSVG.svg" alt="">
			</label>
			<div class="ulCenter">
				<ul>
					<!--<li><a href="src/view/user/pages/menu/sebos.php">SEBOS</a>
					</li>-->
					<li>
						<a href="http://sebook/">HOME</a>
					</li>
					<li>
						<a href="http://sebook/area/user/menuHome/sebos">SEBOS</a>
					</li>
					<li>
						<a href="http://sebook/area/user/menuHome/livros">LIVROS</a>
					</li>
					<li>
						<a href="http://sebook/area/user/menuHome/quemSomos">QUEM SOMOS</a>
					</li>
					<li>
						<a href="http://sebook/area/user/menuHome/ajuda">FAQ</a>
					</li>
				</ul>
				</ul>
			</div>
		</div>
	</nav>
</div>    </div>
</body>

</html>