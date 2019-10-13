<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo _CSSBASEADM_ ?>">
    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook'; ?></title>
</head>

<body>
    <?php
        $sql = new \Util\Sql($conn);

        $autenticadorController = new \Controller\AutentificadorController($sql);

        // $autenticadorController->validarAcesso('http://localhost/sebook/area/adm',array(0=>1, 1=>2, 1=>3));
        //$autenticadorController->validarAcesso('http://localhost/sebook/',array(0=>1, 1=>2, 1=>3));

        $autenticadorController->efetuarLogin();
        $autenticadorController->efetuarLogOut();
    ?>
    <header>
        <div class="menuGroup">
            <a class="logo" href="<?php echo _URLBASEADM_ ?>">
                <img src="<?php echo _IMGBASE_ ?>logoSebookCor.png" alt="SebooK">
            </a>
        </div>
        <div id=divisor></div>
    </header>
    <?php require_once 'headerAdm.php'; ?>
    <article>
        <section>
            
        </section>
    </article>
</body>

</html>