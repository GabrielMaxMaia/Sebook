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

//Retorna a que tem no usuarioDao
$resultUsuario = $usuarioDAO->listarUsuarioId();
$usuarioDAO->setSenhaUsuario($resultUsuario['senhaUsuario']);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {

	$clienteDAO->setNumComplCliente($_POST['numComplCliente']);
	$clienteDAO->setSexoCliente($_POST['sexoCliente']);
	$clienteDAO->setComplementoCliente($_POST['complEndCliente']);
	$clienteDAO->setLogradouroCliente($_POST['logradouroCliente']);
	$clienteDAO->setCpfCliente($_POST['cpfCliente']);
	$clienteDAO->setCepCliente($_POST['cepCliente']);
	$clienteDAO->setNascimentoCliente($_POST['nascCliente']);

	$clienteDAO->alterarCliente();
	header("Location:" . _URLBASE_ . "area/user/pages/perfilLeitor");
}

?>
<!-- Perfil -->
<section class="cadastro">
	<div class="container">
		<form action="" method="post" name="atualizarCampos">

			<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $clienteDAO->getIdUsuario() ?>">

			<div class="formItem">
				<label for="nascCliente">Data de Nascimento</label>
				<?php
				$date = date_create($clienteDAO->getNascimentoCliente());
				$newDate = date_format($date, "d/m/Y");
				?>
				<input type="text" name="nascCliente" id="nascCliente" value="<?=
																					trim($newDate) ?> ">
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

		<!--Modal-->
		<label class="btn-modal-cadastre" for="modal-cadastre">Trocar senha?</label>
		<section class="modal">
			<input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
			<div class="modal-wrap" aria-hidden="true" role="dialog">
				<label class="modal-overlay" for="modal-cadastre"></label>
				<div class="modal-dialog">
					<div class="modal-header">
						<h2>Mudar sua senha</h2>
						<label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
					</div>
					<div class="modal-body">
						<form name="mudarSenha" method="post">
							<label for="senhaAtual">Senha Atual</label>
							<input type="text" name="senhaAtual" id="senhaAtual">
							<label for="senhaNova">Nova senha</label>
							<input type="text" name="senhaNova">
							<input type="submit" name="trocarSenha">
						</form>
					</div>
					<div class="modal-footer">
						<label class="btn btn-primary" for="modal-cadastre">Fechar</label>
					</div>
				</div>
			</div>
		</section>
		<?php
		if (isset($_POST['trocarSenha'])) {
			if ($_POST['senhaAtual'] == $usuarioDAO->getSenhaUsuario()) {
				$usuarioDAO->setSenhaUsuario($_POST['senhaNova']);
				$usuarioDAO->alterarSenhaUsuario();
				echo "senha trocada";
			} else {
				echo 'Senha não confere';
			}
		}
		var_dump($usuarioDAO->getSenhaUsuario());
			var_dump($_POST['senhaAtual']);
		?>
	</div>
</section>