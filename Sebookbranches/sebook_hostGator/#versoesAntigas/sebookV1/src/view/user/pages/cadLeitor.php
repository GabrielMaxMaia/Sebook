<?php

use Model\UsuarioDAO;
use Model\ClienteDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$usuarioDAO = new UsuarioDAO($sql);
$clienteDAO = new ClienteDAO($sql);

function evitarReenvio()
{
	//verificar se existe uma variavel de sessão para os dados do form
	if (isset($_SESSION['dadosForm'])) {
		//conteúdo armazenado sessão diferente do conteúdo atual --> ambos em forma de hash
		if ($_SESSION['dadosForm'] != md5(implode($_POST))) {   //novo envio             
			//armazena conteúdo do formulário em forma de hash na varivel de sessao
			$_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
			//indica que não há reenvio de dados
			return true;
		} else { //reenvio
			//conteúdo armazenado sessão é igual do conteúdo atual --> ambos em forma de hash
			//não atualizo a sessão
			return false;
		}
	} else {
		//armazena conteúdo do formulário em forma de hash na varivel de sessao
		$_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
		//indica que não há reenvio de dados
		return true;
	}
}

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
	
		$usuarioDAO->setIdPerfil(5);
		$usuarioDAO->setDataCriacao(date('Y-m-d H:i:s'));
		if(evitarReenvio()){
			$success = true;
			$usuarioDAO->adicionarUsuario();
		}else{
			echo "Usuário já cadastrado";
		}
	}
	if(isset($success)){
		echo "Cadastrado com sucesso";
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