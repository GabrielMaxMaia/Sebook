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
            <section>
                <header>
                    <picture>
                        <img src="<?= _URLBASE_ . $linha['urlFotoPost'] ?>">
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

/*Inclui toda sessão de comentários*/
$pagina = "";
include "includes/comentarioTemplate.php";
