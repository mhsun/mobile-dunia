<?php include_once('cell_sidebar.php'); ?>
		<div class="content">
			<div class="single_welcome">
				<h1>Hello <?= $_SESSION['name']; ?> Welcome Back !</h1>
			</div>
			<div class="stat">
				<?php
					$id = $_SESSION['id'];
					$adQuery = "SELECT * FROM md_user_product WHERE user_id='$id'";
					$adRes = selectAll($adQuery);
					$adCount = mysqli_num_rows($adRes);
				?>
				<div class="single_total">
					<h2>Your Total Product</h2>
					<h1><?= $adCount; ?></h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>