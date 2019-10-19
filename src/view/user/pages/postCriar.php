<?php

use Model\PostagemDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$postagemDAO = new PostagemDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";
//Seta armazena o idPost em setIdPost
$postagemDAO->setIdUsuario($IdSessaoUser);
$postagemDAO->setUrlFotoPostagem('public/img/imgPost/imgPadrao/padrao.jpg');


//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['enviar']) != null || "") {
	$postagemDAO->setTituloPostagem($_POST['titulo']);
	$postagemDAO->setTxtPostagem($_POST['conteudo']);
	$postagemDAO->setDatahoraPostagem(date('Y-m-d H:i:s'));
	$postagemDAO->setUrlFotoPostagem($_POST['txtImg']);

	//Chama a função listaPostagemId
	$postagemDAO->adicionarPostagem();
	header("Location:" . _URLBASE_ . "area/user/pages/postListar");
}

if ($IdSessaoUser != null || "") {

	?>
	<h1>Criar Publicação</h1>

	<form method="post" action="">
		<span>Titulo</span><br>
		<input type="text" name="titulo"><br><br>

		<span>Conteúdo</span><br>
		<textarea name="conteudo" cols="25" rows="5"></textarea>

		<input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemDAO->getUrlFotoPostagem() ?>">

		<input type="submit" name="enviar" value="Cadastrar">
	</form>
<?php
	//Chama estrutura para formulário de img 
	include "includes/formPostImg.php";
} else {
	echo "É necessário estar Logado para criar uma Publicação";
}

?>