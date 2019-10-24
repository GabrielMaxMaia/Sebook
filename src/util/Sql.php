<?php 

namespace Util;

class Sql {
		
		//Atributo conexao com o SGBD
		private $conn;

		// adicionamos a '\' antes do nome da classe para o PHP não
		// procurar a classe no namespace atual
  public function __construct(\PDO $conexao){
		$this->conn = $conexao;
	}

	//Statement --> comando SQL que será preparado
	//$parameters --> array com os parametros e valores que serão adicionados ao 
	//comando SQL
  private function setParams($statement, $parameters = array()){ //array vazio por padrão
		foreach ($parameters as $key => $value) {			
			//databinding com o método bindParam
			// comando SQl, campo a ser substituído, valor , tipo de dado
			$this->setParam($statement, $key, $value[0], $value[1]);
		}
	}
    
  private function setParam($statement, $key, $value, $type ){
		 //executa individualmente
			// comando SQl, campo a ser substituído, valor , tipo de dado
		$statement->bindParam($key, $value, $type);
  }
		
	//APENAS PARA USO COM SELECT
	//$rawQuery é o proprio comando sql antes de ser preparado 
	public function query($rawQuery, $params = array()){
		try{
			//prepara o SQL 
			$stmt = $this->conn->prepare($rawQuery);
			//adiciona os valores no comando SQl preparado
			$this->setParams($stmt, $params);
			//pega o Sql preparado com os valores já adicionados executa e devolve o resultado para o obj $stmt
			$stmt->execute();
			//retorno do método para o programa
			return $stmt;
		}catch(\PDOException $ex){
			var_dump($ex);
			//header('location:pagErro.php');
		}
	}

	//para utilizar com INSERT, UPDATE e DELETE;
	//$rawQuery é o proprio comando sql antes de ser preparado 
	public function execute($rawQuery, $params = array()){
		try{		
			//prepara o SQL 
			$stmt = $this->conn->prepare($rawQuery);
			//adiciona os valores no comando SQl preparado
			$this->setParams($stmt, $params);
			//pega o Sql preparado com os valores já adicionados executa e devolve o resultado para o obj $stmt		
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}catch(\PDOException $ex){
			var_dump($ex);
			//header('location:pagErro.php');		
		}
	}



    
}
