<?php
 
 use Controller\EditoraController;

 $objSql = new Util\Sql($conn);
 $editoraController = new Controller\EditoraController($objSql);
//  $EditoraController->gravarAlterar();
?>

<section class="<?php echo $editoraController->getLista(); ?>">
	<table>
		<caption>Lista de Editoras</caption>
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
				echo $editoraController->listarEditoras();
			?>
		</tbody>
	</table>
	 <input class="button" type="button" onclick="window.location='http://localhost/Sebook/adm/cadastro/cadEditora/acao=1'"
	 value="Novo">
</section>

<section class="<?php echo $editoraController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Editoras</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $editoraController->getEditoraDAO()->getIdEditora(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $editoraController->getAcaoGET();?>">
		<label>Editora</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $editoraController->getEditoraDAO()->getNomeEditora(); ?>">
		<br>
		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $editoraController->getEditoraDAO()->getDescrEditora(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Editoraok_projeto/php/Editoraok_dao/index.php?area=adm&folder=cadastro&page=cadEditora">Voltar</a>
</section>