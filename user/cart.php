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
			<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat cumque iure quis, debitis unde illum nesciunt id rem blanditiis quibusdam voluptas? Laboriosam, quod ducimus assumenda maiores possimus unde ipsa totam.</div>
			<div>Saepe provident quidem dolore ullam aperiam illum inventore similique at sequi animi hic harum sed recusandae tempore, laborum molestiae quas iusto esse? Accusantium molestias eum consequuntur eaque ut beatae quibusdam.</div>
			<div>Nobis optio perferendis culpa, aut eligendi ea voluptate nisi modi reprehenderit doloribus, nihil iure minima sit aspernatur aliquid vero quasi qui, ipsum rerum debitis eaque architecto animi quo? Ipsam, cum!</div>
			<div>Non libero quos in officia veritatis obcaecati earum veniam nobis ullam! Asperiores fugit officia sunt iure, dolor magni blanditiis aliquam quaerat beatae ut. Quaerat deserunt esse qui magni nobis quo.</div>
		</div>
	</div>
</main>

<script src="js/cart.js"></script>
</body>
</html>