<?php
class Connection{
	protected $conStatus;
	protected $dbc;
	protected $transaction;
	public function __construct($host = "localhost", $dbname = "events", $passwd = "seth1234", $uname = "root", $opt = []){
		$this->conStatus = TRUE;
		try{
		$this->dbc = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $uname, $passwd, $opt);
		$this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->transaction = $this->dbc;
		$this->dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	    }catch (PDOException $e){
		throw new Exception($e->getMessage());
		}
	}
	public function Disconnect(){
            $this->dbc = NULL;
            $this->conStatus = FALSE;
	}
}
?>
