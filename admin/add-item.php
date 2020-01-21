<?php require_once("include/top.php"); ?>
	
	<div class="content">
		<h1 align="center">Add Item</h1>
		<form name="add_item" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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

<?php require_once("include/bottom.php"); ?>
