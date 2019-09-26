<!DOCTYPE html>
<html lang "pt_br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo _CSSBASEUSER_ ?>">
    <title>Sebook</title>
</head>

<body>
    <header>
        <?php //require_once 'menu/header.php'; ?>
    </header>
    <div id="container">
        <?php require_once 'menu/social.php'; ?>
<!--CHAMAR HTML-->
        <section class="home">
            <article>
                <?php
                    if (isset($_GET['page']) && $_GET['page'] != "") {
                        $page = $_GET['page'];
                        if (isset($_GET['pasta']) && $_GET['pasta'] != "") {
                            $pasta = $_GET['pasta'];
                            require_once "./src/view/user/$pasta/$page.php";
                        }
                    }else{
                        require_once "./src/view/user/menuHome/home.php";
                    }
                ?>
            </article>
        </section>
    </div>
    <footer class="master1">
        <?php require_once 'menu/footer.php'; ?>
    </footer>
</body>

</html>