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
//começamos a concatenar nossa tabela
// $msg .= "<table class='table table-hover'>";
// $msg .= "    <thead>";
// $msg .= "        <tr>";
// $msg .= "            <th>#</th>";
// $msg .= "            <th>Nome:</th>";
// $msg .= "            <th>E-mail:</th>";
// $msg .= "        </tr>";
// $msg .= "    </thead>";
// $msg .= "    <tbody>";

//requerimos a classe de conexão
// require_once('class/Conexao.class.php');
// try {
//     $pdo = new Conexao();
//     $resultado = $pdo->select("SELECT * FROM cliente WHERE nome LIKE '%$parametro%' ORDER BY nome ASC");
//     $pdo->desconectar();
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
//resgata os dados na tabela
$msg .= "<ul class='containerResult'>";
if ($resultado) {
    foreach ($resultado as $livro) {
        // $msg .= "                <tr>";
        // $msg .= "                    <td>" . $livro['isbnLivro'] . "</td>";
        // $msg .= "                    <td>" . $livro['urlFotoLivro'] . "</td>";
        // $msg .= "                    <td>" . $livro['nomeLivro'] . "</td>";
        // $msg .= "                </tr>";
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
// $msg .= "    </tbody>";
// $msg .= "</table>";

//retorna a msg concatenada
echo $msg;
