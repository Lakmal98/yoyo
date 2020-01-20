<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Add Item </title>
		
		<link type="text/css" rel="stylesheet" href="css/admin.css">
	</head>
	<body>
	<div class="Outline">
		<div class="header">
			<img src="logo.png" class="logo">
			<h3 style="left:70px;">YOYO</h3>
			<h2 class="Name" style="color: black;">Dashboard</h2>
		</div>

		<ul>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Add</a>
				<div class="dropdown-content">
					<a href="./Add Item.php">Item</a>
					<a href="./Add Sup.php">Supplier</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Edit</a>
				<div class="dropdown-content">
					<a href="#">Items</a>
					<a href="#">Suppliers</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Manage Users</a>
				<div class="dropdown-content">
					<a href="#">User</a>
					<a href="#">Permission</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Reports</a>
				<div class="dropdown-content">
					<a href="#">About Users</a>
					<a href="#">About Items</a>
				</div>
			</li>		
		</ul>

		<div class="content">
			<h1 align="center">Add Item</h1>
			<form name="add_item">
			    <label for="Itemname">Item Name</label>
			    <input type="text" name="Itemname">

			    <label for="categeory">Categeory</label>
			    <select id="categeory" name="categeory">
			      <option value="electric">Electric Item</option>
			      <option value="clothing">Clothing</option>
			      <option value="jwelley">Jwellery</option>
			    </select>
				<label for="qty">Quantity</label>
			    <input type="number" name="qty" min="0">
				<label for="sup">Supplier</label>
			    <select id="sup" name="sup">
			      <option value="sup1">Supplier 1</option>
			      <option value="sup2">Supplier 2</option>
			      <option value="sup3">Supplier 3</option>
			    </select>
			  
			    <button type="submit" name="submit" class="btn"> Add item </button>
			  </form>
			</div>
		</div>
	</body>
</html>
