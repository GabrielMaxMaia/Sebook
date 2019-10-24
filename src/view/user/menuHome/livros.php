<?php
$title = "Livros";

//Arquivo de pesquisa para buscar dinamicamente
$pesquisa =  _URLBASE_ . "src/view/user/pages/includes/pesquisa.php";
?>

<section class="pagLivro">
    <article>
        <form name="form_pesquisa" id="form_pesquisa" method="post" action="">
            <fieldset>
                <legend>Digite o nome a pesquisar</legend>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-search"></i></span>
                    <input type="text" name="pesquisaLivro" id="pesquisaLivro" value="" tabindex="1" placeholder="Pesquisar Livros..." />
                </div>
            </fieldset>
        </form>
        <div id="contentLoading">
            <div id="loading"></div>
        </div>
        <section class="jumbotron">
            <div id="MostraPesq"></div>
        </section>
    </article>

    <script type="text/javascript">
        $(document).ready(function() {

            //Aqui a ativa a imagem de load
            function loading_show() {
                $('#loading').html("<img src='<?= _URLBASE_ ?>public/icon/loading.gif'/>").fadeIn('fast');
            }

            //Aqui desativa a imagem de loading
            function loading_hide() {
                $('#loading').fadeOut('fast');
            }


            // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
            function load_dados(valores, page, div) {
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function() {
                        //Chama o loading antes do carregamento
                        loading_show();
                    },
                    data: valores,
                    success: function(msg) {
                        loading_hide();
                        var data = msg;
                        $(div).html(data).fadeIn();
                    }
                });
            }

            // src\view\user\pages\includes\pesquisa.php

            //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
            load_dados(null, '<?= $pesquisa ?>', '#MostraPesq');


            //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
            $('#pesquisaLivro').keyup(function() {

                var valores = $('#form_pesquisa').serialize() //o serialize retorna uma string pronta para ser enviada

                //pegando o valor do campo #pesquisaLivro
                var $parametro = $(this).val();

                if ($parametro.length >= 1) {
                    load_dados(valores, '<?= $pesquisa ?>', '#MostraPesq');
                } else {
                    load_dados(null, '<?= $pesquisa ?>', '#MostraPesq');
                }
            });

        });
    </script>


    <!-- <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Pesquise ...">
                <a class="search-btn" href="#">
                <img src="<? //= _ICONBASE_ 
                            ?>buscaSVG.svg" alt="">
                </a>
    </div> -->

    <div class="estante-slider">
        <div class="titulo-estante-slider">Mais procurados</div>
        <?php require('src/view/user/util/slick.php'); ?>
    </div>

    <div class="estante-slider">
        <div class="titulo-estante-slider">Lançamentos</div>
        <?php require('src/view/user/util/slick.php'); ?>
    </div>

    <div class="estante-slider">
        <div class="titulo-estante-slider">Recomendados</div>
        <?php require('src/view/user/util/slick.php'); ?>
    </div>

</section>