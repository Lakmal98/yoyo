<?php require_once('include/check-login.php'); ?>
<?php 
	if (isset($_POST['addToCart'])) {
		echo "<script>let num = prompt('How many items do you want add?:', '');if (num == null || num == '') { alert('Enater valid amount');
  			} else { location.replace('include/add-to-cart?num='+num+'&item={$_POST['addToCart']}'); }</script>";
	}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $_SESSION['fName'] . " " . $_SESSION['lName'] ; ?> | YoYo Online Store</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/user.css" >
</head>
<body>
	<div class="header">
	  <h2>YoYo Online Market</h2>
	  <p>New Year sale</p>
	</div>

	<nav id="nav">
	  <i class="fas fa-bars" onclick="//showSideNav();" title=""></i>
	  <a href="../index" title="Home"><i class="fas fa-home"></i></a>
	  <a href="history">
		<i class="fas fa-history" title="Shopping history"></i>
	  </a>
	  <span>
	  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
	  		<input type="text" name="s" id="searchBox" placeholder="Search..." title="Search here">
	  		<button type="submit" name="q" id="submit" value="true"></button>
	  	</form>
		  <i class="fas fa-search" onclick="search();" title="Click here to search"></i>
		  <a href="cart" target="_blank">
		  	<i class="fas fa-shopping-cart" title="cart">
	  		 	<?php 
	  		 		$sql = "SELECT COUNT(userId) FROM cart WHERE userId = {$_SESSION['userId']};";
	  		 		$result  = ($conn->query($sql))->fetch_array();
	  		 		if ($result[0] > 0) {
	  		 			echo "<span>{$result[0]}</span>";
	  		 		}
	  		 	 ?>
		  	</i>
		  </a>
		  <a href="profile">
		  	<i class="fas fa-user" title="profile"></i>
		  </a>
		  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='logout-form' method='post'>
				<i class="fas fa-sign-out-alt" onclick="document.getElementById('logout-btn').click();" title="Log out"></i>
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
		<?php 
		if (isset($_GET['q']) && $_GET['q'] == true) {
			$sql = "SELECT * FROM item WHERE itemName LIKE '%{$_GET['s']}%' OR description LIKE '%{$_GET['s']}%';";
		} else {
			$sql = "SELECT * FROM item;";
		}
		$query = $conn->query($sql);
		if ($query->num_rows == 0) {
			echo "<h4 style='color:#fff;'> Sorry . No result Found ....</h4>";
		}
		while($result = $query->fetch_assoc()) { ?>
			<div class="col">
				<img src="<?php echo $result['thumbnail']; ?>" alt="Item picture" class="item-picture">
				<div class="price">
					Rs. <?php echo $result['unitPrice']; ?>
					<span>
						50% off
					</span>
				</div>
				<div class="description">
					<?php echo $result['description']; ?>
				</div>
				<div class="stock">
					Stock : 
					<?php echo $result['quantity']; ?>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<i class="fas fa-plus" onclick="addToCart('addToCart<?php  echo $result['itemId']; ?>');"></i>
					<button name="addToCart" value="<?php echo $result['itemId']; ?>" class='add-to-cart' id='addToCart<?php echo $result['itemId']; ?>'></button>
				</form>
			</div>
		<?php } ?>
		</center>	
	</main>

	<script src="js/user.js"></script>
</body>
</html>
<?php $conn->close(); ?>