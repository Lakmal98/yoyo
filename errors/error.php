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
	<link rel="stylesheet" href="/yoyo/css/style.css">
	<link rel="stylesheet" href="/yoyo/user/css/user.css">
</head>
<body style="text-align: center; color: #fff;">
	<h1> <?php echo $result[0]; ?> </h1>
	<h3> <?php echo $result[1]; ?> </h3>
	<h5><?php echo $result[2]; ?></h5>
	<a href="/yoyo">
		<button class="btn" style="width: 15%;border-radius: 7px;">Back to YoYo HOME</button>
	</a>
</body>
</html>

<?php $conn->close(); ?>