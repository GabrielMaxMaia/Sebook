<?php
var_dump($resultComentario);
if ($resultComentario != null || $resultComentario >= 1) {

    foreach ($resultComentario as $comentario) {

        if ($comentario['idPost'] == $GetPost) {
            ?>
            <section>
                <p>
                    <?php
                        $usuarioDAO->setIdUsuario($IdUser);
                    ?>
                    <?//=$comentario['idComentario']?>
                    <?= $comentario['txtComentario'] ?><br>
                    <span> - Por <?= $comentario['nomeUsuario'] ?></span>
                    <span>
                        em <strong><?= date("d/m/Y - H:i", strtotime($comentario['dataHoraComentario'])); ?></strong>
                    </span>
                    <?php
                        //Caso o id do usuário for o mesmo que está no comentário
                        //Ele pode editar excluir o comentário
                        if ($comentario['idUsuario'] == $usuarioDAO->getIdUsuario() || $acessoUser <= 3 && $acessoUser != "") {

                            $comentarioDAO->setIdUsuario($comentario['idUsuario']);

                            $comentarioDAO->setIdPost($comentario['idPost']);

                            $comentarioDAO->setIdComentario($comentario['idComentario']);

                            $comentarioDAO->setIdComentarioParente($comentario['idComentarioParente']);

                            $resultComentarioId = $comentarioDAO->listarComentarioId();

                            $comentarioDAO->setTxtComentario($resultComentarioId['txtComentario']);
                        ?>
                        <label class="btn-modal-cadastre" for="modal-editar" value="<?= $comentario['idComentario'] ?>" onclick="return pegaId(<?= $comentario['idComentario'] ?>,'<?= $comentario['txtComentario'] ?>')">Editar</label>

                        <!--Formulário para excluir-->
                        <form method="post" action="" name="exçluir">
                            <input type="hidden" name="comentarioExcluir" value="<?= $comentarioDAO->getIdComentario() ?>">

                            <input type="submit" name="excluirComentario" value="Excluir" onclick="if (confirm('Quer Mesmo excluir comentário?')) {return true;}else{return false;}">
                        </form>
                        <?php
                            if (isset($_POST['excluirComentario'])) {
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

                <?php
                    //A opção de responder só aparece para quem está logado
                    if ($IdUser != "") {
                    ?>
                    <!-- <label class="btn-modal-cadastre" for="modal-responder" value="<? //= $comentario['idComentario']?>" onclick="return pegaId(<? //= $comentario['idComentario']?>)">Responder</label> -->

                    <label class="btn-modal-cadastre" for="modal-editar" value="<?= $comentario['idComentario'] ?>" onclick="return pegaId(<?= $comentario['idComentario'] ?>)">Editar</label>
                <?php
                    }
                ?>
            </section>
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

                    <input type="hidden" name="idPost" value="<?= $comentarioDAO->getIdPost() ?>">
                    <input type="hidden" name="idUsuario" value="<?= $comentarioDAO->getIdUsuario() ?>">

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
    $comentarioDAO->setIdPost($_POST['idPost']);
    // $comentarioDAO->setIdUsuario($_POST['idUsuario']);
    $comentarioDAO->setIdComentario($_POST['idComentario']);
    $comentarioDAO->setTxtComentario($_POST['txtComentarioAtualiza']);
    $comentarioDAO->alterarComentario();
    header("Location:" . _URLBASE_ . "area/user/pages/postVer/" . $GetPost);
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