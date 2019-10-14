<?php

use Model\PostagemDAO;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);
//Armazena em result para o laço
$result = $postagemDAO->listarPostagem();
//Pega a sessão se hover, caso contrario string vazia
$IdUser = $_SESSION['userLogado']['idUsuario'] ?? "";
$IdSessaoUser = $_SESSION['userLogado']['acesso'] ?? "";


if (isset($_GET['id'])) {
    //Ao passar idDelete seta o valor e executa exclusão em postagemDAO
    $postagemDAO->setIdPostagem($_GET['id']);
    $postagemDAO->excluirPostagem();
    //header para recarregar a página
    header("Location:" . _URLBASE_ . "area/user/pages/postListar");
}

?>
<article class="postContainer">
    <h1>Postagens</h1>
    <?php
    if ($result != null) {
        foreach ($result as $linha) {
            
            ?>
            <section class='postagem'>
                <figure>
                    <!--Estou deixando css inline mas mudar depois-->
                    <img style="max-width:200px;" src="<?= _URLBASE_ . $linha['urlFotoPost'] ?>">
                </figure>
                <h2>
                    <a href='<?= _URLBASE_ . "area/user/pages/postVer/{$linha['idPostagem']}" ?>'> <?= $linha['tituloPostagem'] ?></a>
                </h2>

                <p><?= $linha['txtPostagem'] ?></p>
                <?php
                    if ($linha['idUsuario'] == $IdUser || $IdSessaoUser <= 3 && $IdUser != null) {
                ?>
                    <a href='<?= _URLBASE_ . "area/user/pages/postEditar/{$linha['idPostagem']}" ?>'>
                        Editar
                    </a>

                    <a href="<?= _URLBASE_ . "area/user/pages/postListar/delete/{$linha['idPostagem']}"?>" onclick="return confirm('Tem Certeza que vai excluir?')">
                        Excluir
                    </a>
            </section>
<?php
        }
    }
} else {
    echo "<h2>Não há postagens</h2>";
}
?>
</article>