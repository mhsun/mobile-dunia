<?php include_once('admin_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Dealers</h2>
			</div>
			<div class="form_search">
				<form action="user_search.php" method="GET">
					<input type="text" name="search" placeholder="Type Here To Search">
					<input type="hidden" name="user" value="dealer">
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
						$query = "SELECT * FROM md_user WHERE user_type='dealer' ORDER BY user_id DESC";
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
							<a href="view_dealer.php?v=<?= $result['user_id']; ?>" class="clr">View </a>
							<?php 
								if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') { ?>
							<a href="delete_dealers.php?d=<?= $result['user_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')">| Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>