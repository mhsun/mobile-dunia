<?php include_once('header.php'); ?>
	
		<div class="content">
			<div class="product" id="pro">
			<?php
				$id = $_GET['v'];
				$query = "SELECT * FROM md_user_product WHERE p_id='$id'";
				$result = selectData($query);
				$sql = "SELECT * FROM md_user WHERE user_id = (SELECT user_id FROM md_user_product WHERE p_id='$id')";
				$res = selectData($sql);
			?>
				<div class="upper">
					<div class="image_view">
						<img src="<?= $result['p_image']; ?>" alt="A big image of Mobile">
					</div>
					<div class="product_description">
						<table>
							<tr>
							    <th class="single_data sin_data">Model</th>
							    <td class="single_data"><?= $result['p_model']; ?></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Market Price: (BDT)</th>
							    <td class="single_data"><?= $result['p_price']; ?></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Seller's Price: (BDT)</th>
							    <td class="single_data"><?= $result['p_user_price']; ?></td>
							</tr>
							<?php
								if ($result['used'] != "none") { ?>

							<tr>
							    <th class="single_data sin_data">Used for: </th>
							    <td class="single_data"><?= $result['used']; ?></td>
							</tr>
							<?php 
								}
							?>
							<tr>
							    <th class="single_data sin_data">Warranty: </th>
							    <td class="single_data"><?= $result['p_warranty']; ?></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Selling Area: </th>
							    <td class="single_data"><?= $result['p_area']; ?></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Mobile Description:</th>
							    <td class="single_data short"><p><?= $result['p_desc']; ?></p></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Seller Name: </th>
							    <td class="single_data"><?= $res['user_name']; ?></td>
							</tr>
							<tr>
							    <th class="single_data sin_data">Seller Phone:</th>
							    <td class="single_data"><?= $res['user_phone']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>

<?php include_once('advertise.php'); ?>
<?php include_once('footer.php'); ?>