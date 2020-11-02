<?php
include_once('../events/Login.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'],true);
	$unm = $data[0];
	$pwd = ($data[1]);
	$login->setMnp($unm, $pwd);

	#..getting user and logging in;
	$member = $login->checkMembership();
	$result['valid'] = false;



	##... Check out if User Filled The Form
if(!empty($unm) && !empty($pwd)){

	if ($member > 0) {
		$result['valid'] = true;
		if ($member['autID'] == 1) {
			$_SESSION['member_logged_in'] = $member['auID'];
			$result['url'] = '../members/index.php';
		}
		elseif ($member['autID'] == 2) {
			mkdir('/photographers/ag/',0777);
			$_SESSION['admin_logged_in'] = $member['auID'];
			$result['url'] = '../ag/index.php';
		}
	}else{
		##...If Wrong Password or Username
		$result['msg'] = "Invalid Username or Password Try Again";
	}
}else{
	##...If user Didn't Fill up The form
	$result['msg'] = "Fill up The Form All Field are Required";
	$result['sign'] = "fill-info";
}
echo json_encode($result);
}
