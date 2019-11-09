<?php

use Model\PostagemDAO;
//use Controller\PostagemController;

//Pega a conexão
$sql = new \Util\Sql($conn);
//Passa a conexão para o dao
$postagemDAO = new PostagemDAO($sql);

$GetPost = isset($_GET['id']) ? $_GET['id'] : false;

$postagemDAO->setIdUsuario($GetPost);

$frontController = new Controller\FrontController($postagemDAO);
$frontController->setItemPagina(4);
$frontController->verificarPaginacao();

var_dump($_GET);

?>
<article>
    <header class="headerPagina">
        <h1>Últimas Postagens</h1>
    </header>
    <div class="itemContentContainer">
        <?php
        $postagens = $postagemDAO->listarUserPost($frontController->getRegIni(), $frontController->getItemPagina());
        if($postagens > 0){
  
        foreach ($postagens as $post) {
            ?>
            <div class="postContainer">
                <div class='contentItem'>
                    <div class="item">
                        <a href='<?= _URLBASE_ ?>area/user/pages/postVer/<?= $post['idPostagem'] ?>'>
                            <figure>
                                <img src='<?= _URLBASE_ . $post['urlFotoPost'] ?>'>
                                <figcaption>
                                    <h1><?= $post['tituloPostagem'] ?></h1>
                                    <p><?= $post['txtPostagem'] ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
                <?php
                    if ($post['idUsuario'] == $idUser || $acessoUser <= 3 && $idUser != null) {
                        ?>
                    <div class="itemModifica">
                        <a href='<?= _URLBASE_ . "area/user/pages/postEditar/{$post['idPostagem']}" ?>' class="modifica edit">
                            Editar
                        </a>

                        <a href="<?= _URLBASE_ . "area/user/pages/postDoUser/delete/{$post['idPostagem']}" ?>" onclick="return confirm('Tem Certeza que vai excluir?')" class="modifica danger">
                            Deletar
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php
        }
        ?>

    </div>
    <section class="notificador">
        <?php
        //Estou usando a Url da lista que quero controlar
        $urlDoNotificador = "area/user/pages/postDoUser/$GetPost";
        $totalSebo = false;
        $totalUser = true;
        echo $frontController->exibirNotificador($urlDoNotificador, $totalSebo, $totalUser, $GetPost);
        ?>
    </section>
</article>
<?php          
}
else{
    echo "<p>Usuário não possui postagens</p>";
}