<?php

use Model\LivroDAO;
use Model\CategoriaDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$livroDAO = new LivroDAO($objSql);
$categoriaDAO = new CategoriaDAO($objSql);
$resultCategoria = $categoriaDAO->listarCategorias();

$frontController = new Controller\FrontController($livroDAO);
$frontController->setItemPagina(8);
$frontController->verificarPaginacao();

$title = "Livros";
//Arquivo de pesquisa para buscar dinamicamente
$pesquisa =  _URLBASE_ . "src/view/user/pages/includes/pesquisa.php";
?>

<section class="pagLivro">
    <article>
        <form class="search-box" name="form_pesquisa" id="form_pesquisa" method="post" action="">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-search"></i></span>
                <input type="text" name="pesquisaLivro" id="pesquisaLivro" value="" tabindex="1" placeholder="Pesquisar Livros..." />
            </div>
            <!-- <a class="search-btn" href="#">
                <img src="<? //= _ICONBASE_ 
                            ?>busca.svg" alt="">
            </a> -->
        </form>

        <section class="jumbotron">
            <div id="MostraPesq"></div>
        </section>
        <div id="contentLoading">
            <div id="loading"></div>
        </div>
    </article>

    <script type="text/javascript">
        $(document).ready(function() {

            //Aqui a ativa a imagem de load
            function loading_show() {
                $('#loading').html("<img class='loadGif' src='<?= _URLBASE_ ?>public/icon/loading.svg'/>").fadeIn('fast');
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
</section>
<section class="busca">

    <div class="searchBooks">
        <?php
        $resultLivro = $livroDAO->listarLivros($frontController->getRegIni(), $frontController->getItemPagina());
        foreach ($resultLivro as $livro) {
            ?>
            <a href="<?= _URLBASE_ ?>area/user/pages/descLivro/<?= $livro['isbnLivro'] ?>">
                <figure>
                    <img src="<?= _URLBASE_ . $livro['urlFotoLivro'] ?>" alt="<?= $livro['nomeLivro'] ?>" title="<?= $livro['nomeLivro'] ?>">
                    <figcaption>
                        <p style="text-align:center;"><?= $livro['nomeLivro'] ?></p>
                    </figcaption>
                </figure>
            </a>
        <?php
        }
        ?>
    </div>
    <aside class="categoriaContainer">
        <p>Categorias</p>
        <ul class="catContainer">
            <li>
                <a href='<?= _URLBASE_ ?>area/user/menuHome/livros'>
                    Todas
                </a>
            </li>
            <?php
            foreach ($resultCategoria as $categorias) {
                ?>
                <li>
                    <a href="<?= _URLBASE_ . "area/user/pages/categoriaListar/" . $categorias['idCategoria'] ?>"><?= $categorias['nomeCategoria'] ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </aside>

    <!--Modal-->
    <label class="btn-modal-cadastre modalCategoria" for="modal-categorias">Listar Categorias</label>
    <section class="modal">
        <input class="modal-open" id="modal-categorias" type="checkbox" hidden>
        <div class="modal-wrap" aria-hidden="true" role="dialog">
            <label class="modal-overlay" for="modal-categorias"></label>
            <div class="modal-dialog">
                <div class="modal-header">
                    <p>Lista de categorias</p>
                    <label class="btn-close" for="modal-categorias" aria-hidden="true">×</label>
                </div>
                <div class="modal-body">
                    <ul class="catContainer">
                        <li>
                            <a href='<?= _URLBASE_ ?>area/user/menuHome/livros'>
                                Todas
                            </a>
                        </li>
                        <?php
                        foreach ($resultCategoria as $categorias) {
                            ?>
                            <li>
                                <a href="<?= _URLBASE_ . "area/user/pages/categoriaListar/" . $categorias['idCategoria'] ?>"><?= $categorias['nomeCategoria'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <label class="btn btn-primary" for="modal-categorias">Fechar</label>
                </div>
            </div>
        </div>
    </section>
</section>

<section class="notificador">
    <?php
    //Estou usando a Url da lista que quero controlar
    $urlDoNotificador = "area/user/menuHome/livros";
    $totalSebo = false;
    $totalUser = false;
    $GetPost = null;
    echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
    ?>
</section>