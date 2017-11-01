<?php include_once('database.php');
	$brand = $_GET['brand'];
	if ($brand != "0") {
		$query = "SELECT * FROM md_product WHERE p_model LIKE '%".$brand."%' ORDER BY p_id DESC ";
	} elseif($brand == "all") {
		$query = "SELECT * FROM md_product";
	} else {
		$query = "SELECT * FROM md_product";
	}
	
	global $query;
	$res = selectAll($query);
?>
<div class="product_image">
<?php
	$count = mysqli_num_rows($res);
		if ($count < 1) { ?>
		</table>
			<div class="msg">
				<?php echo "No records found"; ?>
			</div>
			</div>
		<?php
			} else {
				while ($result = mysqli_fetch_assoc($res)) { ?>
		<div class="item">

		    <a href="single_dealer.php?v=<?= $result['p_id']; ?>"><img src="assets/img/logo.png"/>
		    <span class="caption"><?= $result['p_model']; ?></span> </a>
		</div>
	<?php } }?>