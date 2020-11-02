<?php
include_once('filter.php');
include_once('../events/AddEvents.php');
if(isset($_POST['client'])){
	$details = json_decode($_POST['client'], true);

	$fn = $details[0];
	$mn = $details[1];
	$ln = $details[2];
	$un = $details[3];
	$ue = $details[4];
	$up = $details[5];
	$ua = $details[6];
	$upass = $details[7];

	$result['valid'] = $event->addClient($fn, $ln, $mn, $un, $ue, $up, $ua, $upass);
	if($result['valid']){
		$result['msg'] = "Thanks For Joining Us You Also Can Do Bussiness";
		$result['action'] = 'Add Data';
		echo json_encode($result);
	}

}
?>