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
					} else {
						echo 0;
					}
				 ?>
			)</h2>
			<div class="select-div" <?php if ($result[0] <= 0) { echo "style='display: none;'"; } ?> >
				<form action="include/remove-all-cart" method="post">
				<button type="submit" name="removeAll" class="remove-btn"><i class="fas fa-trash"></i></button>
				
				<label for="select">
					Remove All
				</label>
				</form>
			</div>
		</div>
		<div class="summary" <?php if ($result[0] <= 0) { echo "style='display: none;'"; } ?> >
			<h2>
				Order Summary
			</h2>
			<div>
				<div>
					Subtotal
					<span style="text-transform: none;">
						<?php 
							$sql = "SELECT SUM(i.unitPrice * c.quantity) AS sum FROM item AS i, cart AS c WHERE i.itemId = c.itemId AND c.userId = {$_SESSION['userId']};";
							$total = $conn->query($sql);
							$cost = ($total->fetch_assoc())['sum'];
							echo "LKR " . number_format($cost, 2);
						?>
					</span>
				</div>
				<div>
					Shipping 
					<span>
						<?php 
							$sql = "SELECT COUNT(itemId) AS count FROM cart WHERE userId = {$_SESSION['userId']};";
							$shippng = $conn->query($sql);
							$count = $shippng->fetch_assoc()['count'];
							if ($count == 0) {
								echo "LKR " . number_format(0, 2);
							} else if ($count > 0) {
								if ($count == 1) {
									echo "LKR " . number_format(200, 2);
									$cost += 200;
								} else {
									echo "LKR " . number_format(200+(50*$count), 2);
									$cost += 200+(50*$count);
								}
							} else {
									echo "No shipping";
									$cost = 0;
							}
						?>
					</span>
				</div>
				<hr>
				<div class="total">
					Total
					<span>
						<?php echo "LKR " . number_format($cost, 2); ?>
					</span>
				</div>
			</div>
			<div>
				<!-- <form action="" method="post"> -->
					<button type="button" class="btn" name="buy" onclick="_('payment-window').style.display='block';">
						BUY (<?php 
							if ($result[0] > 0) {
								echo $result[0];
							} else {
								echo 0;
							}
						 ?>)
					</button>
				<!-- </form> -->
			</div>
		</div>
		<div class="cart-list" <?php if ($result[0] <= 0) { echo "style='display: none;'"; } ?> >
			<?php 
				$sql = "SELECT * FROM cart WHERE userId = {$_SESSION['userId']};";
				$query = $conn->query($sql);
				while ($result = $query->fetch_assoc()) {
			?>
			<div class="cart-item">
				<div class="select-div">
					<form action="<?php echo 'include/remove-item-cart?i=' . $result['itemId']; ?>" method="post">
						<button type="submit" name="select-item" value='<?php echo $result['cartLog']; ?>' class='trash-btn'>
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
							<?php echo $results['description']; ?>
						</div>
						<div class="price">
							<?php echo 'LKR ' . number_format($results['unitPrice'], 2); ?>
							<span class="quantity-added">
								<?php echo "X " . $results['quantity']; ?>
							</span>
						</div>
					</span>
				</div>
			</div>
			<?php
				}
			 ?>
		</div>
	</div>
	<div id="payment-window">
		<form action="include/purchace" method="post">
			<i class="fas fa-times" onclick="closePayment();" id="closePayment"></i>
			<h3 style="clear: both;">Visa/Master Card</h3>
			<div>
				<label> Card Holders Name </label>
				<input type="text" placeholder="Holder Name" minlength="3" required id="cName" name="cName" onkeyup="cardValidate();">
			</div>
			<div>
				<label> Card Number </label>
				<input type="number" placeholder="xxxx xxxx xxxx xxxx" min="0" required id="cNum" name="cNum" onkeyup="cardValidate();">
			</div>
			<div>
				<label>Expire Date </label>
				<input type="number" placeholder="year" max="2028" min="2020" required style="max-width: 24%;" id="cYear" name="cYear" onkeyup="cardValidate();">
				<input type="number" placeholder="month" min="1" max="12" required style="max-width: 24%;" id="cMonth" name="cMonth" onkeyup="cardValidate();">
			</div>
			<div>
				<label>CCV </label>
				<input type="number" min="000" max="999" required name="ccv" id="ccv" onkeyup="cardValidate();">
			</div>
			<div>
				<div style="padding: 15px 0 0 0;font-weight: bold;color: red;font-size: 25px;"><?php echo "LKR " . number_format($cost, 2); ?></div>
				<button type="submit" name="purchace" class="btn" id="purchace" disabled>Purchase</button>
			</div>
		</form>
	</div>
</main>

<script src="js/cart.js"></script>
</body>
</html>