<?php

use Controller\SeboLivroController;

$objSql = new Util\Sql($conn);
$seboLivroController = new Controller\SeboLivroController($objSql);
$seboLivroController->gravarAlterar();
?>

<section class="<?php echo $seboLivroController->getLista(); ?>">
	<table>
		<caption>Lista de Sebos</caption>
		<thead>
			<tr>
				<th>Id Usuario (Sebo)</th>
				<th>Isbn</th>
				<th>Qtde em Estoque</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $seboLivroController->listarSeboLivro();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/Sebook/area/adm/cadastro/cadseboLivro/add'" value="Novo">
</section>

<section class="<?= $seboLivroController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Sebos</h4>

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?= $seboLivroController->getAcaoGET() ?>">

		<label>Id</label>
		<input type="text" name="idUsuario" id="idUsuario" value="<?= $seboLivroController->getSeboLivroDAO()->getIdUsuario() ?>">

		<br>

		<label>Isbn</label>
		<input class="grande" type="text" name="isbnLivro" id="isbnLivro" value="<?php echo $seboLivroController->getSeboLivroDAO()->getIsbnLivro() ?>">

		<label>Qtde em estoque</label>
		<input class="grande" type="text" name="qtdEstoque" id="qtdEstoque" value="<?= $seboLivroController->getSeboLivroDAO()->getQtdEstoque() ?>">

		<br>
		
		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>


	<br>
	<br>
	<br>
	<a href=<?= _URLBASE_ ?>area/adm/cadastro/cadSeboLivro">Voltar</a>
</section>