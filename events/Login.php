<?php
include_once('../dbc/QueryExcution.php');
include_once('../interface/iLogin.php');
class Login extends QueryExcution implements iLogin{
	private $username;
	private $password;
	public function __construct(){
	      parent:: __construct();
	      if(session_status() == PHP_SESSION_NONE){
	          session_start();
	      }
	}

	public function setMnp($username, $password){
		$this->username = $username;
		$this->password = md5($password);
	}

	public function checkMembership(){
		$comfirmed = 1;
		$qry = "SELECT * FROM author
		        WHERE uname = ?
		        AND passwd = ? 
		        AND comfirmation = ?
		        ;";
		return $this->getRow($qry, [$this->username, $this->password, $comfirmed]);
	}

	##...get Member ID For Session set
	public function getMemberId(){
        $comfirmed = 1;
        $mtid = 1;
        $qry = "SELECT aID FROM author
                WHERE uname = ?
                AND autID = ?
                AND passwd = ?
                AND comfirmation = ?;";
        return $this->getRow($qry, [$this->username, $this->mtid, $this->password, $this->comfirmed]);
	}

	###...!Checking Session and logging out Functions
	public function member_session(){
		if (!isset($_SESSION['member_logged_in'])){
			header('location:../index/index.php');
		}
	}
	public function admin_session(){
		if (!isset($_SESSION['admin_logged_in'])){
			header('location:../index.php');
			session_destroy();
		}
	}
	public function admin_logout(){
			unset($_SESSION['admin_logged_in']);
			header('location:../index.php');
	}

	public function member_logout(){
			unset($_SESSION['member_logged_in']);
			session_destroy();
			header('location:../index/index.php');
	}

	#...Get Admin Data
	public function getAdmin(){
		$comfirmed = 1;
		$aid = $_SESSION['admin_logged_in'];
		$qry = "SELECT * FROM author
		        WHERE aID = ?
		        AND comfirmation = ?
		        ";
	}

}
$login = new Login();
