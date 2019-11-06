<?php

use Model\PostagemDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$postagemDAO = new PostagemDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$GetPost = $_GET['id'] ?? "";

$result = $postagemDAO->listarPostagem();

$comentarioDAO->setIdPost($GetPost);
$resultComentario = $comentarioDAO->listarComentarioPost();

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
            <article class="itemVerContainer">
                <header>
                    <picture class="imgItemVer">
                        <img src="<?= _URLBASE_ . $linha['urlFotoPost'] ?>">
                    </picture>
                </header>
                <section class="texto">
                    <h1><?= $linha['tituloPostagem'] ?></h1>
                    <p><?= $linha['txtPostagem'] ?></p>
                </section>
            </article>
<?php
        }
    }
}

/*Inclui toda sessão de comentários*/
$pagina = "paginaPost";
include "includes/comentarioTemplate.php";
