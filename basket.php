<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
	if(!myBasket()) {
		echo "Корзина пуста! Вернитесь в <a href='catalog.php'>каталог</a>.";
		exit;
	}else {
		echo "Вернуться в <a href='catalog.php'>каталог</a>.";
	}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php
	$bask = myBasket();
	$i = 1; $sum = 0;

	foreach ($bask as $value) {
		echo "
		<tr>
		<td>".$i."</td>
		<td>".$value['title']."</td>
		<td>".$value['author']."</td>
		<td>".$value['pubyear']."</td>
		<td>".$value['price']."</td>
		<td>".$value['quantity']."</td>
		<td><a href='delete_from_basket.php?id=".$value['id']."'>Удалить</a></td>
		<tr>";
		$i++;
		$sum += $value['price'] * $value['quantity'];
	}
?>
</table>

<p>Всего товаров в корзине на сумму: <?= $sum?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







