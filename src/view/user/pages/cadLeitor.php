<?php

use Model\ClienteDAO;
use Model\UsuarioDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$clienteDAO = new ClienteDAO($sql);
$usuarioDAO = new UsuarioDAO($sql);
//Pega a sessão se hover, caso contrario string vazia
//$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";

if (isset($_POST['enviar']) != null || "") {
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
	if ($_POST['senhaUsuario'] == $_POST['repeteSenhaUsuario']) {
		$usuarioDAO->setSenhaUsuario($_POST['senhaUsuario']);
	} else {
		$erro = true;
		echo "Preencha a senha";
	}

	if (isset($erro) != true) {
		$usuarioDAO->setIdPerfil(5);
		$usuarioDAO->setDataCriacao(date('Y-m-d H:i:s'));
		$usuarioDAO->adicionarUsuario();
		//header("Location:" . _URLBASE_ . "area/user/pages/postListar");
	}
	

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
				<input type="text" id="nomeUsuario" name="nomeUsuario">
			</div>
			<div class="formItem">
				<label for="sobrenomeUsuario">Sobrenome</label>
				<input type="text" id="sobrenomeUsuario" name="sobrenomeUsuario">
			</div>

			<div class="formItem">
				<label for="">Data de Nascimento</label>
				<input type="text">
			</div>
			<div class="formItem">
				<label for="">Sexo</label>
				<input type="radio" id="feminino" value="feminino" name="genero">
				<label for="feminino">Feminino</label>
				<input type="radio" id="masculino" value="masculino" name="genero">
				<label for="masculino">Masculino</label>
			</div>
			<div class="formItem">
				<label for="">CPF</label>
				<input type="text">
			</div>
			<div class="formItem">
				<label for="">CEP</label>
				<input type="text">
			</div>
			<div class="formItem">
				<label for="">Logradouro</label>
				<select name=" Logradouro ">
					<option value=" AL"> ALAMEDA </option>
					<option value=" AV">AVENIDA </option>
					<option value=" BC "> BECO </option>
					<option value=" BL "> BLOCO </option>
					<option value=" CAM "> CAMINHO </option>
					<option value=" EST "> ESTAÇÃO </option>
					<option value=" FAZ "> FAZENDA </option>
					<option value=" GL"> GALERIA </option>
					<option value=" LD"> LADEIRA </option>
					<option value=" LGO "> LARGO </option>
					<option value=" PÇA "> PRAÇA </option>
					<option value=" PRQ "> PARQUE </option>
					<option value=" PR "> PRAIA </option>
					<option value=" KM "> QUILÔMETRO </option>
					<option value=" ROD "> RODOVIA </option>
					<option value=" R "> RUA </option>
					<option value=" SQD "> SUPER QUADRA </option>
					<option value=" TRV "> TRAVESSA </option>
					<option value=" VD "> VIADUTO </option>
					<option value=" VL "> VILA </option>
				</select>
			</div>
			<div class="formItem">
				<label for="">Número</label>
				<input type="text">
			</div>
			<div class="formItem">
				<label for="">Complemento</label>
				<input type="text">
			</div>

			
			<div class="formItem">
				<label for="emailUsuario">E-mail</label>
				<input type="text" name="emailUsuario" id="emailUsuario">
			</div>
			<div class="formItem">
				<label for="senhaUsuario">Senha</label>
				<input type="password" name="senhaUsuario" id="senhaUsuario">
			</div>
			<div class="formItem">
				<label for="">Repita a senha</label>
				<input type="password" name="repeteSenhaUsuario" id="repeteSenhaUsuario">
			</div>
			<input type="submit" name="enviar" value="Cadastrar">
		</form>
	</div>
</section>