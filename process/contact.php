<?php
include_once('../events/AddEvents.php');
include_once('filter.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data']);
	$cn = f($data[0]);
	$ca = f($data[1]);
	$ce = f($data[2]);
	$cmsg = f($data[3]);
	$result['valid'] = $event->getClientMsg($cn, $ca, $ce, $cmsg);
	if ($result['valid']) {
		$result['msg'] = "You Successiful contacted us, Soon our Client gonna meet you soon";
		$result['action'] = 'Add Data';
		echo json_encode($result);
	}
}