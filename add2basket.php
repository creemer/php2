<?php
	// ����������� ���������
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	if($_GET['id']) {
		$id = (int)$_GET['id'];
		$count = 1;
		add2Basket($id);		
	}

	header('Location: catalog.php');
	exit;