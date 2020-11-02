<?php
include_once('../interface/iAddEvent.php');
include_once('../dbc/QueryExcution.php');
class AddEvent extends QueryExcution implements iAddEvent{
	public function __construct(){
		parent:: __construct();
	}
	public function esession(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
	public function checkSessionLoggedIn(){
         $this->esession();
		if ($_SESSION['member_logged_in']) {
			return $_SESSION['member_logged_in'];
		}
		elseif ($_SESSION['admin_logged_in']) {
			return $_SESSION['admin_logged_in'];
		} else return;
	}

	public function addEvent($etypeID, $edate, $h, $c){
	        
		$aid = $this->checkSessionLoggedIn();
		$sql = "INSERT INTO tbl_events(authorID, eheading, ecaption, etypeID, eventdate)
		        VALUES
		        (?,?,?,?,?)
		        ;";
		return $this->insertRow($sql, [$aid, $h, $c, $etypeID, $edate]);
	}


	public function updateEvent($eid, $etypeID, $edate, $h, $c){
		$aid = $this->checkSessionLoggedIn();

		$sql = "UPDATE tbl_events 
		        SET
		        eheading = ?, ecaption = ?, etypeID = ?, eventdate = ?
		        WHERE eID = ? AND authorID = ?
		        ;";
		return $this->updateRow($sql,[$h,$c,$etypeID,$edate,$eid,$aid]);
	}
	public function deleteEvent($eid){
		$aid = $this->checkSessionLoggedIn();
		$sql = "DELETE FROM tbl_events 
		        WHERE eID =? AND authorID=?
		        ;";
		return $this->deleteRow($sql,[$eid,$aid]);
	}

	public function addImage($eventid, $i){
		
		$aid = $this->checkSessionLoggedIn();
		$sql = "INSERT INTO tbl_images(ieID, aID, idesc)
		        VALUES
		        (?,?,?)
		        ;";
		        $this->begin();
		return $this->insertRow($sql, [$eventid, $aid, $i]);
		$this->Commit();
	}

	public function deleteImage($iid){
		$aid = $this->checkSessionLoggedIn();
		$sql = "DELETE FROM tbl_images 
		        WHERE iID =? AND aID=?
		        ;";
		return $this->deleteRow($sql,[$iid,$aid]);
	}

	public function getClientMsg($cn, $ca, $ce, $cmsg){
		$sql = "INSERT INTO messages(cName, cAddress, cContact, cMsg) 
		        VALUES
		        (?,?,?,?)
		        ;";
		return $this->insertRow($sql, [$cn, $ca, $ce, $cmsg]);
	}

	public function addClient($fn, $ln, $mn, $un, $ue, $up, $ua, $upass){
		$type = 1;
		$upass = md5($upass);
		$qry = "INSERT INTO author(autID, fname, mname, lname, email, phone, address, uname, passwd)
		        VALUES
		        (?,?,?,?,?,?,?,?,?)
		        ;";
		return $this->insertRow($qry, [$type, $fn, $ln, $mn, $ue, $up, $ue, $un, $upass]);
	}
}
$event = new addEvent();
?>
