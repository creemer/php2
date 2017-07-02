<?php
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$time = time();
		$order = strtolower(strip_tags(trim($_POST['name']))) 
		."|".strtolower(strip_tags(trim($_POST['email'])))
		."|".strtolower(strip_tags(trim($_POST['phone'])))
		."|".strtolower(strip_tags(trim($_POST['address'])))
		."|".$basket['orderid']."|".$time;
		
		file_put_contents("admin/".ORDERS_LOG, $order."\r\n", FILE_APPEND); 	
	}
	saveOrder($time);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>