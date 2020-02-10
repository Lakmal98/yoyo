<?php require_once("include/top.php"); ?>
<?php 
	if (isset($_POST['submit'])) {
		$sql = "SELECT * FROM item WHERE itemName = '{$_POST['itemName']}';";
		$query = $conn->query($sql);
		if ($query->num_rows == 0) {
			$photoTmpPath = $_FILES['thumbnail']['tmp_name'];
			$data = file_get_contents($photoTmpPath);
			$base64 = 'data:image/' . $_FILES['thumbnail']['type'] . ';base64,' . base64_encode($data);
			
			$sql = "INSERT INTO item (itemName,categoryId, quantity, supplierId, unitPrice, description, thumbnail) ";
			$sql .= "VALUES ('{$_POST['itemName']}', {$_POST['categeory']}, {$_POST['qty']}, {$_POST['sup']}, {$_POST['unitPrice']}, '{$_POST['description']}', '{$base64}');";
			if ($conn->query($sql) === true) {
				echo "<script>alert('Item Added succussfully.')</script>";
			} else {
				echo "<script>alert('Failed to add item.')</script>";
			}
		} elseif ($query->num_rows == 1) {
			$sql = "UPDATE item SET quantity = (SELECT quantity FROM item WHERE itemName = '{$_POST['itemName']}') + {$_POST['qty']} WHERE itemName = '{$_POST['itemName']}';";
			if ($conn->query($sql) === true) {
				echo "<script>alert('Quantity updated succussfully.')</script>";
			} else {
				echo "<script>alert('Quantity update failed.')</script>";
			}
		} else {
			echo "<script> alert('Database error');</script>";
		}
	}
 ?>
	
	<div class="content">
		<h1 align="center">Add Item</h1>
		<form name="add_item" method="post" action="<?php echo chop($_SERVER['PHP_SELF'], '.php'); ?>" enctype="multipart/form-data">
		    <label for="Itemname">Item Name</label>
		    <input type="text" name="itemName" id="itemName" tabindex="1" required list="item-list" value="<?php if(isset($_GET['new'])) {echo $_GET['new'];} ?>">
				<datalist id="item-list">
					<?php 
						$query = $conn->query("SELECT itemId, itemName FROM item;");
						while ($result = $query->fetch_array()) {
							echo "<option value='" . $result[1] . "'>" . $result[0] . "</option>";
						}
					 ?>
				</datalist>

		    <label for="categeory">Categeory</label>
		    <select id="categeory" name="categeory" tabindex="2" required>
		      <option value="1">Electric Item</option>
		      <option value="2">Clothing</option>
		      <option value="3">Jwellery</option>
		    </select>
			<label for="qty">Quantity</label>
		    <input type="number" name="qty" min="1" tabindex="3" required>
			<label for="sup">Supplier</label>
		    <select id="sup" name="sup" tabindex="4" required>
		      <option value="1">Supplier 1</option>
		      <option value="2">Supplier 2</option>
		      <option value="3">Supplier 3</option>
		    </select>
		    <label for="unitPrice">Unit Price</label>
		    <input type="number" name="unitPrice" min="0" tabindex="5" required step="0.01">
		    <label for="description">Description</label>
		    <input type="text" name="description" tabindex="6" required minlength="10">
		    <label for="thumbnail">Thumbnail</label>
		    <input type="file" name="thumbnail" accept="image/*" required>
		  
		    <button type="submit" name="submit" class="btn" tabindex="8"> Add item </button>
		  </form>
		</div>
<script src="js/add-item.js"></script>
<?php require_once("include/bottom.php"); ?>
