<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Categoria e CategoriaDAO
class CategoriaDAO extends Categoria{


    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from categoria where status_categoria = 'A'";
    private static $SELECT_ID = "select * from categoria where id_categoria = :id";
    private static $INSERT = "INSERT INTO categoria
                                (nome_categoria, descr_categoria)
                                VALUES (:nome_categoria, :descr_categoria)";    
    private static $UPDATE = "UPDATE  categoria SET
                                 nome_categoria = :nome_categoria  , 
                                 descr_categoria = :descr_categoria
                              WHERE id_categoria =  :id  ";       
    //DELETE lógico -> altera status                                                        
    private static $DELETE = "UPDATE  categoria SET
                                    status_categoria = 'I'
                                WHERE id_categoria =  :id  ";                                

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idCategoria = 0, $nomeCategoria = "", $descrCategoria = "", $statusCategoria = "A")
    {
        parent::__construct($idCategoria, $nomeCategoria, $descrCategoria, $statusCategoria );
        $this->sql = $objSql;        
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarCategorias(){
        //executar a consulta no banco
        $result = $this->sql->query(CategoriaDAO::$SELECT_ALL);
        //devolver o resultado
        if($result->rowCount() > 0){
            while($linha = $result->fetch(\PDO::FETCH_OBJ)){
                $itens[] = array(
                    'idCat'=> $linha->id_categoria, 
                    'nomeCat'=>$linha->nome_categoria, 
                    'descrCat'=>$linha->descr_categoria,
                    'statusCat'=>$linha->status_categoria 
                );
            }
        }else{
            $itens = null;
        }
        return $itens;
    }

    public function listarCategoriaId(){
        //executar a consulta no banco
        $result = $this->sql->query(CategoriaDAO::$SELECT_ID,
                      array(
                          ':id' => array( 0=> $this->getIdCategoria(),1 => \PDO::PARAM_INT )
                      )  
                    );
        if($result->rowCount() == 1){
            $linha = $result->fetch(\PDO::FETCH_OBJ);
                $itens = array(
                    'idCat'=> $linha->id_categoria, 
                    'nomeCat'=>$linha->nome_categoria, 
                    'descrCat'=>$linha->descr_categoria,
                    'statusCat'=>$linha->status_categoria 
                );
        }else{
            $itens = null;
        }
         //devolver o resultado     
         return $itens;  
    }

    public function adicionarCategoria(){
        $result = $this->sql->execute(CategoriaDAO::$INSERT,
                    array(
                        ':nome_categoria' =>array(0 => $this->getNomeCategoria(), 1=>\PDO::PARAM_STR),  
                        ':descr_categoria'=>array(0 => $this->getDescrCategoria(), 1=>\PDO::PARAM_STR)
                    )
                );
        return $result;
    }

    public function alterarCategoria(){
        $result = $this->sql->execute(CategoriaDAO::$UPDATE,
                array(
                    ':nome_categoria' =>array(0 => $this->getNomeCategoria(), 1=>\PDO::PARAM_STR),  
                    ':descr_categoria'=>array(0 => $this->getDescrCategoria(), 1=>\PDO::PARAM_STR),
                    ':id'=>array(0 => $this->getIdCategoria(), 1=>\PDO::PARAM_INT)
                )
            );
        return $result;
    }

    public function excluirCategoria(){
        $result = $this->sql->execute(CategoriaDAO::$DELETE,
                array(
                    ':id'=>array(0 => $this->getIdCategoria(), 1=>\PDO::PARAM_INT)
                )
            );
        return $result;
    }


}