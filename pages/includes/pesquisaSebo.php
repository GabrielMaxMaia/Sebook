<?php
$ajuste = "../../../../../";
require_once $ajuste . 'config/config.php';

$conn = \Util\FabricaConexao::getConexao($ajuste . 'config/bd_mysql.ini');
$objSql = new Util\Sql($conn);
$seboDAO = new Model\SeboDAO($objSql);

if ($_POST != "") {
    if (isset($_POST['pesquisaSebo']) && $_POST['pesquisaSebo' != 'Todas') {
        $parametro = $_POST['pesquisaSebo'];
        $parametroCidade = $_POST['pesquisaCidade'];
        $seboDAO->setNomeFantasia($parametro);
        $seboDAO->setCidadeSebo($parametroCidade);
        $resultado = $seboDAO->listarSebos();

    } else if (isset($_POST['pesquisaCidade'])) {
        $parametro = $_POST['pesquisaCidade'];
        $seboDAO->setCidadeSebo($parametro);
        $resultado = $seboDAO->listarCidade();
    }

    var_dump($_POST);

    //recebemos nosso parâmetro vindo do form
    $msg = "";

    $msg .= "<ul class='containerResult'>";
    if (isset($resultado)) {
        foreach ($resultado as $cidade) {

            if ($parametro != false) {
                $msg .= "<li>";
                $msg .= "<a href='" . _URLBASE_ . "area/user/pages/pagSebo/" . $cidade['idUsuario'] . "'>";

                $msg .= "<figure>";
                $msg .= "<img src='" . _URLBASE_ . $cidade['urlFoto'] . "' alt='" . $cidade['urlFoto'] . "' title='" . $cidade['urlFoto'] . "'>";
                $msg .= "<figcaption>";
                $msg .=  "<p><b>Nome: </b>" . $cidade['nomeFantasia'] . "<br>";
                $msg .=  "<b>Cidade: </b>" . $cidade['cidadeSebo'] . "<br>";
                $msg .=  "<b>CEP: </b>" . $cidade['cepEndSebo'] . "<br>";
                $msg .= "</figcaption>";
                $msg .= "</figure>";

                $msg .= "</a>";
                $msg .= "</li>";
            } else {
                $msg = "";
                $msg .= "<p class='noResult'>Nenhum resultado foi encontrado...</p>";
            }
        }
    }
    $msg .= "</ul>";
    // $msg .= "    </tbody>";
    // $msg .= "</table>";

    //retorna a msg concatenada
    echo $msg;
}
