<?php

use Model\SeboDAO;
use Model\livroDAO;
use Model\SeboLivroDAO;
use Model\ComentarioDAO;
use Model\UsuarioDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);
$seboDAO = new SeboDAO($objSql);
$livroDAO = new livroDAO($objSql);
$seboLivroDAO = new SeboLivroDAO($objSql);
$comentarioDAO = new ComentarioDAO($objSql);
$usuarioDAO = new UsuarioDAO($objSql);

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

$seboDAO->setIdUsuario($GetPost);
$result = $seboDAO->listarSeboId();
$seboDAO->setNomeFantasia($result['nomeFantasia']);
$seboDAO->setUrlFotoSebo($result['urlFotoSebo']);
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
                    <a href="<?= _URLBASE_ ?>area/user/pages/descLivro/<?= $seboLivro['isbnLivro'] ?>">
                        <img src="<?= _URLBASE_ . $resultLivro[0]['urlFotoLivro'] ?>" alt="<?= $resultLivro[0]['nomeLivro'] ?>" title="<?= $resultLivro[0]['nomeLivro'] ?>" style="max-width:200px;">
                        <!--Posteriormente remover ccs inline-->
                    </a>
                    <figcaption>
                        <p>Titulo: <?= $resultLivro[0]['nomeLivro'] ?></p>
                        <p>Isbn: <?= $seboLivro['isbnLivro'] ?></p>
                        <p>Quantidade em Estoque: <?= $seboLivro['qtdEstoque'] ?></p>
                        <?php
                            switch ($seboLivro['estadoLivro']){
                                case "B":
                                    $msgEstado = "Bom";
                                    break;
                                case "M":
                                     $msgEstado = "Médio";
                                     break;
                                case "O":
                                     $msgEstado = "Ótimo";
                                     break;
                                case "N":
                                     $msgEstado = "Novo";
                                     break;
                                default:
                                     $msgEstado = "Não informado";
                            }
                        ?>
                        <p>Estado dos Livros: <?= $msgEstado ?></p>
                    </figcaption>
                </figure>
                <?php
		if ($idUser == $seboLivroDAO->getIdUsuario()) {
            $seboLivroDAO->setIdUsuario($idUser);
            
            $value = "Atualizar";
            $excluir = true;
            $name = "atualizarLivro";

			?>

			<label class="btn-modal-cadastre" for="livroAcervo" value="<?= $livroDAO->getIsbnLivro()  ?>" onclick="return pegaQtdEstoque(<?= $livroDAO->getIsbnLivro()?>,'<?= $seboLivro['qtdEstoque'] ?>')" class="modifica edit"><?= $value ?></label>

			<?php
				if ($excluir == true) {
					?>
				<!--Formulário para excluir-->
				<form method="post" action="" name="excluirLivro">
					<input type="hidden" name="isbnLivroExcluir" value="<?= $livroDAO->getIsbnLivro() ?>">

					<input type="submit" name="excluirLivro" value="Excluir do Acervo" onclick="if (confirm('Quer Mesmo retirar esse Livro do acervo?')) {return true;}else{return false;}" class="modifica danger">
				</form>
				<?php
                    if (isset($_POST['isbnLivroExcluir'])) {
                        $seboLivroDAO->setIdUsuario($idUser);
                        $seboLivroDAO->setIsbnLivro($_POST['isbnLivroExcluir']);
                        //Excluir comentário
                        $seboLivroDAO->excluirseboLivro();
                        //Recarrega a página

                        // header("Location:" . _URLBASE_ . $caminhoEnviaComentario . $GetPost);
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
            echo $frontController->exibirNotificador($urlDoNotificador,$totalSebo,$GetPost);
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