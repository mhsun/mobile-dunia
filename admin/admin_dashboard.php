<?php
include_once('admin_sidebar.php');
include_once('database.php'); ?>
		<div class="content">
			<div class="welcome">
				<h1>Hello <?= $_SESSION['name'];?>. Welcome Back !</h1>
			</div>
			<?php 
				$adminQuery = "SELECT * FROM md_admin";
				$adminRes = selectAll($adminQuery);
				$adminCount = mysqli_num_rows($adminRes);

				$dealerQuery = "SELECT * FROM md_user WHERE user_type='dealer'";
				$dealerRes = selectAll($dealerQuery);
				$dealerCount = mysqli_num_rows($dealerRes);

				$adQuery = "SELECT * FROM md_advertise";
				$adRes = selectAll($adQuery);
				$adCount = mysqli_num_rows($adRes);

				$oldCellQuery = "SELECT * FROM md_user WHERE user_type='old-cell-seller'";
				$oldCellRes = selectAll($oldCellQuery);
				$oldCellCount = mysqli_num_rows($oldCellRes);

				$newCellQuery = "SELECT * FROM md_user WHERE user_type='old-cell-seller'";
				$newCellRes = selectAll($newCellQuery);
				$newCellCount = mysqli_num_rows($newCellRes);

				$msgQuery = "SELECT * FROM md_msg";
				$msgRes = selectAll($msgQuery);
				$msgCount = mysqli_num_rows($msgRes);
			?>
			<div class="stat">
				<?php
					if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') {
				?>
				<div class="total">
					<h3>Total Admins</h3>
					<h2><?= $adminCount; ?></h2>
				</div>
				<?php } ?>
				<?php
					if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') {
				?>
				<div class="total">
					<h3>Total Advertises</h3>
					<h2><?= $adCount; ?></h2>
				</div>
				<?php } ?>
				<?php
					if ($_SESSION['post'] == 'super-admin' || $_SESSION['post'] == 'sub-admin') {
				?>
				<div class="total">
					<h3>Total Messages</h3>
					<h2><?= $msgCount; ?></h2>
				</div>
				<?php } ?>
			</div>
			<div class="stat">
				<div class="total">
					<h3>Total Dealers</h3>
					<h2><?= $dealerCount; ?></h2>
				</div>
				<div class="total">
					<h3>Total Old Cell Sellers</h3>
					<h2><?= $oldCellCount; ?></h2>
				</div>
				<div class="total">
					<h3>Total New Cell Sellers</h3>
					<h2><?= $newCellCount; ?></h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>