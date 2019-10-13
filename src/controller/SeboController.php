<?php

namespace Controller;

use Model\SeboDAO;

class SeboController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $seboDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->seboDAO = new SeboDAO($sql);
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
    public function getseboDAO()
    {
        return $this->seboDAO;
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
            $this->listarSeboId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->seboDAO->setIdUsuario($_POST['idUsuario']);
            $this->seboDAO->setRazaoSebo($_POST['razaoSebo']);
            $this->seboDAO->setNomeFantasia($_POST['nomeFantasia']);
            $this->seboDAO->setCnpjSebo($_POST['cnpjSebo']);
            $this->seboDAO->setUrlFotoSebo($_POST['urlFotoSebo']);
            $this->seboDAO->setNumEndSebo($_POST['numEndSebo']);
            $this->seboDAO->setComplEndSebo($_POST['complEndSebo']);
            $this->seboDAO->setLogradouroSebo($_POST['logradouroSebo']);
            $this->seboDAO->setCepEndSebo($_POST['cepEndSebo']);
            $this->seboDAO->setNumTelSebo($_POST['numTelSebo']);
            $this->seboDAO->setCelular1Sebo($_POST['celular1Sebo']);
            $this->seboDAO->setCelular2Sebo($_POST['celular2Sebo']);
            $this->seboDAO->setInscEstadualSebo($_POST['inscEstadualSebo']);
            $this->seboDAO->setUrlSiteSebo($_POST['urlSiteSebo']);
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
            $this->seboDAO->adicionarSebo();
        } else if ($this->acaoPOST == 2) {
            $this->seboDAO->alterarSebo();

        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->seboDAO->setIdUsuario($_GET['id']);
            $this->seboDAO->excluirSebo();
        }
    }

    public function listarSeboId()
    {
        if ($this->acaoGET == 2) {
            $this->seboDAO->setIdUsuario($_GET['id']);
            $sebo = $this->seboDAO->listarSeboId();
            $this->seboDAO->setRazaoSebo($sebo['razaoSebo']);
            $this->seboDAO->setNomeFantasia($sebo['nomeFantasia']);
            $this->seboDAO->setCnpjSebo($sebo['cnpjSebo']);
            $this->seboDAO->setUrlFotoSebo($sebo['urlFotoSebo']);
            $this->seboDAO->setNumEndSebo($sebo['numEndSebo']);
            $this->seboDAO->setComplEndSebo($sebo['complEndSebo']);
            $this->seboDAO->setLogradouroSebo($sebo['logradouroSebo']);
            $this->seboDAO->setCepEndSebo($sebo['cepEndSebo']);
            $this->seboDAO->setNumTelSebo($sebo['numTelSebo']);
            $this->seboDAO->setCelular1Sebo($sebo['celular1Sebo']);
            $this->seboDAO->setCelular2Sebo($sebo['celular2Sebo']);
            $this->seboDAO->setInscEstadualSebo($sebo['inscEstadualSebo']);
            $this->seboDAO->setUrlSiteSebo($sebo['urlSiteSebo']);

        }
    }

    public function listarSebos()
    {
        $result = $this->seboDAO->listarSebos();

        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                <td>" . $linha['idUsuario'] . "</td>
                <td>" . $linha['razaoSebo'] . "</td>
                <td>" . $linha['nomeFantasia'] . "</td>
                <td>" . $linha['codStatusSebo'] . "</td>      
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadSebo/alter/" . $linha['idUsuario'] . "'>
                                <img src='" . _URLBASE_ . "public/img/editar.jpg'>
                            </a>
                        </td>
                        
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadSebo/delete/" . $linha['idUsuario'] . "'>
                                <img src='" . _URLBASE_ . "public/img/excluir.jpg'>
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
