<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'coupon_bd');
	define('DB_PASS', 'FNtDDOWq');
	define('DB_NAME', 'coupon_bd'); 
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);
	if ($db->connect_error) {
		printf("CONNECT ERROR : %d\n", $db->errno);
		exit();
	}	
?>
