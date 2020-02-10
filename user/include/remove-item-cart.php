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
 	if (isset($_POST['select-item'])) {
 		if (isset($_GET['i'])) {
 			$sql = "DELETE FROM cart WHERE userId = {$_SESSION['userId']} AND itemId = {$_GET['i']};";

 			if ($conn->query($sql) === true) {
 				header("Location: ../cart");
 			} else {
 				echo "<script>alert('Failed to remove all items from cart.');</script>";
				header("Refresh: 1;URL=../cart");
 			}
 		} else {
 			echo "<script>alert(Select Item to remove.');</script>";
			header("Refresh: 1;URL=../cart");
 		}
 	}
  ?>