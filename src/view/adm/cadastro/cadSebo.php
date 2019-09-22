<?php
 
 use Controller\SeboController;

 $objSql = new Util\Sql($conn);
 $SeboController = new Controller\SeboController($objSql);
 $SeboController->gravarAlterar();
?>

<section class="<?php echo $SeboController->getLista(); ?>">
	<table>
		<caption>Lista de Sebos</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Razão Social</th>
				<th>Nome Fantasia</th>
				<th>Status</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				echo $SeboController->listarSebos();
			?>
		</tbody>
	</table>
	 <input class="button" type="button" onclick="window.location='http://localhost/Sebook/area/adm/cadastro/cadSebo/add'"
	 value="Novo">
</section>

<section class="<?php echo $SeboController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Sebos</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $SeboController->getSeboDAO()->getIdUsuario(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $SeboController->getAcaoGET();?>">
		<label>Sebo</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $SeboController->getSeboDAO()->getRazaoSebo(); ?>">
		<br>
		<!-- <label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php //echo $SeboController->getSeboDAO()->getDescrSebo(); ?></textarea> -->
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadSebo">Voltar</a>
</section>