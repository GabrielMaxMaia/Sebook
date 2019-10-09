<?php

use Controller\ClienteController;

$objSql = new Util\Sql($conn);
$clienteController = new Controller\ClienteController($objSql);
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
	<input class="button" type="button" onclick="window.location='http://localhost/sebook/area/adm/cadastro/cadCliente/add'" value="Novo">
</section>

<section class="<?php echo $clienteController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de clientes</h4>

		<!-- <input type="hidden" name="idUsuario" id="idUsuario" value="<?php //echo $clienteController->getClienteDAO()->getIdUsuario(); ?>"> -->
		<!-- Esse campo deve ficar escondido posteriormente--->
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
				<option value="F" <?=$optionF ?? null ?>>F</option>
			</optgroup>
		</select>

		<br><br>
		<label>Cep</label>
		<input class="grande" type="text" name="cepCliente" id="cepCliente" value="<?= $clienteController->getClienteDAO()->getCepCliente() ?>">
		<?php
		var_dump($clienteController->getClienteDAO()->getCepCliente() );
		?>
		<br><br>
		<label>Logradouro</label>
		<input class="grande" type="text" name="logradouroCliente" id="logradouroCliente" value="<?= $clienteController->getClienteDAO()->getLogradouroCliente() ?>">
		
		<br><br>
		<label>Complemento</label>
		<input class="grande" type="text" name="complEndCliente" id="complEndCliente" value="<?= $clienteController->getClienteDAO()->getNumComplCliente() ?>">

		<br><br>
		<label>Número</label>
		<input class="grande" type="text" name="numComplCliente" id="numComplCliente" value="<?= $clienteController->getClienteDAO()->getNumComplCliente() ?>">

		


		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadCliente">Voltar</a>
</section>