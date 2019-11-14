<?php

use Model\SeboDAO;
use Model\LivroDAO;
use Model\SeboLivroDAO;
use Model\ComentarioDAO;
use Model\UsuarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$seboDAO = new SeboDAO($objSql);
$livroDAO = new LivroDAO($objSql);
$seboLivroDAO = new SeboLivroDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

$seboDAO->setIdUsuario($GetPost);
$result = $seboDAO->listarSeboId();
$usuarioDAO->setUrlFoto($result['urlFoto']);
$seboDAO->setNomeFantasia($result['nomeFantasia']);
$seboDAO->setCidadeSebo($result['cidadeSebo']);
$seboDAO->setCepEndSebo($result['cepEndSebo']);
$seboDAO->setNumTelSebo($result['numTelSebo']);
$seboDAO->setCelular1Sebo($result['celular1Sebo']);
$seboDAO->setCelular2Sebo($result['celular2Sebo']);
$seboDAO->setCnpjSebo($result['cnpjSebo']);
$seboDAO->setUrlSiteSebo($result['urlSiteSebo']);
$seboLivroDAO->setIdUsuario($GetPost);
// $resultSeboLivro = $seboLivroDAO->listarSeboLivroId();

$comentarioDAO->setIdPagina($GetPost);
$resultComentario = $comentarioDAO->listarComentarioPagina();

/*Paginação*/
$frontController = new Controller\FrontController($seboLivroDAO);
$frontController->setItemPagina(4);
$frontController->verificarPaginacao();
$resultSeboLivro = $seboLivroDAO->listarSeboLivroId($frontController->getRegIni(), $frontController->getItemPagina());

?>
<article class="acervo-sebo">
    <header class="headerPagina">
        <h1><?= $seboDAO->getNomeFantasia() ?></h1>
    </header>
    <section class="topo-acervo">
        
        <figure class="img-topo-acervo">
            <img src="<?= _URLBASE_ . $usuarioDAO->getUrlFoto() ?>" alt='fotoSebo'>
            <figcaption class="info-topo-acervo">

                <?php
                $infoSebo = "";
                if ($seboDAO->getCidadeSebo() != "") {
                    $infoSebo .= "Cidade: {$seboDAO->getCidadeSebo()}";
                }
                if ($seboDAO->getCepEndSebo() != "") {
                    $infoSebo .= "<br>CEP: {$seboDAO->getCepEndSebo()}";
                }
                if ($seboDAO->getNumTelSebo() != "") {
                    $infoSebo .= "<br>Telefone: {$seboDAO->getNumTelSebo()}";
                }
                if ($seboDAO->getCelular1Sebo() != "") {
                    $infoSebo .= "<br>Celular: {$seboDAO->getCelular1Sebo()}";
                }
                if ($seboDAO->getCelular1Sebo() != "") {
                    $infoSebo .= "<br>Celular II: {$seboDAO->getCelular1Sebo()}";
                }
                if ($seboDAO->getCnpjSebo() != "") {
                    $infoSebo .= "<br>CNPJ: {$seboDAO->getCnpjSebo()}";
                }
                if ($seboDAO->getUrlSiteSebo() != "") {
                    $infoSebo .= "<br><a href={$seboDAO->getUrlSiteSebo()}' target='_blank'>Link Website</a>";
                }
                echo "<p>{$infoSebo}</p>";
                ?>
            </figcaption>
        </figure>

    </section>
    <section class="acervo">
        <header>
            <p>Acervo de <?= $seboDAO->getNomeFantasia() ?></p>
        </header>
        <?php
        if ($resultSeboLivro != null) {
            foreach ($resultSeboLivro as $seboLivro) {
                //Seto isbn para listar os livros
                $livroDAO->setIsbnLivro($seboLivro['isbnLivro']);
                $resultLivro = $livroDAO->listarLivroSebo();

                // $livroDAO->setNomeLivro($resultLivro[0]['nomeLivro']);

                ?>
                <figure>
                    <a href="<?= _URLBASE_ ?>area/user/pages/descLivro/<?= $seboLivro['isbnLivro'] ?>">
                        <img src="<?= _URLBASE_ . $resultLivro[0]['urlFotoLivro'] ?>" alt="<?= $resultLivro[0]['nomeLivro'] ?>" title="<?= $resultLivro[0]['nomeLivro'] ?>" style="max-width:200px;">
                        <!--Posteriormente remover ccs inline-->
                    </a>
                    <figcaption>
                        <p>Titulo: <?= $resultLivro[0]['nomeLivro'] ?></p>
                        <p>Isbn: <?= $seboLivro['isbnLivro'] ?></p>
                        <p>Quantidade em Estoque: <?= $seboLivro['qtdEstoque'] ?></p>
                    </figcaption>
                </figure>
                <?php
                        if ($idUser == $seboLivroDAO->getIdUsuario()) {
                            $seboLivroDAO->setIdUsuario($idUser);

                            $value = "Editar";
                            $excluir = true;
                            $name = "atualizarLivro";

                            ?>

                    <label class="btn-modal-cadastre" for="livroAcervo" value="<?= $livroDAO->getIsbnLivro()  ?>" onclick="return pegaQtdEstoque(<?= $livroDAO->getIsbnLivro() ?>,'<?= $seboLivro['qtdEstoque'] ?>')" class="modifica edit"><?= $value ?></label>

                    <?php
                                if ($excluir == true) {
                                    ?>
                        <!--Formulário para excluir-->
                        <form method="post" action="" name="excluirLivro">
                            <input type="hidden" name="isbnLivroExcluir" value="<?= $livroDAO->getIsbnLivro() ?>">

                            <input type="submit" name="excluirLivro" value="Deletar" onclick="if (confirm('Quer Mesmo retirar esse Livro do acervo?')) {return true;}else{return false;}" class="modifica danger">
                        </form>
                        <?php
                                        if (isset($_POST['isbnLivroExcluir'])) {
                                            $seboLivroDAO->setIdUsuario($idUser);
                                            $seboLivroDAO->setIsbnLivro($_POST['isbnLivroExcluir']);

                                            //Excluir comentário
                                            $seboLivroDAO->excluirseboLivro();

                                            //Recarrega a página
                                            header('Refresh:0');
                                        }
                                        ?>
                <?php
                            }
                        }
                        ?>
        <?php
            }
        } else {
            echo "<p>Sebo não possui livros cadastrados.</p>";
        }
        ?>
    </section>

    <section class="notificador">
        <?php
        //Estou usando a Url da lista que quero controlar
        $urlDoNotificador = "area/user/pages/pagSebo/$GetPost";
        $totalSebo = true;
        $totalUser = false;
        echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
        ?>
    </section>

    <section>
        <?php
        /*Inclui toda sessão de comentários*/
        $pagina = "paginaSebo";
        include "includes/comentarioTemplate.php";
        ?>
    </section>
</article>

<?php
include "includes/livroModal.php";
?>