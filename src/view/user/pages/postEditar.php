<?php

use Model\PostagemDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";
//Pega o idPost da url
$postId = isset($_GET['idPost']) ? $_GET['idPost'] : "";
//Seta armazena o idPost em setIdPost
$postagemDAO->setIdPostagem($_GET['idPost']);

//Chama a função listaPostagemId
$result = $postagemDAO->listarPostagemId();
$postagemDAO->setUrlFotoPostagem($result['urlFotoPost']);

//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['update'])) {
    $postagemDAO->setTituloPostagem($_POST['titulo']);
    $postagemDAO->setTxtPostagem($_POST['conteudo']);
    $postagemDAO->setUrlFotoPostagem($_POST['txtImg']);
    $postagemDAO->alterarPostagem();
    header("Location:" . _URLBASE_ . "area/user/pages/postListar");
}

?>
<h1>Alterar Publicação</h1>

<?php

if ($result != null) {

    if ($result['idUsuario'] == $IdSessaoUser || $_SESSION['userLogado']['acesso'] <= 3) {
        ?>
        <form method="post" action="">

            <input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemDAO->getUrlFotoPostagem() ?>">

            <input type="text" name="titulo" value="<?= $result['tituloPostagem'] ?>">

            <textarea name="conteudo" cols="25" rows="5">
                <?= $result['txtPostagem'] ?>
            </textarea>

            <input type="hidden" name="id" value="<?= $result['idPostagem'] ?>">

            <input type="submit" name="update" value="Alterar">
        </form>
<?php
    } else {
        echo "Essa postagem não pertence a você";
    }
}

//Chama estrutura para formulário de img 
include "includes/formPostImg.php";
