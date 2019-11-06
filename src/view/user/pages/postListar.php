<?php

use Model\PostagemDAO;
use Controller\PostagemController;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Passa a conexão para o controller
$postagemController = new PostagemController($sql);
//Armazena em result para o laço
$result = $postagemDAO->listarPostagem();

$frontController = new Controller\FrontController($postagemDAO);
$frontController->setItemPagina(4);
$frontController->verificarPaginacao();

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

if ($GetPost) {
    //Ao passar idDelete seta o valor e executa exclusão em postagemDAO
    $postagemDAO->setIdPostagem($GetPost);
    $postagemDAO->excluirPostagem();
    //header para recarregar a página
    header("Location:" . _URLBASE_ . "area/user/pages/postListar");
}

?>
<article>
    <header class="headerPagina">
        <h1>Últimas Postagens</h1>
    </header>
    <div class="itemContentContainer">
        <?php
        $postagens = $postagemDAO->listarPostagem($frontController->getRegIni(), $frontController->getItemPagina());
        foreach ($postagens as $post) {
            ?>
            <div class="postContainer">
                <div class='contentItem'>
                    <div class="item">
                        <a href='<?= _URLBASE_ ?>area/user/pages/postVer/<?= $post['idPostagem'] ?>'>
                            <figure>
                                <img src='<?= _URLBASE_ . $post['urlFotoPost'] ?>'>
                                <figcaption>
                                    <h1><?= $post['tituloPostagem'] ?></h1>
                                    <p><?= $post['txtPostagem'] ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
                <?php
                    if ($post['idUsuario'] == $idUser || $acessoUser <= 3 && $idUser != null) {
                        ?>
                    <div class="itemModifica">
                        <a href='<?= _URLBASE_ . "area/user/pages/postEditar/{$post['idPostagem']}" ?>' class="modifica edit">
                            Editar
                        </a>

                        <a href="<?= _URLBASE_ . "area/user/pages/postListar/delete/{$post['idPostagem']}" ?>" onclick="return confirm('Tem Certeza que vai excluir?')" class="modifica danger">
                            Deletar
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php
        }
        ?>

    </div>
    <section class="notificador">
        <?php
        //Estou usando a Url da lista que quero controlar
        $urlDoNotificador = "area/user/pages/postListar";
        $totalSebo = false;
        echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $GetPost);
        ?>
    </section>
</article>