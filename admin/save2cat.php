<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

	if( $_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = mysqli_real_escape_string($link, $_POST['title']);
		$author = mysqli_real_escape_string($link, $_POST['author']);
		$pubyear = (int)$_POST['pubyear']; 
		$price = (int)$_POST['price'];

		if(!addItemToCatalog($link, $title, $author, $pubyear, $price)){
			echo 'Произошла ошибка при добавлении товара в каталог';
		}else{
			header("Location: add2cat.php");
			exit;
		}
	}