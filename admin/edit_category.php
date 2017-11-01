<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 140px;">Edit Category</h2>
			</div>
			<div class="product_form">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<form action="" method="post">
					<?php
						$id = $_GET['e'];
						$query = "SELECT * FROM md_category WHERE cat_id='$id'";
						$result = selectData($query);
					?>
					<input type="hidden" name="action" value="edit_cat">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<table>
						<tr>
							<td>Category Name:</td>
							<td><input type="text" name="cat" style="width: 345px;" value="<?= $result['cat_name']; ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="SAVE" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>