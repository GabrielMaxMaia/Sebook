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
	<input class="button" type="button" onclick="window.location='http://localhost/Sebook/area/adm/cadastro/cadSebo/add'" value="Novo">
</section>

<section class="<?php echo $SeboController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Sebos</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $SeboController->getSeboDAO()->getIdUsuario(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $SeboController->getAcaoGET(); ?>">

		<label>Id</label>
		<input type="text" name="idUsuario" id="idUsuario" value="<?= $SeboController->getseboDAO()->getIdUsuario() ?>">

		<label>Razão Sebo</label>
		<input class="grande" type="text" name="razaoSebo" value="<?php echo $SeboController->getSeboDAO()->getRazaoSebo(); ?>">

		<label>Nome Fantasia</label>
		<input class="grande" type="text" name="nomeFantasia" value="<?php echo $SeboController->getSeboDAO()->getRazaoSebo(); ?>">

		<input class="grande" type="text" name="cnpjSebo" value="<?= $SeboController->getSeboDAO()->getCnpjSebo() ?>">
		
		<input class="grande" type="text" name="urlFotoSebo" value="<?= $SeboController->getSeboDAO()->getUrlFotoSebo() ?>">

		<input class="grande" type="text" name="numEndSebo" value="<?= $SeboController->getSeboDAO()->getNumEndSebo() ?>">

		<input class="grande" type="text" name="complEndSebo" value="<?= $SeboController->getSeboDAO()->getComplEndSebo() ?>">

		<input class="grande" type="text" name="logradouroSebo" value="<?= $SeboController->getSeboDAO()->getLogradouroSebo() ?>">

		<input class="grande" type="text" name="cepEndSebo" value="<?= $SeboController->getSeboDAO()->getCepEndSebo()?>">

		<input class="grande" type="text" name="numTelSebo" value="<?= $SeboController->getSeboDAO()->getNumTelSebo() ?>">

		<input class="grande" type="text" name="celular1Sebo" value="<?= $SeboController->getSeboDAO()->getCelular1Sebo() ?>">

		<input class="grande" type="text" name="celular2Sebo" value="<?= $SeboController->getSeboDAO()->getCelular2Sebo() ?>">

		<input class="grande" type="text" name="inscEstadualSebo" value="<?= $SeboController->getSeboDAO()->getInscEstadualSebo() ?>">


		<input class="grande" type="text" name="urlSiteSebo" value="<?= $SeboController->getSeboDAO()->getUrlSiteSebo() ?>">



		<br>
		<!-- <label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php //echo $SeboController->getSeboDAO()->getDescrSebo();?></textarea> -->
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