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
    <!--<link rel="stylesheet" href="". _URLBASE_ ."public/css/slick.css">-->
    <link rel="stylesheet" href="<?= _URLBASE_ ?>public/css/user.css">
    <?= $mapa ?? "" ?>
    <?= $styleSobrescrito ?? "" ?>
    <?= $cssCaminho ?? "" ?>

    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook' ?></title>
    <script src='<?= _URLBASE_ ?>public/js/funcoes.js'></script>

    <!-- https://code.jquery.com/jquery-2.1.1.js -->
    <script type="text/javascript" src="<?= _URLBASE_ ?>public/js/jquery-2.1.0.js"></script>

    <script src='<?= _URLBASE_ ?>public/js/validacoes.js'></script>
    <!--<Máscara para o CNPJ>-->
    <script src='https://www.geradorcnpj.com/assets/js/jquery-1.2.6.pack.js'></script>
    <!--<Máscara para o CNPJ>-->
    <script src='https://www.geradorcnpj.com/assets/js/jquery.maskedinput-1.1.4.pack.js'></script>
    <!--<Máscara para o CPF>-->
    <script src='https://www.geradorcpf.com/assets/js/jquery-1.2.6.pack.js'></script>
    <!--<Máscara para o CPF>-->
    <script src='https://www.geradorcpf.com/assets/js/jquery.maskedinput-1.1.4.pack.js'></script>
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
                <main>
                    <?= $output ?>
                </main>
            <?php
            } else {
                echo $output;
            }
            ?>
        </div>
        <?php $menuHide ?? require_once 'menu/footer.php'; ?>
    </div>

    <!--IREI MEXER POSTERIORMENTE-->
    <style>
        #btnTop {
            position: fixed;
            bottom: 58px;
            right: 6px;
            background: #fff;
            border: none;
            display: none;
            z-index: 99;
            font-size: 2rem;
            font-weight: bolder;
            border: 1px solid #ccc;
            padding: 0.5rem .7rem .3rem;
            transition: .3s all ease-in-out;
        }

        #btnTop img {
            max-width: 36px;
        }
    </style>
    <!-- <button id="btnTop" onclick="backToTop()">&#8593;</button> -->
    <button id="btnTop" onclick="backToTop()"><img src="<?= _URLBASE_ ?>public/icon/arrow-up.svg"></button>
    <script>
        window.onscroll = function() {
            scroll();
            console.log('olá');
        }

        function scroll() {
            let btn = document.getElementById('btnTop');
            if (document.documentElement.scrollTop > 50) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
                btn.style.transition = "transition:.3s all ease-in-out";
            }
        }

        function backToTop() {
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>