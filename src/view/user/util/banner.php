<?php
$styleSobrescrito = "";
$styleSobrescrito .=
    ".navDesk {
        height: 70px
    }";
?>
<div class="banner">
    <div id="homepage-slider" class="st-slider">

        <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />

        <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
        <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
        <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
        
        <div class="images">
            <div class="images-inner">
                <div class="image-slide background1">
                    <div class="image">
                        <p class="bannerHeader">
                            <strong>Sebook</strong> o melhor acervo de livros
                        </p>
                        <p class="bannerHeaderSub">Cadastre-se agora!</p>
                        <a class="bannerBtn" href="<?= _URLBASE_ ?>area/user/login/logar">Clique aqui</a>
                    </div>
                </div>
                <div class="image-slide background2">
                    <div class="image">
                        <p class="bannerHeader">Doe seus livros ao um Artesão</p>
                        <p class="bannerHeaderSub">Livros danificados podem ganhar renascer com seu gesto.</p>
                        <a class="bannerBtn" href="<?= _URLBASE_ ?>area/user/pages/artesoesDoacao">Clique aqui</a>
                    </div>
                </div>
                <div class="image-slide background3">
                    <div class="image">
                        <p class="bannerHeader">
                            Artesão Faça Parte!
                        </p>
                        <p class="bannerHeaderSub">
                            Cadastre-se para entrar em contato com doadores de livros mais próximos.
                        </p>
                        <a class="bannerBtn" href="<?= _URLBASE_ ?>area/user/pages/artesoes">Clique aqui</a>
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