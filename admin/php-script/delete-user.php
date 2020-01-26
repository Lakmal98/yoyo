<?php 
	if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
		// allow user 
	} else {
		header("Location: /yoyo/index");
}
 ?>
<?php require_once("../../db/db.php") ?>
<?php 
	if (isset($_GET['u'])) {
		$sql = "DELETE FROM user WHERE userId = {$_GET['u']};";
		if ($conn->query($sql) === true) {
			$conn->close();
			header("Location: ../manage-user");
		} else {
			$conn->close();
			header("Location: ../manage-user");
		}
	}
 ?>