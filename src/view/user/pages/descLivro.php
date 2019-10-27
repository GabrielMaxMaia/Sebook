<?php

use Model\livroDAO;
use Model\AutorDAO;
use Model\LivroAutorDAO;
use Model\ComentarioDAO;
use Model\UsuarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$usuarioDAO = new UsuarioDAO($objSql);
$livroDAO = new livroDAO($objSql);
$autorDAO = new autorDAO($objSql);
$livroAutorDAO = new LivroAutorDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);

//Pega o isbn pela url
$isbn = $_GET['id'] ?? "";

//$livroDAO->setIsbnLivro($_GET['id']);
//Livro
$livroDAO->setIsbnLivro($isbn);
$resultLivro = $livroDAO->listarLivroIsbn();

//Guarda o isbn no getPost
$GetPost = $isbn;
$comentarioDAO->setIdPost($GetPost);
$resultComentario = $comentarioDAO->listarComentarioPost();

for ($i = 0; $i < count($resultLivro); $i++) {
	$livroDAO->setUrlFotoLivro($resultLivro[$i]['urlFotoLivro']);
	$livroDAO->setNomeLivro($resultLivro[$i]['nomeLivro']);
	$livroDAO->setAnoLivro($resultLivro[$i]['anoLivro']);
	$livroDAO->setSinopseLivro($resultLivro[$i]['sinopseLivro']);
	$livroDAO->setIdCategoria($resultLivro[$i]['idCategoria']);
	$livroDAO->setIdEditora($resultLivro[$i]['idEditora']);

	$autorDAO->setIdAutor($resultLivro[$i]['idAutor']);
	$resultAutor[$i] = $autorDAO->listarAutorId();
}
?>

<article class="livrosL">
	<section class="box-descricao-livro">
		<figure>
			<img src="<?= _URLBASE_ . $livroDAO->getUrlFotoLivro() ?>" alt="<?= $livroDAO->getNomeLivro() ?>" title="<?= $livroDAO->getNomeLivro() ?>" style="max-width:200px;">
			<figcaption class="descricaoLivro">
				<h1><?= $livroDAO->getNomeLivro() ?></h1>
				<p>
					<strong>Ano: <?= $livroDAO->getAnoLivro() ?></strong>
					<br>
					<?php
					foreach ($resultAutor as $autor) {
						?>
						<strong>Autor: <?= $autor['nomeAutor'] ?></strong>
						| <strong>Nacionalidade: 
							<?= $autor['nomeNacionalidade'] ?>
						</strong>
						<br>
						<?php $autor['idNacionalidade'] ?>
					<?php
					}
					?>
				</p>
				<p>
					<strong>SINOPSE</strong><br>
					<?= $livroDAO->getSinopseLivro() ?>
				</p>
			</figcaption>
		</figure>
	</section>

	<h3>Seção de Comentarios</h3>
	<?php

	/*Inclui toda sessão de comentários*/
	$pagina = "";
	$caminhoEnviaComentario = "area/user/pages/descLivro/";
	include "includes/comentarioTemplate.php";

	?>

</article>