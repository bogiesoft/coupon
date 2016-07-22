<?php	
	require_once('./config.php');
	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest') {
	if(isset($_POST['a']) && isset($_POST['login']) && isset($_POST['password']) ) {
			$action=$_POST['a'];
			$login=$_POST['login'];
			$password=$_POST['password'];
			if($action=="check") {		
				$data = array('l' => $login, 'p' => $password);

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://order.hostlife.net/unisender.php");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$content = curl_exec($ch);
				curl_close($ch);
				
				
				$results = json_decode($content);
				$status=$results->{'status'};
				$reg_date=$results->{'reg_date'};
				if ($status == "0") {
						$sql1 = $db->query("SELECT `coupons`.`id`,`coupons`.`coupon`,`coupons`.`login`  FROM `coupons` WHERE `coupons`.`login`='$login'" );
						if($row = $sql1->fetch_assoc()) {
							echo " Ваш купон: ",$row['coupon'];
							
						} else {
							if($reg_date>="2011-12-15") {
								$sql1 = $db->query("SELECT `coupons`.`id` AS `num`  FROM `coupons` WHERE `coupons`.`login`='' AND `cost`='150' LIMIT 0,1" );
								if($sql1->num_rows == 0) {
									echo "Ошибка! Попробуйте позже.";
								}
								else {
									$sql1=$db->query("UPDATE `coupons` SET `login`='$login' WHERE `login`='' AND `cost`='150' LIMIT 1");
									$sql1 = $db->query("SELECT `coupons`.`id`,`coupons`.`coupon`,`coupons`.`login`  FROM `coupons` WHERE `coupons`.`login`='$login'" );
									if($row = $sql1->fetch_assoc()) {
										echo " Ваш купон: ",$row['coupon'];
									
									}
								}
							}
							else {
								$sql1 = $db->query("SELECT `coupons`.`id` AS `num`  FROM `coupons` WHERE `coupons`.`login`='' AND `cost`='100' LIMIT 0,1" );
								if($sql1->num_rows == 0) {
									echo "Ошибка! Попробуйте позже.";
								} 
								else {
									$sql1=$db->query("UPDATE `coupons` SET `login`='$login' WHERE `login`='' AND `cost`='100' LIMIT 1");
									$sql1 = $db->query("SELECT `coupons`.`id`,`coupons`.`coupon`,`coupons`.`login`  FROM `coupons` WHERE `coupons`.`login`='$login'" );
									if($row = $sql1->fetch_assoc()) {
										echo " Ваш купон: ",$row['coupon'];
									
									}
								}
							}
						}
				}
				if ($status == "1") { 
					echo "Не найден логин или пароль.";
				}
				
				if ($status == "2") { 
					echo "Некорректный логин.";
				}
				
				if ($status == "3") { 
					echo "Пользователь не найден.";
				}
				
				if ($status == "4") { 
					echo "Неверный пароль.";
				}
				
				if ($status == "5") { 
					echo "Нет ни одной активной услуги!";
				}
			}
			$db->close(); 
		}
	}
?>