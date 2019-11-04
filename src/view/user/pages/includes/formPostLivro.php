<!--Formulário de foto-->
<div class="imgContainer">
    <div class="formFotoContainer">
        <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUploadPost.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">

            <input type="file" name="urlFotoLivro">

            <input class="button" type="submit" value="Carregar">
        </form>
        <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
    </div>
    <?php
    $src = "src='" . _URLBASE_ . "{$livroDAO->getUrlFotoLivro()}'";
    ?>
    <div class="imgCadastro">
        <picture>
            <img id="imgAvatar" src='<?= _URLBASE_ . $livroDAO->getUrlFotoLivro() ?>' alt="Avatar" class="avatar">
        </picture>
    </div>
</div>