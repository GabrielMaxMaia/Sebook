<?php

//Processsa formulário que envia comentário
if (isset($_POST['enviarComentario'])) {

    $erro = false;
    if ($_POST['txtComentario'] != null || $_POST['txtComentario'] != "") {
        $comentarioDAO->setTxtComentario($_POST['txtComentario']);
    } else {
        $erro = true;
        echo "<p class='errorCad' style='margin-left: 1rem;'>Escreva Algo antes de enviar</p>";
    }
    if ($erro == false) {

        if ($pagina == "paginaSebo") {
            $setModo = "setIdPagina";
        } else if ($pagina == "paginaEvento") {
            $setModo = "setIdEvento";
        } else if ($pagina == "paginaLivro") {
            $setModo = "setIdPost";
        } else if ($pagina == "paginaPost") {
            $setModo = "setIdPost";
        }
        // var_dump($pagina);
        $comentarioDAO->$setModo($GetPost);

        $comentarioDAO->setIdUsuario($idUser);
        $comentarioDAO->setDataHoraComentario(date('Y-m-d H:i:s'));
        //Chama a função listaPostagemId
        $comentarioDAO->adicionarComentario();


        //Recarrega a página
       header('Refresh:0');

        echo $outputResult = "Comentário enviado";
    }
}

//Se Úsuario estiver logado então o form aparece
//Caso contrário uma menssagem pedindo para logar
if ($idUser != "") {
    ?>
    <form method="post" action="" class="formularioComment">

        <label for="txtComentario">Enviar comentário</label><br>

        <textarea name="txtComentario" id="txtComentario" cols="25" rows="5"></textarea>

        <input type="submit" name="enviarComentario" value="Comentar" class="inputEnvia">
    </form>
<?php
}
?>

<section class="secaoComment">
    <header class="headerComentario">
        <p>Seção de comentários</p>
    </header>
    <?php
    if ($idUser == "") {
        ?>

        <p class='commentMenssagem'>Faça <a href="<?=_URLBASE_?>area/user/login/logar"><b>Login</b></a> para comentar.</p>

        <?php
        }
    ?>
    <?php
    //Carrega aquivo para seção de comentários
    include_once "comentarioSecao.php";
    ?>
</section>