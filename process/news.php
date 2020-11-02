<?php
require_once('../events/ShowEvents.php');

if(isset($_POST['eId'])){
	$id = $_POST['eId'];
	
	$result = $sEvent->getnews($id);
	echo json_encode($result);
	
}elseif (isset($_POST['ueId'])) {
	$ueid = $_POST['ueId'];

	$result = $sEvent->getUpcommingDesc($ueid);
	echo json_encode($result);
}

$sEvent->Disconnect();
?>
