<?php
include_once('../dbc/QueryExcution.php');
include_once('../interface/Shows.php');


/*
*After importing the class above
#This Class build the select query ie 
//restricting data to be fetch ready to use on page
*/
class ShowEvent extends QueryExcution implements ishows{
	public function __constract(){
		parent:: __constract();
	}


	public function getEvents(){
		$sql = "SELECT * FROM tbl_events e 
		        INNER JOIN tbl_etype t 
		        ON e.etypeID = t.etid 
		        INNER JOIN author a 
		        ON e.authorID = a.auID 
		        WHERE e.etypeID !=2
		        ORDER BY e.eventdate DESC; 
		        ";
		return $this->getRows($sql);
	}


	public function getUpcomingEvent(){
		$date = date('Y-m-d');
		$id = 2;
		$sql = "SELECT * FROM tbl_events e
		        INNER JOIN tbl_etype t
		        ON e.etypeID = t.etid
		        INNER JOIN author a
		        ON e.authorID = a.auID
		        WHERE eventdate >= ? 
		        AND etid != ?
		        ORDER BY eventdate ASC
		        LIMIT 5;
		        ";
		return $this->getRows($sql, [$date, $id]);
	}
	public function getUpcommingDesc($ueid){
		//sql To Fetch Upcoming event
		$sql = "SELECT * FROM tbl_events e
		        INNER JOIN tbl_etype t
		        ON e.etypeID = t.etid
		        INNER JOIN author a
		        ON e.authorID = a.auID
		        WHERE  eID = ?;
		        ";
		return $this->getRow($sql, [$ueid]);
	}


	public function getHeadline($etid = 2){
		$sql = "SELECT eID, eheading, eventdate FROM tbl_events WHERE etypeID = ? ORDER BY eventdate DESC LIMIT 5;";
		return $this->getRows($sql,[$etid]);
	}

	public function getnews($etid){
		$sql = "SELECT eID, eheading, ecaption, fname, lname, eventdate FROM tbl_events ev
		        INNER JOIN author au
		        ON ev.authorID = au.auID 
		        WHERE eID = ?";
		$result = $this->getRow($sql,[$etid]);
		return $result;
	}

	public function getFeaturedPhoto(){
		$sql = "SELECT * FROM tbl_events e
		        INNER JOIN tbl_images i
		        ON e.eID = i.ieID
		        ORDER BY e.eventdate DESC LIMIT 4
		        ;";
		return $this->getRows($sql);
	}
	public function getEventType(){
		$sql = "SELECT * FROM tbl_etype WHERE 1";
		return $this->getRows($sql);
	}
	public function getContactedCustomes(){
		$status = 0;
		$sql = "SELECT DISTINCT COUNT(cMID) as nc FROM messages WHERE servicedBy = ?";
		return $this->getRow($sql, [$status]);
	}
	public function getCustomersMessages(){
		$sql = "SELECT * FROM messages WHERE servicedBy = 0";
		return $this->getRows($sql);
	}
	public function getEv(){
		$sql = "SELECT eID, eheading FROM tbl_events WHERE status='done' AND etypeID!=2 ORDER BY eventdate DESC";
        return $this->getRows($sql);
    }
    
	public function getImageDesc(){
		$sql = "SELECT * FROM tbl_images i
		        INNER JOIN author a
		        ON i.aID = a.auID
		        INNER JOIN tbl_events e
		        ON i.ieID = e.eID
		        ";
		return $this->getRows($sql);
	}

	public function getImages($i){
		$sql = "SELECT * FROM tbl_images i
		        INNER JOIN author a
		        ON i.aID = a.auID
		        INNER JOIN tbl_events e
		        ON i.ieID = e.eID
		        WHERE e.eID = ? LIMIT 2
		        ";
		return $this->getRows($sql, [$i]);
	}
	public function getDatepost($ev){
		$sql = "SELECT i.postedDate FROM tbl_images i
		        INNER JOIN author a
		        ON i.aID = a.auID
		        INNER JOIN tbl_events e
		        ON i.ieID = e.eID
		        WHERE e.eID = ?
		        ORDER BY i.postedDate DESC
		        LIMIT 1
		        ";	
		return $this->getRow($sql, [$ev]);
	}

	public function countLikes($eid){

		$qry = "SELECT likes FROM tbl_events WHERE eID = ?";
		$result = $this->getRow($qry, [$eid]);
		return $result['likes'];
	}

	public function countComments($eid){
		$qry = "SELECT COUNT(id) as c FROM tbl_comments WHERE cEId = ?";
		$result = $this->getRow($qry, [$eid]);
		return $result['c'];	
	}


	public function showRecentComment($eid){

		$qry = "SELECT comment_desc as com FROM tbl_comments WHERE cEid = ? ORDER BY comment_date DESC;";
		$result = $this->getRows($qry, [$eid]);
		return $result;
	}
}
$sEvent = new ShowEvent();
