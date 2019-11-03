<?php

use Controller\ClienteController;

$objSql = new Util\Sql($conn);
$clienteController = new Controller\ClienteController($objSql);

// var_dump($_POST);
$clienteController->gravarAlterar();
?>

<section class="<?php echo $clienteController->getLista(); ?>">
	<table>
		<caption>Lista de clientes</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Cpf</th>
				<th>Sexo</th>
				<th>Status</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $clienteController->listarClientes();
			?>
		</tbody>
	</table>

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadCliente";
		echo $clienteController->exibirNotificador($urlDoNotificador);
		?>
	</section>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadCliente/add'" value="Novo">
</section>

<section class="<?php echo $clienteController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de clientes</h4>

		<input type="text" name="idUsuario" id="idUsuario" value="<?php echo $clienteController->getClienteDAO()->getIdUsuario(); ?>">

		<label>Id</label>
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $clienteController->getAcaoGET(); ?>">
		<br><br>
		<label>Cpf</label>
		<input class="grande" type="text" name="cpfCliente" id="cpfCliente" value="<?= $clienteController->getClienteDAO()->getCpfCliente() ?>">

		<br><br>
		<label>Nascimento</label>
		<input class="grande" type="text" name="nascCliente" id="nascCliente" value="<?= $clienteController->getClienteDAO()->getNascimentoCliente() ?>">
		<br><br>

		<label>Sexo</label>
		<select class="grande" name="selectSexo">
			<?php
			$check = $clienteController->getClienteDAO()->getSexoCliente();
			if ($check == 'M') {
				$optionM = 'selected';
			} else if ($check == 'F') {
				$optionF = 'selected';
			}
			?>
			<optgroup label="Sexo">
				<option value="M" <?= $optionM ?? null ?>>M</option>
				<option value="F" <?= $optionF ?? null ?>>F</option>
			</optgroup>
		</select>

		<!-- Deixei brs aqui para não ter que fazer o css, depois não deixe asiim, okaa? -->

		<br><br>
		<label>Cep</label>
		<input class="grande" type="text" name="cepCliente" id="cepCliente" value="<?= $clienteController->getClienteDAO()->getCepCliente() ?>">

		<br><br>
		<label>Logradouro</label>
		<input class="grande" type="text" name="logradouroCliente" id="logradouroCliente" value="<?= $clienteController->getClienteDAO()->getLogradouroCliente() ?>">

		<br><br>
		<label>Complemento</label>
		<input class="grande" type="text" name="complEndCliente" id="complEndCliente" value="<?= $clienteController->getClienteDAO()->getComplementoCliente() ?>">

		<br><br>
		<label>Número</label>
		<input class="grande" type="text" name="numComplCliente" id="numComplCliente" value="<?= $clienteController->getClienteDAO()->getNumComplCliente() ?>">

		<!-- <input type="hidden" name="txtImg" id="txtImg" value="<?//= $clienteController->getClienteDAO()->getUrlFotoCliente() ?>"> -->

		<input type="hidden" name="txtImg" id="txtImg" value="<?= $clienteController->getUsuarioDAO()->getUrlFoto() ?>">

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>

	<div class="img">
		<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/clientePerfilUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFoto">

			<input type="file" name="urlFoto">

			<input class="button" type="submit" value="Carregar">
		</form>
		<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
	</div>

	<?php
	if ($clienteController->getUsuarioDAO()->getUrlFoto() != "") { 
		$src = _URLBASE_ . $clienteController->getUsuarioDAO()->getUrlFoto();
	} else {
		$src = _URLBASE_ . "public/img/imgPerfil/imgPadrao/padrao.png";
	}
	?>
	<div class="imgCadastro">
		<picture>
			<img id="imgAvatar" src="<?=$src?>" alt="Avatar" class="avatar">
		</picture>
	</div>


	<br>
	<br>
	<br>
	<br>
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadCliente">Voltar</a>
</section>