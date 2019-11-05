<?php

namespace Controller;

use Model\EventoDAO;

class EventoController
{
    //Atributos
    private $lista = 'on';
    private $formulario = 'off';
    private $acaoGET;
    private $acaoPOST;

    private $eventoDAO = null;
    //Itens por página
    private $itemPagina = 3;
    //Página Atual de exibição
    private $paginaAtual = 0;
    //Registro inicial da paginação
    private $regIni = 0;

    //Método Construtor
    public function __construct($sql)
    {
        $this->eventoDAO = new EventoDAO($sql);
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
    public function getEventoDAO()
    {
        return $this->eventoDAO;
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

    public function setEventoDAO($eventoDAO)
    {
        $this->eventoDAO = $eventoDAO;
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
            $this->listarEventoId();
            $this->lista = 'off';
            $this->formulario = 'on';
        }
    }

    public function recuperarDadosFormulario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->eventoDAO->setIdEvento($_POST['txtId']);
            $this->eventoDAO->setIdUsuario($_POST['idUsuario']);
            $this->eventoDAO->setNomeEvento($_POST['txtNome']);
            $this->eventoDAO->setTxtEvento($_POST['txtEvento']);
            $this->eventoDAO->setDataHoraEvento($_POST['dataHoraEvento']);
            $this->eventoDAO->setUrlFotoEvento($_POST['txtImg']);
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
            $this->eventoDAO->adicionarEvento();
        } else if ($this->acaoPOST == 2) {
            $this->eventoDAO->alterarEvento();
        }
    }

    public function excluir()
    {
        if ($this->acaoGET == 3) {
            $this->eventoDAO->setIdEvento($_GET['id']);
            $this->eventoDAO->excluirEvento();
        }
    }

    public function listarEventoId()
    {
        if ($this->acaoGET == 2) {
            $this->eventoDAO->setIdEvento($_GET['id']);
            $evento = $this->eventoDAO->listarEventoId();
            $this->eventoDAO->setNomeEvento($evento['nomeEvento']);
            $this->eventoDAO->setIdUsuario($evento['idUsuario']);
            $this->eventoDAO->setTxtEvento($evento['txtEvento']);
            $this->eventoDAO->setUrlFotoEvento($evento['urlFotoEvento']);
            $this->eventoDAO->setDataHoraEvento($evento['dataHoraEvento']);
        }
    }

    // public function listarPostagem()
    // {
    //     $result = $this->eventoDAO->listarPostagem();

    //     $evento = "";
    //     if ($result != null) {
    //         foreach ($result as $linha) {

    //             $evento .= "<div>
    //                            <h3> id da evento {$linha['idPostagem']} </h3>
    //                            <h3> id usuario {$linha['idUsuario']} </h3>
    //                            <h1> Titulo {$linha['tituloPostagem']} </h1>
    //                            <p> Post {$linha['txtPostagem']} </p>
    //                            <a href='". _URLBASE_ ."area/adm/cadastro/cadEvento/alter/" . $linha['idPostagem'] . "'>
    //                                 <img src='" . _URLBASE_ . "public/icon/editar.svg'>
    //                             </a>
    //                             <a href='". _URLBASE_ ."area/adm/cadastro/cadEvento/delete/" . $linha['idPostagem'] . "'>
    //                                 <img src='" . _URLBASE_ . "public/icon/excluir.svg'>
    //                             </a>
    //                         </div><hr>";
    //         }
    //     } else {
    //         $evento = "<tr colspan='5'><td>Não há Postagens registradas</td></tr>";
    //     }
    //     return $evento;
    // }

    public function listarEvento()
    {
        $result = $this->eventoDAO->listarEvento($this->regIni, $this->itemPagina);
        $evento = "";

        if ($result != null) {
            foreach ($result as $post) {
                $evento .= "
                <div class='eventoItem'>
                    <figure>
                       <img src='" . _URLBASE_ . $post['urlFotoEvento'] . "' style='max-width:300px;'>
                       <figcaption>
                        <h1>" . $post['nomeEvento'] . "</h1>
                        <p>" . $post['txtEvento'] . "</p>
                        </figcaption>
                    </figure>
                    <a href='" . _URLBASE_ . "area/adm/cadastro/cadEvento/alter/" . $post['idEvento'] . "'>
                    <img src='" . _URLBASE_ . "public/icon/editar.svg'></a>
                    <a href='" . _URLBASE_ . "area/adm/cadastro/cadEvento/delete/" . $post['idEvento'] . "'>
                     <img src='" . _URLBASE_ . "public/icon/excluir.svg'></a>
                </div>";
            }
        } else {
            $evento = "<tr colspan='5'><td>Não há Postagens registradas</td></tr>";
        }
        return $evento;
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
        $qtdePaginas = ceil($this->eventoDAO->totalContar() / $this->itemPagina);

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
