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

$GetPost = $_GET['idPost'] ?? "";

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

if($resultComentario > 1){


foreach ($resultComentario as $comentario) {
    if ($comentario['idPost'] == $GetPost) {
        ?>
        <section>
            <p>
                <?= $comentario['txtComentario'] ?><br>
                <span> - Por <?= $comentario['nomeUsuario'] ?></span>
                <span>em <?= $comentario['dataHoraComentario'] ?></span>
                <?php
                        if ($comentario['idUsuario'] == $usuarioDAO->getIdUsuario()) {

                            $comentarioDAO->setIdUsuario($comentario['idUsuario']);

                            $comentarioDAO->setIdPost($comentario['idPost']);

                            $comentarioDAO->setIdComentario($comentario['idComentario']);

                            $resultComentarioId = $comentarioDAO->listarComentarioId();
                            $comentarioDAO->setTxtComentario($resultComentarioId['txtComentario']);

                            ?>
                    <label class="btn-modal-cadastre" for="modal-cadastre">Editar</label>   
                    
                    <!--Formulário para excluir-->
                    <form method="post" action="" name="exçluir">   
                        <input type="hidden" name="comentarioExcluir" value="<?= $comentarioDAO->getIdComentario()?>">
                            
                        <input type="submit" name="excluirComentario" value="Excluir" onclick="if (confirm('Quer Mesmo excluir comentário?')) {return true;}else{return false;}">
                    </form>
                    <?php
                        if(isset($_POST['excluirComentario'])){
                            $comentarioDAO->setIdComentario($_POST['comentarioExcluir']);
                            //Excluir comentário
                            $comentarioDAO->excluirComentario();
                            //Recarrega a página
                            header("Location:" . _URLBASE_ . "area/user/pages/postVer/" . $GetPost);
                        }
                    ?>
                <?php
                }
                ?>
            </p>

        </section>
<?php
    }
}
}else{
    echo "Não existem comentários nesssa postagem, seja o primeiro a comentar";
}
?>
<!--Modal-->
<section class="modal">

    <input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
    <div class="modal-wrap" aria-hidden="true" role="dialog">
        <label class="modal-overlay" for="modal-cadastre"></label>
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>Editar Comentário</h2>
                <label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
            </div>
            <div class="modal-body">
                <!--Formulário de comentário-->
                <form name="mudarSenha" method="post">
                    <input type="hidden" name="idPost" value="<?= $comentarioDAO->getIdPost() ?>">
                    <input type="hidden" name="idUsuario" value="<?= $comentarioDAO->getIdUsuario() ?>">
                    <label for="txtComentarioAtualiza">Comentário</label>
                    <textarea type="text" name="txtComentarioAtualiza" id="txtComentarioAtualiza">
                        <?= $comentarioDAO->getTxtComentario() ?>
                    </textarea>
                    <input type="submit" value="Atualizar">
                </form>
            </div>
            <div class="modal-footer">
                <label class="btn btn-primary" for="modal-cadastre">Fechar</label>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['txtComentarioAtualiza'])) {
    $comentarioDAO->setIdPost($_POST['idPost']);
    $comentarioDAO->setIdUsuario($_POST['idUsuario']);
    $comentarioDAO->setTxtComentario($_POST['txtComentarioAtualiza']);
    $comentarioDAO->alterarComentario();
    header("Location:" . _URLBASE_ . "area/user/pages/postVer/" . $GetPost);
}
?>