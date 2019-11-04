<?php

use Model\UsuarioDAO;
use Model\ClienteDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$usuarioDAO = new UsuarioDAO($sql);
$clienteDAO = new ClienteDAO($sql);

include "includes/evitarReenvio.php";

if (isset($_POST['enviar'])) {

	$usuarioDAO->setEmailUsuario($_POST['emailUsuario']);
	$usuarioDAO->listarEmailUsuario();

	if ($usuarioDAO->listarEmailUsuario() > 0) {
		echo "<p class='errorCad'>Email já cadastrado, verifique seus dados.</p>";
	} else {

		$erro = false;
		$erroMen = "";
		//Nome
		if ($_POST['nomeUsuario'] != "") {
			$usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
		} else {
			$erro = true;
			$erroMen .="<li>Prencha o nome</li>";
		}
		//Sobrenome
		if ($_POST['sobrenomeUsuario'] != "") {
			$usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
		} else {
			$erro = true;
			$erroMen .="<li>Prencha o Sobrenome</li>";
		}

		//Senha
		if (($_POST['senhaUsuario'] != $_POST['repeteSenhaUsuario']) != null || $_POST['repeteSenhaUsuario'] == "") {
			$erro = true;
			$erroMen .="<li>Senhas diferem</li>";
		} else {
			$usuarioDAO->setSenhaUsuario($_POST['senhaUsuario']);
		}

		if($erro == true){
			echo "<ul class='errorList' style='display:block;'>$erroMen</ul>" ?? "";
		}

		if ($erro != true) {

			$usuarioDAO->setIdPerfil(4);
			$usuarioDAO->setDataCriacao(date('Y-m-d H:i:s'));
			$usuarioDAO->setUrlFoto('public/icon/user.svg');
			if (evitarReenvio()) {
				$success = true;
				$usuarioDAO->adicionarUsuario();
			} else {
				echo "<p class='errorCad'>Usuário já cadastrado.</p>";
			}
		}
		if (isset($success)) {
			echo "<p class='successCad'>Cadastrado com sucesso.</p>";
		}
	}
}

?>
<section class="cadastro">
	<div class="container">
		<figure>
			<img src="<?= _URLBASE_ ?>public/icon/user.svg" alt="">
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
				<input type="text" name="emailUsuario" id="emailUsuario" required value="<?= $_POST['emailUsuario'] ?? '' ?>" onblur='mascaraEmail(this)'>
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