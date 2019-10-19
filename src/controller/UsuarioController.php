<?php

namespace Controller;

use Model\UsuarioDAO;

class UsuarioController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $usuarioDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->usuarioDAO = new UsuarioDAO($sql);
        $this->verificaExibicao();
    }

    //Métodos GETTERS e SETTERS
    public function getLista()
    {
        return $this->lista;
    }
    public function getFormulario()
    {
        return $this->formulario;
    }
    public function getAcaoGET()
    {
        return $this->acaoGET;
    }
    public function getAcaoPOST()
    {
        return $this->acaoPOST;
    }
    public function getUsuarioDAO()
    {
        return $this->usuarioDAO;
    }

    public function setLista($valor)
    {
        $this->lista = $valor;
    }
    public function setFormulario($valor)
    {
        $this->formulario = $valor;
    }
    public function setAcaoGET($valor)
    {
        $this->acaoGET = $valor;
    }
    public function setAcaoPOST($valor)
    {
        $this->acaoPOST = $valor;
    }

    //Métodos Especialistas

    public function recuperarAcaoPOST()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->acaoPOST = isset($_POST['txtAcao']) ? $_POST['txtAcao'] : null;
        }
    }

    public function recuperarAcaoGET()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->acaoGET = isset($_GET['acao']) ? $_GET['acao'] : null;
        }
    }

    public function verificaExibicao()
    {
        $this->recuperarAcaoGET();
        if ($this->acaoGET == null || $this->acaoGET == 3) {
            $this->excluir();
            $this->lista = 'on';
            $this->formulario = 'off';
        } else if ($this->acaoGET == 1 || $this->acaoGET == 2) {
            $this->listarUsuarioId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuarioDAO->setDataCriacao(date('Y-m-d H:i:s'));
            $this->usuarioDAO->setIdUsuario($_POST['idUsuario']);
            $this->usuarioDAO->setNomeUsuario($_POST['nomeUsuario']);
            $this->usuarioDAO->setSobrenomeUsuario($_POST['sobrenomeUsuario']);
            $this->usuarioDAO->setEmailUsuario($_POST['emailUsuario']);
            $this->usuarioDAO->setSenhaUsuario(\Util\Bcrypt::hash($_POST['senhaUsuario']));
            $this->usuarioDAO->setIdPerfil($_POST['selecPerfil']);
        }
        
    }

    //$_SESSION ---> array --> indice armazena valores
    // objetos --> serializar e desserializar
    // $_SESSION['var'] = 'valor';
    // echo $_SESSION['var'];

    public function evitarReenvio()
    {
        //verificar se existe uma variavel de sessão para os dados do form
        if (isset($_SESSION['dadosForm'])) {
            //conteúdo armazenado sessão diferente do conteúdo atual --> ambos em forma de hash
            if ($_SESSION['dadosForm'] != md5(implode($_POST))) {   //novo envio             
                //armazena conteúdo do formulário em forma de hash na varivel de sessao
                $_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
                //indica que não há reenvio de dados
                return true;
            } else { //reenvio
                //conteúdo armazenado sessão é igual do conteúdo atual --> ambos em forma de hash
                //não atualizo a sessão
                return false;
            }
        } else {
            //armazena conteúdo do formulário em forma de hash na varivel de sessao
            $_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
            //indica que não há reenvio de dados
            return true;
        }
    }

    public function gravarAlterar()
    {
        $this->recuperarAcaoPOST();
        $this->recuperarDadosFormulario();
        if ($this->acaoPOST == 1 && $this->evitarReenvio()) {
            $this->usuarioDAO->adicionarUsuario();
        } else if ($this->acaoPOST == 2) {
            $this->usuarioDAO->alterarUsuario();
        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->usuarioDAO->setIdUsuario($_GET['id']);
            $this->usuarioDAO->excluirUsuario();
        }
    }

    public function listarUsuarioId()
    {
        if ($this->acaoGET == 2) {
            $this->usuarioDAO->setIdUsuario($_GET['id']);
            $Usuario = $this->usuarioDAO->listarUsuarioId();
            $this->usuarioDAO->setNomeUsuario($Usuario['nomeUsuario']);
            $this->usuarioDAO->setSobrenomeUsuario($Usuario['sobrenomeUsuario']);
            $this->usuarioDAO->setEmailUsuario($Usuario['emailUsuario']);
            $this->usuarioDAO->setSenhaUsuario($Usuario['senhaUsuario']);
        }
    }

    public function listarUsuarios()
    {
        $result = $this->usuarioDAO->listarUsuarios();
        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                        <td>" . $linha['idUsuario'] . "</td>
                        <td>" . $linha['nomeUsuario'] . "</td>
                        <td>" . $linha['codStatusUsuario'] . "</td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadUsuario/alter/" . $linha['idUsuario'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/editar.svg'>
                            </a>
                        </td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadUsuario/delete/" . $linha['idUsuario'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/excluir.svg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há Usuarios registradas</td></tr>";
        }
        return $tabela;
    }
}
