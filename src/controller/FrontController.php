<?php

namespace Controller;

class FrontController
{
    //Itens por página
    private $itemPagina = 5;
    //Página Atual de exibição
    private $paginaAtual = 0;
    //Registro inicial da paginação
    private $regIni = 0;

    private $postagemDAO;

    public function __construct($postagemDAO)
    {
        $this->postagemDAO = $postagemDAO;
    }

    public function getItemPagina()
    {
        return $this->itemPagina;
    }

    public function setItemPagina($itemPagina)
    {
        $this->itemPagina = $itemPagina;
    }

    public function getPostagemDAO()
    {
        return $this->postagemDAO;
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


    // public function listarPostagem()
    // {
    //     $postagens = $this->postagemDAO->listarPostagem($this->regIni, $this->itemPagina);
    //     $grid = "";

    //     foreach ($postagens as $post) {
    //         $grid .= "
    //             <div class=''>
    //                 <a href='" . _URLBASE_ . "area/user/pages/postVer/" . $post['idPostagem'] . "'>
    //                 <figure>
    //                    <img src='" . _URLBASE_ . $post['urlFotoPost'] . "' style='max-width:300px;'>
    //                    <figcaption>
    //                     <h1>" . $post['tituloPostagem'] . "</h1>
    //                     <p>" . $post['txtPostagem'] . "</p>
    //                     </figcaption>
    //                 </figure>
    //                 </a>
    //             </div>";
    //     }
    //     return $grid;
    // }

    public function verificarPaginacao()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $this->paginaAtual = $pagina;
            //calculo do registro inicial;
            $this->regIni = ($this->paginaAtual - 1) * $this->itemPagina;
        }
    }

    public function exibirNotificador()
    {
        $qtdePaginas = ceil($this->postagemDAO->totalPostagens() / $this->itemPagina);

        $notificador = "<ul>";
        if ($this->paginaAtual >= 2) {
            $notificador .= "<li><a href='" . _URLBASE_ . "index.php?pagina=1'><<</a></li>";
            $notificador .= "<li><a href='" . _URLBASE_ . "index.php?pagina=" . ($this->paginaAtual - 1) . "'><</a> </li>";
        }
        for ($i = 1; $i <= $qtdePaginas; $i++) {
            $active = "";
            if ($this->paginaAtual == $i) {
                $active = "class='active'";
            }
            $notificador .= "
            <li>
                    <a $active href='" . _URLBASE_ . "index.php?pagina=" . $i . "'>$i</a>
                </li>";
        }
        if ($this->paginaAtual < $qtdePaginas) {
            $notificador .= "<li><a $active href='" . _URLBASE_ . "index.php?pagina=" . ($this->paginaAtual + 1) . "'>></a></li>";
            $notificador .= "<li><a $active href='" . _URLBASE_ . "index.php?pagina=" . $qtdePaginas . "'>>></a></li>";
        }
        $notificador .= "</ul>";
        return $notificador;
    }
}
