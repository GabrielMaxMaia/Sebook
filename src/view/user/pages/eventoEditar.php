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
$result = $eventoDAO->listarEventoId();

$eventoDAO->setUrlFotoEvento($result['urlFotoEvento']);

//Include para evitar reenvio
include "includes/evitarReenvio.php";

if (isset($_POST['update'])) {
    var_dump($_POST);
    $eventoDAO->setIdEvento($_POST['idEvento']);
    $eventoDAO->setIdUsuario($IdSessaoUser);
    $eventoDAO->setNomeEvento($_POST['nomeEvento']);
    $eventoDAO->setTxtEvento($_POST['txtEvento']);
    $eventoDAO->setDataHoraEvento($_POST['dataHoraEvento']);
    $eventoDAO->setUrlFotoEvento($_POST['txtImg']);
    $eventoDAO->alterarEvento();

    header("Location:" . _URLBASE_ . "area/user/pages/eventoListar");
}

?>
<h1>Alterar Evento</h1>

<?php

if ($result != null) {

    if ($result['idUsuario'] == $IdSessaoUser || $acessoUser <= 3) {
        ?>
        <form method="post" action="">

            <input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoDAO->getUrlFotoEvento() ?>">

            <input type="text" name="nomeEvento" value="<?= $result['nomeEvento'] ?>">

            <input type="date" name="dataHoraEvento" value="<?= $result['dataHoraEvento'] ?>">

            <textarea name="txtEvento" cols="25" rows="5">
                <?= $result['txtEvento'] ?>
            </textarea>

            <input type="hidden" name="idEvento" value="<?= $result['idEvento'] ?>">

            <input type="submit" name="update" value="Alterar">
        </form>
<?php
    } else {
        echo "Esse evento não pertence a você";
    }
}

//Chama estrutura para formulário de img 
include "includes/formEventoImg.php";
