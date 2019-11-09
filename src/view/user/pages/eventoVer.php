<?php

use Model\EventoDAO;
use Model\UsuarioDAO;
use Model\ComentarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$eventoDAO = new EventoDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$GetPost = $_GET['id'] ?? "";
$eventoDAO->setIdEvento($GetPost);
$resultEvento = $eventoDAO->listarEventoId();
$eventoDAO->setIdUsuario($resultEvento['idUsuario']);
$eventoDAO->setNomeEvento($resultEvento['nomeEvento']);
$eventoDAO->setTxtEvento($resultEvento['txtEvento']);
$eventoDAO->setUrlFotoEvento($resultEvento['urlFotoEvento']);
$eventoDAO->setDataEvento($resultEvento['dataEvento']);
$eventoDAO->setHoraEvento($resultEvento['horaEvento']);
// var_dump($resultEvento);

$comentarioDAO->setIdEvento($GetPost);
$resultComentario = $comentarioDAO->listarComentarioEvento();

//Include para evitar reenvio
include "includes/evitarReenvio.php";

?>
<!-- <article> -->
<?php
//Postagem
if ($resultEvento != null) {
    // foreach ($result as $linha) {
    if ($eventoDAO->getIdEvento() == $GetPost) {
        ?>
        <article class="itemVerContainer">
            <header>
                <picture class="imgItemVer">
                    <img src="<?= _URLBASE_ . $eventoDAO->getUrlFotoEvento() ?>">
                </picture>
            </header>
            <section class="texto">
                <h1><?= $eventoDAO->getNomeEvento() ?></h1>
                <p><?= $eventoDAO->getTxtEvento() ?></p>
                <p>
                    <?php $data = date_create($eventoDAO->getDataEvento()); ?>
                    Data: <?=date_format($data, "d/m/Y")?><br>
                    Hora: <?=$eventoDAO->getHoraEvento()?>
                </p>
            </section>
        </article>
<?php
    }
    // }
}

/*Inclui toda sessão de comentários*/
$pagina = "paginaEvento";
include "includes/comentarioTemplate.php";
