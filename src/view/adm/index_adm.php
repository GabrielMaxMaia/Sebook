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
    <header>
        <div class="menuGroup">
            <a class="logo" href="<?php echo _URLBASE_ ?>">
                <img src="<?php echo _IMGBASE_ ?>logoSebookCor.png" alt="SebooK">
            </a>
            <?php
            $sql = new \Util\Sql($conn);

            $autenticadorController = new \Controller\AutentificadorController($sql);

            $autenticadorController->toggleLogin();
            $autenticadorController->efetuarLogOut();

            ?>
        </div>
        <div id=divisor>
            <h4>Bem vindo, <?= $_SESSION['userLogado']['nome']; ?></h4>
        </div>
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