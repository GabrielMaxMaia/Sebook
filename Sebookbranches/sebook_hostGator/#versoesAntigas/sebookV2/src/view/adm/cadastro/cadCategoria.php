<?php

use Controller\CategoriaController;

 //$autenticadorController->validarAcesso('". _URLBASE_ ."area/adm',array(0=>1, 1=>2));

$objSql = new Util\Sql($conn);
$categoriaController = new Controller\CategoriaController($objSql);
$categoriaController->gravarAlterar();
?>

<section class="<?php echo $categoriaController->getLista(); ?>">
	<table>
		<caption>Lista de Categorias</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Status</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $categoriaController->listarCategorias();
			?>
		</tbody>
	</table>

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadCategoria";
		echo $categoriaController->exibirNotificador($urlDoNotificador);
		?>
	</section>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadCategoria/add'" value="Novo">

</section>

<section class="<?php echo $categoriaController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de categorias</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $categoriaController->getCategoriaDAO()->getIdCategoria(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $categoriaController->getAcaoGET(); ?>">
		<label>Categoria</label>
		<input class="grande" type="text" id="txtNome" name="txtNome" onblur="validarNomeCategoria('<?= _URLBASE_ ?>src/view/adm/cadastro/cadCategoriaAjax.php', 'txtNomeCat='+this.value, 'txtNome')" value="<?php echo $categoriaController->getCategoriaDAO()->getNomeCategoria(); ?>">
		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>

	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadCategoria">Voltar</a>
</section>