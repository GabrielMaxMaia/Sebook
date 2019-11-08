<?php

use Model\EventoDAO;
use Model\PostagemDAO;
//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$eventoDAO = new EventoDAO($sql);
$postagemDAO = new PostagemDAO($sql);

//Armazena em result para o laço
$resultUltimosEventos = $eventoDAO->listarUltimos();
$resultUltimasPostagens = $postagemDAO->listarUltimasPostagens();

?>
<section class="eventos">
    <header>
        <h2>Últimos Eventos</h2>
    </header>
    <?php
    foreach ($resultUltimosEventos as $eventUltimos) {
        ?>
        <a href="<?= _URLBASE_ ?>area/user/pages/eventoVer/<?= $eventUltimos['idEvento'] ?>">
            <figure>
                <img src="<?= _URLBASE_ . $eventUltimos['urlFotoEvento'] ?>" alt="<?= $eventUltimos['nomeEvento'] ?>" title="<?= $eventUltimos['nomeEvento'] ?>">
                <figcaption>
                    <h3><?= $eventUltimos['nomeEvento'] ?></h3>
                    <p><?= $eventUltimos['txtEvento'] ?></p>
                </figcaption>
            </figure>
        </a>
    <?php
    }
    ?>
    <a href="<?= _URLBASE_ ?>area/user/pages/eventoListar">Ver todos eventos</a>
</section>

<section class="eventos">
    <header>
        <h2>Últimas Postagens</h2>
    </header>
    <?php
    foreach ($resultUltimasPostagens as $postUltimos) {
        ?>
        <a href="<?= _URLBASE_ ?>area/user/pages/postVer/<?= $postUltimos['idPostagem'] ?>">
            <figure>
                <img src="<?= _URLBASE_ . $postUltimos['urlFotoPost'] ?>" alt="<?= $postUltimos['tituloPostagem'] ?>" title="<?= $postUltimos['tituloPostagem'] ?>">
                <figcaption>
                    <h3><?= $postUltimos['tituloPostagem'] ?></h3>
                    <p><?= $postUltimos['txtPostagem'] ?></p>
                </figcaption>
            </figure>
        </a>
    <?php
    }
    ?>
    <a href="<?= _URLBASE_ ?>area/user/pages/postListar">Ver todas postagens</a>
</section>