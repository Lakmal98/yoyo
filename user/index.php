<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php //echo $_SESSION['fName'] . " " . $_SESSION['lName'] ; ?> | YoYo Online Store</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/user.css" >
</head>
<body>
	<header>
		<nav class="nav">
			<div class="figure">
				<a href="http://yoyo.ihostfull.com/">
					<img src="../img/logo.png" alt="YoYo Logo" width="4%" />
				</a>
			</div>
			<ul>
				<li>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<input type="text" name="s" id="s" />
					</form>
				</li>
			</ul>
		</nav>

		<main>
			
		</main>
	</header>
</body>
</html>