<?php
/**
* Classe responsavel por todas as acoes executadas relacionadas ao banco de dados. 
*/
class Database
{
	private $pdo= null;

	public function Connect(){
		try{
			$this->pdo = new PDO("mysql:dbname=ProjetoCrud;host=localhost", 'root', '123');
			return $this->pdo;
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function ReturnConnection(){
		return $this->pdo;
	}

}
?>