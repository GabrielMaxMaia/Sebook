<?php

use Model\PostagemDAO;
use Model\SeboDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";
//Pega o idPost da url
$postId = isset($_GET['id']) ? $_GET['id'] : "";
//Seta armazena o idPost em setIdPost
$postagemDAO->setIdPostagem($_GET['id']);

//Chama a função listaPostagemId
$result = $postagemDAO->listarPostagemId();
$postagemDAO->setUrlFotoPostagem($result['urlFotoPost']);

//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['update'])) {
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
		$postagemDAO->alterarPostagem();
		header("Location:" . _URLBASE_ . "area/user/pages/postListar");
	}
}

?>

<?php

if ($result != null) {

    if ($result['idUsuario'] == $IdSessaoUser || $acessoUser <= 3) {

        $block = false;
		if($acessoUser == 5){

			$seboDAO = new SeboDAO($sql);
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
                <h1>Alterar Publicação</h1>
            </header>
            <?php
                //Chama estrutura para formulário de img 
                include "includes/formPostImg.php";
            ?>
            <form method="post" action="" class="formCriacao">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" value="<?= $result['tituloPostagem'] ?>">

                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" cols="25" rows="5" id="conteudo">
                    <?= $result['txtPostagem'] ?>
                </textarea>
                
                <input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemDAO->getUrlFotoPostagem() ?>">
                
                <input type="hidden" name="id" value="<?= $result['idPostagem'] ?>">

                <input type="submit" name="update" value="Atualizar" class="inputEnvia">
            </form>
        </section>
<?php
        }
    } else {
        echo "<p>Essa postagem não pertence a você</p>";
    }
}
