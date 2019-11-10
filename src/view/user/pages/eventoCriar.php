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
// include "includes/evitarReenvio.php";

if (isset($_POST['enviar']) != null || "") {
	$erro = false;
	$erroMen = "";
	if ($_POST['nomeEvento'] != "") {
		$eventoDAO->setNomeEvento(trim($_POST['nomeEvento']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha o Nome do evento</li>";
	}

	if ($_POST['nomeEvento'] != "") {
		$eventoDAO->setTxtEvento(trim($_POST['txtEvento']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha a descrição</li>";
	}

	if ($_POST['dataEvento'] != "" || $_POST['dataEvento'] != null) {
		$eventoDAO->setDataEvento(trim($_POST['dataEvento']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha a data</li>";
	}

	if ($_POST['horaEvento'] != "" || $_POST['horaEvento'] != null) {
		$eventoDAO->setHoraEvento(trim($_POST['horaEvento']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha a hora</li>";
	}

	if ($erro == true) {
		echo "<ul class='errorList' style='display:block;'>$erroMen</ul>" ?? "";
	}

	if ($erro != true) {
		$eventoDAO->setUrlFotoEvento($_POST['txtImg']);

		//Chama a função listaPostagemId
		$eventoDAO->adicionarEvento();
		header("Location:" . _URLBASE_ . "area/user/pages/eventoListar");
	}
}

if ($IdSessaoUser != null || "") {
	?>
	<section class="containerCriacao">
		<header class="headerPagina">
			<h1>Criar Evento</h1>
		</header>
		<?php
			//Chama estrutura para formulário de img 
			include "includes/formEventoImg.php";
		?>
		<form method="post" action="" class="formCriacao">
			<label for="nomeEvento">Nome do Evento</label>
			<input type="text" name="nomeEvento" id="nomeEvento" value="<?= $_POST['nomeEvento'] ?? "" ?>">

			<label for="dataEvento">Data</label>
			<input class="grande" type="date" name="dataEvento" id="dataEvento" value="<?= $eventoDAO->getDataEvento() ?>">

			<label for="horaEvento">Hora</label>
			<input class="grande" type="time" name="horaEvento" id="horaEvento" min="00:00" max="23:59" value="<?= $_POST['horaEvento'] ?? "" ?>">

			<label for="txtEvento">Descrição</label>
			<textarea name="txtEvento" id="txtEvento"><?= $_POST['txtEvento']?? "" ?></textarea>

			<input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoDAO->getUrlFotoEvento() ?>">

			<input type="submit" name="enviar" value="Cadastrar">
		</form>
	</section>
<?php

} else {
	echo "<p>É necessário estar Logado para criar uma Publicação</p>";
}

?>