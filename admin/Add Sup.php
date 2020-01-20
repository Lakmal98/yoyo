<?php ?>

<html>
	<head>
		<link type="text/css" rel="Stylesheet" href="admin.css">
		<title> Add Item </title>
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

<h1 align="center   ">Add Supplier</h1>
<form name=add_supplier>
    <label for="SName">Supplier Name</label>
    <input type="text" name="Sname" placeholder="Supplier name..">

	<label for="address">Address</label>
    <input type="text" name="address" placeholder="Enter address..">

	<label for="nic">NIC No</label>
    <input type="text" name="nic" placeholder="Enter NIC No..">

    <input type="submit" value="Submit">
  </form>


</div>
</body>
</html>
