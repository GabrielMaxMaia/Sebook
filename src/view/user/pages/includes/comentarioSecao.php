<?php
// var_dump($resultComentario);
if ($resultComentario != null || $resultComentario >= 1) {

    foreach ($resultComentario as $comentario) {

        if ($pagina == "paginaSebo") {
            $pag = $comentario['idPagina'];
        } else {
            $pag = $comentario['idPost'];
        }

        // $idPagina = $comentario['idPagina'] ?? "";

        //if ($comentario['idPost'] == $GetPost) {
        if ($pag == $GetPost) {

            ?>
            <div class="comentarioContainer">
                <?php
                            $usuarioDAO->setIdUsuario($idUser);
                            ?>
                <figure class="userComent">
                    <img src="<?= _URLBASE_ . $comentario['urlFoto'] ?>">
                    <figcaption>
                        <p>

                            <?= $comentario['txtComentario'] ?>
                            <br><br>
                            <span>Por <?= $comentario['nomeUsuario'] ?>
                                em <strong><?= date("d/m/Y - H:i", strtotime($comentario['dataHoraComentario'])); ?></strong>
                            </span>
                        </p>
                    </figcaption>

                </figure>

                <div class="itemEdit">
                    <?php
                                //Caso o id do usuário for o mesmo que está no comentário ou o id for Master ou ele for o dono da postagem
                                //Ele pode editar excluir o comentário

                                if ($comentario['idUsuario'] == $usuarioDAO->getIdUsuario() || $acessoUser <= 3 && $acessoUser != "" || $pag == $idUser) {

                                    $comentarioDAO->setIdUsuario($comentario['idUsuario']);

                                    if ($pagina == "paginaSebo") {
                                        $comentarioDAO->setIdPagina($comentario['idPagina']);
                                    } else {
                                        $comentarioDAO->setIdPost($comentario['idPost']);
                                    }

                                    $comentarioDAO->setIdComentario($comentario['idComentario']);

                                    $comentarioDAO->setIdComentarioParente($comentario['idComentarioParente']);

                                    $resultComentarioId = $comentarioDAO->listarComentarioId();

                                    $comentarioDAO->setTxtComentario($resultComentarioId['txtComentario']);
                                    ?>

                        <label class="btn-modal-cadastre modifica edit" for="modal-editar" value="<?= $comentario['idComentario'] ?>" onclick="return pegaId(<?= $comentario['idComentario'] ?>,'<?= $comentario['txtComentario'] ?>')">Editar</label>

                        <!--Formulário para excluir-->
                        <form method="post" action="" name="exçluir">
                            <input type="hidden" name="comentarioExcluir" value="<?= $comentarioDAO->getIdComentario() ?>">

                            <input type="submit" name="excluirComentario" class="modifica danger" value="Excluir" onclick="if (confirm('Quer Mesmo excluir comentário?')) {return true;}else{return false;}">
                        </form>
                        <?php
                                        if (isset($_POST['excluirComentario'])) {
                                            $comentarioDAO->setIdComentario($_POST['comentarioExcluir']);
                                            //Excluir comentário
                                            $comentarioDAO->excluirComentario();

                                            //Recarrega a página
                                            header('Refresh:0');
                                        }
                                        ?>
                    <?php
                                }
                                ?>
                </div>

                <?php
                            //A opção de responder só aparece para quem está logado
                            // if ($IdUser != "") {
                            ?>
                <!-- <label class="btn-modal-cadastre" for="modal-responder" value="<? //= $comentario['idComentario']
                                                                                                ?>" onclick="return pegaId(<? //= $comentario['idComentario']
                                                                                                                                        ?>)">Responder</label> -->

                <!-- <label class="btn-modal-cadastre" for="modal-editar" value="<? //= $comentario['idComentario']
                                                                                                ?>" onclick="return pegaId(<? //= $comentario['idComentario']
                                                                                                                                        ?>)">Editar</label> -->
                <?php
                            // }
                            ?>
            </div>
<?php
        }
    }
} else {
    echo "<p>Seja o primeiro o primeiro a comentar.</p>";
}
?>

<!--Modal para editar o comentário -->
<section class="modal">
    <input class="modal-open" id="modal-editar" type="checkbox" hidden>
    <div class="modal-wrap" aria-hidden="true" role="dialog">
        <label class="modal-overlay" for="modal-editar"></label>
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>Editar Comentário</h2>
                <label class="btn-close" for="modal-editar" aria-hidden="true">×</label>
            </div>
            <div class="modal-body">
                <!--Formulário de comentário-->
                <form name="mudarSenha" method="post">
                    <script>
                        function gId(id) {
                            return document.getElementById(id);
                        }

                        function pegaId(id, msg) {
                            //gId(idComentario).setAttribute('value',id);
                            document.getElementById("idComentario").setAttribute("value", id);

                            document.getElementById("txtComentarioAtualiza").innerHTML = msg;

                            return
                        }
                    </script>

                    <input type="hidden" name="idComentario" id="idComentario">

                    <?php
                    if ($pagina != "paginaSebo") {
                        $pagVal = $comentarioDAO->getIdPost();
                        $nome = "idPost";
                    } else {
                        $pagVal = $comentarioDAO->getIdPagina();
                        $nome = "idPagina";
                    }
                    ?>
                    <input type="hidden" name="<?= $nome ?>" value="<?= $pagVal ?>">

                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $comentarioDAO->getIdUsuario() ?>">

                    <label for="txtComentarioAtualiza">Comentário</label>
                    <textarea type="text" name="txtComentarioAtualiza" id="txtComentarioAtualiza">
                        <?php
                        $comentarioDAO->getTxtComentario();
                        ?>
                    </textarea>
                    <input type="submit" value="Atualizar">
                </form>
            </div>
            <div class="modal-footer">
                <label class="btn btn-primary" for="modal-editar">Fechar</label>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['txtComentarioAtualiza'])) {

    if ($pagina != "paginaSebo") {
        $comentarioDAO->setIdPost($_POST['idPost']);
    } else {
        $comentarioDAO->setIdPagina($_POST['idPagina']);
    }

    // $comentarioDAO->setIdUsuario($_POST['idUsuario']);
    $comentarioDAO->setIdComentario($_POST['idComentario']);
    $comentarioDAO->setTxtComentario($_POST['txtComentarioAtualiza']);
    $comentarioDAO->alterarComentario();

    //Recarrega a página
    header('Refresh:0');
}
?>

<!--Modal para responder o amiguinho-->
<!-- <section class="modal">
    <input class="modal-open" id="modal-responder" type="checkbox" hidden>
    <div class="modal-wrap" aria-hidden="true" role="dialog">
        <label class="modal-overlay" for="modal-responder"></label>
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>Responder Comentário</h2>
                <label class="btn-close" for="modal-responder" aria-hidden="true">×</label>
            </div>
            <div class="modal-body">
                Formulário de comentário
                <form name="responderComment" method="post">
                    <input type="hidden" name="idPost" value="<? //= $comentarioDAO->getIdPost() 
                                                                ?>">

                    <input type="hidden" name="idUsuario" value="<? //= $comentarioDAO->getIdUsuario() 
                                                                    ?>">

                    <input type="hidden" name="idComentarioParente" id="idComentario">

                    <label for="responderComentario">Comentário</label>
                    <textarea type="text" name="responderComentario" id="txtComentarioAtualiza">

                    </textarea>
                    <input type="submit" value="Responder">
                </form>
            </div>
            <div class="modal-footer">
                <label class="btn btn-primary" for="modal-responder">Fechar</label>
            </div>
        </div>
    </div>
</section> -->
<?php
// if (isset($_POST['responderComentario'])) {
//     $comentarioDAO->setIdPost($_POST['idPost']);
//     $comentarioDAO->setIdUsuario($_POST['idUsuario']);
//     $comentarioDAO->setDataHoraComentario(date('Y-m-d H:i:s'));
//     $comentarioDAO->setIdComentarioParente($_POST['idComentarioParente']);
//     $comentarioDAO->setTxtComentario($_POST['responderComentario']);

//     $comentarioDAO->adicionarComentario();
//     header("Location:" . _URLBASE_ . "area/user/pages/postVer/" . $GetPost);

//     echo $outputResult = "Comentário enviado";
// }
?>