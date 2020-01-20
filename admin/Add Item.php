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

<h1 align="center   ">Add Item</h1>
<form name=add_item>
    <label for="Itemname">Item Name</label>
    <input type="text" name="Itemname" placeholder="Item name..">

    <label for="categeory">Categeory</label>
    <select id="categeory" name="categeory">
      <option value="electric">Electric Item</option>
      <option value="clothing">Clothing</option>
      <option value="jwelley">Jwellery</option>
    </select>
	<label for="qty">Quantity</label>
    <input type="text" name="qty" placeholder="Enter quantity..">
	<label for="sup">Supplier</label>
    <select id="sup" name="sup">
      <option value="sup1">Supplier 1</option>
      <option value="sup2">Supplier 2</option>
      <option value="sup3">Supplier 3</option>
    </select>
  
    <input type="submit" value="Submit">
  </form>

</div>
</body>
</html>
