	<?php require_once("include/top.php"); ?>

			<div class="content">
			<h1 align="center">Update Supplier Details</h1>
	<?php 
		if (isset($_POST['submit']) || !isset($_POST['submit'])) {
			if (!isset($_POST['sName'])) {
				$_POST['sName'] = 0;	
			}
			$sql = "SELECT * FROM supplier WHERE name = '{$_POST['sName']}';";
			$query = $conn->query($sql);
			if ($query->num_rows != 1) {
				if ($query->num_rows == 0) {
					if ($_POST['sName'] != '0' ) {
						echo "<script>if(confirm('No such a supplier. Add new Supplier?') == true) {location.replace('add-sup?new={$_POST['sName']}');} </script>";
					}
				}
	?>
				<form name="add_supplier" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php') . 'p'; ?>">
				    <label for="sName">Supplier Name</label>
				    <input type="text" name="sName" id="sName" required list="sName-list">
				    <datalist id="sName-list">
				    	<?php 
				    		$query = $conn->query("SELECT supplierId, name FROM supplier;");
				    		while ($result = $query->fetch_array()) {
				    			echo "<option value='{$result[1]}'>{$result[0]}</option>\n";
				    		}
				    	 ?>
				    </datalist>
				    <button class="btn" type="submit" name="submit"> Check </button>
				</form>
	<?php
		} else {
			if (isset($_POST['submitUpdate'])) {
				$sql = "UPDATE supplier SET Address = '{$_POST['address']}', nicORbrn = '{$_POST['nic']}' WHERE name = '{$_POST['sName']}';";
				if ($conn->query($sql) === true) {
					echo "<script>alert('Update Successfully.'); </script>";
					echo "<script>location.replace('edit-sup');</script>";
				} else {
					echo "<script>alert('Failed to update.'); </script>";
				}
			}
	?>
				<form name="add_supplier2" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php') . 'p'; ?>">
					<input type="hidden" name="sName" value="<?php echo $_POST['sName']; ?>">
					<h4>Supplier : <span><?php echo $_POST['sName']; ?></span></h4>
					<label for="address">Address</label>
				    <input type="text" name="address" required>

					<label for="nic">NIC or BR No</label>
				    <input type="text" name="nic" required>

				    <button class="btn" type="submit" name="submitUpdate" style="border-color: red;"> Update Supplier </button>
				</form>
	<?php
			}
		}
	 ?>
			</div>
<script src="js/add-sup.js"></script>
<?php require_once("include/bottom.php"); ?>