<?php

use Model\ClienteDAO;
use Model\UsuarioDAO;

if ($acessoUser != "") {

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
	//var_dump($result);
	$clienteDAO->setSexoCliente($result['sexoCliente']);
	$clienteDAO->setComplementoCliente($result['complEndCliente']);
	$clienteDAO->setLogradouroCliente($result['logradouroCliente']);
	$clienteDAO->setNumComplCliente($result['numComplCliente']);
	$clienteDAO->setCpfCliente($result['cpfCliente']);
	$clienteDAO->setCepCliente($result['cepCliente']);
	$clienteDAO->setNascimentoCliente($result['nascCliente']);
	$usuarioDAO->setUrlFoto($result['urlFoto']);

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

		$date = date_create(str_replace('/', '-', $_POST['nascCliente']));
		$newDate = date_format($date, "Y-m-d");

		$clienteDAO->setNascimentoCliente($newDate);

		if (isset($_POST['nomeUsuario']) || isset($_POST['sobrenomeUsuario']) || isset($_POST['emailUsuario'])) {

			$usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
			$usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
			$usuarioDAO->setEmailUsuario($_POST['emailUsuario']);
			$usuarioDAO->setUrlFoto($_POST['txtImg']);

			$usuarioDAO->alterarInfoUsuario();
		}

		$clienteDAO->alterarCliente();
	}

	?>

	<?php
		if (isset($_POST['senhaNova'])) {
			$senhaAtual = $_POST['senhaAtual'] ?? null;
			if (password_verify($senhaAtual,  $usuarioDAO->getSenhaUsuario())) {
				$usuarioDAO->setSenhaUsuario($_POST['senhaNova']);
				$usuarioDAO->alterarSenhaUsuario();
				echo "<p class='successCad'>senha trocada com sucesso!</p>";
			} else {
				echo "<p class='errorCad'>Senha não confere</p>";
			}
		}
		?>

	<!-- Perfil -->
	<section class="cadastro">
		<header>
			<p>Atualizar meus dados</p>
		</header>

		<?php include "includes/perfilImg.php"; ?>

		<form action="" method="post" class="formPefil">

			<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $clienteDAO->getIdUsuario() ?>">

			<!--Foto campo escondifo-->
			<input type="hidden" name="txtImg" id="txtImg" value="<?= $usuarioDAO->getUrlFoto() ?>">

			<div class="formItem">
				<label for="nomeUsuario">Nome</label>
				<input type="text" name="nomeUsuario" id="nomeUsuario" required value="<?= $usuarioDAO->getNomeUsuario() ?>" onblur='valida_nome(this.value)'>
			</div>

			<div class="formItem">
				<label for="nomeUsuario">Sobrenome</label>
				<input type="text" name="sobrenomeUsuario" id="sobrenomeUsuario" required value="<?= $usuarioDAO->getSobrenomeUsuario()  ?>" onblur='valida_sobrenome(this.value)'>
			</div>


			<div class="formItem">
				<label for="emailUsuario">E-mail</label>
				<input type="text" name="emailUsuario" id="emailUsuario" required value="<?= $usuarioDAO->getEmailUsuario()  ?>" onblur='mascaraEmail(this)'>
			</div>


			<div class="formItem">
				<label for="nascCliente">Data de Nascimento</label>
				<?php
					$date = date_create($clienteDAO->getNascimentoCliente());
					$newDate = date_format($date, "d/m/Y");
					?>
				<input type="text" name="nascCliente" id="nascCliente" required value="<?= trim($newDate) ?>" onblur='mascaraDataNasc(this)'>
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
				<input type="text" name="cpfCliente" id="cpfCliente" value="<?= $clienteDAO->getCpfCliente() ?>" onblur="valida(this.value)">
			</div>
			<div class="formItem">
				<label for="cepCliente">CEP</label>
				<input type="text" name="cepCliente" id="cepCliente" value="<?= $clienteDAO->getCepCliente() ?>" onblur="pesquisacep(this.value);">
			</div>
			<div class="formItem">
				<label for="logradouroCliente">Logradouro</label>
				<select name="logradouroCliente" id="logradouroCliente">
					<?php
						//Como logradouro não tabelas fiz um array
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
				<input type="text" name="numComplCliente" id="numComplCliente" value="<?= $clienteDAO->getNumComplCliente() ?>" onblur="valida_numero(this.value);">
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
							<input type="password" name="senhaAtual" id="senhaAtual">
							<label for="senhaNova">Nova senha</label>
							<input type="password" name="senhaNova">
							<input type="submit" name="trocarSenha">
						</form>
					</div>
					<div class="modal-footer">
						<label class="btn btn-primary" for="modal-cadastre">Fechar</label>
					</div>
				</div>
			</div>
		</section>

	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#cpfCliente").mask("999.999.999-99");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#nascCliente").mask("99/99/9999");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#cepCliente").mask("99999-999");
		});
	</script>
<?php
} else {
	header("Location:" . _URLBASE_);
}
?>