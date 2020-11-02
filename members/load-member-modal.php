<?php
$pages = glob('modal/*.php');
foreach($pages as $pg){
	require_once($pg);
}
?>