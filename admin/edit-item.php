<?php require_once("include/top.php"); ?>

<?php 
	if (isset($_POST['submitUpdate'])) {
		$sql = "UPDATE item SET categoryId = {$_POST['categeory']}, supplierId = {$_POST['sup']}, unitPrice = {$_POST['unitPrice']}, description = '{$_POST['description']}' WHERE itemName = '{$_POST['itemName']}';";
		if ($conn->query($sql) === true) {
			echo "<script>alert('Updated Successfully.'); </script>";
		} else {
			echo "<script>alert('Failed to update.'); </script>";
		}
	}
 ?>

	<div class="content">
		<?php 
			if (isset($_POST['itemName']) || !isset($_POST['itemName'])) {
				if (!isset($_POST['itemName'])) {
					$_POST['itemName'] = 0;
				}
				$sql = "SELECT * FROM item WHERE itemName = '{$_POST['itemName']}';";
				$result = $conn->query($sql);
				if ($result->num_rows != 1) {
					if ($result->num_rows == 0) {
						if ($_POST['itemName'] != '0') {
							echo "<script>if(confirm('No such an item. Add new item?') == true) {location.replace('add-item?new={$_POST['itemName']}');} </script>";
						}
					}
		?>
		<h1 align="center">Update Item</h1>
		<form name="update_item" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php'); ?>" id='update_item' >
		    <label for="Itemname">Item Name</label>
		    <input type="text" name="itemName" id="itemName" tabindex="1" required list="item-list">
				<datalist id="item-list">
					<?php 
						$query = $conn->query("SELECT itemId, itemName FROM item;");
						while ($result = $query->fetch_array()) {
							echo "<option value='" . $result[1] . "'>" . $result[0] . "</option>";
						}
					 ?>
				</datalist>
		    <button type="submit" name="submit" class="btn" tabindex="2"> Check </button>
		</form>
		<?php
			} elseif ($result->num_rows == 1) {
				$results = $result->fetch_assoc();
		?>
			<h4>Item : <span><?php echo $_POST['itemName']; ?></span></h4>
			<form name="update_item2" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php'); ?>" id="update_item2">
				<input type="hidden" name="itemName" value="<?php echo $_POST['itemName']; ?>">
			    <label for="categeory">Categeory</label>
			    <select id="categeory" name="categeory" tabindex="2" required>
			    <?php 
			    	$sql = "SELECT * FROM category;";
			    	$query = $conn->query($sql);
			    	while ($result = $query->fetch_assoc()) {
				    	if ($results['categoryId'] == $result['categoryId']) {
			    			echo "<option value='{$result['categoryId']}' selected>{$result['name']}</option>\n";
				    	} else {
			    			echo "<option value='{$result['categoryId']}'>{$result['name']}</option>\n";
				    	}
			    	}
			     ?>
			    </select>
				<label for="sup">Supplier</label>
			    <select id="sup" name="sup" tabindex="4" required>
		    	<?php 
			    	$sql = "SELECT * FROM supplier;";
			    	$query = $conn->query($sql);
			    	while ($result = $query->fetch_assoc()) {
				    	if ($results['supplierId'] == $result['supplierId']) {
				    		echo "<option value='{$result['supplierId']}' selected>{$result['name']}</option>\n";
					   	} else {
				   			echo "<option value='{$result['supplierId']}'>{$result['name']}</option>\n";
					   	}
		    		}
			     ?>
			    </select>
			    <label for="unitPrice">Unit Price</label>
			    <input type="number" name="unitPrice" min="0" tabindex="5" required step="0.001" value="<?php echo $results['unitPrice']; ?>">
			    <label for="description">Description</label>
			    <input type="text" name="description" tabindex="6" required minlength="10"  value="<?php echo $results['description']; ?>">
			  
			  	<button type="submit" name="submitUpdate" class="btn" tabindex="7" style="border-color: red;"> Update item </button>
			</form>
		<?php
				}
			}
		 ?>
		</div>
<script src="js/add-item.js"></script>
<?php require_once("include/bottom.php"); ?>
