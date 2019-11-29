<?php

namespace Controller;

use Model\ClienteDAO;

class ClienteController
{
//Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $clienteDAO = null;

//Método Construtor
    public function __construct($sql)
    {
        $this->clienteDAO = new ClienteDAO($sql);
        $this->verificaExibicao();
    }

//Métodos GETTERS e SETTERS
    public function getLista()
    {return $this->lista;}
    public function getFormulario()
    {return $this->formulario;}
    public function getAcaoGET()
    {return $this->acaoGET;}
    public function getAcaoPOST()
    {return $this->acaoPOST;}
    public function getClienteDAO()
    {return $this->clienteDAO;}

    public function setLista($valor)
    {$this->lista = $valor;}
    public function setFormulario($valor)
    {$this->formulario = $valor;}
    public function setAcaoGET($valor)
    {$this->acaoGET = $valor;}
    public function setAcaoPOST($valor)
    {$this->acaoPOST = $valor;}
    public function setClienteDAO($valor)
    {$this->clienteDAO = $valor;}

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
            $this->listarClienteId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->clienteDAO->setIdUsuario($_POST['idUsuario']);
            $this->clienteDAO->setCpfCliente($_POST['cpfCliente']);
            $this->clienteDAO->setNascimentoCliente($_POST['nascCliente']);
            $this->clienteDAO->setSexoCliente($_POST['selectSexo']);
            $this->clienteDAO->setCepCliente($_POST['cepCliente']);
            $this->clienteDAO->setUrlFotoCliente($_POST['txtImg']);
            $this->clienteDAO->setNumComplCliente($_POST['numComplCliente']);
            $this->clienteDAO->setLogradouroCliente($_POST['logradouroCliente']);
            $this->clienteDAO->setComplementoCliente($_POST['complEndCliente']);
        }
    }

    //$_SESSION ---> array --> indice armazena valores
    // objetos --> serializar e desserializar
    // $_SESSION['var'] = 'valor';
    // echo $_SESSION['var'];

    public function evitarReenvio(){
        //verificar se existe uma variavel de sessão para os dados do form
        if(isset($_SESSION['dadosForm'])){
            //conteúdo armazenado sessão diferente do conteúdo atual --> ambos em forma de hash
            if($_SESSION['dadosForm'] != md5(implode($_POST)) ){   //novo envio             
                //armazena conteúdo do formulário em forma de hash na varivel de sessao
                $_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
                //indica que não há reenvio de dados
                return true;
            }else{ //reenvio
                //conteúdo armazenado sessão é igual do conteúdo atual --> ambos em forma de hash
                //não atualizo a sessão
                return false;
            }
        } else{
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
            $this->clienteDAO->adicionarCliente();
        } else if ($this->acaoPOST == 2) {
            $this->clienteDAO->alterarCliente();

        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->clienteDAO->setIdUsuario($_GET['id']);
            $this->clienteDAO->excluirCliente();
        }
    }

    public function listarClienteId()
    {
        if ($this->acaoGET == 2) {
            $this->clienteDAO->setIdUsuario($_GET['id']);
            $cliente = $this->clienteDAO->listarClienteId();
            $this->clienteDAO->setCpfCliente($cliente['cpfCliente']);
            $this->clienteDAO->setNascimentoCliente($cliente['nascCliente']);
            $this->clienteDAO->setSexoCliente($cliente['sexoCliente']);
            $this->clienteDAO->setCepCliente($cliente['cepCliente']);
            $this->clienteDAO->setLogradouroCliente($cliente['logradouroCliente']);
            $this->clienteDAO->setUrlFotoCliente($cliente['urlFotoCliente']);
            $this->clienteDAO->setComplementoCliente($cliente['complEndCliente']);
            $this->clienteDAO->setNumComplCliente($cliente['numComplCliente']);
        }
    }

    public function listarClientes()
    {
        $result = $this->clienteDAO->listarClientes();
       
        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                <td>" . $linha['idUsuario'] . "</td>
                <td>" . $linha['cpfCliente'] . "</td>
                <td>" . $linha['sexoCliente'] . "</td>
                <td>" . $linha['codStatusCliente']
                 . "</td>
                        <td>
                            <a href='http://sebook/area/adm/cadastro/cadCliente/alter/" . $linha['idUsuario'] . "'>
                                <img src='"._URLBASE_."public/img/editar.jpg'>
                            </a>
                        </td>
                        <td>
                            <a href='http://sebook/area/adm/cadastro/cadCliente/delete/" . $linha['idUsuario'] . "'>
                                <img src='"._URLBASE_."public/img/excluir.jpg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há clientes registradas</td></tr>";
        }        
        return $tabela;
    }

}
