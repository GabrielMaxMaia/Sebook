<footer id="rodape">
	<div class="container-footer-all">
		<div class="container-body">
			<div class="coluna1">
				<h1>Mais Informações do site</h1>
				<p>
					Sebook é uma plataforma web voltada aos amantes de livros usados. Acreditamos na força da economia solidária
					e com isso damos visibilidade aos empreendedores, incentivamos o consumo sustentável de recursos e auxiliamos
					os leitores a pouparem tempo e dinheiro ao comprar pela internet.
					A missão do Sebook é enriquecer culturalmente toda a comunidade com uma ação de baixo custo econômico, viabilizando
					a interação leitor-sebo com nossa ferramenta de busca regionalizada.
					Promovemos e incentivamos reciclagens de livros inservíveis para serem transformados em artesanatos e outras artes.
					Oferecemos um sistema de Gestão de Acervos para os sebos parceiros do Sebook.
				</p>
			</div>
			<div class="coluna2">
				<h1>Redes Sociais</h1>
				<div class="row">
					<a href="https://www.facebook.com/sebook.sebos.online/?modal=composer&notif_id=1574817376463843&notif_t=page_fan_growth_drop&ref=notif">
						<img src="<?= _URLBASE_ ?>public/icon/facebookLogo.png" alt="">
						<label>Facebook</label>
					</a>
				</div>

				<!-- <h1 class="intro-copy"></h1>

				<a class="top-link hide" href="" id="js-top">
					<img src="<? //= _URLBASE_ 
								?>public/icon/arrow.svg" viewBox="0 0 12 6">
					<path d="M12 6H0l6-6z" alt="Sebook">
					<span class="screen-reader-text"></span>
				</a> -->
				<!--NANIKORE?-->

				<div class="row">
					<a href="https://www.instagram.com/sebook.sebos.online/">
						<img src="<?= _URLBASE_ ?>public/icon/instagramLogo.png" alt="">
						<label>Instagram</label>
					</a>
				</div>
				<div class="row">
					<a href="#twitter">
						<img src="<?= _URLBASE_ ?>public/icon/twitterLogo.png" alt="">
						<label>Twitter</label>
					</a>
				</div>
			</div>
			<div class="coluna3">
				<h1>Entre em contato</h1>
				<div class="row2">
					<a href="#email">
						<img src="<?= _URLBASE_ ?>public/icon/email.svg" alt="">
						<label>contato@sebook.com.br</label>
					</a>
				</div>
				<div class="row2">
					<a href="#postal">
						<img src="<?= _URLBASE_ ?>public/icon/homeFooter.svg" alt="">
						<label id=postalFooter>Caixa Postal 5180<br>São Paulo - SP - Brasil<br>CEP: 01311-100</label>
					</a>
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
				<a href="<?= _URLBASE_ ?>area/user/pages/centralDeAjuda" class="ajuda">Central de Ajuda </a> |
				<a href="<?= _URLBASE_ ?>area/user/pages/politicaDePrivacidade" class="Seguranca">Politica de Privacidade </a> |
				<a href="<?= _URLBASE_ ?>area/user/pages/termosDeUso" class="Termos ">Termos de Uso</a>
			</div>
		</div>
	</div>

</footer>

<div class="master1">
	<nav class="menuMobile">
		<a href="<?= _URLBASE_ ?>" class="home">
			<img src="<?= _URLBASE_ ?>public/icon/home.svg" alt="Home" title="Página inicial">
		</a>
		<a href="<?= _URLBASE_ ?>area/user/menuHome/livros" class="search">
			<img src="<?= _URLBASE_ ?>public/icon/busca.svg" alt="Buscar" title="Buscar">
		</a>
		<div class="menu">
			<input type="checkbox" id="menuH">
			<label for="menuH">
				<img src="<?= _URLBASE_ ?>public/icon/menu.svg" alt="">
			</label>
			<div class="ulCenter">
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
					<li>
						<a href="<?= _URLBASE_ ?>area/user/pages/eventoListar">EVENTOS</a>
					</li>
					<?php
					if ($acessoUser != 4 && $acessoUser != 3 && $acessoUser != null && $acessoUser != "") {
						echo "<li>
								<a href='" . _URLBASE_ . "area/user/pages/eventoCriar'>CRIAR EVENTO</a></a>
							 </li>";
					}
					?>
					<li>
						<a href="<?= _URLBASE_ ?>area/user/pages/postListar">POSTAGENS</a>
					</li>
					<?php
					if ($acessoUser != 4 && $acessoUser != 3 && $acessoUser != null && $acessoUser != "") {
						echo "<li>
								<a href='" . _URLBASE_ . "area/user/pages/postCriar'>CRIAR POSTAGEM</a></a>
							 </li>";
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
</div>