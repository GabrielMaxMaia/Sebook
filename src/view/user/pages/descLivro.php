<?php

use Model\livroDAO;
use Model\AutorDAO;
use Model\LivroAutorDAO;
use Model\ComentarioDAO;
use Model\UsuarioDAO;
use Model\SeboLivroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$usuarioDAO = new UsuarioDAO($objSql);
$livroDAO = new livroDAO($objSql);
$autorDAO = new autorDAO($objSql);
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
		<?php
		if ($acessoUser == 5) {
			$seboLivroDAO->setIdUsuario($IdUser);
			$seboLivroDAO->setIsbnLivro($isbn);

			$resultSeboLivro = $seboLivroDAO->listarSeboLivroIdIsbn();
			$seboLivroDAO->setQtdEstoque($resultSeboLivro['qtdEstoque']);
			$seboLivroDAO->setEstadoLivro($resultSeboLivro['estadoLivro']);
			//var_dump($resultSeboLivro);

			if ($resultSeboLivro > 0) {
				$value = "Atualizar";
				$excluir = true;
				$name = "atualizarLivro";
			} else {
				$value = "Adicionar ao Acervo";
				$excluir = false;
				$name = "adicionarLivro";
			}
			?>

			<label class="btn-modal-cadastre" for="livroAcervo" value="<?= $livroDAO->getIsbnLivro()  ?>" onclick="return pegaId(<?= $livroDAO->getIsbnLivro()  ?>,'<?= $seboLivroDAO->getQtdEstoque() ?>')"><?= $value ?></label>

			<?php
				if ($excluir == true) {
					?>
				<!--Formulário para excluir-->
				<form method="post" action="" name="excluirLivro">
					<input type="hidden" name="isbnLivroExcluir" value="<?= $livroDAO->getIsbnLivro() ?>">

					<input type="submit" name="excluirLivro" value="Excluir do Acervo" onclick="if (confirm('Quer Mesmo retirar esse Livro do acervo?')) {return true;}else{return false;}">
				</form>
			<?php
				if (isset($_POST['isbnLivroExcluir'])) {
					$seboLivroDAO->setIdUsuario($IdUser);
					$seboLivroDAO->setIsbnLivro($_POST['isbnLivroExcluir']);
					//Excluir comentário
					$seboLivroDAO->excluirseboLivro();
					//Recarrega a página

					header('Refresh:0');
				}
			}
		}
			?>
			
	</section>
	<!--Modal-->
	<label class="btn-modal-cadastre" for="modalAchaSebo">Onde encontrar?</label>
	<section class="modal">
		<input class="modal-open" id="modalAchaSebo" type="checkbox" hidden>
		<div class="modal-wrap" aria-hidden="true" role="dialog">
			<label class="modal-overlay" for="modalAchaSebo"></label>
			<div class="modal-dialog">
				<div class="modal-header">
					<h2>Sebos que possuem o Livro <?=$livroDAO->getNomeLivro()?></h2>
					<label class="btn-close" for="modalAchaSebo" aria-hidden="true">×</label>
				</div>
				<div class="modal-body">
				<?php
					if($resultSeboLivroAcha > 0){
						foreach($resultSeboLivroAcha as $seboLivroR){
							?>
							<ul>
								<li>
								<a href='<?=_URLBASE_."/area/user/pages/pagSebo/".$seboLivroR['idUsuario']?>'>	
								<figure>
									<img src="<?=_URLBASE_ . $seboLivroR['urlFotoSebo']?>" style="max-width:50px;">
									<figcaption>
										<p>
											Nome: <?=$seboLivroR['nomeFantasia']?>
											<br>
											CEP: <?=$seboLivroR['cepEndSebo']?>
										</p>
									</figcaption>
								</figure>
								</a>
								</li>
							<ul>	
							<?php
						}
					} else {
						echo "Ainda não há sebos que possuem esse livro";
					}
					?>
				</div>
				<div class="modal-footer">
					<label class="btn btn-primary" for="modalAchaSebo">Fechar</label>
				</div>
			</div>
		</div>
	</section>

	<h3>Seção de Comentarios</h3>
	<?php

	/*Inclui toda sessão de comentários*/
	$pagina = "";
	include "includes/comentarioTemplate.php";
	?>

</article>

<?php 
	include "includes/livroModal.php";
?>

