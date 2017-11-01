<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 140px;">View Category</h2>
			</div>
			<div class="product_form">
				<table>
					<?php
						$id = $_GET['v'];
						$query = "SELECT * FROM md_category WHERE cat_id='$id'";
						$result = selectData($query);
					?>
					<tr>
						<td>Category Name:</td>
						<td><input type="text" value="<?= $result['cat_name']; ?>" disabled style="width: 230%;"></td>
					</tr>
					<tr>
						<td></td>
						<td class="btn"><a href="edit_category.php?e=<?= $result['cat_id']; ?>"><input type="submit" value="EDIT"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>