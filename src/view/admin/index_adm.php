<?php
ob_start();
if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    if (isset($_GET['pasta']) && $_GET['pasta'] != "") {
        $pasta = $_GET['pasta'];
        require_once "./src/view/admin/$pasta/$page.php";
    }
} else {
    require_once "./src/view/admin/pages/apagar.php";
}
$output = ob_get_clean();
?>

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
    <?php require_once 'headerAdm.php'; ?>
    <article>
        <section>
            <?= $output ?>
        </section>
    </article>
</body>

</html>