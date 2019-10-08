<?php

use Model\PostagemDAO;

$postagemDAO = new PostagemDAO($conn);

$result = $postagemDAO->listarPostagem();

$IdUser = $_SESSION['userLogado']['idUsuario'] ?? "";

$GetPost = $_GET['idPost'] ?? "";

?>

<article>
    <?php
    if ($result != null) {
        foreach ($result as $linha) {
            if ($linha['idPostagem'] == $GetPost) {
                ?>
                <header>
                    <h2>
                        <?= $linha['tituloPostagem'] ?>
                    </h2>
                </header>
                <p><?= $linha['txtPostagem'] ?></p>
    <?php
            }
        }
    }
    ?>
    <br><br><br>
    <section>
        <p>Sessão de comentários</p>
        <form method="post" action="http://localhost/PHP_tutoriais/phporientadoaobjetos/PhpMvcCrud/?pagina=post&metodo=addComent">
            <span>Nome</span><br>
            <input type="text" name="nome"><br><br>.

            <span>Mensagem</span><br>
            <textarea type="text" name="msg"></textarea>
            <br><br>

            <input type="hidden" name="id" value="{{id}}">

            <input type="submit" value="Enviar">

        </form>
        <br><br>

        {% if comentario == false %}
        <p>
            Não existe nenhum comentario para essa postagem!</p>
        {% else %}
        {% for coment in comentario %}
        <h3>{{coment.nome}}</h3>
        <p>{{coment.mensagem}}</p>
        {% endfor %}
        {% endif %}
    </section>
</article>