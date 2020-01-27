<?php require_once('include/check-login.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php //echo $_SESSION['fName'] . " " . $_SESSION['lName'] ; ?> | Cart of YoYo Online Store</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/cart.css" >
</head>
<body>

<main>
	<div class="cart">
		<div class="select-cart">
			<h2>Shopping Cart (
				<?php 
					$sql = "SELECT COUNT(userId) FROM cart WHERE userId = {$_SESSION['userId']};";
					$result  = ($conn->query($sql))->fetch_array();
					if ($result[0] > 0) {
						echo $result[0];
					}
				 ?>
			)</h2>
			<div class="select-div">
				<form action="" method="post">
				<i class="fas fa-trash"></i>
				<label for="select">
					Remove All
				</label>
				<button type="submit" name="removeAll" class="remove-btn"></button>
				</form>
			</div>
		</div>
		<div class="summary">
			<h2>
				Order Summary
			</h2>
			<div>
				<div>
					Subtotal
					<span>
						lkr 200.90
					</span>
				</div>
				<div>
					Shipping 
					<span>
						LKR 50.12
					</span>
				</div>
				<hr>
				<div class="total">
					Total
					<span>
						lkr 251.02
					</span>
				</div>
			</div>
			<div>
				<button class="btn">BUY (1)</button>
			</div>
		</div>
		<div class="cart-list">
			<?php 
				$sql = "SELECT * FROM cart WHERE userId = {$_SESSION['userId']};";
				$query = $conn->query($sql);
				while ($result = $query->fetch_assoc()) {
			?>
			<div class="cart-item">
				<div class="select-div">
					<form action="" method="post">
						<button type="submit" name="select-item-<?php echo $result['cartLog']; ?>" value='<?php echo $result['cartLog']; ?>' class='trash-btn'>
							<i class="fas fa-trash"></i>
						</button>
					</form>
					<span class="select-mark" onclick="clickThis('select-item-<?php echo $result['cartLog']; ?>');"></span>
					<?php 
						$sql = "SELECT * FROM item WHERE itemId = {$result['itemId']};";
						$results = ($conn->query($sql))->fetch_assoc();
					 ?>
					<img src="<?php echo $results['thumbnail']; ?>" alt="Item-thumbnail">
					<span class="desc-div">
						<div class="description">
							<?php $results['description']; ?>
						</div>
						<div class="price">
							<?php $results['unitPrice']; ?>
						</div>
					</span>
				</div>
			</div>
			<?php
				}
			 ?>
		</div>
	</div>
</main>

<script src="js/cart.js"></script>
</body>
</html>