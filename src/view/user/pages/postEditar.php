<?php

use Model\Postagem;
use Model\PostagemDAO;

$sql = new \Util\Sql($conn);
$postagemDAO = new PostagemDAO($sql);
$postagem = new Postagem();

$IdSessaoUser = $_SESSION['userLogado']['idUsuario'] ?? "";

$postagem->setIdPostagem(1);

$postagemDAO->setIdPostagem($_GET['idPost']);
//$postagemDAO->setIdPostagem(1);

echo "GET " . $postagemDAO->getIdPostagem();

$result = $postagemDAO->listarPostagemId();

// var_dump($postagemDAO->listarPostagemId());

$postId = isset($_GET['idPost']) ? $_GET['idPost'] : "";

?>
<h1>Alterar Publicação</h1>

<!-- http://localhost/sebook/index.php?area=user&pasta=pages&page=postEditar&idPost=1 -->
<?php

if ($result != null) {

if ($result['idUsuario'] == $IdSessaoUser) {
            ?>
<form method="post" action="?pagina=admin&metodo=update">

	<input type="text" name="titulo" value="<?= $result['tituloPostagem'] ?>">

	<textarea name="conteudo" cols="25" rows="5">
                 <?= $result['txtPostagem'] ?>
                </textarea>

	<input type="hidden" name="id" value="<?= $result['idPostagem'] ?>">

	<input type="submit" value="Alterar">
</form>
<?php
    }
    else {
        echo "Essa postagem não pertence a você";
    }
} 
