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
        <?php require_once 'menu/header.php'; ?>
    </header>
    <div id="container">
        <div class="Social-Bar">
            <a href="#">
                <img src="<?php echo _ICONBASE_ ?>Face.png" class="icon icon-facebook" target="">
            </a>
            <a href="#">
                <img src="<?php echo _ICONBASE_ ?>Instagram.png" class="icon icon-instagram" target="">
            </a>
            <a href="#">
                <img src="<?php echo _ICONBASE_ ?>Twitter.png" class="icon icon-twitter" target="">
            </a>
        </div>

        <div id="container">
            <section class="home">

                <div class="banner">
                    <div id="homepage-slider" class="st-slider">

                        <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
                        <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
                        <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
                        <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />

                        <div class="images">
                            <div class="images-inner">
                                <div class="image-slide">
                                    <div class="image">
                                        <img src="<?php echo _IMGBASE_ ?>banner1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="image-slide">
                                    <div class="image">
                                        <img src="<?php echo _IMGBASE_ ?>banner2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="image-slide">
                                    <div class="image">
                                        <img src="<?php echo _IMGBASE_ ?>banner3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="labels">
                            <div class="fake-radio">
                                <label for="slide1" class="radio-btn"></label>
                                <label for="slide2" class="radio-btn"></label>
                                <label for="slide3" class="radio-btn"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="maisProcurados">
                    <div class="container">
                        <h1>Mais Procurados</h1>

                        <div class="swiper-container">
                            <div class="books swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="desLivros.html"><img src="<?php echo _IMGBASE_ ?>livroHarry.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros2.html"><img src="<?php echo _IMGBASE_ ?>livroNeve.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros3.html"><img src="<?php echo _IMGBASE_ ?>Capa_Como-eu-era-antes-de-voce2.jpg" alt="livroPercy" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros4.html"><img src="<?php echo _IMGBASE_ ?>Cidades-de-Papel.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros5.html"><img src="<?php echo _IMGBASE_ ?>DepoisDeVoce_Jojo.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros6.html"><img src="<?php echo _IMGBASE_ ?>livroPercy.jpg" alt="livroPercy" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros7.html"><img src="<?php echo _IMGBASE_ ?>Livro-A-Culpa-e-das-Estrelas.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros8.html"><img src="<?php echo _IMGBASE_ ?>Livro-After.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros9.html"><img src="<?php echo _IMGBASE_ ?>Livro-As-Cronicas-de-Gelo-e-Fogo-A-Danca-dos-Dragoes.jpg" alt="livroPercy" title="Livro"></a>
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="eventos">
                    <div class="container">
                        <h2>Eventos</h2>
                        <figure>
                            <img src="<?php echo _IMGBASE_ ?>banner2.jpg" alt="">
                            <figcaption>Festa do Livro da USP</figcaption>
                        </figure>
                        <figure>
                            <img src="<?php echo _IMGBASE_ ?>banner3.jpg" alt="">
                            <figcaption>Feira Nacional Do Livro</figcaption>
                        </figure>
                    </div>
                </div>
            </section><br>
        </div>
        <footer class="master1">
            <?php require_once 'menu/footer.php'; ?>
        </footer>
</body>

</html>