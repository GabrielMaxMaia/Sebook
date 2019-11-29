<?php
$ajuste = "../../../../../";
require_once $ajuste . 'config/config.php';

$conn = \Util\FabricaConexao::getConexao($ajuste . 'config/bd_mysql.ini');
$objSql = new Util\Sql($conn);
$livroDAO = new Model\LivroDAO($objSql);

$parametro = isset($_POST['pesquisaLivro']) ? $_POST['pesquisaLivro'] : false;
$livroDAO->setNomeLivro($parametro);
$resultado = $livroDAO->buscaLivro();

//recebemos nosso parâmetro vindo do form
$msg = "";

//resgata os dados na tabela
$msg .= "<ul class='containerResult'>";
if ($resultado) {
    foreach ($resultado as $livro) {
       
        if ($parametro != false) {
            $msg .= "<li>";
            $msg .= "<a href='" . _URLBASE_ . "area/user/pages/descLivro/" . $livro['isbnLivro'] . "'>";

            $msg .= "<figure>";
            $msg .= "<img src='" . _URLBASE_ . $livro['urlFotoLivro'] . "' alt='" . $livro['nomeLivro'] . "' title='" . $livro['nomeLivro'] . "'>";
            $msg .= "<figcaption>";
            $msg .=  "<p><b>Nome: </b>" . $livro['nomeLivro'] . "<br>";
            $msg .= "<b>Isbn: </b>" . $livro['isbnLivro'] . "<br>";
            $msg .= "<b>Ano: </b>" . $livro['anoLivro'] . "</p>";
            $msg .= "</figcaption>";
            $msg .= "</figure>";

            $msg .= "</a>";
            $msg .= "</li>";
        }
    }
} else {
    $msg = "";
    $msg .= "<p class='noResult'>Nenhum resultado foi encontrado...</p>";
}
$msg .= "</ul>";

//retorna a msg concatenada
echo $msg;
