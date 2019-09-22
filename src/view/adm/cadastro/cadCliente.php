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
	<input class="button" type="button" onclick="window.location='http://localhost/Sebook/adm/cadastro/cadCliente/add'" value="Novo">
</section>

<section class="<?php echo $clienteController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de clientes</h4>

		<input type="hidden" name="txtId" id="txtId" value="<?php echo $clienteController->getClienteDAO()->getIdUsuario(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $clienteController->getAcaoGET(); ?>">
		
		<label>Sexo</label>

		
		<!-- <input class="grande" type="text" name="selectSexo" value="<?php //echo $clienteController->getClienteDAO()->getSexoCliente();?>"> -->
		
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

		<br>
		<!-- <label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php //echo $clienteController->getClienteDAO()->getLogradouroCliente(); 
													?></textarea> -->
		<br>

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