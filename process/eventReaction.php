<?php
/*
* This increaments the reaction on an events
*/
include_once"../events/AddEvents.php";

#let include filtering functions
include_once"filter.php";

if(isset($_POST["eid"])){
	$eid = f($_POST['eid']);

	#checking if the vistor logged in
	if($event->checkSessionLoggedIn()){

	    $result['reacted'] = $event->updateReact($eid);
	    if($result['reacted'])
		    $result['reacted'] = "success";
    }
    else 
    	$result['fail'] = "You must Login First";

#Json to send data back to javascript....!	
echo json_encode($result);

}