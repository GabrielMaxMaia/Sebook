<?php

use Model\SeboDAO;
use Model\UsuarioDAO;

if ($acessoUser != "") {

	// Pega a conexão
	$objSql = new Util\Sql($conn);
	//Passa a conexão para o dao
	$seboDAO = new SeboDAO($objSql);
	$usuarioDAO = new UsuarioDAO($objSql);

	// //Seta o id para o clinete por meio da sessão do usuário
	$seboDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);
	$usuarioDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);

	// //Seta os valores para o dao
	$result = $seboDAO->listarSeboId();
	$seboDAO->setNomeFantasia($result['nomeFantasia']);
	$seboDAO->setRazaoSebo($result['razaoSebo']);
	$seboDAO->setCnpjSebo($result['cnpjSebo']);
	$seboDAO->setInscEstadualSebo($result['inscEstadualSebo']);
	$seboDAO->setCepEndSebo($result['cepEndSebo']);
	$seboDAO->setLogradouroSebo($result['logradouroSebo']);
	$seboDAO->setCidadeSebo($result['cidadeSebo']);
	$seboDAO->setNumEndSebo($result['numEndSebo']);
	$seboDAO->setComplEndSebo($result['complEndSebo']);
	$seboDAO->setUrlFotoSebo($result['urlFotoSebo']);
	$seboDAO->setNumTelSebo($result['numTelSebo']);
	$seboDAO->setCelular1Sebo($result['celular1Sebo']);
	$seboDAO->setCelular2Sebo($result['celular2Sebo']);
	$seboDAO->setUrlSiteSebo($result['urlSiteSebo']);

	// Retorna a que tem no listarUsuarioDaoId
	$resultUsuario = $usuarioDAO->listarUsuarioId();
	//Seta a senha do usuarioDao
	$usuarioDAO->setSenhaUsuario($resultUsuario['senhaUsuario']);
	$usuarioDAO->setNomeUsuario(($resultUsuario['nomeUsuario']));
	$usuarioDAO->setSobrenomeUsuario($resultUsuario['sobrenomeUsuario']);
	$usuarioDAO->setEmailUsuario($resultUsuario['emailUsuario']);

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {

		$seboDAO->setNomeFantasia($_POST['nomeFantasia']);
		$seboDAO->setRazaoSebo($_POST['razaoSebo']);
		$seboDAO->setCnpjSebo($_POST['cnpjSebo']);
		$seboDAO->setInscEstadualSebo($_POST['inscEstadualSebo']);
		$seboDAO->setCepEndSebo($_POST['cepEndSebo']);
		$seboDAO->setLogradouroSebo($_POST['logradouroSebo']);
		$seboDAO->setCidadeSebo($_POST['cidadeSebo']);
		$seboDAO->setNumEndSebo($_POST['numEndSebo']);
		$seboDAO->setComplEndSebo($_POST['complEndSebo']);
		$seboDAO->setNumTelSebo($_POST['numTelSebo']);
		$seboDAO->setCelular1Sebo($_POST['celular1Sebo']);
		$seboDAO->setCelular2Sebo($_POST['celular2Sebo']);
		$seboDAO->setUrlSiteSebo($_POST['urlSiteSebo']);
		$seboDAO->setUrlFotoSebo($_POST['txtImg']);

		if (isset($_POST['nomeUsuario']) || isset($_POST['sobrenomeUsuario']) || isset($_POST['emailUsuario'])) {

			$usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
			$usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
			$usuarioDAO->setEmailUsuario($_POST['emailUsuario']);

			$usuarioDAO->alterarInfoUsuario();
		}

		$seboDAO->alterarSebo();
	}

	?>
	<!-- Perfil -->
	<section class="cadastro">
		<div class="container">
			<form action="" method="post" name="atualizarCampos">

				<!--Foto campo escondifo-->
				<input type="hidden" name="txtImg" id="txtImg" value="<?= $seboDAO->getUrlFotoSebo() ?>">

				<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $seboDAO->getIdUsuario() ?>">

				<div class="formItem">
					<label for="nomeUsuario">Nome</label>
					<input type="text" name="nomeUsuario" id="nomeUsuario" required oninvalid="this.setCustomValidity('Campo Obrigatório!')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= $usuarioDAO->getNomeUsuario() ?>" onblur='valida_nome(this.value)'>
				</div>

				<div class="formItem">
					<label for="nomeUsuario">Sobrenome</label>
					<input type="text" name="sobrenomeUsuario" id="sobrenomeUsuario" required oninvalid="this.setCustomValidity('Campo Obrigatório!')" onchange="try{setCustomValidity('')}catch(e){}" value="<?= $usuarioDAO->getSobrenomeUsuario()  ?>" onblur='valida_sobrenome(this.value)'>
				</div>

				<div class="formItem">
					<label for="emailUsuario">E-mail</label>
					<input type="text" name="emailUsuario" id="emailUsuario" required value='<?= $usuarioDAO->getEmailUsuario() ?>' onblur='mascaraEmail(this)'>
				</div>


				<div class="formItem">
					<label for="nomeFantasia">Nome Fantasia</label>
					<input type="text" name="nomeFantasia" id="nomeFantasia" value="<?= $seboDAO->getNomeFantasia() ?>">
				</div>

				<div class="formItem">
					<label for="razaoSebo">Razão Social</label>
					<input type="text" name="razaoSebo" id="razaoSebo" value="<?= $seboDAO->getRazaoSebo() ?>">
				</div>

				<div class="formItem">
					<label for="cnpjSebo">CNPJ</label>
					<input type="text" name="cnpjSebo" id="cnpjSebo" required value="<?= $seboDAO->getCnpjSebo() ?>" onblur='valida_cnpj(this)'>
				</div>

				<div class="formItem">
					<label for="inscEstadualSebo">Inscrição Estadual</label>
					<input type="text" name="inscEstadualSebo" id="inscEstadualSebo" value="<?= $seboDAO->getInscEstadualSebo() ?>" onblur='CheckIE(this)'>
				</div>

				<div class="formItem">
					<label for="cepEndSebo">CEP</label>
					<input type="text" name="cepEndSebo" id="cepEndSebo" require value="<?= $seboDAO->getCepEndSebo() ?>" onblur="pesquisacepsebo(this.value);">
				</div>

				<div class="formItem">
					<label for="cidadeSebo">Cidade</label>
					<select name="cidadeSebo" id="cidadeSebo">
						<optgroup label="Cidade">
							<?php
								 //Inclui o arquivo de array cidades
								 include "src/view/user/pages/includes/arrayCidades.php";
								 foreach ($cidades as $value) {
									if ($value == $seboDAO->getCidadeSebo()) {
										$select = 'selected';
									} else {
										$select = "";
									}
									echo "<option $select value='$value'>$value</option>";
								}
								?>
						</optgroup>
					</select>
				</div>

				<div class="formItem">
					<label for="numEndSebo">Número</label>
					<input type="text" name="numEndSebo" id="numEndSebo" required value="<?= $seboDAO->getNumEndSebo() ?>" onblur='valida_numerosebo(this.value)'>
				</div>

				<div class="formItem">
					<label for="logradouroSebo">Logradouro</label>
					<select name="logradouroSebo" id="logradouroSebo">
						<?php
							//Como logradouro não em tabelas fiz um array
							$logradouro = ['AL' => 'ALAMEDA', 'AV' => 'AVENIDA', 'BC' => 'BECO', 'BL' => 'BLOCO', 'CAM' => 'CAMINHO', 'EST' => 'ESTAÇÃO', 'FAZ' => 'FAZENDA', 'GL' => 'GALERIA', 'LD' => 'LADEIRA', 'LGO' => 'LARGO', 'PÇA' => 'PRAÇA', 'PRQ' => 'PARQUE', 'PR' => 'PRAIA', 'KM' => 'QUILÔMETRO', 'ROD' => 'RODOVIA', 'R' => 'RUA', 'SQD' => 'SUPER QUADRA', 'TRV' => 'TRAVESSA', 'VD' => 'VIADUTO', 'VL' => 'VILA'];

							//Caso a chave do array for igual ao que está no banco o option selecionado será o guardado
							foreach ($logradouro as $key => $value) {
								if ($key == $seboDAO->getLogradouroSebo()) {
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
					<label for="complEndSebo">Complemento</label>
					<input type="text" name="complEndSebo" id="complEndSebo" value="<?= $seboDAO->getComplEndSebo() ?>">
				</div>

				<div class="formItem">
					<label for="numTelSebo">Telefone</label>
					<input type="text" name="numTelSebo" id="numTelSebo" placeholder='(00) 0000-0000' required value="<?= $seboDAO->getNumTelSebo() ?>" onblur='mascaraTel(this)'>
				</div>

				<div class="formItem">
					<label for="celular1Sebo">Celular 1</label>
					<input type="text" name="celular1Sebo" id="celular1Sebo" placeholder='(00) 00000-0000' required value="<?= $seboDAO->getCelular1Sebo() ?>" onblur='mascaraTel(this)'>
				</div>

				<div class="formItem">
					<label for="celular2Sebo">Celular 2</label>
					<input type="text" name="celular2Sebo" id="celular2Sebo" placeholder='(00) 00000-0000' value="<?= $seboDAO->getCelular2Sebo() ?>" onblur='mascaraTel2(this)'>
				</div>

				<div class="formItem">
					<label for="urlSiteSebo">Link e/ou site</label>
					<input type="text" name="urlSiteSebo" id="urlSiteSebo" Placeholder="Campo Opcional" value="<?= $seboDAO->getUrlSiteSebo() ?>">
				</div>

				<input type="submit" name="atualizar" value="Atualizar">
			</form>

			<?php
				//Chama estrutura para formulário de img
				include "includes/perfilImgSebo.php";
				?>

			<?php
				//Chama estrutura para trocar senha
				include "includes/trocarSenha.php"
				?>
		</div>
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#cnpjSebo").mask("99.999.999/9999-99");
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function() {
			$("#inscEstadualSebo").mask("999.999.999.999");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#cepEndSebo").mask("99999-999");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#numTelSebo").mask("(99) 9999-9999");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#celular2Sebo").mask("(99) 99999-9999");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#celular1Sebo").mask("(99) 99999-9999");
		});
	</script>
<?php
} else {
	header("Location:" . _URLBASE_);
}
?>