<?php

namespace Controller;

use Model\SeboLivroDAO;

class SeboLivroController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $seboLivroDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->seboLivroDAO = new SeboLivroDAO($sql);
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
    public function getSeboLivroDAO()
    {
        return $this->seboLivroDAO;
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
            $this->listarSeboLivroId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->seboLivroDAO->setIdUsuario($_POST['idUsuario']);
            $this->seboLivroDAO->setIsbnLivro($_POST['isbnLivro']);
            $this->seboLivroDAO->setQtdEstoque($_POST['qtdEstoque']);
        }
    }

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
            $this->seboLivroDAO->adicionarSeboLivro();
        } else if ($this->acaoPOST == 2) {
            $this->seboLivroDAO->alterarSeboLivro();
        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->seboLivroDAO->setIdUsuario($_GET['id']);
            $this->seboLivroDAO->setIsbnLivro($_GET['isbnLivro']);
            $this->seboLivroDAO->excluirseboLivro();
        }
    }

    public function listarSeboLivroId()
    {
        if ($this->acaoGET == 2) {
            $this->seboLivroDAO->setIdUsuario($_GET['id']);
            $this->seboLivroDAO->setIsbnLivro($_GET['isbnLivro']);
            $seboLivro = $this->seboLivroDAO->listarSeboLivroIdIsbn();
            $this->seboLivroDAO->setQtdEstoque($seboLivro['qtdEstoque']);
        }
    }

    public function listarSeboLivro()
    {
        $result = $this->seboLivroDAO->listarSeboLivro();

        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                <td>" . $linha['idUsuario'] . "</td>
                <td>" . $linha['isbnLivro'] . "</td>
                <td>" . $linha['qtdEstoque'] . "</td>     
                        <td>
                            <a href='" . _URLBASE_ . "area/adm/cadastro/cadSeboLivro/alter/" . $linha['idUsuario'] . "/" . $linha['isbnLivro'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/editar.svg'>
                            </a>
                        </td>
                        
                        <td>
                            <a href='" . _URLBASE_ . "area/adm/cadastro/cadSeboLivro/delete/" . $linha['idUsuario'] . "/" . $linha['isbnLivro'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/excluir.svg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há Sebos registradas</td></tr>";
        }
        return $tabela;
    }
}
