<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="http://localhost/sebook/public/css/usuario.css">
    <title>Sebook</title>
</head>

<body class="">
    <header>
        <div class="menuGroup">
            <a class="logo" href="index.html">
                <img src="images/img/logoSebookCor.png" alt="SebooK">
            </a>
            <a class="perfil" href="login.html">
                <img src="images/icons/user.png" alt="Perfil" title="Perfil">
            </a>
        </div>
        <nav class="navDesk">
            <ul>
                <li><a href="sebos.html">SEBOS</a></li>
                <li><a href="livro.html">LIVROS</a></li>
                <li><a href="quemSomos.html">QUEM SOMOS</a></li>
                <li><a href="ajuda.html">FAQ</a></li>
            </ul>
            </div>
        </nav>
    </header>
    <div id="container">

        <section class="login">
            <div class="container">
                <figure>
                    <img src="images/icons/enter.png" alt="Login" title="Login">
                    <figcaption>LOGIN</figcaption>
                </figure>
                <label class="btn-modal-cadastre" for="modal-cadastre">Primeiro Acesso? Cadastre-se</label>

                <form action="">
                    <label for="">Email:</label>
                    <input type="text">
                    <label for="">Senha:</label>
                    <input type="password">
                    <button>ENTRAR</button>
                </form>
                <a href="">Esqueci minha senha</a>
                <p>
                    <span>OU</span>
                </p>
                <div class="login-social-media">
                    <a href="">
                        <img src="images/icons/facebook.png" alt="Facebook">
                    </a>
                    <a href="">
                        <img src="images/icons/google-plus.png" alt="Google">
                    </a>
                    </nav>
                </div>
            </div>
        </section>
    </div>

    <footer class="master1">
        <nav class="menuMobile">
            <a href="index.html" class="home">
                <img src="images/icons/home.png" alt="Home" title="Página inicial">
            </a>
            <a href="busca.html" class="search">
                <img src="images/icons/search.png" alt="Buscar" title="Buscar">
            </a>
            <div class="menu">
                <input type="checkbox" id="menuH">
                <label for="menuH">
                    <img src="images/icons/menu.png" alt="">
                </label>
                <div class="ulCenter">
                    <ul>
                        <li><a href="sebos.html">SEBOS</a></li>
                        <li><a href="livro.html">LIVROS</a></li>
                        <li><a href="quemSomos.html">QUEM SOMOS</a></li>
                        <li><a href="ajuda.html">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>

    <!-- Modal One -->
    <div class="modal">
        <input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
        <div class="modal-wrap" aria-hidden="true" role="dialog">
            <label class="modal-overlay" for="modal-cadastre"></label>
            <div class="modal-dialog">
                <div class="modal-header">
                    <h2>Selecione a opção de cadastro</h2>
                    <label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
                </div>
                <div class="modal-body">
                    <div class="content-modal-cadastre">
                        <a class="btn-modal" href="cadLeitor.html">Sou Leitor</a>
                        <span>OU</span>
                        <a class="btn-modal blue" href="cadSeboJuridica.html">Sou Sebo</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <label class="btn btn-primary" for="modal-cadastre">Fechar</label>
                </div>
            </div>
        </div>
    </div>
</body>

</html>