<!DOCTYPE html>
<html lang "pt_br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <script src="https://code.jquery.com/jquery-3.4.0.slim.min.js"></script>

    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="http://localhost/sebook/usuario/css/usuario.css">

    <title>Sebook</title>
</head>

<body class="">
    <header>
        <?php require_once 'menu/header.php'; ?>
    </header>
    <div id="container">
        <div class="Social-Bar">
            <a href="#">
                <img src="images/icons/Face.png" class="icon icon-facebook" target="">
            </a>
            <a href="#">
                <img src="images/icons/Instagram.png" class="icon icon-instagram" target="">
            </a>
            <a href="#">
                <img src="images/icons/Twitter.png" class="icon icon-twitter" target="">
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
                                        <img src="images/img/banner1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="image-slide">
                                    <div class="image">
                                        <img src="images/img/banner2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="image-slide">
                                    <div class="image">
                                        <img src="images/img/banner3.jpg" alt="">
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
                                    <a href="desLivros.html"><img src="images/img/livroHarry.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros2.html"><img src="images/img/livroNeve.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros3.html"><img src="images/img/Capa_Como-eu-era-antes-de-voce2.jpg" alt="livroPercy" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros4.html"><img src="images/img/Cidades-de-Papel.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros5.html"><img src="images/img/DepoisDeVoce_Jojo.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros6.html"><img src="images/img/livroPercy.jpg" alt="livroPercy" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros7.html"><img src="images/img/Livro-A-Culpa-e-das-Estrelas.jpg" alt="livroHarry" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros8.html"><img src="images/img/Livro-After.jpg" alt="livroNeve" title="Livro"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="desLivros9.html"><img src="images/img/Livro-As-Cronicas-de-Gelo-e-Fogo-A-Danca-dos-Dragoes.jpg" alt="livroPercy" title="Livro"></a>
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
                            <img src="images/img/banner2.jpg" alt="">
                            <figcaption>Festa do Livro da USP</figcaption>
                        </figure>
                        <figure>
                            <img src="images/img/banner3.jpg" alt="">
                            <figcaption>Feira Nacional Do Livro</figcaption>
                        </figure>
                    </div>
                </div>
            </section><br>
        </div>
        <footer class="master1">
            <?php require_once 'menu/footer.php'; ?>
        </footer>

        <script src="https://idangero.us/swiper/dist/js/swiper.min.js"></script>
        <script>
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                slidesPerGroup: 3,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        </script>
</body>

</html>