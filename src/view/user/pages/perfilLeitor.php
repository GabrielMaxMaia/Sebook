<?php

use Model\ClienteDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
//Passa a conexão para o dao
$clienteDAO = new ClienteDAO($objSql);

//Seta o id para o clinete por meio da sessão do usuário
$clienteDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);
//Seta os valores para o dao
$result = $clienteDAO->listarClienteId();
$clienteDAO->setSexoCliente($result['sexoCliente']);
$clienteDAO->setComplementoCliente($result['complEndCliente']);
$clienteDAO->setLogradouroCliente($result['logradouroCliente']);
$clienteDAO->setNumComplCliente($result['numComplCliente']);
$clienteDAO->setCpfCliente($result['cpfCliente']);
$clienteDAO->setCepCliente($result['cepCliente']);
$clienteDAO->setNascimentoCliente($result['nascCliente']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$clienteDAO->setNumComplCliente($_POST['numComplCliente']);
	$clienteDAO->setSexoCliente($_POST['sexoCliente']);
	$clienteDAO->setComplementoCliente($_POST['complEndCliente']);
	$clienteDAO->setLogradouroCliente($_POST['logradouroCliente']);
    $clienteDAO->setCpfCliente($_POST['cpfCliente']);
	$clienteDAO->setCepCliente($_POST['cepCliente']);
	$clienteDAO->setNascimentoCliente($_POST['nascCliente']);

	$clienteDAO->alterarCliente();
	// $clienteDAO->adicionarCliente();
	//echo "Dados atualizados";
	header("Location:". _URLBASE_ . "area/user/pages/perfilLeitor");
}

?>
<!-- Perfil -->
<section class="cadastro">
	<div class="container">
		<form action="" method="post">

			<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $clienteDAO->getIdUsuario() ?>">

			<div class="formItem">
				<label for="nascCliente">Data de Nascimento</label>
				<input type="text" name="nascCliente" id="nascCliente" value="<?= $clienteDAO->getNascimentoCliente() ?> ">
			</div>

			<div class="formItem">
				<label for="sexoCliente">Sexo</label>
				<select class="" name="sexoCliente" id="sexoCliente">
					<optgroup label="Sexo">
						<?php 
							$sexo = ['M', 'F'];
							foreach ($sexo as $s){
								if($s == $clienteDAO->getSexoCliente()){
									$select = "selected";
								}else{
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
	</div>
</section>