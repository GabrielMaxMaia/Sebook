<!--Modal para Atualizar Livros -->
<section class="modal">
	<input class="modal-open" id="livroAcervo" type="checkbox" hidden>
	<div class="modal-wrap" aria-hidden="true" role="dialog">
		<label class="modal-overlay" for="livroAcervo"></label>
		<div class="modal-dialog">

			<script>
				function pegaQtdEstoque(id, qtd) {
					//gId(idComentario).setAttribute('value',id);
					document.getElementById("isbnLivro").setAttribute("value", id);

					document.getElementById("qtdEstoque").setAttribute("value", qtd);

					return
				}
			</script>

			<div class="modal-header">
				<p>
					<?= $value ?> livro no Acervo	
				</b>
				</p>
				<label class="btn-close" for="livroAcervo" aria-hidden="true">×</label>
			</div>
			<div class="modal-body">
				<!--Formulário de acervo-->
				<form action="" method="post">

					<input type="hidden" name="isbnLivro" id="isbnLivro" value="<?= $seboLivroDAO->getIsbnLivro() ?>">

					<label for="qtdEstoque">Quantidade</label>
					<input type="number" name="qtdEstoque" id="qtdEstoque" value="<?= $seboLivroDAO->getQtdEstoque() ?>">

					<input type="submit" name="<?= $name ?>" value="<?= $value ?>">
				</form>
			</div>
			<div class="modal-footer">
				<label class="btn btn-primary" for="livroAcervo">Fechar</label>
			</div>
		</div>
	</div>
</section>
<?php
if (isset($_POST['atualizarLivro'])) {
	$seboLivroDAO->setIdUsuario($idUser);
	$seboLivroDAO->setIsbnLivro($_POST['isbnLivro']);
	$seboLivroDAO->setQtdEstoque($_POST['qtdEstoque']);

	$seboLivroDAO->alterarSeboLivro();

	header('Refresh:0');
}
if (isset($_POST['adicionarLivro'])) {
	$seboLivroDAO->setIdUsuario($idUser);
	$seboLivroDAO->setIsbnLivro($_POST['isbnLivro']);
	$seboLivroDAO->setQtdEstoque($_POST['qtdEstoque']);

	$seboLivroDAO->adicionarSeboLivro();

	header('Refresh:0');
}
?>