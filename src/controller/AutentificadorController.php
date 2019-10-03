<?php

namespace Controller;

use Model\AdmDAO;

class AutentificadorController
{

    private $admDAO;
    // private $usuarioDAO;  
    // para verificar login de usuarios comuns ... adicionar outras classes conforme a necessidade;

    public function __construct($sql)
    {
        $this->admDAO = new AdmDAO($sql);
        //instanciar o usuarioDAO também
    }

    //Métodos Autenticação e verificação de Acesso
    public function efetuarLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = isset($_POST['txtUsuario']) ? $_POST['txtUsuario'] : null;
            $senha = isset($_POST['txtSenha']) ? $_POST['txtSenha'] : null;

            if ($user !== null && $senha != null) {

                $resultado = $this->admDAO->autenticarAdm($user, $senha);
                if ($resultado == false) {
                    //Senha inválida
                    // echo "<script>alert('Senha ou e-mail inválidos (Senha inválida)')</script>";
                    echo "Senha Inválida";
                } else if ($resultado == null) {
                    //email inválido
                    // echo "<script>alert('Senha ou e-mail inválidos (Null)')</script>";
                    echo "email inválido";
                } else {

                    $_SESSION['userLogado']['nome'] = $resultado['nomeUsuario'];
                    $_SESSION['userLogado']['acesso'] = $resultado['idPerfil'];

                    var_dump($_SESSION);
                }
            }
        }
    }

    public function efetuarLogOut()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $logout = isset($_GET['logout']) ? $_GET['logout'] : null;
            if ($logout == true) {
                session_unset($_SESSION['userLogado']);
                header("location:http://localhost/Sebook/area/adm");
            }
        }
    }

    public function toggleFormLogin()
    {
        $sessao = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : null;
        if ($sessao == null) {
            require_once 'src/view/adm/login.php';
        } else {
            require_once 'src/view/adm/menu.php';
        }
    }

    //listaNivelAcesso --> array de niveis autorrizados
    public function validarAcesso($urlDirecionamento, $listaNivelAcesso)
    {
        $sessao = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : null;
        if ($sessao == null) {
            //header("location:$urlDirecionamento");
        } else if (!in_array($_SESSION['userLogado']['acesso'], $listaNivelAcesso)) {
            header("location:$urlDirecionamento");
        }
    }
}
