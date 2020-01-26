<?php require_once("include/top.php"); ?>

<?php 
	if (isset($_POST['submit'])) {
		$sql = "SELECT * FROM supplier WHERE name = '{$_POST['sName']}' OR nicORbrn = '{$_POST['nic']}';";
		$query = $conn->query($sql);
		if ($query->num_rows >= 1) {
			echo "<script>alert('Supplier already registerd.');</script>";
		} else {
			$sql = "INSERT INTO supplier (name, Address, nicORbrn) VALUES ('{$_POST['sName']}', '{$_POST['address']}','{$_POST['nic']}');";
			if ($conn->query($sql) === true) {
				echo "<script>alert('Supplier added successfully');</script>";
			} else {
				echo "<script>alert('Failed to add supplier.');</script>";
			}
		}
	}
 ?>

			<div class="content">
				<h1 align="center">Add Supplier</h1>
				<form name="add_supplier" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php') . 'p'; ?>">
				    <label for="SName">Supplier Name</label>
				    <input type="text" name="sName" id="sName" required value="<?php if(isset($_GET['new'])) {echo $_GET['new'];} ?>">

					<label for="address">Address</label>
				    <input type="text" name="address" required>

					<label for="nic">NIC or BR No</label>
				    <input type="text" name="nic" required>

				    <button class="btn" type="submit" name="submit"> Add Suplier</button>
				</form>
			</div>
<script src="js/add-sup.js"></script>
<?php require_once("include/bottom.php"); ?>