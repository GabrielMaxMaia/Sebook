<?php

use Model\PostagemDAO;

$postagemDAO = new PostagemDAO($conn);

$result = $postagemDAO->listarPostagem();

$IdUser = $_SESSION['userLogado']['idUsuario'] ?? "";

?>
<article class="postContainer">
    <h1>Postagens</h1>
    <?php
    if ($result != null) {
        foreach ($result as $linha) {
            ?>
            <section class='postagem'>
                <h2><a href='<?php echo  _URLBASE_ . "/area/user/pages/postVer/{$linha['idPostagem']}" ?>'> 
                <?= $linha['tituloPostagem'] ?>
            </a>
        </h2>

        <p><?= $linha['txtPostagem'] ?></p>
        <?php
                if ($linha['idUsuario'] == $IdUser && $IdUser != null)  {
                    ?> 
        <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/alter/<?= $linha['idPostagem'] ?>'>
            Editar
        </a>
        <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/delete/<?= $linha['idPostagem'] ?>'>
            Excluir
        </a>
        </section>
    <?php
            }
        }
    }
    ?>
</article>