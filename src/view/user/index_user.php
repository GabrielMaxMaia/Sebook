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
    <!--<link rel="stylesheet" href="http://localhost/sebook/css/slick.css">-->
    <link rel="stylesheet" href="<?php echo _CSSBASEUSER_ ?>">
    <?php echo $cssCaminho ?? "";?>
    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook'; ?></title>
</head>

<body>
    <div class="containerScroll">
        <?php
        $menuHide ?? require_once 'menu/header.php';
        ?>
        <div id="containerTemplate">
            <?php
            if (isset($menuHide) != true) {
                ?>
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
</body>
</html>