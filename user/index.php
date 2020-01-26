<?php require_once('include/check-login.php'); ?>
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
	<div class="header">
	  <h2>YoYo Online Market</h2>
	  <p>New Year sale</p>
	</div>

	<nav id="nav">
	  <i class="fas fa-bars" onclick="showSideNav();"></i>
	  <a href="../index"><i class="fas fa-home"></i></a>
	  <span>
	  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
	  		<input type="text" name="s" id="searchBox" placeholder="Search...">
	  		<button type="submit" name="q" id="submit" value="true"></button>
	  	</form>
		  <i class="fas fa-search" onclick="search();"></i>
		  <a href="cart" target="_blank"><i class="fas fa-shopping-cart"></i></a>
		  <i class="fas fa-user"></i>
		  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='logout-form' method='post'>
				<i class="fas fa-sign-out-alt" onclick="document.getElementById('logout-btn').click();"></i>
			<button type="submit" name="logout" id="logout-btn"></button>
		  </form>
	  </span>
	</nav>

	<div id="side-nav">
	  <i class="fas fas fa-times" onclick="hideSideNav();"></i>
	  <ul>
	  	<li>Category</li>
	  	<ul>
	  		<li>1</li>
	  		<li>2</li>
	  		<li>3</li>
	  	</ul>
	  </ul>
	</div>

	<main>
		<center>
		<?php for ($i=0; $i < 12; $i++) { ?>
			<div class="col">
				<img src="../img/sale.jpg" alt="Item picture" class="item-picture">
				<div class="price">
					Rs. 150.40
					<span>
						50% off
					</span>
				</div>
				<div class="description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</div>
			</div>
		<?php } ?>
		</center>	
	</main>

	<script src="js/user.js"></script>
</body>
</html>