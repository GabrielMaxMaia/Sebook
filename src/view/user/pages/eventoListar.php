<?php

use Model\EventoDAO;
// use Controller\EventoController;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$eventoDAO = new EventoDAO($sql);

//Passa a conexão para o controller
//$eventoController = new EventoController($sql);

//Armazena em result para o laço
$result = $eventoDAO->listarEvento();

$frontController = new Controller\FrontController($eventoDAO);
$frontController->setItemPagina(4);
$frontController->verificarPaginacao();

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

if ($GetPost) {
    //Ao passar idDelete seta o valor e executa exclusão em eventoDAO
    $eventoDAO->setIdEvento($GetPost);
    $eventoDAO->excluirEvento();
    //header para recarregar a página
    header("Location:" . _URLBASE_ . "area/user/pages/eventoListar");
}

?>
<article>
    <header class="headerPagina">
        <h1>Últimos Eventos</h1>
    </header>
    <div class="itemContentContainer">
        <?php
        $eventos = $eventoDAO->listarEvento($frontController->getRegIni(), $frontController->getItemPagina());
        foreach ($eventos as $event) {
            ?>
            <div class="postContainer">
                <div class='contentItem'>
                    <div class="item">
                        <a href='<?= _URLBASE_ ?>area/user/pages/eventoVer/<?= $event['idEvento'] ?>'>
                            <figure>
                                <img src='<?= _URLBASE_ . $event['urlFotoEvento'] ?>'>
                                <figcaption>
                                    <h1><?= $event['nomeEvento'] ?></h1>
                                    <p><?= $event['txtEvento'] ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
                <?php
                    if ($event['idUsuario'] == $idUser || $acessoUser <= 3 && $idUser != null) {
                        ?>
                    <div class="itemModifica">
                        <a href='<?= _URLBASE_ . "area/user/pages/eventoEditar/{$event['idEvento']}" ?>' class="modifica edit">
                            Editar
                        </a>

                        <a href="<?= _URLBASE_ . "area/user/pages/eventoListar/delete/{$event['idEvento']}" ?>" onclick="return confirm('Tem Certeza que vai excluir?')" class="modifica danger">
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
        $urlDoNotificador = "area/user/pages/eventoListar";
        $totalSebo = false;
        $totalUser = false;
        echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
        ?>
    </section>
</article>