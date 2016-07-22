<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type"; content="text/html; charset=utf-8">
	<title>MySQL + PHP + AJAX</title>
	<link rel="stylesheet" href="http://ifa.lifeha.ru/3/css/jquery-ui-1.8.16.custom.css" type="text/css" media="all"/>	
	<link rel="stylesheet" href="http://ifa.lifeha.ru/3/css/style.css" type="text/css" media="all"/>	
	<script src="http://ifa.lifeha.ru/3/js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="http://ifa.lifeha.ru/3/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="http://ifa.lifeha.ru/3/js/javascripts.js" type="text/javascript"></script>
</head>	

<body>
	<div id="main" class="ui-corner-all">
		<div id="block_pad">
			<h1>MySQL + PHP + AJAX</h1>
			<div id="login_field">
				<label for="login">Логин:</label>
				<input type="text" name="login" id="login" class="text ui-widget-content ui-corner-all"/>
			</div>
			<div id="coupon_field">
				<label for="coupon">Купон:</label>
				<input type="coupon" name="coupon" id="coupon" class="text ui-widget-content ui-corner-all"/>
			</div>									<div id="cost_field">				<label for="cost">Стоимость:</label>				<input type="cost" name="cost" id="cost" class="text ui-widget-content ui-corner-all"/>			</div>
			<div id="button_field">
				<button  id="check">Занести в БД</button>
			</div>
			<div id="content"></div>
		</div>
	</div>
</body>
</html>