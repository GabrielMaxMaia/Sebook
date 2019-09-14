<?php
 
 use Controller\AutorController;

 $objSql = new Util\Sql($conn);
 $autorController = new Controller\AutorController($objSql);
//  $AutorController->gravarAlterar();
?>

<section class="<?php echo $autorController->getLista(); ?>">
	<table>
		<caption>Lista de autors</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Status</th>
				<th>Nacionalidade</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				echo $autorController->listarAutores();
			?>
		</tbody>
	</table>
	 <input class="button" type="button" onclick="window.location='http://localhost/Sebook/adm/cadastro/cadAutor/acao=1'"
	 value="Novo">
</section>

<section class="<?php echo $autorController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de utors</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $autorController->getAutorDAO()->getIdAutor(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $autorController->getAcaoGET();?>">
		<label>Autor</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $autorController->getAutorDAO()->getNomeAutor(); ?>">
		<br>
		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $autorController->getAutorDAO()->getDescrAutor(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadAutor">Voltar</a>
</section>