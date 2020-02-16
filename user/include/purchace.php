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
	if (isset($_POST['purchace'])) {
		// Payment gateway redirection and validation should be done in here
		$sql = "SELECT * FROM cart WHERE userId = {$_SESSION['userId']};";
		$query = $conn->query($sql);
		$jsonArray = array();
		$count = 0;
		while ($result = $query->fetch_assoc()) {
			$jsonArray[$count] = json_encode($result);
			$count++;
		}
		$data =  json_encode($jsonArray);

		$sql = "INSERT INTO orderhistory(userId, details) VALUES ({$_SESSION['userId']}, '{$data}');";
		if ($conn->query($sql) === true) {
			$sql = "DELETE FROM cart WHERE userId = {$_SESSION['userId']};";
				if ($conn->query($sql) === false) {
					echo "<script>alert('System failed.Conact Administrator');</script>";
					die("Failed to purchace.");
				} else {
					echo "<script>alert('Payment Successfull.');</script>";
					header("Refresh: 1;URL=../index");
				}
		} else {
			echo "<script>alert('Failed.');</script>";
			header("Refresh: 1;URL=../cart");
		}
	}
 ?>