<?php
include_once('../events/AddEvents.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'],true);

	$ename = $data[2];
	$ecapt = $data[3];
	$etypeid = $data[0];
	$edate = $data[1];

	$result['success'] = $event->addEvent($etypeid, $edate, $ename, $ecapt);
	if($result['success']){
	  $result['success'] = 'success';
	  $result['msg'] = "You Succeded Add Event";
	}
	echo json_encode($result);
}
?>
