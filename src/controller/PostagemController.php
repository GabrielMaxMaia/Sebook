<?php

namespace Controller;

use Model\PostagemDAO;

class PostagemController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $postagemDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->postagemDAO = new PostagemDAO($sql);
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
    public function getPostagemDAO()
    {
        return $this->postagemDAO;
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
            $this->listarPostagemId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postagemDAO->setIdPostagem($_POST['txtId']);
            $this->postagemDAO->setTituloPostagem($_POST['txtTitulo']);
            $this->postagemDAO->setTxtPostagem($_POST['txtPostagem']);
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
            $this->postagemDAO->adicionarPostagem();
        } else if ($this->acaoPOST == 2) {
            $this->postagemDAO->alterarPostagem();
        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->postagemDAO->setIdPostagem($_GET['id']);
            $this->postagemDAO->excluirPostagem();
        }
    }

    public function listarPostagemId()
    {
        if ($this->acaoGET == 2) {
            $this->postagemDAO->setIdPostagem($_GET['id']);
            $postagem = $this->postagemDAO->listarPostagemId();
            $this->postagemDAO->setTituloPostagem($postagem['tituloPostagem']);
            $this->postagemDAO->setTxtPostagem($postagem['txtPostagem']);
        }
    }

    public function listarPostagem()
    {
        $result = $this->postagemDAO->listarPostagem();
        
        $tabela = "";
        $postagem = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                        <td>" . $linha['idPostagem'] . "</td>
                        <td>" . $linha['tituloPostagem'] . "</td>
                        <td>" . $linha['txtPostagem'] . "</td>
                        <td>" . $linha['idUsuario'] . "</td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/alter/" . $linha['idUsuario'] . "'>
                                <img src='" . _URLBASE_ . "public/img/editar.jpg'>
                            </a>
                        </td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/delete/" . $linha['idPostagem'] . "'>
                                <img src='" . _URLBASE_ . "public/img/excluir.jpg'>
                            </a>
                        </td>
                    </tr>";

                $postagem .= "<div>
                               <h3> id da postagem {$linha['idPostagem']} </h3>
                               <h3> id usuario {$linha['idUsuario']} </h3>
                               <h1> Titulo {$linha['tituloPostagem']} </h1>
                               <p> Post {$linha['txtPostagem']} </p>
                               <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/alter/" . $linha['idPostagem'] . "'>
                                    <img src='" . _URLBASE_ . "public/img/editar.jpg'>
                                </a>
                                <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/delete/" . $linha['idPostagem'] . "'>
                                    <img src='" . _URLBASE_ . "public/img/excluir.jpg'>
                                </a>
                            </div><hr>";
            }
        } else {
            $postagem = "<tr colspan='5'><td>Não há Postagens registradas</td></tr>";
        }
        return $postagem;
    }
}
