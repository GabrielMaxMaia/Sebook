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
	 <input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadEditora/add'" value="Novo">

</section>

<section class="<?php echo $editoraController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Editoras</h4>
		
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $editoraController->getEditoraDAO()->getIdEditora(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $editoraController->getAcaoGET();?>">

		<label>Editora</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $editoraController->getEditoraDAO()->getNomeEditora(); ?>">


		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadEditora">Voltar</a>
</section>