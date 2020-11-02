<?php
$exmodals = glob('modal/*.php');
foreach ($exmodals as $em) {
	require_once($em);
}
?>