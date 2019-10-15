<?php

use Model\PostagemDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$postagemDAO = new PostagemDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$result = $postagemDAO->listarPostagem();

$resultComentario = $comentarioDAO->listarComentario();

$resultUsuario = $usuarioDAO->listarUsuarios();

$usuarioDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);

$IdUser = $_SESSION['userLogado']['idUsuario'] ?? "";

$GetPost = $_GET['id'] ?? "";

//Include para evitar reenvio
include "includes/evitarReenvio.php";

?>
<!-- <article> -->
<?php
//Postagem
if ($result != null) {
    foreach ($result as $linha) {
        if ($linha['idPostagem'] == $GetPost) {
            ?>
            <section>
                <header>
                    <picture>
                        <img src="<?=_URLBASE_ . $linha['urlFotoPost']?>">
                    </picture>
                    <h2>
                        <?= $linha['tituloPostagem'] ?>
                    </h2>
                </header>
                <p><?= $linha['txtPostagem'] ?></p>
            </section>
<?php
        }
    }
}

//Processsa formulário que envia comentário
if (isset($_POST['enviarComentario'])) {

    // $comentarioDAO->setIdComentarioParente($_POST['idComentarioParente']);

    $erro = false;
    if ($_POST['txtComentario'] != null || "") {
        $comentarioDAO->setTxtComentario($_POST['txtComentario']);
    } else {
        $erro = true;
        echo "Escreva Algo antes de enviar";
    }

    if ($erro == false) {
        $comentarioDAO->setIdPost($GetPost);
        $comentarioDAO->setIdUsuario($IdUser);
        $comentarioDAO->setDataHoraComentario(date('Y-m-d H:i:s'));
        //Chama a função listaPostagemId
        $comentarioDAO->adicionarComentario();
        header("Location:" . _URLBASE_ . "area/user/pages/postVer/" . $GetPost);

        echo $outputResult = "Comentário enviado";
    }
}
?>
<form method="post" action="">

    <span>Enviar comentário</span><br>

    <textarea name="txtComentario" cols="25" rows="5"></textarea>

    <input type="submit" name="enviarComentario" value="Comentar">
</form>

<p>Seção de comentários</p>

<?php
    //Carrega aquivo para seção de comentários
    include_once "includes/secaoComentario.php";
?>