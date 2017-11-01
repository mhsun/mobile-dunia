<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title">
				<h2>Manage Advertises</h2>
			</div>
			<div class="data">
				<table>
					<tr>
						<th>Catagory Name</th>
						<th>Action</th>
					</tr>
					<?php
						$id = $_SESSION['id'];
						$query = "SELECT * FROM md_category WHERE user_id ='$id' ORDER BY cat_id DESC";
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
						<td><?= $result['cat_name']; ?></td>
						<td style="text-align: center;">
							<a href="view_category.php?v=<?= $result['cat_id']; ?>" class="clr">View </a>| 
							<a href="edit_category.php?e=<?= $result['cat_id']; ?>" class="edt">Edit </a>| 
							<a href="delete_category.php?d=<?= $result['cat_id']; ?>" class="dlt" onclick="return confirm('Are you sure to DELETE?')">Delete</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>