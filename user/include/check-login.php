<?php
	session_start();
 
	if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
		// allow user 
	} else {
		header("Location: /yoyo/index");
	}
 ?>