<?php

use Model\livroDAO;
use Model\AutorDAO;
use Model\NacionalidadeDAO;
use Model\LivroAutorDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$livroDAO = new livroDAO($objSql);
$autorDAO = new autorDAO($objSql);
$nacionalidadeDAO = new NacionalidadeDAO($objSql);
$livroAutorDAO = new LivroAutorDAO($objSql);

//Pega o isbn pela url
$isbn = $_GET['id'] ?? "";

//$livroDAO->setIsbnLivro($_GET['id']);
//Livro
$livroDAO->setIsbnLivro($isbn);
$resultLivro = $livroDAO->listarLivroIsbn();
$livroDAO->setUrlFotoLivro($resultLivro['urlFotoLivro']);
$livroDAO->setNomeLivro($resultLivro['nomeLivro']);
$livroDAO->setAnoLivro($resultLivro['anoLivro']);
$livroDAO->setSinopseLivro($resultLivro['sinopseLivro']);
$livroDAO->setIdCategoria($resultLivro['idCategoria']);
$livroDAO->setIdEditora($resultLivro['idEditora']);

//Pegando o id do autor no LivroAutorDAO por meio do isbn
$livroAutorDAO->setIsbnLivro($isbn);
$resultAutorLivro = $livroAutorDAO->listarIsbnAutor();

//Pega o nome os valores do autor com esse id
$autorDAO->setIdAutor($resultAutorLivro['idAutor']);
$resultAutor = $autorDAO->listarAutorId();
// var_dump($resultAutor);
$autorDAO->setNomeAutor($resultAutor['nomeAutor']);

//Pega o idNacionalidade de autorDao e seta no nacionalidadeDAO
$nacionalidadeDAO->setIdNacionalidade($resultAutor['idNacionalidade']);
$resulNacionalidade = $nacionalidadeDAO->listarNacionalidadeId();
$nacionalidadeDAO->setNomeNacionalidade($resulNacionalidade['nomeNacionalidade']);
?>

<article class="livrosL">
	<section class="box-descricao-livro">
		<figure>
			<img src="<?= _URLBASE_ . $livroDAO->getUrlFotoLivro() ?>" alt="<?= $livroDAO->getNomeLivro() ?>" title="<?= $livroDAO->getNomeLivro() ?>" style="max-width:200px;">
			<figcaption class="descricaoLivro">
				<h1><?= $livroDAO->getNomeLivro() ?></h1>
				<p>
					<strong>Ano: <?= $livroDAO->getAnoLivro() ?></strong> |
					<strong>Autor: <?= $autorDAO->getNomeAutor() ?></strong><? ?>
					| <strong>Nacionalidade: <?= $nacionalidadeDAO->getNomeNacionalidade() ?> <?= $autorDAO->getIdNacionalidade() ?></strong>
				</p>
				<p>
					<strong>SINOPSE</strong><br>
					<?= $livroDAO->getSinopseLivro() ?>
				</p>
			</figcaption>
		</figure>
	</section>

	<h3>Seção de Comentarios</h3>
	<!-- <section class="acervo">
		<a href="LogAcervo-sebo.html">
			<h3>JULIO SEBOS</h3>
		</a>
		<div id="Mapa">
			<h3>Maps</h3>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14636.88924717763!2d-46.90127847805996!3d-23.48850077570472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf039ca55b6389%3A0x7ecd38f248fb5c21!2sVila%20Engenho%20Novo%2C%20Barueri%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1567988811626!5m2!1spt-BR!2sbr">
			</iframe>
		</div>
	</section> -->

</article>