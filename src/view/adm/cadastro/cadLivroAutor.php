<?php

use Controller\LivroAutorController;

$objSql = new Util\Sql($conn);
$livroAutorController = new Controller\LivroAutorController($objSql);
$livroAutorController->gravarAlterar();
?>

<section class="<?php echo $livroAutorController->getLista(); ?>">
	<table>
		<caption>Lista</caption>
		<thead>
			<tr>
				<th>Id Autor</th>
				<th>Isbn</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $livroAutorController->listarLivroAutor();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadLivroAutor/add'" value="Novo">
</section>

<section class="<?= $livroAutorController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Sebos</h4>

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?= $livroAutorController->getAcaoGET() ?>">

		<label>Id</label>
		<input type="text" name="idAutor" id="idAutor" value="<?= $livroAutorController->getLivroAutorDAO()->getIdAutor() ?>">

		<br>

		<label>Isbn</label>
		<input class="grande" type="text" name="isbnLivro" id="isbnLivro" value="<?php echo $livroAutorController->getLivroAutorDAO()->getIsbnLivro() ?>">
		
		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>


	<br>
	<br>
	<br>
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadLivroAutor">Voltar</a>
</section>