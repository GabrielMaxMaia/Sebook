<?php
  $cssCaminho = '<link rel="stylesheet" href="http://localhost/sebook/css/slick.css">';
?>
<div class="containerSlick">
	<section class="regular slider">
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/livroHarry.jpg">
			</a>
		</div>
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/Livro-A-Culpa-e-das-Estrelas.jpg">
			</a>
		</div>
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/DepoisDeVoce_Jojo.jpg">
			</a>
		</div>
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/Livro-As-Cronicas-de-Gelo-e-Fogo-A-Danca-dos-Dragoes.jpg">
			</a>
		</div>
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/livroNeve.jpg">
			</a>
		</div>
		<div>
			<a href="<?= _URLBASE_ ?>area/user/pages/loDescLivro">
				<img src="<?= _URLBASE_ ?>public/img/imgLivro/livroPercy.jpg">
			</a>
		</div>
	</section>
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="<?php echo _URLBASE_ ?>public/js/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	$(document).on('ready', function() {
			$(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 2
			});
	});
</script>