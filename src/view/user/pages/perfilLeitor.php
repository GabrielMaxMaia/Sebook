<?php

use Model\ClienteDAO;
use Model\UsuarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
//Passa a conexão para o dao
$clienteDAO = new ClienteDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

//Seta o id para o clinete por meio da sessão do usuário
$clienteDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);
$usuarioDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);

//Seta os valores para o dao
$result = $clienteDAO->listarClienteId();
$clienteDAO->setSexoCliente($result['sexoCliente']);
$clienteDAO->setComplementoCliente($result['complEndCliente']);
$clienteDAO->setLogradouroCliente($result['logradouroCliente']);
$clienteDAO->setNumComplCliente($result['numComplCliente']);
$clienteDAO->setCpfCliente($result['cpfCliente']);
$clienteDAO->setCepCliente($result['cepCliente']);
$clienteDAO->setNascimentoCliente($result['nascCliente']);
$clienteDAO->setUrlFotoCliente($result['urlFotoCliente']);

//Retorna a que tem no listarUsuarioDaoId
$resultUsuario = $usuarioDAO->listarUsuarioId();
//Seta a atributos do usuarioDAO
$usuarioDAO->setSenhaUsuario($resultUsuario['senhaUsuario']);
$usuarioDAO->setNomeUsuario(($resultUsuario['nomeUsuario']));
$usuarioDAO->setSobrenomeUsuario($resultUsuario['sobrenomeUsuario']);
$usuarioDAO->setEmailUsuario($resultUsuario['emailUsuario']);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {

	$clienteDAO->setNumComplCliente($_POST['numComplCliente']);
	$clienteDAO->setSexoCliente($_POST['sexoCliente']);
	$clienteDAO->setComplementoCliente($_POST['complEndCliente']);
	$clienteDAO->setLogradouroCliente($_POST['logradouroCliente']);
	$clienteDAO->setCpfCliente($_POST['cpfCliente']);
	$clienteDAO->setCepCliente($_POST['cepCliente']);
	// $clienteDAO->setUrlFotoCliente($_POST['urlFotoCliente']);
	$clienteDAO->setUrlFotoCliente($_POST['txtImg']);

	$date = date_create(str_replace('/', '-', $_POST['nascCliente']));
	$newDate = date_format($date, "Y-m-d");
	$clienteDAO->setNascimentoCliente($newDate);

	if (isset($_POST['nomeUsuario']) || isset($_POST['sobrenomeUsuario']) || isset($_POST['emailUsuario'])) {

		$usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
		$usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
		$usuarioDAO->setEmailUsuario($_POST['emailUsuario']);

		$usuarioDAO->alterarInfoUsuario();
	}

	$clienteDAO->alterarCliente();
}

?>
<!-- Perfil -->
<section class="cadastro">
	<div class="container">
		<form action="" method="post">

			<!--Foto campo escondifo-->
			<input type="hidden" name="txtImg" id="txtImg" value="<?= $clienteDAO->getUrlFotoCliente() ?>">

			<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $clienteDAO->getIdUsuario() ?>">

			<div class="formItem">
				<label for="nomeUsuario">Nome</label>
				<input type="text" name="nomeUsuario" id="nomeUsuario" value="<?= $usuarioDAO->getNomeUsuario() ?>">
			</div>

			<div class="formItem">
				<label for="nomeUsuario">Sobrenome</label>
				<input type="text" name="sobrenomeUsuario" id="sobrenomeUsuario" value="<?= $usuarioDAO->getSobrenomeUsuario()  ?>">
			</div>

			<div class="formItem">
				<label for="emailUsuario">E-mail</label>
				<input type="text" name="emailUsuario" id="emailUsuario" value="<?= $usuarioDAO->getEmailUsuario()  ?>">
			</div>

			<div class="formItem">
				<label for="nascCliente">Data de Nascimento</label>
				<?php
				$date = date_create($clienteDAO->getNascimentoCliente());
				$newDate = date_format($date, "d/m/Y");
				?>
				<input type="text" name="nascCliente" id="nascCliente" value="<?= trim($newDate) ?> ">
			</div>

			<div class="formItem">
				<label for="sexoCliente">Sexo</label>
				<select class="" name="sexoCliente" id="sexoCliente">
					<optgroup label="Sexo">
						<?php
						$sexo = ['M', 'F'];
						foreach ($sexo as $s) {
							if ($s == $clienteDAO->getSexoCliente()) {
								$select = "selected";
							} else {
								$select = "";
							}
							echo "<option value='$s' $select>$s</option>";
						}
						?>
					</optgroup>
				</select>
			</div>

			<div class="formItem">
				<label for="cpfCliente">CPF</label>
				<input type="text" name="cpfCliente" id="cpfCliente" value="<?= $clienteDAO->getCpfCliente() ?>">
			</div>
			<div class="formItem">
				<label for="cepCliente">CEP</label>
				<input type="text" name="cepCliente" id="cepCliente" value="<?= $clienteDAO->getCepCliente() ?>">
			</div>
			<div class="formItem">
				<label for="logradouroCliente">Logradouro</label>
				<select name="logradouroCliente" id="logradouroCliente">
					<?php
					//Como logradouro não em tabelas fiz um array
					$logradouro = ['AL' => 'ALAMEDA', 'AV' => 'AVENIDA', 'BC' => 'BECO', 'BL' => 'BLOCO', 'CAM' => 'CAMINHO', 'EST' => 'ESTAÇÃO', 'FAZ' => 'FAZENDA', 'GL' => 'GALERIA', 'LD' => 'LADEIRA', 'LGO' => 'LARGO', 'PÇA' => 'PRAÇA', 'PRQ' => 'PARQUE', 'PR' => 'PRAIA', 'KM' => 'QUILÔMETRO', 'ROD' => 'RODOVIA', 'R' => 'RUA', 'SQD' => 'SUPER QUADRA', 'TRV' => 'TRAVESSA', 'VD' => 'VIADUTO', 'VL' => 'VILA'];

					//Caso a chave do array for igual ao que está no banco o option selecionado será o guardado
					foreach ($logradouro as $key => $value) {
						if ($key == $clienteDAO->getLogradouroCliente()) {
							$select = 'selected';
						} else {
							$select = "";
						}
						echo "<option $select value='$key'>$value</option>";
					}
					?>
				</select>
			</div>

			<div class="formItem">
				<label for="numComplCliente">Número</label>
				<input type="text" name="numComplCliente" id="numComplCliente" value="<?= $clienteDAO->getNumComplCliente() ?>">
			</div>
			<div class="formItem">
				<label for="complEndCliente">Complemento</label>
				<input type="text" name="complEndCliente" id="complEndCliente" value="<?= $clienteDAO->getComplementoCliente() ?>">
			</div>


			<input type="submit" name="atualizar" value="Atualizar">
		</form>

		<?php
		//Chama estrutura para formulário de img 
		include "includes/perfilImg.php";
		?>

		<?php
		//Chama estrutura para trocar senha
		include "includes/trocarSenha.php"
		?>
	</div>
</section>