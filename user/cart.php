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
			<h2>Shopping Cart (3)</h2>
			<div class="select-div">
				<input type="checkbox" name="select" id="select">
				<label for="select">
					Select All
				</label>
				<span class="select-mark" onclick="clickThis('select');"></span>
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
			<div class="cart-item">
				<div class="select-div">
					<input type="checkbox" name="select-item-1" id="select-item-1">
					<span class="select-mark" onclick="clickThis('select-item-1');"></span>
					<img src="../img/sale.jpg" alt="Item-thumbnail">
					<span class="desc-div">
						<div class="description">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</div>
						<div class="price">
							LKR 200.34
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
</main>

<script src="js/cart.js"></script>
</body>
</html>