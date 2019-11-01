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
$frontController->setItemPagina(3);
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

<main class="col-9">

    <article class="grid-container">
        <h1>Postagens</h1>
        <?php
        //$_GET['pagina'] ?? 0;
        // $frontController->verificarPaginacao() ;
        $postagens = $postagemDAO->listarPostagem($frontController->getRegIni(), $frontController->getItemPagina());
        foreach ($postagens as $post) {
            ?>
            <section class=''>
                <a href='<?= _URLBASE_ ?>area/user/pages/postVer/<?= $post['idPostagem'] ?>'>
                    <figure>
                        <img src='<?= _URLBASE_ . $post['urlFotoPost'] ?>' style='max-width:300px;'>
                        <figcaption>
                            <h1><?= $post['tituloPostagem'] ?></h1>
                            <p><?= $post['txtPostagem'] ?></p>
                        </figcaption>
                    </figure>
                </a>
                <?php
                    if ($post['idUsuario'] == $IdUser || $acessoUser <= 3 && $IdUser != null) {
                        ?>
                    <a href='<?= _URLBASE_ . "area/user/pages/postEditar/{$post['idPostagem']}" ?>'>
                        Editar
                    </a>

                    <a href="<?= _URLBASE_ . "area/user/pages/postListar/delete/{$post['idPostagem']}" ?>" onclick="return confirm('Tem Certeza que vai excluir?')">
                        Excluir
                    </a>
            </section>
        <?php } ?>
    <?php
    }
    ?>
    </article>
    <section class="notificador">
        <?php
        //Estou usando a Url da lista que quero controlar
        $urlDoNotificador = "area/user/pages/postListar";
        $totalSebo = false;
        echo $frontController->exibirNotificador($urlDoNotificador,$totalSebo,$GetPost);
        ?>
    </section>
</main>
