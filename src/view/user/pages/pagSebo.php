<?php

use Model\SeboDAO;
use Model\livroDAO;
use Model\SeboLivroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$seboDAO = new SeboDAO($objSql);
$livroDAO = new livroDAO($objSql);
$seboLivroDAO = new SeboLivroDAO($objSql);

$seboDAO->setIdUsuario($_GET['id']);
$result = $seboDAO->listarSeboId();
$seboDAO->setNomeFantasia($result['nomeFantasia']);
$seboDAO->setUrlFotoSebo($result['urlFotoSebo']);
$seboDAO->setUrlSiteSebo($result['urlSiteSebo']);

$seboLivroDAO->setIdUsuario($_GET['id']);
$resultSeboLivro = $seboLivroDAO->listarSeboLivroId();

?>
<article class="acervo-sebo">
    <header class="topo-acervo">
        <figure class="img-topo-acervo">
            <img src="<?= _URLBASE_ . $seboDAO->getUrlFotoSebo() ?>" alt='fotoSebo'>
            <figcaption class="info-topo-acervo">
                <h1><?= $seboDAO->getNomeFantasia() ?></h1>
                <p><a href="<?= $seboDAO->getUrlSiteSebo() ?>">Link Website</a></p>
                <p>CNPJ: <?= $seboDAO->getCnpjSebo() ?></p>
            </figcaption>
        </figure>

    </header>
    <section class="acervo">
        <header>
            <h2>Acervo</h2>
        </header>
        <?php
        if ($resultSeboLivro != null) {
            foreach ($resultSeboLivro as $seboLivro) {
                //Seto isbn para listar os livros
                $livroDAO->setIsbnLivro($seboLivro['isbnLivro']);
                $resultLivro = $livroDAO->listarLivroSebo();
                ?>
                <figure>
                    <a href="<?=_URLBASE_ ?>area/user/pages/descLivro/<?= $seboLivro['isbnLivro'] ?>">
                        <img src="<?= _URLBASE_ . $resultLivro[0]['urlFotoLivro'] ?>" alt="<?= $resultLivro[0]['nomeLivro'] ?>" title="<?= $resultLivro[0]['nomeLivro'] ?>" style="max-width:200px;">
                        <!--Posteriormente remover ccs inline-->
                    </a>
                    <figcaption>
                        <p>Titulo: <?= $resultLivro[0]['nomeLivro']?></p>
                        <p>Isbn: <?= $seboLivro['isbnLivro'] ?></p>
                        <p>Quantidade em Estoque: <?= $seboLivro['qtdEstoque'] ?></p>
                    </figcaption>
                </figure>
        <?php
            }
        } else {
            echo "<p>Sebo não possui livros cadastrados.</p>";
        }
        ?>
    </section>
</article>
