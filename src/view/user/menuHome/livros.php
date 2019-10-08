<?php $title = "Livros";?>
<div id="container">
    <section class="pagLivro">
        <div class="container">
            <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Pesquise ...">
                <a class="search-btn" href="#">
                <img src="<?php echo _ICONBASE_ ?>search3.png" alt="">
                </a>
             </div>
            <div class="estante-slider">
                <div class="titulo-estante-slider">Mais procurados</div>
                <?php require('src/view/user/util/slick.php');?>
            </div>

            <div class="estante-slider">
                <div class="titulo-estante-slider">Lançamentos</div>
                <?php require('src/view/user/util/slick.php');?>
            </div>

            <div class="estante-slider">
                <div class="titulo-estante-slider">Recomendados</div>
                <?php require('src/view/user/util/slick.php');?>
            </div>
        </div>
    </section>
</div>