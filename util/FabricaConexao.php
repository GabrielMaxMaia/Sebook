<?php

namespace Util;

use PDO;
use PDOException;
use Exception;


class FabricaConexao {

    private function __construct() {
        
    }

    //método estático -- não pode ser alterado em tempo de execução
    // -- é executado diretamente da classe sem a necessidade de 
    //  instanciação de um objeto da classe FabricaConexao 

    public static function getConexao($arq) { //$arq - arquivo de configuração *.ini
        //verifica se o arquivo existe
        if (file_exists($arq)) {
            //parse_ini_file carregar o canteúdo do arquivo em array associativo
            $db = parse_ini_file($arq);
        } else {
            //lança um novo erro caso o arquivo não exista 
            throw new Exception("Arquivo não encontrado: $arq");
        }
        // armazenado informações do arquivo em variáveis
        $usuario = isset($db['usuario']) ? $db['usuario'] : NULL;
        $senha = isset($db['senha']) ? $db['senha'] : NULL;
        $nome = isset($db['nome']) ? $db['nome'] : NULL;
        $host = isset($db['host']) ? $db['host'] : NULL;
        $sgbd = isset($db['sgbd']) ? $db['sgbd'] : NULL;
        $porta = isset($db['porta']) ? $db['porta'] : NULL;

        switch ($sgbd) {
            case 'mysql':
                $porta = $porta ? $porta : '3306';
                try {
                    $conexao = new PDO("mysql:host={$host};port={$porta};dbname={$nome}", $usuario, $senha);

                   // echo "ok - conectado!";
                    
                } catch (PDOException $e) {
                    print_r($e);
                }
                break;
            case 'mssql':
                try {
                    $conexao = new PDO("sqlsrv:server={$host};database=$nome", $usuario, $senha);
                } catch (PDOException $e) {
                    print_r($e);
                }
                break;
        }
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }

}
