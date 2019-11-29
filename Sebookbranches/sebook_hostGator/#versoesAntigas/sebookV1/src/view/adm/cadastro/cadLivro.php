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
	<input class="button" type="button" onclick="window.location='http://Sebook/area/adm/cadastro/cadLivro/add'" value="Novo">

</section>

<section class="<?php echo $livroController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Livros</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $livroController->getLivroDAO()->getIsbnLivro(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $livroController->getAcaoGET(); ?>">

		<label>Isbn</label>
		<input class="grande" type="text" name="txtIsbn" value="<?php echo $livroController->getLivroDAO()->getIsbnLivro(); ?>">
		<br>

		<label>Livro</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $livroController->getLivroDAO()->getNomeLivro(); ?>">
		<br>

		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $livroController->getLivroDAO()->getSinopseLivro(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://Sebook/area/adm/cadastro/cadLivro">Voltar</a>
</section>