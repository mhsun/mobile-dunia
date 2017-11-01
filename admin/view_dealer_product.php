<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 10px;">View Product</h2>
			</div>
			<div class="product_form" style="margin-top: 12px;padding-bottom: 10px;">
				<table>
					<?php
						$id = $_GET['v'];
						$query = "SELECT * FROM md_product WHERE p_id='$id'";
						$result = selectData($query);
					?>
					<tr>
						<td>Model:</td>
						<td><input type="text" value="<?= $result['p_model']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Category:</td>
						<td><input type="text" value="<?= $result['p_cat']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Market Price:</td>
						<td><input type="text" value="<?= $result['p_price']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Warranty:</td>
						<td><input type="text" value="<?= $result['p_warranty']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Selling Area:</td>
						<td><input type="text" value="<?= $result['p_area']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Quantity:</td>
						<td><input type="text" value="<?= $result['p_quantity']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Mobile Description:</td>
						<td><textarea name="description" disabled style="resize: none;"><?= $result['p_desc']; ?></textarea></td>
					</tr>
					<tr>
						<td>Mobile Image:</td>
						<td><img src="<?= $result['p_image']; ?>" style="width: 250px; height: 120px;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><a href="edit_dealer_product.php?e=<?= $result['p_id']; ?>"><input type="submit" value="EDIT"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>