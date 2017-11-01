<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2>Add New Product</h2>
			</div>
			<div class="product_form">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<form action="" method="post">
					<table>
						<input type="hidden" name="action" value="dealer_product">
						<input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
						<tr>
							<td>Model:</td>
							<td><input type="text" name="model" value="<?php if (isset($_POST['model'])) echo $_POST['model'] ?>"></td>
						</tr>
						<tr>
							<td>Category:</td>
							<td>
							<?php
								$id = $_SESSION['id'];;
								$query = "SELECT * from md_category WHERE user_id = '$id'";
								$res = selectAll($query);
							?>
								<select style="width: 345px;" name="cat">
									<option value="0">--Select a Category--</option>
									<?php while ($result = mysqli_fetch_assoc($res)) { ?>
									<option value="<?= $result['cat_name']; ?>"><?= $result['cat_name']; ?></option> <?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Market Price:</td>
							<td><input type="text" name="m_price" value="<?php if (isset($_POST['m_price'])) echo $_POST['m_price'] ?>"></td>
						</tr>
						<tr>
							<td>Warranty:</td>
							<td><input type="text" name="warranty" value="<?php if (isset($_POST['warranty'])) echo $_POST['warranty'] ?>"></td>
						</tr>
						<tr>
							<td>Selling Area:</td>
							<td><input type="text" name="area" value="<?php if (isset($_POST['area'])) echo $_POST['area'] ?>"></td>
						</tr>
						<tr>
							<td>Quantity:</td>
							<td><input type="text" name="quan" value="<?php if (isset($_POST['quan'])) echo $_POST['quan'] ?>"></td>
						</tr>
						<tr>
							<td>Mobile Description:</td>
							<td><textarea name="desc" style="resize: none;"><?php if (isset($_POST['desc'])) echo $_POST['desc'] ?></textarea></td>
						</tr>
						<tr>
							<td>Mobile Image:</td>
							<td><input type="file" name="photo"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="Submit" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>