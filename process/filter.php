<?php
function f($data){
	$data = stripslashes($data);
	$data = trim($data);
	$data = htmlentities($data);
	return $data;
}
?>