<?php
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

    <link rel="stylesheet" href="../css/Admin2.css">
    <title>Sebook Nivel 1</title>
</head>

<body class="">
    <div id="container">
        <div class="containerScroll">
            <?php
            $menuHide ?? require_once 'menuNivel1/menuNivel1.php';
            ?>
            <div id="containerTemplate">
            <?php if (isset($menuHide) != true) { ?>
                <?php require_once 'menu/social.php'; ?>
                    <section class="home">
                        <article>
                            <?= $output ?>
                        </article>
                    </section>
                <?php
                } else {
                    echo $output;
                }
                ?>
            </div>
            <?php require_once 'menu/footer.php'; ?>
        </div>
    </div>
</body>
</html>