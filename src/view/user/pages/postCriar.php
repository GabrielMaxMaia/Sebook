<?php
$title = "Criar Publicação";

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

if (isset($_POST['enviar']) != "") {
	$erro = false;
	$erroMen = "";
	if ($_POST['titulo'] != "") {
		$postagemDAO->setTituloPostagem(trim($_POST['titulo']));
	}else {
		$erro = true;
		$erroMen .="<li>Prencha o Titulo</li>";
	}
	if ($_POST['conteudo'] != "") {
		$postagemDAO->setTxtPostagem(trim($_POST['conteudo']));
	}else {
		$erro = true;
		$erroMen .="<li>Digite o conteudo</li>";
	}

	if($erro == true){
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

if ($IdSessaoUser != null || "") {

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
			<input type="text" name="titulo" id="titulo" value="<?=$_POST['titulo'] ?? "" ?>">

			<label for="conteudo">Conteúdo</label>
			<textarea name="conteudo" id="conteudo"><?=$_POST['conteudo'] ?? "" ?></textarea>

			<input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemDAO->getUrlFotoPostagem() ?>">

			<input type="submit" name="enviar" value="Publicar">
		</form>
	</section>
<?php
} else {
	echo "<p>É necessário estar Logado para criar uma Publicação</p>";
}

?>