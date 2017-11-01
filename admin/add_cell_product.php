<?php include_once('cell_sidebar.php'); ?>
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
						<?php
							if ($_SESSION['post'] == 'new-cell-seller') {
								$type = "new";
							} else {
								$type = "old";
							}
						?>
						<input type="hidden" name="action" value="user_product">
						<input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
						<input type="hidden" name="type" value="<?= $type; ?>">
						<tr>
							<td>Model:</td>
							<td><input type="text" name="model"></td>
						</tr>
						<tr>
							<td>Market Price:</td>
							<td><input type="text" name="m_price"></td>
						</tr>
						<tr>
							<td>Your Price:</td>
							<td><input type="text" name="u_price"></td>
						</tr>
						<?php if ($_SESSION['post'] == 'old-cell-seller') { ?>
						<tr>
							<td>Used for:</td>
							<td><input type="text" name="used"></td>
						</tr>
						<?php } ?>
						<tr>
							<td>Warranty:</td>
							<td><input type="text" name="warranty"></td>
						</tr>
						<tr>
							<td>Selling Area:</td>
							<td>
								<select style="width: 345px;" name="area">
									<option value="0">--Select a Division--</option>
									<option value="bar">Barishal</option>
									<option value="ctg">Chittagong</option>
									<option value="dhk">Dhaka</option>
									<option value="khl">Khulna</option>
									<option value="syl">Syllet</option>
									<option value="raj">Rajshahi</option>
									<option value="ran">Rangpur</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Mobile Description:</td>
							<td><textarea name="desc" style="resize: none;"></textarea></td>
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