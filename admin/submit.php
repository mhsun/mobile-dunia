<?php
include_once('validation.php');
include_once('database.php');
$res = array("success"=>false, "message"=>"No Action!");
$action = $_POST['action'];
	if ($action == "admin") {
		$name = htmlentities($_POST['name']);
		$mail = htmlentities($_POST['email']);
		$pass = htmlentities($_POST['pass']);
		$con_pass = htmlentities($_POST['con_pass']);
		$cell = htmlentities($_POST['phone']);
		$area = htmlentities($_POST['area']);
		$post = htmlentities($_POST['post']);
		$img = $_FILES['photo'];

		if (!empty($name)) {
			if (checkName($name)) {
				if (!empty($mail)) {
					if (checkEmail($mail)) {
						$q = "SELECT admin_mail FROM md_admin WHERE admin_mail = '$mail'";
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
											if (!empty($area)) {
												if ($post != "0") {
													$pass = md5($pass);
													if (!empty($_FILES["photo"]["name"])) {
														$target_dir = "uploads/";
														$target_file = $target_dir . $_FILES["photo"]["name"];
														$uploadOk = 1;
														
														if ($_FILES["photo"]["size"] > 50000000) {
														    $res['message'] = "File size exceeded<br>";
														    $uploadOk = 0;
														}
														if ($uploadOk == 0) {
														    $res['message'] = "Sorry, your file was not uploaded<br>";
														}
														else{
														    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

$query = "insert into md_admin(admin_name,admin_mail,admin_pass,admin_cell,admin_address,admin_post,admin_image) values('$name','$mail','$pass','$cell','$area','$post','$target_file')";
													$result = insertData($query);
													if ($result) {
														$res["success"] = true;
														$res["message"]= 'New admin has been created.';
													} else {
														$res["message"] = "Failed to create new admin";
													}
														    }else {
														        $res['message'] = "Sorry, there was an error uploading your file<br>";
														    }
														}
													} else {
														$res['message'] = "Please upload an image";
													}
												} else {
													$res["message"] = "Please select a post";
												}
											} else {
												$res["message"] = "Provide your address";
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
	} elseif ($action == "advertise") {
		$company = htmlentities($_POST['com']);
		$url = htmlentities($_POST['url']);
		$status = htmlentities($_POST['status']);
		$img = $_FILES['photo'];

		if (!empty($company)) {
			if (!empty($url)) {
				if (checkUrl($url)) {
					if ($status != "0") {
						if (!empty($_FILES["photo"]["name"])) {
							$target_dir = "uploads/";
							$target_file = $target_dir . $_FILES["photo"]["name"];
							$uploadOk = 1;
							if ($_FILES["photo"]["size"] > 50000000) {
							    $res['message'] = "File size exceeded<br>";
							    $uploadOk = 0;
							}
							if ($uploadOk == 0) {
							    $res['message'] = "Sorry, your file was not uploaded<br>";
							}
							else{
							    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
							    	$query = "insert into md_advertise(company,url,status,image) values('$company','$url','$status','$target_file')";
										$result = insertData($query);
										if ($result) {
											$res['success'] = true;
											$res['message'] = 'New advertisement has been created.';
											$_POST = array();
										} else {
											$res['message'] = "Failed to create new advertisement";
										}
																		    }else {
							        $res['message'] = "Sorry, there was an error uploading your file<br>";
							    }
							}
						} else {
							$res['message'] = "Please upload an image";
						}
					} else {
						$res['message'] = "Please select a status";
					}
				} else {
					$res['message'] = "Invalid url";
				}
			} else {
				$res['message'] = "Please fill up the url field";
			}
		} else {
			$res['message'] = "Fill up the company name field";
		}
	} elseif ($action == "category") {
		$category = htmlentities($_POST['cat']);
		if (!empty($category)) {
			$query = "insert into md_category(cat_name) values('$category')";
			$result = insertData($query);
			if ($result) {
				$res['success'] = true;
				$res['message'] = 'New category has been created.';
				$_POST = array();
			} else {
				$res['message'] = "Failed to create new advertisement";
			}
		} else {
			$res['message'] = "Please fill up the category field";
		}
	} elseif ($action == "dealer_product") {
		$name = htmlentities($_POST['model']);
		$cat = htmlentities($_POST['cat']);
		$m_price = htmlentities($_POST['m_price']);
		$warranty = htmlentities($_POST['warranty']);
		$area = htmlentities($_POST['area']);
		$quan = htmlentities($_POST['quan']);
		$desc = htmlentities($_POST['desc']);
		$id = $_POST['id'];
		$img = $_FILES['photo'];

		if (!empty($name)) {
			if ($cat != "0") {
				if (!empty($m_price)) {
					if (checkAmount($m_price)) {
						if (!empty($warranty)) {
							if (!empty($area)) {
								if (!empty($quan)) {
									if (checkAmount($quan)) {
										if (!empty($desc)) {
											if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												}
												else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
												    	$query = "insert into md_product(p_model,p_cat,p_price,p_warranty,p_area,p_quantity,p_desc,p_image,user_id) values('$name','$cat','$m_price','$warranty','$area','$quan','$desc','$target_file','$id')";
														$result = insertData($query);
														if ($result) {
															$res['success'] = true;
															$res['message'] = 'New product has been created.';
															$_POST = array();
														} else {
															$res['message'] = "Failed to create new advertisement";
														}
													}else {
												        $res['message'] = "Sorry, there was an error uploading your file";
												    }
												}
											} else {
												$res['message'] = "Please upload an image";
											}
										} else {
											$res['message'] = "Please Provide Description";
										}
									} else {
										$res['message'] = "Invalid Quantity";
									}
								} else {
									$res['message'] = "Please Mention Quantity";
								}
							} else {
								$res['message'] = "Please Provide Your Address";
							}
						} else {
							$res['message'] = "Please Mention Warranty Details";
						}
					} else {
						$res['message'] = "Invalid Amount";
					}
				} else {
					$res['message'] = "Plase Enter Market Price";
				}
			} else {
				$res['message'] = "Please Select a Category";
			}
		} else {
			$res['message'] = "Please provide model name";
 		}
	} elseif ($action == "user_product") {
		$name = htmlentities($_POST['model']);
		$m_price = htmlentities($_POST['m_price']);
		$u_price = htmlentities($_POST['u_price']);
		$warranty = htmlentities($_POST['warranty']);
		$area = htmlentities($_POST['area']);
		$desc = htmlentities($_POST['desc']);
		$type = $_POST['type'];
		if ($type == "new") {
			$used = "none";
		} else {
			$used = htmlentities($_POST['used']);
		}
		
		$id = $_POST['id'];
		if (!empty($name)) {
			if (!empty($m_price)) {
					if (checkAmount($m_price)) {
						if (!empty($u_price)) {
							if (checkAmount($u_price)) {
								if (!empty($used)) {
									if (!empty($warranty)) {
									if (!empty($area)) {
										if (!empty($desc)) {
											if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												}
												else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
												    	$query = "insert into md_user_product(p_model,p_price,p_user_price,used,p_warranty,p_area,p_desc,type,p_image,user_id) values('$name','$m_price','$u_price','$used','$warranty','$area','$desc','$type','$target_file',$id)";
														$result = insertData($query);
														if ($result) {
															$res['success'] = true;
															$res['message'] = 'New product has been created.';
															$_POST = array();
														} else {
															$res['message'] = "Failed to submit new product";
														}
													}else {
												        $res['message'] = "Sorry, there was an error uploading your file";
												    }
												}
											} else {
												$res['message'] = "Please upload an image";
											}
										} else {
											$res['message'] = "Please Provide Description";
										}
									} else {
										$res['message'] = "Please Select a Division";
									}
								} else {
									$res['message'] = "Please Mention Warranty Details";
								}
								} else {
									$res['message'] = "Please mention your use time";
								}
							} else {
								$res['message'] = "Invalid Amount";
							}
						} else {
							$res['message'] = "Please Mention Your Price";
						}
					} else {
						$res['message'] = "Invalid Amount";
					}
				} else {
					$res['message'] = "Plase Enter Market Price";
				}
		} else {
			$res['message'] = "Please provide model name";
 		}
	} elseif ($action == "old_user_product") {
		$name = htmlentities($_POST['model']);
		$m_price = htmlentities($_POST['m_price']);
		$u_price = htmlentities($_POST['u_price']);
		$used = htmlentities($_POST['used']);
		$warranty = htmlentities($_POST['warranty']);
		$area = htmlentities($_POST['area']);
		$desc = htmlentities($_POST['desc']);
		$type = "old";
		$id = $_POST['id'];
		if (!empty($name)) {
			if (!empty($m_price)) {
					if (checkAmount($m_price)) {
						if (!empty($u_price)) {
							if (checkAmount($u_price)) {
								if (!empty($used)) {
									if (!empty($warranty)) {
									if (!empty($area)) {
										if (!empty($desc)) {
											$target_dir = "uploads/";
											$target_file = $target_dir . $_FILES["photo"]["name"];
											$uploadOk = 1;
											if ($_FILES["photo"]["size"] > 50000000) {
											    $res['message'] = "File size exceeded<br>";
											    $uploadOk = 0;
											}
											if ($uploadOk == 0) {
											    $res['message'] = "Sorry, your file was not uploaded<br>";
											}
											else{
											    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
											    	$query = "insert into md_user_product(p_model,p_price,p_user_price,used,p_warranty,p_area,p_desc,type,p_image,user_id) values('$name','$m_price','$u_price','$used','$warranty','$area','$desc','$type','$target_file','$id')";
													$result = insertData($query);
													if ($result) {
														$res['success'] = true;
														$res['message'] = 'New product has been created.';
														$_POST = array();
													} else {
														$res['message'] = "Failed to create new product";
													}
												}else {
											        $res['message'] = "Sorry, there was an error uploading your file";
											    }
											}
										} else {
											$res['message'] = "Please Provide Description";
										}
									} else {
										$res['message'] = "Please Select a Division";
									}
								} else {
									$res['message'] = "Please Mention Warranty Details";
								}
								} else {
									$res['message'] = "Please Mention Usage Duration";
								}
							} else {
								$res['message'] = "Invalid Amount";
							}
						} else {
							$res['message'] = "Please Mention Your Price";
						}
					} else {
						$res['message'] = "Invalid Amount";
					}
				} else {
					$res['message'] = "Plase Enter Market Price";
				}
		} else {
			$res['message'] = "Please provide model name";
 		}
	} elseif ($action == "edit_advertise") {
		$company = htmlentities($_POST['com']);
		$url = htmlentities($_POST['url']);
		$status = htmlentities($_POST['status']);
		$id = $_POST['id'];

		if (!empty($company)) {
			if (!empty($url)) {
				if (checkUrl($url)) {
					if ($status != "0") {
						if (!empty($_FILES["photo"]["name"])) {
							$target_dir = "uploads/";
							$target_file = $target_dir . $_FILES["photo"]["name"];
							$uploadOk = 1;
							if ($_FILES["photo"]["size"] > 50000000) {
							    $res['message'] = "File size exceeded<br>";
							    $uploadOk = 0;
							}
							if ($uploadOk == 0) {
							    $res['message'] = "Sorry, your file was not uploaded<br>";
							} else{
							    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
							    	$query = "UPDATE md_advertise SET company='$company',url='$url',status='$status',image='$target_file' WHERE id='$id'";
									$result = insertData($query);
									if ($result) {
										$res['success'] = true;
										$res['message'] = "Updated Successfully";
									} else {
										$res['message'] = "Failed to update";
									}
										}else {
									        $res['message'] = "Sorry, there was an error uploading your file";
									    }
						} }else {
							$query = "UPDATE md_advertise SET company='$company',url='$url',status='$status' WHERE id='$id'";
							$result = insertData($query);
							if ($result) {
								$res['success'] = true;
								$res['message'] = "Updated Successfully";
							} else {
								$res['message'] = "Failed to update";
							}
						}
					} else {
						$res['message'] = "Please select a status";
					}
				} else {
					$res['message'] = "Invalid url";
				}
			} else {
				$res['message'] = "Please fill up the url field";
			}
		} else {
			$res['message'] = "Fill up the company name field";
		}
	} elseif ($action == "edit_cat") {
		$id = $_POST['id'];
		$category = htmlentities($_POST['cat']);
		if (!empty($category)) {
			$query = "UPDATE md_category SET cat_name = '$category' WHERE cat_id = '$id'";
			$result = insertData($query);
			if ($result) {
				$res['success'] = true;
				$res['message'] = 'Updated Successfully';
			} else {
				$res['message'] = "Failed to create new advertisement";
			}
		} else {
			$res['message'] = "Please fill up the category field";
		}
	} elseif ($action == "edit_dealer_product") {
		$name = htmlentities($_POST['model']);
		$cat = htmlentities($_POST['cat']);
		$m_price = htmlentities($_POST['m_price']);
		$warranty = htmlentities($_POST['warranty']);
		$area = htmlentities($_POST['area']);
		$quan = htmlentities($_POST['quan']);
		$desc = htmlentities($_POST['desc']);
		$id = $_POST['id'];
		if (!empty($name)) {
			if ($cat != "0") {
				if (!empty($m_price)) {
					if (checkAmount($m_price)) {
						if (!empty($warranty)) {
							if (!empty($area)) {
								if (!empty($quan)) {
									if (checkAmount($quan)) {
										if (!empty($desc)) {
											if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												} else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
												$query = "UPDATE md_product SET p_model='$name',p_cat='$cat',p_price = '$m_price',p_warranty='$warranty',p_area='$area',p_quantity='$quan',p_desc='$desc', p_image='$target_file' WHERE p_id='$id'";
												    	
														$result = insertData($query);
														if ($result) {
															$res['success'] = true;
															$res['message'] = "Updated Successfully";
														} else {
															$res['message'] = "Failed to update";
														}
															}else {
														        $res['message'] = "Sorry, there was an error uploading your file";
														    }
											} }else {
												$query = "UPDATE md_product SET p_model='$name',p_cat='$cat',p_price = '$m_price',p_warranty='$warranty',p_area='$area',p_quantity='$quan',p_desc='$desc' WHERE p_id='$id'";
													$result = insertData($query);
													if ($result) {
														$res['success'] = true;
														$res['message'] = 'Updated Successfully';
														$_POST = array();
													} else {
														$res['message'] = "Failed to update";
													}
											}
										} else {
											$res['message'] = "Please Provide Description";
										}
									} else {
										$res['message'] = "Invalid Quantity";
									}
								} else {
									$res['message'] = "Please Mention Quantity";
								}
							} else {
								$res['message'] = "Please Provide Your Address";
							}
						} else {
							$res['message'] = "Please Mention Warranty Details";
						}
					} else {
						$res['message'] = "Invalid Amount";
					}
				} else {
					$res['message'] = "Plase Enter Market Price";
				}
			} else {
				$res['message'] = "Please Select a Category";
			}
		} else {
			$res['message'] = "Please provide model name";
 		}
	} elseif ($action == "edit_seller_product") {
		$name = htmlentities($_POST['model']);
		$m_price = htmlentities($_POST['m_price']);
		$u_price = htmlentities($_POST['u_price']);
		$used = $_POST['used'];
		$warranty = htmlentities($_POST['warranty']);
		$area = htmlentities($_POST['area']);
		$desc = htmlentities($_POST['desc']);
		if ($used == "none") {
			$type = "new";
		} else {
			$type = "old";
		}
		$id = $_POST['id'];
		if (!empty($name)) {
			if (!empty($m_price)) {
					if (checkAmount($m_price)) {
						if (!empty($u_price)) {
							if (checkAmount($u_price)) {
								if (!empty($used)) {
									if (!empty($warranty)) {
									if (!empty($area)) {
										if (!empty($desc)) {
											if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												} else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
												$query = "UPDATE md_user_product SET p_model='$name',p_price='$m_price',p_user_price='$u_price',used='$used',p_warranty='$warranty',p_area='$area',p_desc='$desc',type='$type',p_image='$target_file' WHERE p_id='$id'";
											$result = insertData($query);
											if ($result) {
												$res['success'] = true;
												$res['message'] = 'Updated Successfully';
												$_POST = array();
											} else {
												$res['message'] = "Failed to create new advertisement";
											}
															}else {
														        $res['message'] = "Sorry, there was an error uploading your file";
														    }
											} }else {
												$query = "UPDATE md_user_product SET p_model='$name',p_price='$m_price',p_user_price='$u_price',used='$used',p_warranty='$warranty',p_area='$area',p_desc='$desc',type='$type' WHERE p_id='$id'";
											$result = insertData($query);
											if ($result) {
												$res['success'] = true;
												$res['message'] = 'Updated Successfully';
												$_POST = array();
											} else {
												$res['message'] = "Failed to update";
											}
											}
										} else {
											$res['message'] = "Please Provide Description";
										}
									} else {
										$res['message'] = "Please Select a Division";
									}
								} else {
									$res['message'] = "Please Mention Warranty Details";
								}
								} else {
									$res['message'] = "Please Mention Usage Duration";
								}
							} else {
								$res['message'] = "Invalid Amount";
							}
						} else {
							$res['message'] = "Please Mention Your Price";
						}
					} else {
						$res['message'] = "Invalid Amount";
					}
				} else {
					$res['message'] = "Plase Enter Market Price";
				}
		} else {
			$res['message'] = "Please provide model name";
 		}
	} elseif ($action == "edit_user") {
		$name = htmlentities($_POST['name']);
		$cell = htmlentities($_POST['cell']);
		$area = htmlentities($_POST['area']);
		//$img = htmlentities($_POST['photo']);
		$id = $_POST['id'];

		if (!empty($name)) {
			if (checkName($name)) {
				if (!empty($cell)) {
					if (checkPhone($cell)) {
						if ($area != "0") {
							if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												} else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
														$query = "UPDATE md_user SET user_name='$name',user_phone='$cell',user_address='$area',user_image='$target_file' WHERE user_id='$id'";
														$result = insertData($query);
														if ($result) {
															$res["success"] = true;
															$res["message"]= 'Updated Successfully';
														} else {
															$res["message"] = "Failed to Update";
														}
															}else {
														        $res['message'] = "Sorry, there was an error uploading your file";
														    }
											} }else {
												$query = "UPDATE md_user SET user_name='$name',user_phone='$cell',user_address='$area' WHERE user_id='$id'";
														$result = insertData($query);
														if ($result) {
															$res["success"] = true;
															$res["message"]= 'Updated Successfully';
														} else {
															$res["message"] = "Failed to Update";
														}
											}
						} else {
							$res["message"] = "Provide your address";
						}
					} else {
						$res["message"] = "Invalid phone number";
					}
				} else {
					$res["message"] = "Please provide a cell number";
				}
			} else {
				$res["message"] = "Invalid name!";
			}
		} else {
			$res["message"] = "Name can't be empty!";
		}
	} elseif ($action == "edit_admin") {
		$name = htmlentities($_POST['name']);
		$cell = htmlentities($_POST['phone']);
		$area = htmlentities($_POST['area']);
		//$img = htmlentities($_POST['photo']);
		$id = $_POST['id'];

		if (!empty($name)) {
			if (checkName($name)) {
				if (!empty($cell)) {
					if (checkPhone($cell)) {
						if (!empty($area)) {
							if (!empty($_FILES["photo"]["name"])) {
												$target_dir = "uploads/";
												$target_file = $target_dir . $_FILES["photo"]["name"];
												$uploadOk = 1;
												if ($_FILES["photo"]["size"] > 50000000) {
												    $res['message'] = "File size exceeded<br>";
												    $uploadOk = 0;
												}
												if ($uploadOk == 0) {
												    $res['message'] = "Sorry, your file was not uploaded<br>";
												} else{
												    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
														$query = "UPDATE md_admin SET admin_name='$name',admin_cell='$cell',admin_address='$area',admin_image ='$target_file' WHERE admin_id ='$id'";
														$result = insertData($query);
														if ($result) {
															$res['success'] = true;
															$res['message'] = "Updated Successfully";
														} else {
															$res['message'] = "Failed to create new admin";
														}
															}else {
														        $res['message'] = "Sorry, there was an error uploading your file";
														    }
											} }else {
												$query = "UPDATE md_admin SET admin_name='$name',admin_cell='$cell',admin_address='$area' WHERE admin_id ='$id'";
												$result = insertData($query);
												if ($result) {
													$res['success'] = true;
													$res['message'] = "Updated Successfully";
												} else {
													$res['message'] = "Failed to create new admin";
												}
											}
						} else {
							$res['message'] = "Provide your address";
						}
					} else {
						$res['message'] = "Invalid phone number";
					}
				} else {
					$res['message'] = "Please provide a cell number";
				}
			} else {
				$res['message'] = "Invalid name!";
			}
		} else {
			$res['message'] = "Name can't be empty!";
		}
	} elseif ($action == "admin_pass") {
		$id = $_POST['id'];
		$query = "SELECT * FROM md_admin WHERE admin_id='$id'";
		$result = selectData($query);
		$oldPass = htmlentities($_POST['old_pass']);
		$newPass = htmlentities($_POST['new_pass']);
		$conPass = htmlentities($_POST['con_pass']);

		if (!empty($oldPass)) {
			$oldPass = md5($oldPass);
			if ($oldPass == $result['admin_pass']) {
				if (!empty($newPass)) {
					if (!empty($conPass)) {
						if ($newPass == $conPass) {
							$newPass = md5($newPass);
							$str = "UPDATE md_admin SET admin_pass='$newPass' WHERE admin_id='$id'";
							$reslt = insertData($str);
							if ($reslt) {
								$res['success'] = true;
								$res['message'] = "Password changed";
							} else {
								$res['message'] = "Can not change password";
							}
						} else {
							$res['message'] = "Password confirmation failed";
						}
					} else {
						$res['message'] = "Please confirm your new password";
					}
				} else {
					$res['message'] = "Please provide your new password";
				}
			} else {
				$res['message'] = "Wrong password";
			}
		} else {
			$res['message'] = "Please provide your old password";
		}
	} elseif ($action == "user_pass") {
		$id = $_POST['id'];
		$query = "SELECT * FROM md_user WHERE user_id='$id'";
		$result = selectData($query);
		$oldPass = htmlentities($_POST['old_pass']);
		$newPass = htmlentities($_POST['new_pass']);
		$conPass = htmlentities($_POST['con_pass']);

		if (!empty($oldPass)) {
			$oldPass = md5($oldPass);
			if ($oldPass == $result['user_pass']) {
				if (!empty($newPass)) {
					if (!empty($conPass)) {
						if ($newPass == $conPass) {
							$newPass = md5($newPass);
							$str = "UPDATE md_user SET user_pass='$newPass' WHERE user_id='$id'";
							$reslt = insertData($str);
							if ($reslt) {
								$res['success'] = true;
								$res['message'] = "Password changed";
							} else {
								$res['message'] = "Can not change password";
							}
						} else {
							$res['message'] = "Password confirmation failed";
						}
					} else {
						$res['message'] = "Please confirm your new password";
					}
				} else {
					$res['message'] = "Please provide your new password";
				}
			} else {
				$res['message'] = "Wrong password";
			}
		} else {
			$res['message'] = "Please provide your old password";
		}
	}

		echo json_encode($res);

?>

