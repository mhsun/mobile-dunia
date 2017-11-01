<?php include_once('header.php'); ?>
		<div class="content">
			<div class="con">
				<div class="description" id="sign">
					<h2 style="text-align: center;padding-bottom: 0px;">Sign Up Here</h2>
				</div>
				<div class="contact">
					<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
						
					</div>
					<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
						
					</div>
					<form action="" method="post">
						<table>
							<input type="hidden" name="action" value="signup">
							<tr>
								<td>Your Name</td>
							</tr>
							<tr>
								<td><input type="text" name="name" placeholder="Type your name here"></td>
							</tr>
							<tr>
								<td>Your Email</td>
							</tr>
							<tr>
								<td><input type="email" name="email" placeholder="Type your email here"></td>
							</tr>
							<tr>
								<td>Your Password</td>
							</tr>
							<tr>
								<td><input type="password" name="pass" placeholder="Type your password here"></td>
							</tr>
							<tr>
								<td>Confirm Password</td>
							</tr>
							<tr>
								<td><input type="password" name="con_pass" placeholder="Confirm your password"></td>
							</tr>
							<tr>
								<td>Your Phone No.</td>
							</tr>
							<tr>
								<td><input type="text" name="phone" placeholder="Type your phone no. here"></td>
							</tr>
							<tr>
								<td>Your Area</td>
							</tr>
							<tr class="consel">
								<td>
									<select name="area">
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
								<td>User Account Type</td>
							</tr>
							<tr class="consel">
								<td>
									<select name="type">
										<option value="0">--Select a Type--</option>
										<option value="new-cell-seller">New Cell Seller</option>
										<option value="old-cell-seller">Old Cell Seller</option>
										<option value="dealer">Dealer</option>
									</select>
								</td>
							</tr>
							<tr id="conimg">
								<td><input type="file" name="image"></td>
							</tr>
							<tr class="consub">
								<td><input type="submit" value="Sign Up" onclick="submitForm(this)"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
<?php include_once('footer.php'); ?>