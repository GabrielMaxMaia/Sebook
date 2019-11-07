<!--Formulário de foto-->
<div class="imgContainer">
    <?php
    $src = "src='" . _URLBASE_ . "{$usuarioDAO->getUrlFoto()}'";
    ?>
    <div class="imgCadastro">
        <figure>
            <img id="imgAvatar" <?= $src ?> alt="Avatar" class="avatar"'>
            <figcaption class="imgInfo">
                <p><?= $usuarioDAO->getNomeUsuario() ?></p>
            </figcaption>
    </figure>
</div>
<?php
?>
<div class="formFotoContainer">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUploadPerfilSebo.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFoto">
            <input type="file" name="urlFoto">
            <input class="inputTrocaFoto" type="submit" value="Trocar Foto">
            </form>
            <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
    </div>
</div>