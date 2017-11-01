<?php include_once('cell_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 12px;">View Product</h2>
			</div>
			<div class="product_form">
				<?php
					$id = $_GET['v'];
					$query = "SELECT * FROM md_user_product WHERE p_id='$id'";
					$result = selectData($query);
				?>
				<table>
					<tr>
						<td>Model:</td>
						<td><input type="text" value="<?= $result['p_model']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Market Price:</td>
						<td><input type="text" value="<?= $result['p_price']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Your Price:</td>
						<td><input type="text" value="<?= $result['p_user_price']; ?>" disabled></td>
					</tr>
					<?php if ($result['type'] == "old") { ?>
					<tr>
						<td>Used for:</td>
						<td><input type="text" name="used" value="<?= $result['used']; ?>" disabled></td>
					</tr>
					<?php } ?>
					<tr>
						<td>Warranty:</td>
						<td><input type="text" value="<?= $result['p_warranty']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Selling Area:</td>
						<td><input type="text" value="<?= $result['p_area']; ?>" disabled></td>
					</tr>
					<tr>
						<td>Mobile Description:</td>
						<td><textarea name="description" style="resize: none;" disabled><?= $result['p_desc']; ?></textarea></td>
					</tr>
					<tr>
						<td>Mobile Image:</td>
						<td><img src="<?= $result['p_image']; ?>" style="width: 250px; height: 120px;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><a href="edit_seller_product.php?e=<?= $result['p_id']; ?>"><input type="submit" value="EDIT"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>