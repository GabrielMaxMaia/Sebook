<!--Formulário de foto-->
<div class="imgContainer">
    <div class="imgCadastro">
        <figure>
            <img id="imgAvatar" src='<?= _URLBASE_ . $eventoDAO->getUrlFotoEvento() ?>' alt="Avatar" class="avatar">
            <figcaption class="imgInfo">
                <p>Escolha a foto</p>
            </figcaption>
        </figure>
    </div>
    <div class="formFotoContainer">
        <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUploadEvento.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoEvento">

            <input type="file" name="urlFotoEvento">

            <input class="inputTrocaFoto" type="submit" value="Enviar Foto">
        </form>
        <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
    </div>
    <?php
    $src = "src='" . _URLBASE_ . "{$eventoDAO->getUrlFotoEvento()}'";
    ?>
</div>