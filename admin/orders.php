<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Поступившие заказы</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php
	$orders = getOrders($link);
	if(!$orders) {
		echo "Зазазов нет";
		exit;
	}

	foreach ($orders as $order) {

		echo "<hr>
			<h2>Заказ номер: ".$order['orderid']."</h2>
			<p><b>Заказчик</b>: ".$order['name']."</p>
			<p><b>Email</b>: ".$order['email']."</p>
			<p><b>Телефон</b>: ".$order['phone']."</p>
			<p><b>Адрес доставки</b>: ".$order['address']."</p>
			<p><b>Дата размещения заказа</b>: ".date('d-m-Y H:i', (int)$order['date'])."</p>";

		echo '<h3>Купленные товары:</h3>
			<table border="1" cellpadding="5" cellspacing="0" width="90%">
			<tr>
				<th>N п/п</th>
				<th>Название</th>
				<th>Автор</th>
				<th>Год издания</th>
				<th>Цена, руб.</th>
				<th>Количество</th>
			</tr>';
			//Первый вариант решения
		// $sum = 0;
		// for ($i = 0; $i < count($order['goods']); $i++) { 
		// 	echo "<tr>
		// 			<td>{$i}</td>
		// 			<td>".$order['goods'][$i]['title']."</td>
		// 			<td>".$order['goods'][$i]['author']."</td>
		// 			<td>".$order['goods'][$i]['pubyear']."</td>
		// 			<td>".$order['goods'][$i]['price']."</td>
		// 			<td>".$order['goods'][$i]['quantity']."</td>
		// 		</tr>";
		// 	$sum += $order['goods'][$i]['price'] * $order['goods'][$i]['quantity'];
		// }

		$i = 1; $sum = 0;

		foreach ($order['goods'] as $value) {
			echo "
			<tr>
			<td>".$i."</td>
			<td>".$value['title']."</td>
			<td>".$value['author']."</td>
			<td>".$value['pubyear']."</td>
			<td>".$value['price']."</td>
			<td>".$value['quantity']."</td>
			<tr>";
			$i++;
			$sum += $value['price'] * $value['quantity'];
		}
		echo "</table>";
		echo "<p>Всего товаров в заказе на сумму: {$sum} руб.</p";
	}
?>

</body>
</html>