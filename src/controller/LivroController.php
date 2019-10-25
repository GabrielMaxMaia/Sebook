<?php

namespace Controller;

use Model\LivroDAO;

class LivroController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $livroDAO = null;

    //Método Construtor
    public function __construct($sql)
    {
        $this->livroDAO = new LivroDAO($sql);
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
    public function getlivroDAO()
    {
        return $this->livroDAO;
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
            $this->listarLivroIsbn();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->livroDAO->setIsbnLivro($_POST['txtIsbn']);
            $this->livroDAO->setAnoLivro($_POST['anoLivro']);
            $this->livroDAO->setNomeLivro($_POST['nomeLivro']);
            $this->livroDAO->setIdEditora($_POST['idEditora']);
            $this->livroDAO->setIdCategoria($_POST['idCategoria']);
            $this->livroDAO->setSinopseLivro($_POST['sinopseLivro']);
            $this->livroDAO->setUrlFotoLivro($_POST['txtImg']);
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
            $this->livroDAO->adicionarLivro();
        } else if ($this->acaoPOST == 2) {
            $this->livroDAO->alterarLivro();

        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->livroDAO->setIsbnLivro($_GET['id']);
            $this->livroDAO->excluirlivro();
        }
    }

    public function listarLivroIsbn()
    {
        if ($this->acaoGET == 2) {
            $this->livroDAO->setIsbnLivro($_GET['id']);
            $livro = $this->livroDAO->listarLivroIsbn();
            $this->livroDAO->setAnoLivro($livro['anoLivro']);
            $this->livroDAO->setUrlFotoLivro($livro['urlFotoLivro']);
            $this->livroDAO->setNomeLivro($livro['nomeLivro']);
            $this->livroDAO->setSinopseLivro($livro['sinopseLivro']);
            $this->livroDAO->setCodStatusLivro($livro['codStatusLivro']);
            $this->livroDAO->setIdEditora($livro['idEditora']);
            $this->livroDAO->setIdCategoria($livro['idCategoria']);
        }
    }

    public function listarLivros()
    {
        $result = $this->livroDAO->listarLivros();
        $tabela = "";
        if ($result != null) {
            foreach ($result as $linha) {
                $tabela .= "<tr>
                <td>" . $linha['isbnLivro'] . "</td>
                <td>" . $linha['anoLivro'] . "</td>
                <td>" . $linha['urlFotoLivro'] . "</td>
                <td>" . $linha['nomeLivro'] . "</td>  
                <td>" . $linha['codStatusLivro'] . "</td>      
                <td>" . $linha['idEditora'] . "</td>      
                <td>" . $linha['idCategoria'] . "</td>      

                        <td>
                            <a href='" . _URLBASE_ . "area/adm/cadastro/cadlivro/alter/" . $linha['isbnLivro'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/editar.svg'>
                            </a>
                        </td>
                        <td>
                            <a href='" . _URLBASE_ . "area/adm/cadastro/cadlivro/delete/" . $linha['isbnLivro'] . "'>
                                <img src='" . _URLBASE_ . "public/icon/excluir.svg'>
                            </a>
                        </td>
                    </tr>";
            }
        } else {
            $tabela = "<tr colspan='5'><td>Não há livros registradas</td></tr>";
        }
        return $tabela;
    }
}
