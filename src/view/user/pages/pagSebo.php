<?php

use Model\SeboDAO;
use Model\SeboLivroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$seboDAO = new SeboDAO($objSql);
$seboLivroDAO = new SeboLivroDAO($objSql);

$seboDAO->setIdUsuario($_GET['id']);
$result = $seboDAO->listarSeboId();
$seboDAO->setNomeFantasia($result['nomeFantasia']);
$seboDAO->setUrlFotoSebo($result['urlFotoSebo']);
$seboDAO->setUrlSiteSebo($result['urlSiteSebo']);

$seboLivroDAO->setIdUsuario($_GET['id']);
$resultSeboLivro = $seboLivroDAO->listarSeboLivroId();
$seboLivroDAO->setIsbnLivro($resultSeboLivro['isbnLivro']);
$seboLivroDAO->setQtdEstoque($resultSeboLivro['qtdEstoque']);

for($i = 0; $i < count($resultSeboLivro); $i++){
    var_dump($resultSeboLivro);
}



?>
<article class="acervo-sebo">
    <header class="topo-acervo">
        <div class="img-topo-acervo">
            <img src="<?= _URLBASE_ . $seboDAO->getUrlFotoSebo() ?>" alt='fotoSebo'>
        </div>
        <div class="info-topo-acervo">
            <a href="">
                <h1><?= $seboDAO->getNomeFantasia() ?></h1>
            </a>
            <p><a href="<?= $seboDAO->getUrlSiteSebo() ?>">Link Website</a></p>
        </div>
    </header>
    <section class="acervo">
        <header>
            <h2>Acervo</h2>
        </header>
        <?php
        foreach ($resultSeboLivro as $seboLivro) {
        ?>
        <figure>
            <a href="Logalivro.html">
                <img src="<?= _URLBASE_ ?>public/img/livroNeve.jpg?>" alt="livroHarry" title="Livro" style="max-width:200px;">
                <!--Posteriormente remover ccs inline-->
            </a>
            <figcaption>
                <p>Qauntidade em Estoque: <?=$seboLivroDAO->getQtdEstoque()?></p>
            </figcaption>
        </figure>
        <?php
        }
        ?>
    </section>
</article>