<?php
include_once('../interface/iAddEvent.php');
include_once('../dbc/QueryExcution.php');


/*
*This class is for bilding query and calling 
#the specific class to excute the query 
#from the parent method(function)provided
*/
class AddEvent extends QueryExcution implements iAddEvent{
	public function __construct(){
		parent:: __construct();// inherint all from the parent __constract method.
	}
	public function esession(){ #function to initialize session if required
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
	public function checkSessionLoggedIn(){//Checking who has logged in the web
         $this->esession();
		if ($_SESSION['member_logged_in']) {
			return $_SESSION['member_logged_in'];
		}
		elseif ($_SESSION['admin_logged_in']) {
			return $_SESSION['admin_logged_in'];
		} else return false;
	}

	public function addEvent($etypeID, $edate, $h, $c){
	        //This function is for adding event to the database
		$aid = $this->checkSessionLoggedIn();
		$sql = "INSERT INTO tbl_events(authorID, eheading, ecaption, etypeID, eventdate)
		        VALUES
		        (?,?,?,?,?)
		        ;";
		return $this->insertRow($sql, [$aid, $h, $c, $etypeID, $edate]);
	}


	public function updateEvent($eid, $etypeID, $edate, $h, $c){

		#--This function it update the info on events

		$aid = $this->checkSessionLoggedIn();

		$sql = "UPDATE tbl_events 
		        SET
		        eheading = ?, ecaption = ?, etypeID = ?, eventdate = ?
		        WHERE eID = ? AND authorID = ?
		        ;";
		return $this->updateRow($sql,[$h,$c,$etypeID,$edate,$eid,$aid]);
	}
	public function deleteEvent($eid){ //Deleting the event already exists
		$aid = $this->checkSessionLoggedIn();
		$sql = "DELETE FROM tbl_events 
		        WHERE eID =? AND authorID=?
		        ;";
		return $this->deleteRow($sql,[$eid,$aid]);
	}

	public function addImage($eventid, $i){
		
		#..Adding image names to the database
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

		//..Deleting the Image name in the database
		$aid = $this->checkSessionLoggedIn();
		$sql = "DELETE FROM tbl_images 
		        WHERE iID =? AND aID=?
		        ;";
		return $this->deleteRow($sql,[$iid,$aid]);
	}

	public function getClientMsg($cn, $ca, $ce, $cmsg){

		//Putting the info sent by customer function
		$sql = "INSERT INTO messages(cName, cAddress, cContact, cMsg) 
		        VALUES
		        (?,?,?,?)
		        ;";
		return $this->insertRow($sql, [$cn, $ca, $ce, $cmsg]);
	}

	public function addClient($fn, $ln, $mn, $un, $ue, $up, $ua, $upass){

		#--Client
		
		$type = 1;
		$upass = md5($upass);
		$qry = "INSERT INTO author(autID, fname, mname, lname, email, phone, address, uname, passwd)
		        VALUES
		        (?,?,?,?,?,?,?,?,?)
		        ;";
		return $this->insertRow($qry, [$type, $fn, $ln, $mn, $ue, $up, $ue, $un, $upass]);
	}


	public function addComment($c, $e){
       
       #Adding comment to the Certain Event
		$qry = "INSERT INTO tbl_comments(	comment_date, cEId, comment_desc) VALUES (NOW(),?,?);";
		return $this->insertRow($qry, [$e, $c]);
	}

	#Reaction To the events update

	public function updateReact($eid){
		$qry = "UPDATE  tbl_events SET likes = likes+1 WHERE eID = ?";
		return $this->updateRow($qry, [$eid]);
	}
}
$event = new addEvent();
?>