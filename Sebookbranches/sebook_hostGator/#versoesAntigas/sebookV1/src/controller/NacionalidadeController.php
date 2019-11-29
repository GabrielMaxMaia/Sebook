<?php

namespace Controller;

use Model\NacionalidadeDAO;

class NacionalidadeController
{
//Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $nacionalidade = null;

//Método Construtor
    public function __construct($sql)
    {
        $this->nacionalidade = new NacionalidadeDAO($sql);
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
    public function getNacionalidadeDAO()
    {return $this->nacionalidade;}

    public function setLista($valor)
    {$this->lista = $valor;}
    public function setFormulario($valor)
    {$this->formulario = $valor;}
    public function setAcaoGET($valor)
    {$this->acaoGET = $valor;}
    public function setAcaoPOST($valor)
    {$this->acaoPOST = $valor;}

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
            $this->listarNacionalidadeId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->nacionalidade->setIdNacionalidade($_POST['txtId']);
            $this->nacionalidade->setNomeNacionalidade($_POST['txtNome']);
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
            $this->nacionalidade->adicionarNacionalidade();
        } else if ($this->acaoPOST == 2) {
            $this->nacionalidade->alterarNacionalidade();

        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->nacionalidade->setIdNacionalidade($_GET['id']);
            $this->nacionalidade->excluirNacionalidade();
        }
    }

    public function listarNacionalidadeId()
    {
        if ($this->acaoGET == 2) {
            $this->nacionalidade->setIdNacionalidade($_GET['id']);
            $Nacionalidade = $this->nacionalidade->listarNacionalidadeId();
            $this->nacionalidade->setNomeNacionalidade($Nacionalidade['nomeNacionalidade']);
        }
    }

    public function listarNacionalidades()
    {
        $result = $this->nacionalidade->listarNacionalidades();
       
        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                <td>" . $linha['idNacionalidade'] . "</td>
                <td>" . $linha['nomeNacionalidade'] . "</td>"
                 . "</td>
                        <td>
                            <a href='http://sebook/area/adm/cadastro/cadNacionalidade/alter/" . $linha['idNacionalidade'] . "'>
                                <img src='"._URLBASE_."public/img/editar.jpg'>
                            </a>
                        </td>
                        <td>
                            <a href='http://sebook/area/adm/cadastro/cadNacionalidade/delete/" . $linha['idNacionalidade'] . "'>
                                <img src='"._URLBASE_."public/img/excluir.jpg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há Nacionalidades registradas</td></tr>";
        }        
        return $tabela;
    }

}
