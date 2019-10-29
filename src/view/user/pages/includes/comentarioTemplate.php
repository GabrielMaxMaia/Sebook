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
        
        $comentarioDAO->setIdUsuario($IdUser);
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
if ($IdUser != "") {
    ?>
    <form method="post" action="">

        <span>Enviar comentário</span><br>

        <textarea name="txtComentario" cols="25" rows="5"></textarea>

        <input type="submit" name="enviarComentario" value="Comentar">
    </form>
<?php
} else {
    echo "<br><br><p>Faça o Login para comentar.</p><br><br>";
}
?>

<p>Seção de comentários</p>

<?php

//Carrega aquivo para seção de comentários
include_once "comentarioSecao.php";