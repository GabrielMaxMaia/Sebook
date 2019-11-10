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
<section class="feedItem">
    <header>
        <h2>Últimos Eventos</h2>
    </header>
    <div class="feedContainer">
        <?php
        foreach ($resultUltimosEventos as $eventUltimos) {
            ?>
            <a href="<?= _URLBASE_ ?>area/user/pages/eventoVer/<?= $eventUltimos['idEvento'] ?>">
                <figure>
                    <img src="<?= _URLBASE_ . $eventUltimos['urlFotoEvento'] ?>" alt="<?= $eventUltimos['nomeEvento'] ?>" title="<?= $eventUltimos['nomeEvento'] ?>">
                    <figcaption>
                        <p class="titulo"><?= $eventUltimos['nomeEvento'] ?></p>
                        <p><?= $eventUltimos['txtEvento'] ?></p>
                    </figcaption>
                </figure>
            </a>
        <?php
        }
        ?>
    </div>
    <a href="<?= _URLBASE_ ?>area/user/pages/eventoListar" class="linkDestaque">Ver todos eventos</a>
</section>

<section class="feedItem">
    <header>
        <h2>Últimas Postagens</h2>
    </header>
    <div class="feedContainer">
        <?php
        foreach ($resultUltimasPostagens as $postUltimos) {
            ?>
            <a href="<?= _URLBASE_ ?>area/user/pages/postVer/<?= $postUltimos['idPostagem'] ?>">
                <figure>
                    <img src="<?= _URLBASE_ . $postUltimos['urlFotoPost'] ?>" alt="<?= $postUltimos['tituloPostagem'] ?>" title="<?= $postUltimos['tituloPostagem'] ?>">
                    <figcaption>
                        <p class="titulo"><?= $postUltimos['tituloPostagem'] ?></p>
                        <p><?= $postUltimos['txtPostagem'] ?></p>
                    </figcaption>
                </figure>
            </a>
        <?php
        }
        ?>
    </div>
    <a href="<?= _URLBASE_ ?>area/user/pages/postListar" class="linkDestaque">Ver todas postagens</a>
</section>