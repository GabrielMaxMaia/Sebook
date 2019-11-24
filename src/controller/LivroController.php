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
    //Itens por página
    private $itemPagina = 10;
    //Página Atual de exibição
    private $paginaAtual = 0;
    //Registro inicial da paginação
    private $regIni = 0;

    //Método Construtor
    public function __construct($sql)
    {
        $this->livroDAO = new LivroDAO($sql);
        $this->verificaExibicao();
        $this->verificarPaginacao();
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

    //----Front Controller

    public function getItemPagina()
    {
        return $this->itemPagina;
    }

    public function setItemPagina($itemPagina)
    {
        $this->itemPagina = $itemPagina;
    }

    public function setLivroDAO($livroDAO)
    {
        $this->livroDAO = $livroDAO;
    }

    public function getPaginaAtual()
    {
        return $this->paginaAtual;
    }

    public function setPaginaAtual($paginaAtual)
    {
        $this->paginaAtual = $paginaAtual;
    }

    public function getRegIni()
    {
        return $this->regIni;
    }

    public function setRegIni($regIni)
    {
        $this->regIni = $regIni;
    }

    //----Front Controller

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
            for ($i = 0; $i < count($livro); $i++) {
                $this->livroDAO->setAnoLivro($livro[$i]['anoLivro']);
                $this->livroDAO->setUrlFotoLivro($livro[$i]['urlFotoLivro']);
                $this->livroDAO->setNomeLivro($livro[$i]['nomeLivro']);
                $this->livroDAO->setSinopseLivro($livro[$i]['sinopseLivro']);
                $this->livroDAO->setCodStatusLivro($livro[$i]['codStatusLivro']);
                $this->livroDAO->setIdEditora($livro[$i]['idEditora']);
                $this->livroDAO->setIdCategoria($livro[$i]['idCategoria']);
            }
        }
    }

    public function listarLivros()
    {
        $result = $this->livroDAO->listarLivros($this->regIni, $this->itemPagina);

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

    public function verificarPaginacao()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $this->paginaAtual = $pagina;
            //calculo do registro inicial;
            $this->regIni = ($this->paginaAtual - 1) * $this->itemPagina;
        }
    }

    public function exibirNotificador($urlDoNotificador)
    {
       // Passando a quantidade de paginas como parmetro
        $qtdePaginas = ceil($this->livroDAO->totalContar() / $this->itemPagina);

        $notificador = "<ul class='ulNote'>";
        if ($this->paginaAtual >= 2) {
            $notificador .= "<li><a href='" . _URLBASE_ . $urlDoNotificador . "/pagina/1'><<</a></li>";
            $notificador .= "<li><a href='" . _URLBASE_ . $urlDoNotificador . "/pagina/" . ($this->paginaAtual - 1) . "'><</a> </li>";
        }
        for ($i = 1; $i <= $qtdePaginas; $i++) {
            $active = "";
            if ($this->paginaAtual == $i) {
                $active = "class='active'";
            }
            $notificador .= "
            <li>
                <a $active href='" . _URLBASE_ . $urlDoNotificador . "/pagina/" . $i . "'>$i</a>
            </li>";
        }
        if ($this->paginaAtual < $qtdePaginas) {
            $notificador .= "<li><a $active href='" . _URLBASE_ . $urlDoNotificador . "/pagina/" . ($this->paginaAtual + 1) . "'>></a></li>";
            $notificador .= "<li><a $active href='" . _URLBASE_ . $urlDoNotificador . "/pagina/" . $qtdePaginas . "'>>></a></li>";
        }
        $notificador .= "</ul>";
        return $notificador;
    }


}
