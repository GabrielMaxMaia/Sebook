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
                    echo "Senha ou e-mail inválidos";
                } else if ($resultado == null) {
                    //email inválido
                    echo "Senha ou e-mail inválidos";
                } else {

                    $_SESSION['userLogado']['nome'] = $resultado['nomeUsuario'];
                    $_SESSION['userLogado']['idUsuario'] = $resultado['idUsuario'];
                    $_SESSION['userLogado']['acesso'] = $resultado['idPerfil'];
                    // var_dump($_SESSION['userLogado']['acesso']);
                    if (($_SESSION['userLogado']['acesso']) <= 3) {
                        echo "ADM";
                        header("Location: "._URLBASE_);
                    } else {
                        echo "Login usuário";
                        header("location: "._URLBASE_);
                    }

                    // var_dump($_SESSION['userLogdao']['acesso']);
                }
            }
        }
    }

    public function efetuarLogOut()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // $logout = isset($_GET['logout']) ? $_GET['logout'] : null;
            $logout = $_GET['logout'] ?? null;
            if ($logout == true) {

                unset($_SESSION['userLogado']);

                header("location:" . _URLBASE_);
            }
        }
    }

    public function toggleFormLogin()
    {
        $sessao = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : null;
        if ($sessao == null) {
            $sessao = null;
            require_once 'src/view/adm/login.php';
        } else {
            require_once 'src/view/adm/menu.php';
        }
    }

    public function toggleLogin()
    {
        // $sessao = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : null;
        $sessao = $_SESSION['userLogado'] ?? null;
        
        if ($sessao == null) {
            echo "<a class='perfil' href='" . _URLBASE_ . "area/user/login/logar'>
                <img src='" . _URLBASE_ . "public/icon/user.svg' alt='Perfil' title='Perfil'>
            </a>";
        } else {
         
            if ($_SESSION['userLogado']['acesso'] <= 3) {
                $adm = _URLBASE_."area/adm";
            }

            if($_SESSION['userLogado']['acesso'] != 5){
                $perfil = _URLBASE_."area/user/pages/perfilLeitor";
            }else{
                $perfil = _URLBASE_."area/user/pages/perfilSebo";
            }

            echo "<b> Bem vindo " . $_SESSION['userLogado']['nome'] . "</b></a>";
            echo "<a class='pefil' href='{$perfil}'>Editar Perfil</a>";
            if(isset($adm)){
                echo "<a class='pefil' href='{$adm}'>Adm</a>";
            }
            echo "<a href='". _URLBASE_ . "area/adm/sair'>Sair</a>";
          
        }
    }


    //listaNivelAcesso --> array de niveis autorrizados
    public function validarAcesso($nivelAcesso)
    {
        $sessao = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : null;
        if ($sessao == null || $nivelAcesso > 3) {
            header("Location: " . _URLBASE_);
        }
    }
}
