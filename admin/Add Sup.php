<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Add Suplier </title>
		
		<link type="text/css" rel="stylesheet" href="css/admin.css">
	</head>
	<body>
		<div class="Outline">
			<div class="header">
				<img src="logo.png" class="logo">
				<h3 style="left:70px;display:inline;color:white;">YOYO</h3>
				<h2 class="Name">Dashboard</h2>
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
				<h1 align="center">Add Supplier</h1>
				<form name=add_supplier>
				    <label for="SName">Supplier Name</label>
				    <input type="text" name="Sname" >

					<label for="address">Address</label>
				    <input type="text" name="address" >

					<label for="nic">NIC No</label>
				    <input type="text" name="nic" >

				    <button class="btn" type="submit" name="submit"> Add Suplier</button>
				</form>
			</div>
		</div>
	</body>
</html>
