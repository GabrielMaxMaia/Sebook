<!--Formulário de foto-->
<div class="img">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUploadPost.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">

        <input type="file" name="urlFotoLivro">

        <input class="button" type="submit" value="Carregar">
    </form>
    <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
</div>
<?php
$src = "src='http://localhost/sebook/{$livroDAO->getUrlFotoLivro()}'";
?>
<div class="imgCadastro">
    <picture>
        <img id="imgAvatar" src='http://localhost/sebook/<?= $livroDAO->getUrlFotoLivro() ?>' alt="Avatar" class="avatar">
    </picture>
</div>
<?php
   
?>