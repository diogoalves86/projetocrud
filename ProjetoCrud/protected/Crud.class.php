<?php
class Crud
{

	private $conn, $connection;
	private $line = null;

	//Construtor
	// Realiza a conexao com banco de dados
	public function __construct(){
		$this->conn = new Database();
		$this->connection = $this->conn->Connect();
	}

	public function ReturnLine(){
		return $this->line;
		$this->line = "";
	}
	// CRUD
	public function Select($columns, $table, $allLines = false, $condition = null, $orderBy = null){
		try{
			$sql = "";
			$Security = new Security();
			$Security->SqlSecurity($columns);
			$Security->SqlSecurity($table);
			$Security->SqlSecurity($allLines);
			
			$sql.= "SELECT ".$columns." FROM ".$table;
			if ($condition != null):
				$sql.= " WHERE ".$condition;
			endif;

			
			if($orderBy != null):
				$sql.= " ORDER BY ".$orderBy;
			endif;
			$command = $this->conn->ReturnConnection()->prepare($sql);
			$command->execute();

			// Retornando os dados da consulta executada em um Array.
			if($allLines):
				while ($line = $command->fetchAll(PDO::FETCH_ASSOC)):
					$this->line = $line;
				endwhile;
			else:
				while ($line = $command->fetch(PDO::FETCH_ASSOC)):
					$this->line = $line;
				endwhile;
			endif;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}

	}

	public function Update($tableName, $fields, $condition = null){
		try {
			$sql = "";
			$Security = new Security();
			$Security->SqlSecurity($tableName);
			$Security->SqlSecurity($fields);
			$Security->SqlSecurity($condition);
			
			$sql = "UPDATE ".$tableName." SET ".$fields;
			if ($condition != null):
				$sql .= " WHERE ".$condition;
			endif;
			
			$command = $this->conn->ReturnConnection()->prepare($sql);
			$command->execute();
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}


	public function Insert($tableName, $columns, $values){
		try {
			$sql = "";
			$Security = new Security();
			$Security->SqlSecurity($tableName);
			$Security->SqlSecurity($columns);
			$Security->SqlSecurity($values);

			$sql = "INSERT INTO ".$tableName."(".$columns.") VALUES (".$values.")";
			
			$command = $this->conn->ReturnConnection()->prepare($sql);
			$command->execute();
			return true;

		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}


	public function Delete($tableName, $condition = null){
		try {
			$sql = "";
			$Security = new Security();
			$Security->SqlSecurity($tableName);
			$Security->SqlSecurity($condition);

			$sql = "DELETE FROM ".$tableName;
			
			if($condition != null):
				$sql .= " WHERE ".$condition;
			endif;

			$command = $this->conn->ReturnConnection()->prepare($sql);
			$command->execute();
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();			
			return false;
		}
	}

	public function SelectInnerJoin($columns, $tableName, $otherTable , $join, $allLines = false, $condition = ""){
		try {
			$sql = "";
			$Security = new Security();
			//$Security->SqlSecurity($columns);
			//$Security->SqlSecurity($tableName);
			//$Security->SqlSecurity($join);
			
			$sql = "SELECT ".$columns." FROM ".$tableName;
			for($i=0; $i < count($otherTable); $i++){
				$sql.= " INNER JOIN ".$otherTable[$i]." ON ".$join[$i];

			}
			if($condition != ""):
				$sql.= " WHERE ".$condition;
			endif;
			$command = $this->conn->ReturnConnection()->prepare($sql);
			$command->execute();
			// Retornando os dados da consulta executada em um Array.
			if($allLines):
				while ($line = $command->fetchAll(PDO::FETCH_ASSOC)):
					$this->line = $line;
				endwhile;
			else:
				while ($line = $command->fetch()):
					$this->line = $line;
				endwhile;
			endif;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function SelectCount($tableName, $condition){
		$sql = "SELECT COUNT(*) AS numbers from.".$tableName." WHERE ".$condition;
		$this->crud = new Crud();
		$command = $this->conn->ReturnConnection()->prepare($sql);
		$command->execute();
		while ($line = $command->fetchAll(PDO::FETCH_ASSOC)):
					$this->line = $line;
		endwhile;
	}

}
?>