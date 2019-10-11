<?php

// use Model\ClienteDAO;
// use Model\UsuarioDAO;

// //Pega a conexão
// $objSql = new Util\Sql($conn);
// //Passa a conexão para o dao
// $clienteDAO = new ClienteDAO($objSql);
// $usuarioDAO = new UsuarioDAO($objSql);

// //Seta o id para o clinete por meio da sessão do usuário
// $clienteDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);
// $usuarioDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);

// //Seta os valores para o dao
// $result = $clienteDAO->listarClienteId();
// $clienteDAO->setSexoCliente($result['sexoCliente']);
// $clienteDAO->setComplementoCliente($result['complEndCliente']);
// $clienteDAO->setLogradouroCliente($result['logradouroCliente']);
// $clienteDAO->setNumComplCliente($result['numComplCliente']);
// $clienteDAO->setCpfCliente($result['cpfCliente']);
// $clienteDAO->setCepCliente($result['cepCliente']);
// $clienteDAO->setNascimentoCliente($result['nascCliente']);
// $clienteDAO->setUrlFotoCliente($result['urlFotoCliente']);

// //Retorna a que tem no listarUsuarioDaoId
// $resultUsuario = $usuarioDAO->listarUsuarioId();
// //Seta a senha do usuarioDao
// $usuarioDAO->setSenhaUsuario($resultUsuario['senhaUsuario']);

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {

// 	$clienteDAO->setNumComplCliente($_POST['numComplCliente']);
// 	$clienteDAO->setSexoCliente($_POST['sexoCliente']);
// 	$clienteDAO->setComplementoCliente($_POST['complEndCliente']);
// 	$clienteDAO->setLogradouroCliente($_POST['logradouroCliente']);
// 	$clienteDAO->setCpfCliente($_POST['cpfCliente']);
// 	$clienteDAO->setCepCliente($_POST['cepCliente']);
// 	$clienteDAO->setNascimentoCliente($_POST['nascCliente']);
// 	$clienteDAO->setUrlFotoCliente($_POST['urlFotoCliente']);

// 	$clienteDAO->alterarCliente();
// 	header("Location:" . _URLBASE_ . "area/user/pages/perfilLeitor");
// }

?>
<!-- Perfil -->
<section class="cadastro">
	<div class="container">
		<form action="" method="post" name="atualizarCampos">

			<input type="hidden" name="idUsuario" id="idUsuario" value="<?//= $clienteDAO->getIdUsuario() ?>">

			<div class="formItem">
				<label for="nascCliente">Nome Fantasia</label>
				<input type="text" name="nascCliente" id="nascCliente">
			</div>

			<div class="formItem">
				<label for="razaoSocial">Razão Social</label>
				<input type="text" name="razaoSocial" id="razaoSocial">
			</div>
			
			<div class="formItem">
				<label for="cnpj">CNPJ</label>
				<input type="text" name="cnpj" id="cnpj">
			</div>
			
			<div class="formItem">
				<label for="inscEstadual">Inscrição Estadual</label>
				<input type="text" name="inscEstadual" id="inscEstadual">
			</div>
			
			<div class="formItem">
				<label for="cep">CEP</label>
				<input type="text" name="inscEstadual" id="inscEstadual">
			</div>

			<div class="formItem">
				<label for="logradouroCliente">Logradouro</label>
				<select name="logradouroCliente" id="logradouroCliente">
					<?php
					//Como logradouro não em tabelas fiz um array
					$logradouro = ['AL' => 'ALAMEDA', 'AV' => 'AVENIDA', 'BC' => 'BECO', 'BL' => 'BLOCO', 'CAM' => 'CAMINHO', 'EST' => 'ESTAÇÃO', 'FAZ' => 'FAZENDA', 'GL' => 'GALERIA', 'LD' => 'LADEIRA', 'LGO' => 'LARGO', 'PÇA' => 'PRAÇA', 'PRQ' => 'PARQUE', 'PR' => 'PRAIA', 'KM' => 'QUILÔMETRO', 'ROD' => 'RODOVIA', 'R' => 'RUA', 'SQD' => 'SUPER QUADRA', 'TRV' => 'TRAVESSA', 'VD' => 'VIADUTO', 'VL' => 'VILA'];

					//Caso a chave do array for igual ao que está no banco o option selecionado será o guardado
					// foreach ($logradouro as $key => $value) {
					// 	if ($key == $clienteDAO->getLogradouroCliente()) {
					// 		$select = 'selected';
					// 	} else {
					// 		$select = "";
					// 	}
					// 	echo "<option $select value='$key'>$value</option>";
					// }
					?>
				</select>
			</div>

			<div class="formItem">
				<label for="numComplSebo">Número</label>
				<input type="text" name="numComplSebo" id="numComplSebo" value="<?//= $clienteDAO->getNumComplCliente() ?>">
			</div>
			<div class="formItem">
				<label for="complEndCliente">Complemento</label>
				<input type="text" name="complEndCliente" id="complEndCliente" value="<?//= $clienteDAO->getComplementoCliente() ?>">
			</div>

			<div class="formItem">
				<label for="telefone">Telefone</label>
				<input type="text" name="telefone" id="telefone">
			</div>

			<div class="formItem">
				<label for="Celular1">Celular 1</label>
				<input type="text" name="Celular1" id="Celular1">
			</div>

			<div class="formItem">
				<label for="Celular2">Celular 2</label>
				<input type="text" name="Celular2" id="Celular2">
			</div>

			<div class="formItem">
				<label for="linkSite">Link e/ou site</label>
				<input type="text" name="linkSite" id="linkSite">
			</div>
			<div class="formItem">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email">
			</div>

			<!--Foto campo escondifo-->
			<input type="hidden" name="urlFotoCliente" id="urlFotoCliente" value="<?//= $clienteDAO->getUrlFotoCliente() ?>">

			<input type="submit" name="atualizar" value="Atualizar">
		</form>

		<!--Formulário de foto-->
		<div class="img">
			<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/cadUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">
				<input type="file" name="urlFotoCliente">
				<!-- <input type="file" name="arqImagem"> -->
				<input class="button" type="submit" value="Carregar">
			</form>
			<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
		</div>
		<div class="imgCadastro">
			<picture>
				<img id="imgAvatar" src="<?//= "http://localhost/sebook/" . $clienteDAO->getUrlFotoCliente()  ?>" alt="Avatar" class="avatar">
			</picture>
		</div>

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
		<?php
		if (isset($_POST['senhaNova'])) {
			$senhaAtual = $_POST['senhaAtual'] ?? null;
			if (password_verify($senhaAtual,  $usuarioDAO->getSenhaUsuario())) {
				$usuarioDAO->setSenhaUsuario($_POST['senhaNova']);
				$usuarioDAO->alterarSenhaUsuario();
				echo "senha trocada";
			} else {
				echo 'Senha não confere';
			}
		}
		?>
	</div>
</section>