<!--Modal para Atualizar Livros -->
<section class="modal">
	<input class="modal-open" id="livroAcervo" type="checkbox" hidden>
	<div class="modal-wrap" aria-hidden="true" role="dialog">
		<label class="modal-overlay" for="livroAcervo"></label>
		<div class="modal-dialog">
			<div class="modal-header">
				<p>
					<?= $value ?>
					<br>
					Livro:
					<b><?= $livroDAO->getNomeLivro() ?></b>
				</p>
				<label class="btn-close" for="livroAcervo" aria-hidden="true">×</label>
			</div>
			<div class="modal-body">
				<!--Formulário de acervo-->
				<form action="" method="post">

					<script>
						function gId(id) {
							return document.getElementById(id);
						}

						function pegaQtdEstoque(id, qtd) {
							//gId(idComentario).setAttribute('value',id);
							document.getElementById("isbnLivro").setAttribute("value", id);

							document.getElementById("qtdEstoque").setAttribute("value", qtd);

							return
						}
					</script>

					<input type="hidden" name="isbnLivro" id="isbnLivro">

					<label for="qtdEstoque">Quantidade</label>
					<input type="number" name="qtdEstoque" id="qtdEstoque" value="<?= $seboLivroDAO->getQtdEstoque() ?>">

					<label for="estadoLivro">Estado de conservação</label>
					<select name="estadoLivro" id="estadoLivro">
						<?php
						$estadoDoLivro = ['B' => 'Bom', 'M' => 'Mediano', 'O' => 'Ótimo', 'N' => 'Novo'];

						foreach ($estadoDoLivro as $key => $value) {
							if ($key == $seboLivroDAO->getEstadoLivro()) {
								$select = 'selected';
							} else {
								$select = "";
							}
							echo 
							"<option $select value='$key'>$value</option>";
						}

						?>
					</select>

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
	$seboLivroDAO->setIdUsuario($IdUser);
	$seboLivroDAO->setIsbnLivro($_POST['isbnLivro']);
	$seboLivroDAO->setQtdEstoque($_POST['qtdEstoque']);
	$seboLivroDAO->setEstadoLivro($_POST['estadoLivro']);

	$seboLivroDAO->alterarSeboLivro();
  
    header('Refresh:0');
}
if (isset($_POST['adicionarLivro'])) {
	$seboLivroDAO->setIdUsuario($IdUser);
	$seboLivroDAO->setIsbnLivro($_POST['isbnLivro']);
	$seboLivroDAO->setQtdEstoque($_POST['qtdEstoque']);
	$seboLivroDAO->setEstadoLivro($_POST['estadoLivro']);

    $seboLivroDAO->adicionarSeboLivro();
    
    header('Refresh:0');
}
?>