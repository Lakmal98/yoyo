<?php
	session_start();
 
	if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
		// allow user 
		if (isset($_POST['logout'])) {
			$_SESSION['login'] = false;
			unset($_SESSION);
			unset($_POST);
			header("Refresh: 0");
		}
	} else {
		header("Location: /yoyo/index");
	}
	require_once('../../db/db.php');
 ?>

 <?php 
 	if (isset($_GET['num'])) {
 		$sql = "SELECT quantity FROM item WHERE itemId = {$_GET['item']};";
 		$result = ($conn->query($sql))->fetch_array();		
 		if ($_GET['num'] > 0 && $result[0] >= $_GET['num'] ) {
	 		$sql = "INSERT INTO cart (userId, itemId, quantity) VALUES ({$_SESSION['userId']}, {$_GET['item']}, {$_GET['num']});";
			if ($conn->query($sql) === false) {
				echo "<script>alert('Failed to add item to the cart.');</script>";
			} else {
				header("Location: ../index");
			}
 		} else {
				echo "<script>alert('Failed to add item to the cart.');</script>";
				header("Refresh: 1;URL=../index");
 		}
 	}
  ?>