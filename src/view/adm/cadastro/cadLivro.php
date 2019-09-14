<?php
 
 use Controller\LivroController;

 $objSql = new Util\Sql($conn);
 $LivroController = new Controller\LivroController($objSql);
//  $LivroController->gravarAlterar();
?>

<section class="<?php echo $LivroController->getLista(); ?>">
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
				echo $LivroController->listarLivros();
			?>
		</tbody>
	</table>
	 <input class="button" type="button" onclick="window.location='http://localhost/Sebook/adm/cadastro/cadLivro/acao=1'"
	 value="Novo">
</section>

<section class="<?php echo $LivroController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Livros</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $LivroController->getLivroDAO()->getIdLivro(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $LivroController->getAcaoGET();?>">
		<label>Livro</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $LivroController->getLivroDAO()->getNomeLivro(); ?>">
		<br>
		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $LivroController->getLivroDAO()->getDescrLivro(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadLivro">Voltar</a>
</section>