<?php 
	
	require_once('../db/db.php');
	session_start();

	if (!isset($_SESSION['httpError'])) {
		$_SESSION['httpError'] = 404;
	}

	$query = $conn->query("SELECT * FROM errors WHERE code = {$_SESSION['httpError']};");
	$result = $query->fetch_array();



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $result[0]; ?> | <?php echo $result[1]; ?></title>
</head>
<body>
	<h1> <?php echo $result[0]; ?> </h1>
	<h3> <?php echo $result[1]; ?> </h3>
	<h5><?php echo $result[2]; ?></h5>
</body>
</html>

<?php $conn->close(); ?>