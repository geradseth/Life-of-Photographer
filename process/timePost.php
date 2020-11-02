<?php
#This to work we need the file that fetch the data from database
/*$d="""include_once('..events/ShowEvents.php');
$results = $sEvent->getImage();
foreach($results as $result){
	$t = $d - $result['postedDate'];
}""";*/
$check = date('Y-m-d H:i:s');
$t2 = strtotime($check);
$pdate = $ipd['postedDate'];
$d = strtotime($pdate);
$seconds = abs($t2-$d);

$min = floor($seconds/(60));

$hrs = floor($seconds/(60*60));

$dys = floor($seconds/(7*24*60*60));

$rts = floor($seconds/(24*60*60));

$mon = floor($seconds/(30*24*60*60));

$yrs = floor($seconds/(365*24*60*60));
if($seconds>60&&$min<60){
	echo $min."min <br>";
}elseif($min>60&&$hrs<24)
echo $hrs."hrs <br>";
elseif ($hrs>24&&$rts<8) {
	echo $rts."days<br>";
}elseif ($rts>7&&$dys<5) {
	echo $dys."weeks <br>";
}elseif ($dys>4&&$mon<13) {
	echo $mon."months<br>";
}elseif ($mon>=2) {
	echo $pdate;
}else echo $seconds."sec";
?>