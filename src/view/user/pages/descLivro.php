<?php

use Model\LivroDAO;
use Model\AutorDAO;
use Model\LivroAutorDAO;
use Model\ComentarioDAO;
use Model\UsuarioDAO;
use Model\SeboLivroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$usuarioDAO = new UsuarioDAO($objSql);
$livroDAO = new LivroDAO($objSql);
$autorDAO = new AutorDAO($objSql);
$livroAutorDAO = new LivroAutorDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$seboLivroDAO = new SeboLivroDAO($objSql);

//Pega o isbn pela url
$isbn = $_GET['id'] ?? "";
$GetPost = $_GET['id'];

//$livroDAO->setIsbnLivro($_GET['id']);
//Livro
$livroDAO->setIsbnLivro($isbn);
$resultLivro = $livroDAO->listarLivroIsbn();

//Lista os sebos que possuem determinado livro
$seboLivroDAO->setIsbnLivro($isbn);
$resultSeboLivroAcha = $seboLivroDAO->listarSeboLivrosIsbn();

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
	$categoria = $resultLivro[$i]['nomeCategoria'];

	$autorDAO->setIdAutor($resultLivro[$i]['idAutor']);
	$resultAutor[$i] = $autorDAO->listarAutorId();
}
?>

<article class="livroArticle">
	<section>
		<div class="containerInfoLivro">
			<figure class="livroContainer">
				<img src="<?= _URLBASE_ . $livroDAO->getUrlFotoLivro() ?>" alt="<?= $livroDAO->getNomeLivro() ?>" title="<?= $livroDAO->getNomeLivro() ?>">
				<figcaption class="descricaoLivro">
					<h1><?= $livroDAO->getNomeLivro() ?></h1>
					<p>
						<b>Ano:</b> <?= $livroDAO->getAnoLivro() ?>
						<br>
						<?php
						foreach ($resultAutor as $autor) {
							?>
							<b>Autor:</b> <?= $autor['nomeAutor'] ?>
							<br>
							<b>Nacionalidade: </b>
							<?= $autor['nomeNacionalidade'] ?>
							<br>
							<?php $autor['idNacionalidade'] ?>
						<?php
						}
						?>
						<b>Categoria: </b><a href="<?= _URLBASE_ . 'area/user/pages/categoriaListar/' . $livroDAO->getIdCategoria() ?>"><?= $categoria ?></a>
						<!--Modal-->
						<br>
						<b>Encontre esse livro: </b>
						<label class="btn-modal-cadastre" for="modalAchaSebo" style="color:#24773b;">Aqui</label>
					</p>
				</figcaption>
			</figure>
			<div class="sinopseContainer">
				<p class="sinopse">SINOPSE</p>
				<p>
					<?= $livroDAO->getSinopseLivro() ?>
				</p>
			</div>
		</div>

		<?php
		if ($acessoUser == 5) {
			$seboLivroDAO->setIdUsuario($idUser);
			$seboLivroDAO->setIsbnLivro($isbn);

			$resultSeboLivro = $seboLivroDAO->listarSeboLivroIdIsbn();
			$seboLivroDAO->setQtdEstoque($resultSeboLivro['qtdEstoque']);

			if ($resultSeboLivro > 0) {
				$mensagem = "Possui livro em <strong>Acervo</strong>, quer atualizar?";
				$value = "Editar";
				$excluir = true;
				$name = "atualizarLivro";
			} else {
				$mensagem = "Ainda não possui livro no <strong>Acervo</strong>";
				$value = "Adicionar";
				$excluir = false;
				$name = "adicionarLivro";
			}
			?>
			<p style="padding-left:1rem;">
				<?=$mensagem ?? ""?>
			</p>
			<div class="itemEdit">
				<label class="btn-modal-cadastre modifica edit" for="livroAcervo" value="<?= $livroDAO->getIsbnLivro()  ?>" onclick="return pegaId(<?= $livroDAO->getIsbnLivro()  ?>,'<?= $seboLivroDAO->getQtdEstoque() ?>')"><?= $value ?></label>

				<?php
					if ($excluir == true) {
						?>
					<!--Formulário para excluir-->
					<form method="post" action="" name="excluirLivro">
						<input type="hidden" name="isbnLivroExcluir" value="<?= $livroDAO->getIsbnLivro() ?>">

						<input type="submit" class="modifica danger" name="excluirLivro" value="Deletar" onclick="if (confirm('Quer Mesmo retirar esse Livro do acervo?')) {return true;}else{return false;}">
					</form>
				<?php
						if (isset($_POST['isbnLivroExcluir'])) {
							$seboLivroDAO->setIdUsuario($idUser);
							$seboLivroDAO->setIsbnLivro($_POST['isbnLivroExcluir']);
							//Excluir comentário
							$seboLivroDAO->excluirseboLivro();
							//Recarrega a página

							header('Refresh:0');
						}
					}
					?>
			</div>
		<?php
		}
		?>
	</section>
	<section class="modal livro">
		<input class="modal-open" id="modalAchaSebo" type="checkbox" hidden>
		<div class="modal-wrap" aria-hidden="true" role="dialog">
			<label class="modal-overlay" for="modalAchaSebo"></label>
			<div class="modal-dialog">
				<div class="modal-header">
					<p>
						Sebos que possuem o Livro<br>
						<b><?= $livroDAO->getNomeLivro() ?></b>
					</p>
					<label class="btn-close" for="modalAchaSebo" aria-hidden="true">×</label>
				</div>
				<div class="modal-body">
					<ul class="livroModalContainer">
						<?php
						if ($resultSeboLivroAcha > 0) {
							foreach ($resultSeboLivroAcha as $seboLivroR) {
								?>
								<li class="livroModalItem">
									<a href='<?= _URLBASE_ . "/area/user/pages/pagSebo/" . $seboLivroR['idUsuario'] ?>'>
										<figure>
											<img src="<?= _URLBASE_ . $seboLivroR['urlFoto'] ?>" style="max-width:50px;">
											<figcaption>
												<p>
													<?php
															if ($seboLivroR['nomeFantasia'] != "") {
																echo 'Nome: ' . $seboLivroR['nomeFantasia'] . '<br>';
															}
															if ($seboLivroR['cepEndSebo'] != "") {
																echo 'CEP: ' . $seboLivroR['cepEndSebo'];
															}
															?>
												</p>
											</figcaption>
										</figure>
									</a>
								</li>
						<?php
							}
						} else {
							echo "<p>Infelizmente, ainda não há <b>sebos</b> que possuam este livro cadastrado.<p>";
						}
						?>
					</ul>
				</div>
				<div class="modal-footer">
					<label class="btn btn-primary" for="modalAchaSebo">Fechar</label>
				</div>
			</div>
		</div>
	</section>
	<?php

	/*Inclui toda sessão de comentários*/
	$pagina = "paginaLivro";
	include "includes/comentarioTemplate.php";
	?>

</article>

<?php
include "includes/livroModal.php";
?>