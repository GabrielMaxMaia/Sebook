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
    //Itens por página
    private $itemPagina = 3;
    //Página Atual de exibição
    private $paginaAtual = 0;
    //Registro inicial da paginação
    private $regIni = 0;

    //Método Construtor
    public function __construct($sql)
    {
        $this->postagemDAO = new PostagemDAO($sql);
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



    //----Front Controller

    public function getItemPagina()
    {
        return $this->itemPagina;
    }

    public function setItemPagina($itemPagina)
    {
        $this->itemPagina = $itemPagina;
    }

    public function setPostagemDAO($postagemDAO)
    {
        $this->postagemDAO = $postagemDAO;
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
            $this->listarPostagemId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postagemDAO->setIdPostagem($_POST['txtId']);
            $this->postagemDAO->setIdUsuario($_SESSION['userLogado']['idUsuario']);
            $this->postagemDAO->setTituloPostagem($_POST['txtTitulo']);
            $this->postagemDAO->setTxtPostagem($_POST['txtPostagem']);
            $this->postagemDAO->setDatahoraPostagem($_POST['dataPost']);
            $this->postagemDAO->setUrlFotoPostagem($_POST['txtImg']);
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

    // public function listarPostagem()
    // {
    //     $result = $this->postagemDAO->listarPostagem();

    //     $postagem = "";
    //     if ($result != null) {
    //         foreach ($result as $linha) {

    //             $postagem .= "<div>
    //                            <h3> id da postagem {$linha['idPostagem']} </h3>
    //                            <h3> id usuario {$linha['idUsuario']} </h3>
    //                            <h1> Titulo {$linha['tituloPostagem']} </h1>
    //                            <p> Post {$linha['txtPostagem']} </p>
    //                            <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/alter/" . $linha['idPostagem'] . "'>
    //                                 <img src='" . _URLBASE_ . "public/img/editar.jpg'>
    //                             </a>
    //                             <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/delete/" . $linha['idPostagem'] . "'>
    //                                 <img src='" . _URLBASE_ . "public/img/excluir.jpg'>
    //                             </a>
    //                         </div><hr>";
    //         }
    //     } else {
    //         $postagem = "<tr colspan='5'><td>Não há Postagens registradas</td></tr>";
    //     }
    //     return $postagem;
    // }

    public function listarPostagem()
    {
        $result = $this->postagemDAO->listarPostagem($this->regIni, $this->itemPagina);
        $postagem = "";

        if ($result != null) {
            foreach ($result as $post) {
                $postagem .= "
                <div class=''>
                    <figure>
                       <img src='" . _URLBASE_ . $post['urlFotoPost'] . "' style='max-width:300px;'>
                       <figcaption>
                        <h1>" . $post['tituloPostagem'] . "</h1>
                        <p>" . $post['txtPostagem'] . "</p>
                        </figcaption>
                    </figure>
                    <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/alter/" . $post['idPostagem'] . "'>
                    <img src='" . _URLBASE_ . "public/img/editar.jpg'></a>
                    <a href='http://localhost/Sebook/area/adm/cadastro/cadPostagem/delete/" . $post['idPostagem'] . "'>
                     <img src='" . _URLBASE_ . "public/img/excluir.jpg'></a>
                </div>";
            }
        } else {
            $postagem = "<tr colspan='5'><td>Não há Postagens registradas</td></tr>";
        }
        return $postagem;
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
        $qtdePaginas = ceil($this->postagemDAO->totalContar() / $this->itemPagina);

        $notificador = "<ul>";
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
