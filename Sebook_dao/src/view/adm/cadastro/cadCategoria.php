<?php

use Controller\CategoriaController;
 $objSql = new Util\Sql($conn);
 $categoriaController = new Controller\CategoriaController($objSql);
 $categoriaController->gravarAlterar();
?>

<section class="<?php echo $categoriaController->getLista(); ?>">
	<table>
		<caption>Lista de Categorias</caption>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				echo $categoriaController->listarCategorias();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/PLAO3/Projetos/modelo_mvc_dao/index.php?area=adm&folder=cadastro&page=cadCategoria&acao=1'" value="Novo">

</section>

<section class="<?php echo $categoriaController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de categorias</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $categoriaController->getCategoriaDAO()->getIdCategoria(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $categoriaController->getAcaoGET();?>">
		<label>Categoria</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $categoriaController->getCategoriaDAO()->getNomeCategoria(); ?>">
		<br>
		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $categoriaController->getCategoriaDAO()->getDescrCategoria(); ?></textarea>
		<br>


		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/PLAO3/Projetos/modelo_mvc_dao/index.php?area=adm&folder=cadastro&page=cadCategoria">Voltar</a>
</section>