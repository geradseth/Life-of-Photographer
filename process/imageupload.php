<?php
include_once('../events/AddEvent.php');
    $eid = $_POST['eventID'];
	$path = 'images/';
	$filename = '_179_'.time().'_twika_';
	$error = '';
	$extension = array('jpeg','jpg','gif','png');
	$key = "ndima sipile";
	$encmethod = 'aes-128-gcm';

	if (!empty($eid) || $_FILE['image']) {
		$image = $_FILE['image']['name'];
		$tmpn = $_FILE['image']['tmp_name'];
       
        $uplodfile = openssl_encrypt($filename, $encmethod, $key).$image;

        $ext = strtolower($uplodfile, PATHINFO_EXTENSION);

        if(in_array($ext, $extension)){
        	$path = $path.strtolower($uplodfile);

        	if (move_uploaded_file($tmpn, $path)) {
        		echo "<img src = '$path' />";
        		$result['valid'] = $event->addImage($path, $eid);
        	}
        }else {
        	echo "invalid";
        }

	}else{
		echo "invalid";
	}
