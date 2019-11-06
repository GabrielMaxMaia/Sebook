<?php

use Model\EventoDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$eventoDAO = new EventoDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";
//Seta armazena o idPost em setIdPost
$eventoDAO->setIdUsuario($IdSessaoUser);
$eventoDAO->setUrlFotoEvento('public/img/imgEvento/imgPadrao/imgEventopadrao.jpg');

//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['enviar']) != null || "") {
	$eventoDAO->setNomeEvento($_POST['nomeEvento']);
	$eventoDAO->setTxtEvento($_POST['txtEvento']);
	$eventoDAO->setDataHoraEvento($_POST['dataHoraEvento']);
	$eventoDAO->setUrlFotoEvento($_POST['txtImg']);

	//Chama a função listaPostagemId
	$eventoDAO->adicionarEvento();
	header("Location:" . _URLBASE_ . "area/user/pages/eventoListar");
}

if ($IdSessaoUser != null || "") {

	?>
	<h1>Criar Evento</h1>

	<form method="post" action="">
		<span>Nome do Evento</span><br>
		<input type="text" name="nomeEvento"><br><br>

		<span>Data<span>
		<input type="date" name="dataHoraEvento" id="dataHoraEvento">

		<span>Descrição</span><br>
		<textarea name="txtEvento" cols="25" rows="5"></textarea>
		

		<input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoDAO->getUrlFotoEvento() ?>">

		<input type="submit" name="enviar" value="Cadastrar">
	</form>
<?php
	//Chama estrutura para formulário de img 
	include "includes/formEventoImg.php";
} else {
	echo "É necessário estar Logado para criar uma Publicação";
}

?>