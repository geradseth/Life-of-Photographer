<?php
interface iAddEvent{
	public function checkSessionLoggedIn();
	public function addEvent($etypeID, $edate, $h, $c);
	public function updateEvent($eid, $etypeID, $edate, $h, $c);
	public function deleteEvent($eid);
	public function addImage($eventid, $i);
	public function deleteImage($iid);
	public function getClientMsg($cn, $ca, $ce, $cmsg);
	public function addClient($fn, $ln, $mn, $un, $ue, $up, $ua, $upass);
}
?>