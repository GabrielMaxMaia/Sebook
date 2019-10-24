<?php

namespace Controller;

use Model\ComentarioDAO;

class ComentarioController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $comentarioDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->comentarioDAO = new ComentarioDAO($sql);
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
    public function getComentarioDAO()
    {
        return $this->comentarioDAO;
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
    public function setComentarioDAO($valor)
    {
        $this->comentarioDAO = $valor;
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
            $this->listarComentarioId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->comentarioDAO->setIdPost($_POST['id']);
            $this->comentarioDAO->setIdUsuario($_POST['idUsuario']);
            $this->comentarioDAO->setIdComentarioParente($_POST['idComentarioParente']);
            $this->comentarioDAO->setTxtComentario($_POST['txtComentario']);
            $this->comentarioDAO->setDataHoraComentario(date('Y-m-d H:i:s'));
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
            $this->comentarioDAO->adicionarComentario();
        } else if ($this->acaoPOST == 2) {
            $this->comentarioDAO->alterarComentario();
        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->comentarioDAO->setIdComentario($_GET['id']);
            $this->comentarioDAO->excluirComentario();
        }
    }

    public function listarComentarioId()
    {
        if ($this->acaoGET == 2) {
            $this->comentarioDAO->setIdComentario($_GET['id']);
            $Comentario = $this->comentarioDAO->listarComentarioId();
            $this->comentarioDAO->setIdComentarioParente($Comentario['idComentarioParente']);
            $this->comentarioDAO->setTxtComentario($Comentario['txtComentario']);
            $this->comentarioDAO->setDataHoraComentario($Comentario['dataHoraComentario']);
            $this->comentarioDAO->setIdPost($Comentario['id']);
            $this->comentarioDAO->setIdUsuario($Comentario['idUsuario']);
        }
    }

    public function listarComentario()
    {
        $result = $this->comentarioDAO->listarComentario();
        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                        <td>" . $linha['idComentario'] . "</td>
                        <td>" . $linha['txtComentario'] . "</td>
                        <td>" . $linha['codStatusComentario'] . "</td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadComentario/alter/" . $linha['idComentario'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/editar.svg'>
                            </a>
                        </td>
                        <td>
                            <a href='http://localhost/Sebook/area/adm/cadastro/cadComentario/delete/" . $linha['idComentario'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/excluir.svg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há Comentarios registradas</td></tr>";
        }
        return $tabela;
    }
}
