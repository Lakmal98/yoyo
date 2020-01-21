<?php require_once("include/top.php"); ?>

			<div class="content">
				<h1 align="center">Add Supplier</h1>
				<form name="add_supplier" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				    <label for="SName">Supplier Name</label>
				    <input type="text" name="Sname" >

					<label for="address">Address</label>
				    <input type="text" name="address" >

					<label for="nic">NIC No</label>
				    <input type="text" name="nic" >

				    <button class="btn" type="submit" name="submit"> Add Suplier</button>
				</form>
			</div>

<?php require_once("include/bottom.php"); ?>