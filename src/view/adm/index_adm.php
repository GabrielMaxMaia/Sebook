<!DOCTYPE html>
<html lang="pt_br">

<head>
    <title>Área Administrativa</title>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta name=description content="description">
    <meta name=keywords content="Modelo PHP HTML5 CSS3">
    <meta name=author content='Giovani Wingter'>
    <meta name=modelo-plao content='integracao php mysql poo html5 css3'>

    <link rel="shortcut icon" type="image/png" href="<?= _URLBASE_ ?>public/icon/favIconSebook.png">

    <!-- CSS PADRÃO -->
    <link rel="stylesheet" href="<?php echo _URLBASE_ . "public/css/estilo.css" ?>">

    <!-- Auxiliares -->
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">

    <script src='<?= _URLBASE_ ?>public/js/funcoes.js'></script>
</head>

<body>
    <?php

    $sql = new \Util\Sql($conn);

    $autenticadorController = new \Controller\AutentificadorController($sql);

    $autenticadorController->efetuarLogin();
    $autenticadorController->efetuarLogOut();

    $autenticadorController->validarAcesso($_SESSION['userLogado']['acesso']);

    if ($acessoUser != "" && $acessoUser != 5) {
        $clienteDAO = new Model\ClienteDAO($sql);
        $clienteDAO->setIdUsuario($idUser);
        $resultPerfil = $clienteDAO->listarClienteId();
        $img = $resultPerfil['urlFoto'];
    } else {
        $img = "";
    }
    $autenticadorController->toggleLogin($img);
    ?>
    <div id=container>
        <main>
            <aside>
                <?php
                // require_once './src/view/adm/menu.php';
                $autenticadorController->toggleFormLogin();
                ?>
            </aside>
            <article>
                <?php
                if (isset($_GET['page']) && $_GET['page'] != "") {
                    $page = $_GET['page'];
                    if (isset($_GET['pasta']) && $_GET['pasta'] != "") {
                        $pasta = $_GET['pasta'];
                        require_once "./src/view/adm/$pasta/$page.php";
                    }
                }
                ?>
            </article>
        </main>
    </div>
</html>