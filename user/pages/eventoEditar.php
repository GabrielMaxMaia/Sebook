<?php

use Model\EventoDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$eventoDAO = new EventoDAO($sql);
//Pega a sessão se hover, caso contrario string vazia
$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";
//Pega o idPost da url
$postId = isset($_GET['id']) ? $_GET['id'] : "";
//Seta armazena o idPost em setIdPost
$eventoDAO->setIdEvento($_GET['id']);

//Chama a função listaPostagemId
$resultEvento = $eventoDAO->listarEventoId();
$eventoDAO->setDataEvento($resultEvento['dataEvento']);
$eventoDAO->setHoraEvento($resultEvento['horaEvento']);

$eventoDAO->setUrlFotoEvento($resultEvento['urlFotoEvento']);

//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['update'])) {
    var_dump($_POST);
    $eventoDAO->setIdEvento($_POST['idEvento']);
    $eventoDAO->setIdUsuario($IdSessaoUser);
    $eventoDAO->setNomeEvento($_POST['nomeEvento']);
    $eventoDAO->setTxtEvento($_POST['txtEvento']);
    $eventoDAO->setDataEvento($_POST['dataEvento']);
    $eventoDAO->setHoraEvento($_POST['horaEvento']);
    $eventoDAO->setUrlFotoEvento($_POST['txtImg']);
    $eventoDAO->alterarEvento();

    header("Location:" . _URLBASE_ . "area/user/pages/eventoListar");
}

?>
<h1>Alterar Evento</h1>

<?php

if ($resultEvento != null) {

    if ($resultEvento['idUsuario'] == $IdSessaoUser || $acessoUser <= 3) {
        ?>
        <form method="post" action="">

            <input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoDAO->getUrlFotoEvento() ?>">

            <input type="text" name="nomeEvento" value="<?= $resultEvento['nomeEvento'] ?>">
   
            <input class="grande" type="date" name="dataEvento" id="dataEvento" value="<?= $eventoDAO->getDataEvento() ?>">
   
            <input class="grande" type="time" name="horaEvento" id="horaEvento" min="00:00" max="23:59" value="<?= $eventoDAO->getHoraEvento() ?>">
    
            <textarea name="txtEvento" cols="25" rows="5">
                <?= $resultEvento['txtEvento'] ?>
            </textarea>

            <input type="hidden" name="idEvento" value="<?= $resultEvento['idEvento'] ?>">

            <input type="submit" name="update" value="Alterar">
        </form>
<?php
    } else {
        echo "Esse evento não pertence a você";
    }
}

//Chama estrutura para formulário de img 
include "includes/formEventoImg.php";
