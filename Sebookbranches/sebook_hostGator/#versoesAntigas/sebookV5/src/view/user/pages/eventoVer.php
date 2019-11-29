<?php

$styleSobrescrito = "
<style>
.itemVerContainer{
    display: flex;
    padding: 2rem;
}
@media (max-width:760px){
.itemVerContainer{
    flex-wrap: wrap;
}
.texto{
    max-width: 614px;
}
</style>";

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
$eventoDAO->setLocalEvento($resultEvento['localEvento']);
$eventoDAO->setCidadeEvento($resultEvento['cidadeEvento']);
// var_dump($resultEvento);

$comentarioDAO->setIdEvento($GetPost);
$resultComentario = $comentarioDAO->listarComentarioEvento();

//Include para evitar reenvio
// include "includes/evitarReenvio.php";

?>

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
                <p class="eventoInfo" style="white-space: normal;">
                    <?php $data = date_create($eventoDAO->getDataEvento()); ?>
                    <b>Data:</b> <?= date_format($data, "d/m/Y") ?> |
                    <?php
                        $hora = date_create($eventoDAO->getHoraEvento());
                    ?>
                    <b>Hora:</b> <?= date_format($hora, "H:i") ?>
                    <br>
                    <b>Endereço:</b> <?= $eventoDAO->getLocalEvento() ?> - <?= $eventoDAO->getCidadeEvento() ?> - SP
                </p>
                <p class="eventoInfo" style="white-space: normal;">
                    <b>Autor:</b>
                    <?php
                        if($resultEvento['idPerfil'] == 5){
                            $url = _URLBASE_ ."area/user/pages/pagSebo/" .$eventoDAO->getIdUsuario();
                        }
                    ?> 
                    <a href="<?= $url ?? '' ?>">
                        <?=$resultEvento['nomeUsuario']?>
                    </a> 
                </p>
            </section>
            <!-- <section class="eventoInfo">
                <p>
                    <?php// $data = date_create($eventoDAO->getDataEvento()); ?>
                    <b>Data:</b> <?//= date_format($data, "d/m/Y") ?> |
                    <?php
                        //$hora = date_create($eventoDAO->getHoraEvento());
                    ?>
                    <b>Hora:</b> <?//= date_format($hora, "H:i") ?>
                    <br>
                    <b>Endereço:</b> <?//= $eventoDAO->getLocalEvento() ?> - <?//= $eventoDAO->getCidadeEvento() ?> - SP
                </p>
            </section> -->
        </article>
<?php
    }
    // }
}

/*Inclui toda sessão de comentários*/
$pagina = "paginaEvento";
include "includes/comentarioTemplate.php";
?>
<!-- </div> -->