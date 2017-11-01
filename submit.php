<?php
	include_once('validation.php');
	include_once('database.php');
	$res = array("success"=>false, "message"=>"No Action!");
	$action = $_POST['action'];
		if ($action == "contact") {
			$email = htmlentities($_POST['email']);
			$subject = htmlentities($_POST['subject']);
			$msg = htmlentities($_POST['message']);
			$name = htmlentities($_POST['name']);
			if (!empty($name)) {
				if (checkName($name)) {
					if (!empty($email)) {
						if (checkEmail($email)) {
							if (!empty($subject)) {
								if (!empty($msg)) {
									$con = mysqli_connect("localhost","root","","db_md");
									$query = "INSERT INTO md_msg(name,email,subject,message) VALUES('$name','$email','$subject','$msg')";

									if (mysqli_query($con,$query)) {
										$res['success'] = true;
										$res['message'] = "Your message has been recieved. We will reach you very soon. Thank you";
										$_POST = array();
									} else {
										$res['message'] = "Failed to send message";
									}
								} else {
									$res['message'] = "Please fill up message field";
								}
							} else {
								$res['message'] = "Please fill up subject field";
							}
						} else {
							$res['message'] = "Invalid Email";
						}
					} else {
						$res['message'] = "Please fill up the email field";
					}
				} else {
					$res['message'] = "Invalid Name";
				}
			} else {
				$res['message'] = "Please fill up the name field";
			}
		} elseif ($action == "signup") {
			$name = htmlentities($_POST['name']);
			$mail = htmlentities($_POST['email']);
			$pass = htmlentities($_POST['pass']);
			$con_pass = htmlentities($_POST['con_pass']);
			$cell = htmlentities($_POST['phone']);
			$area = htmlentities($_POST['area']);
			$type = htmlentities($_POST['type']);
			//$img = htmlentities($_POST['image']);

			if (!empty($name)) {
				if (checkName($name)) {
					if (!empty($mail)) {
						if (checkEmail($mail)) {
							$q = "SELECT user_mail FROM md_user WHERE user_mail = '$mail'";
							$r = selectAll($q);
							$n = mysqli_num_rows($r);
							if ($n > 0) {
								$res['message'] = "This email already exists";
							} else {
								if (!empty($pass)) {
								if (!empty($con_pass)) {
									if ($pass == $con_pass) {
										if (!empty($cell)) {
											if (checkPhone($cell)) {
												if ($area != "0") {
													if ($type != "0") {
														$pass = md5($pass);
														$query = "insert into md_user(user_name,user_mail,user_pass,user_phone,user_address,user_type,user_image) values('$name','$mail','$pass','$cell','$area','$type','d')";
														$result = insertData($query);
														if ($result) {
															$res["success"] = true;
															$res["message"]= 'New user created.';
														} else {
															$res["message"] = "Failed to create new user";
														}
													} else {
														$res["message"] = "Please select an user type";
													}
												} else {
													$res["message"] = "Provide select a division";
												}
											} else {
												$res["message"] = "Invalid phone number";
											}
										} else {
											$res["message"] = "Please provide a cell number";
										}
									} else {
										$res["message"] = "Password do not match";
									}
								} else {
									$res["message"] = "Please confirm your password";
								}
							} else {
								$res["message"] = "Please provide a password";
							}
							}
						} else {
							$res["message"] = "Invalid email!";
						}
					} else {
						$res["message"] = "Email can't be empty!";
					}
				} else {
					$res["message"] = "Invalid name!";
				}
			} else {
				$res["message"] = "Name can't be empty!";
			}
			}
	echo json_encode($res);
?>