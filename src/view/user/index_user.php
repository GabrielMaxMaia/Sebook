<?php
//Variável para definir o nivel de acesso de cada úsuario
$acessoUser = $_SESSION['userLogado']['acesso'] ?? "";
//Variavel para definir o id do Usuario logado
$IdUser = $_SESSION['userLogado']['idUsuario'] ?? "";

ob_start();
if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    if (isset($_GET['pasta']) && $_GET['pasta'] != "") {
        $pasta = $_GET['pasta'];
        require_once "./src/view/user/$pasta/$page.php";
    }
} else {
    require_once "./src/view/user/menuHome/home.php";
}
$output = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!--<link rel="stylesheet" href= _URLBASE_ ."css/slick.css">-->
    <link rel="stylesheet" href="<?= _URLBASE_ . "public/css/user.css"?>">
    <?= $styleSobrescrito ?? "" ?>
    <?= $cssCaminho ?? ""; ?>
    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook'; ?></title>

    <script src='<?= _URLBASE_ ?>public/js/funcoes.js'></script>
</head>

<body>
    <div class="containerScroll">
        <?php
        $menuHide ?? require_once 'menu/header.php';
        ?>
        <div id="containerTemplate">
            <?php
            if (isset($menuHide) != true) {
                require_once 'menu/social.php';
                ?>
                <article class="home">
                    <section>
                        <?= $output ?>
                    </section>
                </article>
            <?php
            } else {
                echo $output;
            }
            ?>
        </div>
        <?php $menuHide ?? require_once 'menu/footer.php'; ?>
    </div>
</body>

</html>