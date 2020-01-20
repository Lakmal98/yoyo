<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgot Password</title>
	
	<link rel="stylesheet" href="css/reset.css">
</head>
<body>
	<div class="reset-form">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="email" class="shift-bottom">Enter the email address</label>
			<input type="email" required name="email" class="shift-bottom">
			<button type="submit" name="submit" class="shift-bottom btn">Reset</button>
		</form>
	</div>
</body>
</html>