<?php

use Controller\livroController;

$objSql = new Util\Sql($conn);
$livroController = new Controller\LivroController($objSql);
$livroController->gravarAlterar();
?>

<section class="<?php echo $livroController->getLista(); ?>">
	<table>
		<caption>Lista de Livros</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Isbn</th>
				<th>Ano</th>
				<th>Nome</th>
				<th>Sinopse</th>
				<th>Status</th>
				<th>Id_editora</th>
				<th>Id_categoria</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $livroController->listarLivros();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/Sebook/area/adm/cadastro/cadLivro/add'" value="Novo">

</section>

<section class="<?php echo $livroController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Livros</h4>
		<input type="hidden" name="isbnLivro" id="isbnLivro" value="<?= $livroController->getLivroDAO()->getIsbnLivro(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $livroController->getAcaoGET(); ?>">

		<input type="hidden" name="urlFotoLivro" id="urlFotoLivro" value="<?= $livroController->getLivroDAO()->getUrlFotoLivro(); ?>">

		<label>Isbn</label>
		<input class="grande" type="text" name="txtIsbn" value="<?= $livroController->getLivroDAO()->getIsbnLivro();  ?>">
		<br>

		<label>Ano</label>
		<input class="grande" type="text" name="anoLivro" id="anoLivro" value="<?= $livroController->getLivroDAO()->getAnoLivro();  ?>">
		<br>

		<label>Nome</label>
		<input class="grande" type="text" name="nomeLivro" id="nomeLivro" value="<?php echo $livroController->getLivroDAO()->getNomeLivro(); ?>">
		<br>

		<label>Editora</label>
		<textarea class="grande" name="idEditora" id="idEditora"><?php echo $livroController->getLivroDAO()->getIdEditora(); ?></textarea>
		<br>

		<label>Categoria</label>
		<textarea class="grande" name="idCategoria" id="idCategoria"><?php echo $livroController->getLivroDAO()->getIdCategoria(); ?></textarea>
		<br>

		<label>Sinopse</label>
		<textarea class="grande" name="sinopseLivro" id="sinopseLivro"><?php echo $livroController->getLivroDAO()->getSinopseLivro(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href=<?= _URLBASE_ ?>area/adm/cadastro/cadLivro">Voltar</a>
</section>