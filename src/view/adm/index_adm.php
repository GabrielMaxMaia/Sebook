<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook | ADM'; ?></title>

    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo _CSSBASEADM_ ?>">

    <!-- CSS PADRÃO -->
    <link rel="stylesheet" href="<?php echo _URLBASE_ . "public/css/estilo.css" ?>">

    <script src='<?= _URLBASE_ ?>public/js/funcoes.js'></script>
</head>

<body>
    <?php

    $sql = new \Util\Sql($conn);

    $autenticadorController = new \Controller\AutentificadorController($sql);

    // $autenticadorController->validarAcesso('http://localhost/sebook/area/adm', array(0=>1, 1=>2, 1=>3));
  
    $autenticadorController->efetuarLogin();
    $autenticadorController->efetuarLogOut();

    $autenticadorController->validarAcesso($_SESSION['userLogado']['acesso']);

    ?>
    <div id=container>
        <header class="menuGroup">
            <a class="logo" href="<?= _URLBASE_ ?>">
                <img src="<?= _IMGBASE_ ?>logoSebookCor.png" alt="SebooK">
            </a>
            <div id=divisor>
        </header>
        <main>
            <aside>
                <?php $autenticadorController->toggleFormLogin(); ?>
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
    <?php require_once 'menu.php'; ?>
    <footer>
    </footer>
</body>
</html>