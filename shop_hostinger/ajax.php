<?php	
	require_once('config.php');
	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest') {
		if(isset($_POST['a']) && isset($_POST['login']) && isset($_POST['cost']) && isset($_POST['coupon'])) {
			$action=$_POST['a'];
			$login=$_POST['login'];
			$cost=$_POST['cost'];
			$coupon=$_POST['coupon'];
			if($action=="check") {
				echo $login;
				echo $coupon;
				echo $cost;
				$sql1 = $db->query("INSERT INTO `coupons`(`coupon`,`login`,`cost`) VALUES ('".$coupon."','".$login."','".$cost."')");
			}
			$db->close();
		}
	}
?>