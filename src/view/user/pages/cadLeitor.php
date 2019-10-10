<?php


use Model\UsuarioDAO;
use Model\ClienteDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$usuarioDAO = new UsuarioDAO($sql);
$clienteDAO = new ClienteDAO($sql);

if (isset($_POST['enviar'])) {

	$erro = false;
	//Nome
	if ($_POST['nomeUsuario'] != "") {
		$usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
	} else {
		$erro = true;
		echo "Prencha o nome";
	}
	//Sobrenome
	if ($_POST['sobrenomeUsuario'] != "") {
		$usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
	} else {
		$erro = true;
		echo "Prencha o Sobrenome";
	}
	//Email
	if ($_POST['emailUsuario'] != "") {
		$usuarioDAO->setEmailUsuario($_POST['emailUsuario']);
	} else {
		$erro = true;
		echo "Prencha o E-mail";
	}
	//Senha
	if (($_POST['senhaUsuario'] != $_POST['repeteSenhaUsuario']) != null || "") {
		$erro = true;
		echo "Senhas diferente";
	} else {
		$usuarioDAO->setSenhaUsuario($_POST['senhaUsuario']);
	}

	if ($erro != true) {
		$success = true;
		$usuarioDAO->setIdPerfil(5);
		$usuarioDAO->setDataCriacao(date('Y-m-d H:i:s'));
		$usuarioDAO->adicionarUsuario();

		// $clienteDAO->setIdUsuario($usuarioDAO->getIdUsuario());
		// $clienteDAO->adicionarCliente();
	}
	if(isset($success)){
		echo "Cadastrado com sucesso";
	}

	var_dump($usuarioDAO->listarUsuarioId());
}
?>
<section class="cadastro">
	<div class="container">
		<figure>
			<img src="<?= _ICONBASE_ ?>userSVG.svg" alt="">
			<figcaption>Cadastre-se</figcaption>
		</figure>
		<p>
			<span>Preencha o formulário abaixo</span>
		</p>
		<form action="" method="post">
			<div class="formItem">
				<label for="nomeUsuario">Nome</label>
				<input type="text" id="nomeUsuario" name="nomeUsuario" value="<?= $_POST['nomeUsuario'] ?? '' ?>">
			</div>
			<div class="formItem">
				<label for="sobrenomeUsuario">Sobrenome</label>
				<input type="text" id="sobrenomeUsuario" name="sobrenomeUsuario" value="<?= $_POST['sobrenomeUsuario'] ?? '' ?>">
			</div>

			<div class="formItem">
				<label for="emailUsuario">E-mail</label>
				<input type="text" name="emailUsuario" id="emailUsuario" value="<?= $_POST['emailUsuario'] ?? '' ?>">
			</div>
			<div class="formItem">
				<label for="senhaUsuario">Senha</label>
				<input type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $_POST['senhaUsuario'] ?? '' ?>">
			</div>
			<div class="formItem">
				<label for="">Repita a senha</label>
				<input type="password" name="repeteSenhaUsuario" id="repeteSenhaUsuario" value="<?= $_POST['repeteSenhaUsuario'] ?? '' ?>">
			</div>
			<input type="submit" name="enviar" value="Cadastrar">
		</form>
	</div>
</section>