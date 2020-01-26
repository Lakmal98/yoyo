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