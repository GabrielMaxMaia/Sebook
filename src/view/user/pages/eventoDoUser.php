<?php

use Model\EventoDAO;
// use Controller\EventoController;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$eventoDAO = new EventoDAO($sql);

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

$eventoDAO->setIdUsuario($GetPost);

$frontController = new Controller\FrontController($eventoDAO);
$frontController->setItemPagina(4);
$frontController->verificarPaginacao();

?>
<article>
    <header class="headerPagina">
        <h1>Últimos Eventos</h1>
    </header>
    <div class="itemContentContainer">
        <?php
        $eventos = $eventoDAO->listarEventoUser($frontController->getRegIni(), $frontController->getItemPagina());
        if ($eventos > 0) {
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

                            <a href="<?= _URLBASE_ . "area/user/pages/eventoDoUser/delete/{$event['idEvento']}" ?>" onclick="return confirm('Tem Certeza que vai excluir?')" class="modifica danger">
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
            $urlDoNotificador = "area/user/pages/eventoDoUser/$GetPost";
            $totalSebo = false;
            $totalUser = true;
            echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
            ?>
    </section>
</article>
<?php
} else {
    echo "<p>Usuário não possui eventos cadastrados...</p>";
}
