<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "db_md";

	$con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

	function insertData($query) {
		global $con;
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return true;
			} else {
				echo mysqli_error($con);
			}
		} else {
			echo "Database connection failed";
		}
	}

	function selectData($query) {
		global $con;
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return mysqli_fetch_assoc($result);
			} else {
				return false;
			}
		} else {
			echo "Database connection failed";
		}
	}

	function selectAll($query) {
		global $con;
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return $result;
			} else {
				echo mysqli_error($con);
			}
		} else {
			echo "Database connection failed";
		}
	}

	function updateData($query) {
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {
			echo "Database connection failed";
		}
	}

	function deleteData($query) {
		global $con;
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {
			echo "Database connection failed";
		}
	}

	function rowCount($query) {
		global $con;
		if ($con) {
			$result = mysqli_query($con,$query);
			if ($result) {
				return mysqli_num_rows();
			} else {
				return false;
			}
		} else {
			echo "Database connection failed";
		}
	}
?>