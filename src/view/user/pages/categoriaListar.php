<?php

use Model\CategoriaDAO;
use Model\LivroDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$livroDAO = new LivroDAO($sql);
$categoriaDAO = new CategoriaDAO($sql);

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;
$livroDAO->setIdCategoria($GetPost);

$frontController = new Controller\FrontController($livroDAO);
$frontController->setItemPagina(8);
$frontController->verificarPaginacao();

$resultLivro = $livroDAO->listarLivroCategoria($frontController->getRegIni(), $frontController->getItemPagina());

$categoriaDAO->setIdCategoria($_GET['id']);
$resultCategoriaId = $categoriaDAO->listarCategoriaId();
$categoriaDAO->setNomeCategoria($resultCategoriaId['nomeCategoria']);
$resultCategoria = $categoriaDAO->listarCategorias();

if ($resultLivro > 0) {
    ?>
    <article>
        <header class="headerPagina">
            <h1>Livro de <?= $resultCategoriaId['nomeCategoria'] ?></h1>
        </header>
        <section class="busca">

            <div class="searchBooks">
                <?php
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
                $urlDoNotificador = "area/user/pages/categoriaListar/$GetPost";
                $totalSebo = false;
                $totalUser = true;
                echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
                ?>
        </section>
    </article>
<?php
} else {
    echo "<p>
            Ainda não possuimos livros cadastrados de " . $categoriaDAO->getNomeCategoria() . "
            <br> 
            <a href='" . _URLBASE_ . "area/user/menuHome/livros'>
                <b>Voltar</b>
            </a>
        </p>";
}
?>