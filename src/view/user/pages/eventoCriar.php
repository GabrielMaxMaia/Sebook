<?php
$title = "Criar Evento";

use Model\EventoDAO;
use Model\UsuarioDAO;
use Model\SeboDAO;
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

	if ($_POST['txtEvento'] != "") {
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

	if ($_POST['eventoLocal'] != "" || $_POST['eventoLocal'] != null) {
		$eventoDAO->setLocalEvento(trim($_POST['eventoLocal']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha o Endereço</li>";
	}

	if ($_POST['eventoCidade'] != "" || $_POST['eventoCidade'] != null) {
		$eventoDAO->setCidadeEvento(trim($_POST['eventoCidade']));
	} else {
		$erro = true;
		$erroMen .= "<li>Selecione a Cidade</li>";
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

if ($idUser != null && $idUser != "") {
	if ($acessoUser != 4 && $acessoUser != 3) {
		$block = false;
		if($acessoUser == 5){

			$seboDAO = new SeboDAO($objSql);
			$seboDAO->setIdUsuario($idUser);
			$resultSebo = $seboDAO->listarSeboId();

			if ($resultSebo['cnpjSebo'] == "" || $resultSebo['nomeFantasia'] == "" || $resultSebo['cepEndSebo'] == "") {
				$block = true;
				echo "<section class='mensagemParaSebo'>
						<p>
						Conclua seu cadastro para ter todas funcionalidades dentro da plataforma.
						<br>
						<a href='"._URLBASE_."area/user/pages/perfilSebo'><Atualizar><b>Atualizar agora</b></a>
						</p>
					</section>";
			}
		}
		if ($block != true){
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

			<label for="eventoLocal">Endereço</label>
			<input class="grande" type="text" name="eventoLocal" id="eventoLocal" value="<?= $_POST['eventoLocal'] ?? "" ?>">

			<label for="eventoCidade">Cidade</label>
			<select name="eventoCidade" id="eventoCidade">
				<optgroup label="Selecione a Cidade">
					<?php
                //Inclui o arquivo de array cidades
				include "src/view/user/pages/includes/arrayCidades.php";
				
                foreach ($cidades as $cidade) {
                    ?>
					<option value="<?= $cidade ?>" name="eventoCidade" id="eventoCidade" value="">
						<?= $cidade ?>
					</option>
					<?php
                }
                ?>
				</optgroup>
			</select>

			<label for="txtEvento">Descrição</label>
			<textarea name="txtEvento" id="txtEvento" maxlength="255"><?= $_POST['txtEvento']?? "" ?></textarea>

			<input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoDAO->getUrlFotoEvento() ?>">

			<input type="submit" name="enviar" value="Cadastrar" class="inputEnvia">
		</form>
	</section>
	<?php
		} 
	}else{
			echo "<p class='class='mensagemParaEspertinhos''>Sua conta não permite criar Eventos</p>";
		}
	?>
<?php

} else {
	echo "<p class='commentMenssagem'>É necessário estar Logado para criar uma Publicação</p>";
}

?>