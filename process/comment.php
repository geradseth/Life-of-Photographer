<?php
include_once('../events/AddEvents.php');
if(isset($_POST['com'])){

	$comm = $_POST['com'];

	$eid = $_POST['eid'];

	#checking if the vistor logged in

  if($event->checkSessionLoggedIn()){
	$result['success'] = $event->addComment($comm, $eid);
	if($result['success']){
	  $result['success'] = 'success';
	  $result['msg'] = "You commented on This Event \n".$comm;
	}
}else {
	$result['fail'] = "You must Login First";
}
	echo json_encode($result);
}
?>