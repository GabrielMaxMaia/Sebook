<?php
//Processsa formulário que envia comentário
if (isset($_POST['enviarComentario'])) {

    $erro = false;
    if ($_POST['txtComentario'] != null || $_POST['txtComentario'] != "") {
        $comentarioDAO->setTxtComentario($_POST['txtComentario']);
    } else {
        $erro = true;
        echo "Escreva Algo antes de enviar";
    }
    if ($erro == false) {

        if ($pagina != "paginaSebo") {
            $comentarioDAO->setIdPost($GetPost);
        } else {
            $comentarioDAO->setIdPagina($GetPost);
        }

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

        <input type="submit" name="enviarComentario" value="Comentar">
    </form>
<?php
}
?>

<section class="secaoComment">
<?php
    if($idUser == "") {
        echo "<p>Faça o Login para comentar.</p>";
    }
?>
    <p class="">Seção de comentários</p>
    <?php
    //Carrega aquivo para seção de comentários
    include_once "comentarioSecao.php";
    ?>
</section>