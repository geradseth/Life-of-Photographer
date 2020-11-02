<?php
include_once('Connection.php');
class QueryExcution extends Connection{
	public function __construct(){
		parent:: __construct();
	}

	#####--Function to Excute Inserting Queries...!
	public function insertRow($sql, $ops = []){
		try{
		$stmt = $this->dbc->prepare($sql);
		$stmt->execute($ops);
		return true;
	    }catch (PDOException $e){
	    	throw new Exception($e->getMessage());	
	    }
	}
	###....Function Called whenever The Update Query Request
	public function updateRow($sql, $ops = []){
			return $this->insertRow($sql, $ops);
	}

	###....Function Excuting SLECT queries
	//disconnect is in the parent class in connection.php

	//get row
	public function getRow($query, $params = []){
		try {
			$stmt = $this->dbc->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}


	}//end getRow

	public function getRows($sql, $ops = []){
		try {
			$stmt = $this->dbc->prepare($sql);
			$stmt->execute($ops);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			
		}
	}

	###....Function to Excute the Delete Query called Whenever Delete invokes
	public function deleteRow($sql, $ops = []){
		return $this->insertRow($sql,$ops);
	}

	#.......function to get last inserted ID
	public function lastId(){
		$lID = $this->dbc->lastInsertedId();
		return $lID;
	}

	#.........Transaction function this is trigered whenever two or multiple Queries to be Excuted
	public function transact($sql, $ops = [], $sql2, $ops2 = []){
		try{
		$this->transact->beginTransaction();
		        $stmt = $this->dbc->prepare($sql);
		        $stmt->execute($ops);

		        $stmt2 = $this->dbc->prepare($sql);
		        $stmt2->execute($ops);
		return $this->transact->commit();
	    } catch (PDOException $e){
	    	throw new Exception($e->getMessage());
	    	
	    }
	}
	public function begin(){
		return $this->transact->beginTransaction();
	}

	public function Commit(){
		return $this->transact->commit();
	}

	public function test(){
		echo "Well class ####-__.. created and presented";
	}

}
$dbcStatus = new QueryExcution();
?>
