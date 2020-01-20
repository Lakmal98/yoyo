<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>

	<link rel="stylesheet" href="css/reset.css">
</head>
<body>
	<div class="reset-form">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="password" class="shift-bottom">Enter New Password</label>
			<input type="password" required name="password" class="shift-bottom">
			<label for="passwordConfirm" class="shift-bottom">Confirm New Password</label>
			<input type="password" required name="passwordConfirm" class="shift-bottom">
			<button type="submit" name="submit" class="shift-bottom btn">Reset</button>
		</form>
	</div>
</body>
</html>