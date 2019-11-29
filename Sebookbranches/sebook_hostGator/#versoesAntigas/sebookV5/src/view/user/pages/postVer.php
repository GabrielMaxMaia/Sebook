<?php

//#POSTVER#

use Model\PostagemDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$postagemDAO = new PostagemDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$GetPost = $_GET['id'] ?? "";
$postagemDAO->setIdPostagem($GetPost);
$result = $postagemDAO->listarPostagemId();
$postagemDAO->setIdUsuario($result['idUsuario']);
$postagemDAO->setTituloPostagem($result['tituloPostagem']);
$postagemDAO->setTxtPostagem($result['txtPostagem']);
$postagemDAO->setUrlFotoPostagem($result['urlFotoPost']);

$comentarioDAO->setIdPost($GetPost);
$resultComentario = $comentarioDAO->listarComentarioPost();

?>
<div class="containerCentralizado">
    <?php
    //Postagem
    
    if ($result != null) {
        if ($postagemDAO->getIdPostagem() == $GetPost) {
            ?>
            <article class="itemVerContainer">
                <header class="headerPost">
                    <picture class="imgItemVer">
                        <img src="<?= _URLBASE_ . $postagemDAO->getUrlFotoPostagem() ?>">
                    </picture>
                </header>
                <section class="texto">
                    <h1><?= $postagemDAO->getTituloPostagem() ?></h1>
                    <p><?= $postagemDAO->getTxtPostagem() ?></p>
                </section>
            </article>
    <?php
        }
    }

    /*Inclui toda sessão de comentários*/
    $pagina = "paginaPost";
    include "includes/comentarioTemplate.php";
    ?>
</div>