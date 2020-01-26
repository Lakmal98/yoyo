<?php require_once('../db/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $_SERVER['PHP_SELF']; ?></title>
		
		<link type="text/css" rel="stylesheet" href="css/admin.css">

		<script src="js/script.js"></script>
	</head>
	<body>
		<div class="Outline">
			<div class="header">
				<img src="../img/logo.png" class="logo" onclick="location.replace('../');">
				<h3 onclick="location.replace('../');">YOYO</h3>
				<h2 class="Name" >Dashboard</h2>
			</div>

		<ul>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Add</a>
				<div class="dropdown-content">
					<a href="add-item">Item</a>
					<a href="add-sup">Supplier</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Edit</a>
				<div class="dropdown-content">
					<a href="edit-item">Items</a>
					<a href="edit-sup">Suppliers</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Manage Users</a>
				<div class="dropdown-content">
					<a href="manage-user">User</a>
					<a href="user-permission">Permission</a>
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