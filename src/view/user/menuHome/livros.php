<?php $title = "Livros";?>
<div id="container">
    <section class="pagLivro">
        <div class="container">
            <div class="box-search">
                <a href="" class="search">
                    <img src="<?php echo _ICONBASE_ ?>search.png" alt="">
                </a>
                <input type="text">
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