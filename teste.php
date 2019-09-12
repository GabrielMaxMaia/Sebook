<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Teste da classe SQL</h2>
    <?php

    $teste = "Ana";
    $teste1 = "";
    $teste2 = "Ananananannannananannananananannananannanana nana";
    $teste3 = "<h1>Ana </h1>";

    $validador = new \Util\Validacao();

    $result1 = $validador->validaCampoString($teste, 4, 10);
    $result2 = $validador->validaCampoString($teste1, 4, 10);
    $result3 = $validador->validaCampoString($teste2, 4, 10);
    $result4 = $validador->validaCampoString($teste3, 4, 15);


    echo "<hr>";
    var_dump($result1);echo "<br>";
    var_dump($result2);echo "<br>";
    var_dump($result3);echo "<br>";
    var_dump($result4);echo "<br>";
    




/*
use Model\CategoriaDAO;
    //criando um objeto da classe SQL
    $sql = new Util\Sql($conn);

    //inicio de testes

    //criando SQl sem parametro
    $stmtSQL = "select * from categoria";
    //$stmtSQL = "select * from jogo";
    //executando o SQl via classe Sql
    $result = $sql->query($stmtSQL);
    //exibindo o resultado do comando
    var_dump($result->fetchAll());

    echo "<hr>";
    //SQl com parametro
    $stmtSQL = "select * from categoria where id_categoria = :id and status_categoria = :status";
    //executando o SQl via classe Sql
    $result = $sql->query($stmtSQL, 
        array(
            ':id' =>  array(0 => 3, 1 => PDO::PARAM_INT ),
            ':status' =>  array(0 => "A", 1 => PDO::PARAM_STR )
        )
    );
    //exibindo o resultado do comando
    var_dump($result->fetchAll());

    //criar os códigos para insert, update e delete(lógico)
    echo "<hr>"; 
    $sqlInsert = "insert into categoria(nome_categoria,descr_categoria)
                    values(:nome_categoria, :descr_categoria)";

    $result = $sql->execute($sqlInsert, 
        array(                
            ':nome_categoria' => array(0=>"MMRPG", 1=> PDO::PARAM_STR),
            ':descr_categoria' => array(0=>"Jogo para multidões", 1=>PDO::PARAM_STR)
        )
    );
    var_dump($result);


 
    echo "<h2>Teste classe CategoriaDAO</h2>";
    $categoriaDAO = new CategoriaDAO($sql);

    echo "<h3>CategoriaDAO->listarCategorias()</h3>";
    $lista = $categoriaDAO->listarCategorias();
    print_r($lista);

    echo "<h3>CategoriaDAO->listarCategoriaId()</h3>";
    $categoria = $categoriaDAO->listarCategoriaId();
    var_dump($categoria);
    echo "<br>";
    //setar o valor do id a ser pesquisado
    $categoriaDAO->setIdCategoria(5);
    $categoria = $categoriaDAO->listarCategoriaId();
    print_r($categoria);


    echo "<h3>CategoriaDAO->adicionarCategoria()</h3>";
    echo '$categoriaDAO->setNomeCategoria(\'RPG\');<br>
    $categoriaDAO->setDescrCategoria(\'Role Playing Game\');<br>
    $resultado = $categoriaDAO->adicionarCategoria();<br>';
    $categoriaDAO->setNomeCategoria('RPG');
    $categoriaDAO->setDescrCategoria('rpg');
   // $resultado = $categoriaDAO->adicionarCategoria();
    // var_dump($resultado);
    echo "<hr>";
    $lista = $categoriaDAO->listarCategorias();
    print_r($lista); 

    echo "<h3>CategoriaDAO->alterarCategoria()</h3>";
    echo '$categoriaDAO->setNomeCategoria(\'RPG\');<br>
    $categoriaDAO->setIdCategoria(5);<br>
    $categoriaDAO->setDescrCategoria(\'Role Playing Game\');<br>
    $resultado = $categoriaDAO->adicionarCategoria();<br>';
    $categoriaDAO->setIdCategoria(5);
    $categoriaDAO->setNomeCategoria('RPG');
    $categoriaDAO->setDescrCategoria('Role Playing Game');
    $resultado = $categoriaDAO->alterarCategoria();
    var_dump($resultado);
    echo "<hr>";
    $lista = $categoriaDAO->listarCategorias();
    print_r($lista); 


    echo "<h3>CategoriaDAO->excluirCategoria()</h3>";
    echo '$categoriaDAO->setNomeCategoria(\'RPG\');<br>
    $categoriaDAO->setIdCategoria(5);<br>';
    $categoriaDAO->setIdCategoria(5);
     $resultado = $categoriaDAO->excluirCategoria();
    var_dump($resultado);
    echo "<hr>";
    $lista = $categoriaDAO->listarCategorias();
    print_r($lista); 

*/
    ?>
</body>
</html>