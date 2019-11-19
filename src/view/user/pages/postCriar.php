<?php
$title = "Criar Publicação";

use Model\PostagemDAO;
use Model\UsuarioDAO;
use Model\SeboDAO;
use Model\ComentarioDAO;


//Pega a conexão
$objSql = new Util\Sql($conn);

$postagemDAO = new PostagemDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);


//Seta armazena o idPost em setIdPost
$postagemDAO->setIdUsuario($idUser);
$postagemDAO->setUrlFotoPostagem('public/img/imgPost/imgPadrao/padrao.jpg');


//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['enviar']) != "") {
	$erro = false;
	$erroMen = "";
	if ($_POST['titulo'] != "") {
		$postagemDAO->setTituloPostagem(trim($_POST['titulo']));
	} else {
		$erro = true;
		$erroMen .= "<li>Prencha o Titulo</li>";
	}
	if ($_POST['conteudo'] != "") {
		$postagemDAO->setTxtPostagem(trim($_POST['conteudo']));
	} else {
		$erro = true;
		$erroMen .= "<li>Digite o conteudo</li>";
	}

	if ($erro == true) {
		echo "<ul class='errorList' style='display:block;'>$erroMen</ul>" ?? "";
	}

	if ($erro != true) {
		$postagemDAO->setDatahoraPostagem(date('Y-m-d H:i:s'));
		$postagemDAO->setUrlFotoPostagem($_POST['txtImg']);

		//Chama a função listaPostagemId
		$postagemDAO->adicionarPostagem();
		header("Location:" . _URLBASE_ . "area/user/pages/postListar");
	}
}

if ($idUser != null && $idUser != "") {
	if ($acessoUser != 4) {
		$block = false;
		if($acessoUser == 5){

			$seboDAO = new SeboDAO($objSql);
			$seboDAO->setIdUsuario($idUser);
			$resultSebo = $seboDAO->listarSeboId();

			if ($resultSebo['cnpjSebo'] == "" || $resultSebo['nomeFantasia'] == "" || $resultSebo['cepEndSebo'] == "") {
				$block = true;
				echo "<p>É preciso concluir seu cadastro para ter todas funcionalidades dentro da plataforma.<br>
				<a href='"._URLBASE_."area/user/pages/perfilSebo'><Atualizar><b>Atualizar agora</b></a>
						</p>";
			}
		}
		if ($block != true){
		?>
		<section class="containerCriacao">
			<header class="headerPagina">
				<h1>Criar Publicação</h1>
			</header>
			<?php
				//Chama estrutura para formulário de img 
				include "includes/formPostImg.php";
			?>
			<form method="post" action="" class="formCriacao">
				<label for="titulo">Titulo</label>
				<input type="text" name="titulo" id="titulo" value="<?= $_POST['titulo'] ?? "" ?>">

				<label for="conteudo">Conteúdo</label>
				<textarea name="conteudo" id="conteudo"><?= $_POST['conteudo'] ?? "" ?></textarea>

				<input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemDAO->getUrlFotoPostagem() ?>">

				<input type="submit" name="enviar" value="Publicar" class="inputEnvia">
			</form>
		</section>
	<?php
		} 
	}else{
			echo "<p>Sua conta não permite criar posts</p>";
		}
	?>
<?php
} else {
	echo "<p>É necessário estar Logado para criar uma Publicação</p>";
}

?>