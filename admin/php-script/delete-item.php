<?php 
	if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
		// allow user 
	} else {
		header("Location: /yoyo/index");
}
 ?>
<?php require_once("../../db/db.php") ?>
<?php 
	if (isset($_GET['i'])) {
		$sql = "DELETE FROM item WHERE itemId = {$_GET['i']};";
		if ($conn->query($sql) === true) {
			$conn->close();
			header("Location: ../manage-item");
		} else {
			$conn->close();
			header("Location: ../manage-item");
		}
	}
 ?>