<?php
// $cssCaminho = '<link rel="stylesheet" href=". _URLBASE_ ."public/css/slick.css">';

use Model\LivroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$livroDAO = new LivroDAO($objSql);

$resultLivro = $livroDAO->listarLivros();
?>

<div class="containerSlick">
	<header>
        <h2>Últimos Livros</h2>
    </header>
	<section class="regular slider">
		<?php
		foreach ($resultLivro as $livro) {
			?>
			<div>
				<a href="<?= _URLBASE_ ?>area/user/pages/descLivro/<?= $livro['isbnLivro'] ?>">
					<img src="<?= _URLBASE_ . $livro['urlFotoLivro'] ?>" alt="<?= $livro['nomeLivro']?>" title="<?= $livro['nomeLivro']?>">
				</a>
			</div>
		<?php
		}
		?>
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