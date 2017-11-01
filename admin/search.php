<?php 
	if ($_COOKIE["user"] == "dealer") {
		include_once('dealer_sidebar.php');
	} else {
		include_once('cell_sidebar.php');
	}?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Products</h2>
			</div>
			<div class="form_search">
				<form action="search.php" method="get" id='frm'>
					<input type="text" name="search" id="search" placeholder="Search Model Here">
					<input type="submit" value="Search" class="btn_search" onclick="return searchT()">
				</form>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Model</th>
						<th>Market Price</th>
						<th>Warranty</th>
						<th>Action</th>
					</tr>
					<?php
						$id = $_SESSION['id'];
						$txt = $_GET['search'];
						$type = $_SESSION['post'];
						if ($type == "dealer") {
							$query = "SELECT * FROM md_product WHERE user_id='$id' AND p_model LIKE '%".$txt."%' ORDER BY p_id DESC";
						$res = selectAll($query);
						$count = mysqli_num_rows($res);
						if ($count < 1) { ?>
						</table>
							<div class="msg">
								<?php echo "No records found"; ?>
							</div>
							</div>
						<?php
							} else {
								while ($result = mysqli_fetch_assoc($res)) { 
						?>
					<tr>
						<td><?= $result['p_model']; ?></td>
						<td><?= $result['p_price']; ?></td>
						<td><?= $result['p_warranty']; ?></td>
						<td style="text-align: center;">
							<a href="view_dealer_product.php?v=<?= $result['p_id']; ?>" class="clr">View </a>|
							<a href="edit_dealer_product.php?e=<?= $result['p_id']; ?>" class="edt">Edit </a>|
							<a href="delete_dealer_product.php?d=<?= $result['p_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } 
						} else {
							$query = "SELECT * FROM md_user_product WHERE user_id='$id' AND p_model LIKE '%".$txt."%' ORDER BY p_id DESC";
						$res = selectAll($query);
						$count = mysqli_num_rows($res);
						if ($count < 1) { ?>
						</table>
							<div class="msg">
								<?php echo "No records found"; ?>
							</div>
							</div>
						<?php
							} else {
								while ($result = mysqli_fetch_assoc($res)) { 
						?>
					<tr>
						<td><?= $result['p_model']; ?></td>
						<td><?= $result['p_price']; ?></td>
						<td><?= $result['p_user_price']; ?></td>
						<td style="text-align: center;">
							<a href="view_seller_product.php?v=<?= $result['p_id']; ?>" class="clr">View </a>|
							<a href="edit_seller_product.php?e=<?= $result['p_id']; ?>" class="edt">Edit </a>|
							<a href="delete_seller_product.php?d=<?= $result['p_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } 
						} ?>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>