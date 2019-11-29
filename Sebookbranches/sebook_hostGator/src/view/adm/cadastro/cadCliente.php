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
				<th>Id Usuário</th>
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

	<input class="modifica new" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadCliente/add'" value="Novo">

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadCliente";
		echo $clienteController->exibirNotificador($urlDoNotificador);
		?>
	</section>

</section>

<section class="<?php echo $clienteController->getFormulario(); ?>">
	<header class="headerPagina">
		<h1>Atualizar dados Cliente (Leitor)</h1>
	</header>

	<div class="containerCadAdm">

		<?php
		if ($clienteController->getUsuarioDAO()->getUrlFoto() != "") {
			$src = _URLBASE_ . $clienteController->getUsuarioDAO()->getUrlFoto();
		} else {
			$src = _URLBASE_ . "public/img/imgPerfil/imgPadrao/padrao.png";
		}
		?>
		<div class="imgCadastro">
			<picture>
				<img id="imgAvatar" src="<?= $src ?>" alt="Avatar" class="avatar">
			</picture>
		</div>
		<div class="img">
			<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/clientePerfilUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFoto">

				<input type="file" name="urlFoto">

				<input class="modifica edit" type="submit" value="Carregar">
			</form>
			<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
		</div>

		<form method="post" action="">

			<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $clienteController->getAcaoGET(); ?>">

			<label>Id Usuário</label>
			<input type="text" name="idUsuario" id="idUsuario" value="<?php echo $clienteController->getClienteDAO()->getIdUsuario(); ?>">

			<label>Cpf</label>
			<input class="grande" type="text" name="cpfCliente" id="cpfCliente" value="<?= $clienteController->getClienteDAO()->getCpfCliente() ?>">

			<label>Nascimento</label>
			<input class="grande" type="text" name="nascCliente" id="nascCliente" value="<?= $clienteController->getClienteDAO()->getNascimentoCliente() ?>">


			<label>Sexo</label><br>
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

			<label>Cep</label>
			<input class="grande" type="text" name="cepCliente" id="cepCliente" value="<?= $clienteController->getClienteDAO()->getCepCliente() ?>">

			<label>Logradouro</label>
			<input class="grande" type="text" name="logradouroCliente" id="logradouroCliente" value="<?= $clienteController->getClienteDAO()->getLogradouroCliente() ?>">

			<label>Complemento</label>
			<input class="grande" type="text" name="complEndCliente" id="complEndCliente" value="<?= $clienteController->getClienteDAO()->getComplementoCliente() ?>">

			<label>Número</label>
			<input class="grande" type="text" name="numComplCliente" id="numComplCliente" value="<?= $clienteController->getClienteDAO()->getNumComplCliente() ?>">

			<input type="hidden" name="txtImg" id="txtImg" value="<?= $clienteController->getUsuarioDAO()->getUrlFoto() ?>">

			<input class="modifica danger" type="reset" value="Limpar">
			<input class="inputEnvia" type="submit" value="Enviar">
		</form>
	</div>

	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadCliente">Voltar</a>
</section>