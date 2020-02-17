<?php
	session_start();
 
	if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
		// allow user 
		if (isset($_POST['logout'])) {
			$_SESSION['login'] = false;
			unset($_SESSION);
			unset($_POST);
			header("Refresh: 0");
			header("Location: /yoyo/index");
		}
	} else {
		header("Location: /yoyo/index");
	}
	require_once('../db/db.php');
 ?>