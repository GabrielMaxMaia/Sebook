<?php

use Model\PostagemDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Armazena em result para o laço
$result = $postagemDAO->listarPostagem();

$frontController = new Controller\FrontController($postagemDAO);
$frontController->setItemPagina(2);
$frontController->verificarPaginacao();


if (isset($_GET['id'])) {
    //Ao passar idDelete seta o valor e executa exclusão em postagemDAO
    $postagemDAO->setIdPostagem($_GET['id']);
    $postagemDAO->excluirPostagem();
    //header para recarregar a página
    header("Location:" . _URLBASE_ . "area/user/pages/postListar");
}

var_dump($_GET);

?>

<main class="col-9">

    <article class="grid-container">
        <h1>Postagens</h1>
        <?php
        $regIni = $_GET['pagina'] ?? 0;
        $postagens = $postagemDAO->listarPostagem($regIni, $itemPagina = 2);
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

        echo $frontController->exibirNotificador($urlDoNotificador);
        ?>
    </section>
</main>
