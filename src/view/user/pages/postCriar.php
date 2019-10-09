<?php

use Model\PostagemDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";

//Seta armazena o idPost em setIdPost
$postagemDAO->setIdUsuario($IdSessaoUser);

if (isset($IdSessaoUser)) {
	if (isset($_POST['enviar'])) {
		$postagemDAO->setTituloPostagem($_POST['titulo']);
		$postagemDAO->setTxtPostagem($_POST['conteudo']);
		$postagemDAO->setDatahoraPostagem(date('Y-m-d H:i:s'));
		//Chama a função listaPostagemId
		$postagemDAO->adicionarPostagem();
		header("Location:" . _URLBASE_ . "area/user/pages/postListar");
	}
}

?>

<h1>Criar Publicação</h1>

<form method="post" action="">
	<span>Titulo</span><br>
	<input type="text" name="titulo"><br><br>

	<span>Conteúdo</span><br>
	<textarea name="conteudo" cols="25" rows="5"></textarea>

	<input type="submit" name="enviar" value="Cadastrar">
</form>