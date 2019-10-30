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

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadSebo";
		echo $SeboController->exibirNotificador($urlDoNotificador);
		?>
	</section>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadSebo/add'" value="Novo">
</section>

<section class="<?php echo $SeboController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Sebos</h4>

		<input type="hidden" name="txtId" id="txtId" value="<?php echo $SeboController->getSeboDAO()->getIdUsuario(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $SeboController->getAcaoGET(); ?>">

		<label>Id</label>
		<input type="text" name="idUsuario" id="idUsuario" value="<?= $SeboController->getseboDAO()->getIdUsuario() ?>">

		<br>

		<label>Razão Sebo</label>
		<input class="grande" type="text" name="razaoSebo" value="<?php echo $SeboController->getSeboDAO()->getRazaoSebo(); ?>">

		<br>

		<label>Nome Fantasia</label>
		<input class="grande" type="text" name="nomeFantasia" value="<?php echo $SeboController->getSeboDAO()->getRazaoSebo(); ?>">

		<br>

		<label>Cnpj</label>

		<input class="grande" type="text" name="cnpjSebo" value="<?= $SeboController->getseboDAO()->getCnpjSebo() ?>">

		<br>

		<label>Foto</label>

		<input type="hidden" class="grande" type="text" id="txtImg" name="txtImg" value="<?= $SeboController->getSeboDAO()->getUrlFotoSebo() ?>">

		<br>
		<label>Num Endereço</label>
		<input class="grande" type="text" name="numEndSebo" value="<?= $SeboController->getSeboDAO()->getNumEndSebo() ?>">

		<br>

		<label>Complemento endereço</label>
		<input class="grande" type="text" name="complEndSebo" value="<?= $SeboController->getSeboDAO()->getComplEndSebo() ?>">

		<br>

		<label>Logradouro</label>
		<input class="grande" type="text" name="logradouroSebo" value="<?= $SeboController->getSeboDAO()->getLogradouroSebo() ?>">

		<br>

		<label>Cep</label>

		<input class="grande" type="text" name="cepEndSebo" value="<?= $SeboController->getSeboDAO()->getCepEndSebo() ?>">

		<br>

		<label>Telefone</label>

		<input class="grande" type="text" name="numTelSebo" value="<?= $SeboController->getSeboDAO()->getNumTelSebo() ?>">

		<br>

		<label>Celular 1</label>

		<input class="grande" type="text" name="celular1Sebo" value="<?= $SeboController->getSeboDAO()->getCelular1Sebo() ?>">

		<br>

		<label>Celular 2</label>

		<input class="grande" type="text" name="celular2Sebo" value="<?= $SeboController->getSeboDAO()->getCelular2Sebo() ?>">

		<br>

		<label>Inscrição Estadual</label>

		<input class="grande" type="text" name="inscEstadualSebo" value="<?= $SeboController->getSeboDAO()->getInscEstadualSebo() ?>">

		<br>

		<label>Link do site</label>
		<input class="grande" type="text" name="urlSiteSebo" value="<?= $SeboController->getSeboDAO()->getUrlSiteSebo() ?>">
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>

	<div class="img">
		<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/seboPerfilUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoSebo">

			<input type="file" name="urlFotoSebo">

			<input class="button" type="submit" value="Carregar">
		</form>
		<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
	</div>
	<div class="imgCadastro">
		<picture>
			<img id="imgAvatar" src="<?= _URLBASE_ . $SeboController->getSeboDAO()->getUrlFotoSebo() ?>" alt="Avatar" class="avatar">
		</picture>
	</div>

	<br>
	<br>
	<br>
	<br>
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadSebo">Voltar</a>
</section>