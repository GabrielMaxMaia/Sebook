<?php
<<<<<<< HEAD
// use Model\livroDAO;
// use Util\Sql;

//Pega a conexão
$objSql = new Util\Sql($conn);

$livroDAO = new Model\livroDAO($objSql);

$resultado = $livroDAO->buscaLivro();

//recebemos nosso parâmetro vindo do form
$parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
$msg = "";
//começamos a concatenar nossa tabela
$msg .= "<table class='table table-hover'>";
$msg .= "    <thead>";
$msg .= "        <tr>";
$msg .= "            <th>#</th>";
$msg .= "            <th>Nome:</th>";
$msg .= "            <th>E-mail:</th>";
$msg .= "        </tr>";
$msg .= "    </thead>";
$msg .= "    <tbody>";
=======
$ajuste = "../../../../../";
require_once $ajuste . 'config/config.php';

$conn = \Util\FabricaConexao::getConexao($ajuste . 'config/bd_mysql.ini');
$objSql = new Util\Sql($conn);
$livroDAO = new Model\livroDAO($objSql);

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
>>>>>>> f069e4c1212c570e1ad0e4fe0ffe0a287b05a7db

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
<<<<<<< HEAD

if (count($resultado)) {
    foreach ($resultado as $livro) {

        $msg .= "                <tr>";
        $msg .= "                    <td>" . $livro['isbnLivro'] . "</td>";
        $msg .= "                    <td>" . $livro['urlFotoLivro'] . "</td>";
        $msg .= "                    <td>" . $livro['nomeLivro'] . "</td>";
        $msg .= "                </tr>";
=======
$msg .= "<ul class='containerResult'>";
if (count($resultado)) {
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
>>>>>>> f069e4c1212c570e1ad0e4fe0ffe0a287b05a7db
    }
} else {
    $msg = "";
    $msg .= "Nenhum resultado foi encontrado...";
}
<<<<<<< HEAD
$msg .= "    </tbody>";
$msg .= "</table>";
=======
$msg .= "</ul>";
// $msg .= "    </tbody>";
// $msg .= "</table>";

>>>>>>> f069e4c1212c570e1ad0e4fe0ffe0a287b05a7db
//retorna a msg concatenada
echo $msg;
