<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Products</h2>
			</div>
			<div class="form_search" id="some">
				<form action="" method="get" id='frm'>
					<input type="text" name="search" id="search" placeholder="Search Model Here">
					<input type="submit" value="Search" class="btn_search" onclick="return searchT()">
				</form>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
					<?php
						$txt = $_GET['search'];
						$type = $_GET['user'];
						if ($type == "dealer") {
							$query = "SELECT * FROM md_user WHERE user_type='$type' AND user_name LIKE '%".$txt."%' ORDER BY user_id DESC";
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
						<td><?= $result['user_name']; ?></td>
						<td><?= $result['user_mail']; ?></td>
						<td><?= $result['user_phone']; ?></td>
						<td style="text-align: center;">
							<a href="view_dealer.php?v=<?= $result['user_id']; ?>" class="clr">View </a>|
							<?php 
								if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<a href="delete_dealer.php?d=<?= $result['user_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } 
						} elseif($type == "new-cell-seller") {
							$query = "SELECT * FROM md_user WHERE user_type='$type' AND user_name LIKE '%".$txt."%' ORDER BY user_id DESC";
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
						<td><?= $result['user_name']; ?></td>
						<td><?= $result['user_mail']; ?></td>
						<td><?= $result['user_phone']; ?></td>
						<td style="text-align: center;">
							<a href="view_new_cell_seller.php?v=<?= $result['user_id']; ?>" class="clr">View </a>| 
							<?php 
								if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<a href="delete_dealers.php?d=<?= $result['user_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } 
						} else {
							$query = "SELECT * FROM md_user WHERE user_type='$type' AND user_name LIKE '%".$txt."%' ORDER BY user_id DESC";
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
						<td><?= $result['user_name']; ?></td>
						<td><?= $result['user_mail']; ?></td>
						<td><?= $result['user_phone']; ?></td>
						<td style="text-align: center;">
							<a href="view_old_cell_seller.php?v=<?= $result['user_id']; ?>" class="clr">View </a> |
							<?php 
								if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<a href="delete_dealers.php?d=<?= $result['user_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')"> Delete</a>
							<?php } ?>
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