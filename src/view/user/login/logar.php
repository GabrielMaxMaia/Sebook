<?php
$title = "Login";
$menuHide = true;
$cssCaminho = '<link rel="stylesheet" href="http://localhost/sebook/public/css/login.css">';
$styleSobrescrito =
    "<style>
.containerScroll{
    display:flex;
    overflow:hidden
}
div#containerTemplate{
    align-self:center
}
</style>";
?>

<?php

    $sql = new \Util\Sql($conn);

    $autenticadorController = new \Controller\AutentificadorController($sql);

   // $autenticadorController->validarAcesso('http://localhost/Sebook/area/adm',array(0=>1, 1=>2));

    $autenticadorController->efetuarLogin();
    $autenticadorController->efetuarLogOut();

?>

<div class="linkTop">
	<a href="<?= _URLBASE_ ?>">Voltar | Home</a>
</div>
<div class="containerLogin">
	<article class="loginSpace">
		<section class="login">
			<figure>
				<img src="<?= _ICONBASE_ ?>login.svg" alt="Login" title="Login">
				<figcaption>LOGIN</figcaption>
			</figure>
			<label class="btn-modal-cadastre" for="modal-cadastre">Primeiro Acesso? Cadastre-se</label>

			<form method="post">
				<label for="email">Email:</label>
				<input class='inputLogin' type='text' placeholder='Usuário' name='txtUsuario' id='email'>

				<label for="senha">Senha:</label>
				<input class='inputLogin' type='password' placeholder='Senha' name='txtSenha' id='senha'>
                
                <input class='button' type='submit' value='Entrar'>
			</form>
			<div class="linkGroup">
				<a href="">Esqueci minha senha</a>
			</div>
		</section>

		<!--Modal-->
		<section class="modal">
			<input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
			<div class="modal-wrap" aria-hidden="true" role="dialog">
				<label class="modal-overlay" for="modal-cadastre"></label>
				<div class="modal-dialog">
					<div class="modal-header">
						<h2>Selecione a opção de cadastro</h2>
						<label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
					</div>
					<div class="modal-body">
						<div class="content-modal-cadastre">
							<a class="btn-modal" href="<?= _URLBASE_?>area/user/pages/cadLeitor">Sou Leitor</a>
							<span>OU</span>
							<a class="btn-modal blue" href="<?= _URLBASE_?>area/user/pages/cadSeboFisica">Sou Sebo</a>
						</div>
					</div>
					<div class="modal-footer">
						<label class="btn btn-primary" for="modal-cadastre">Fechar</label>
					</div>
				</div>
			</div>
		</section>
	</article>
</div>