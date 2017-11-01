<?php
	function checkEmail($mail) {
		if (preg_match("/^[a-z0-9_.]+[@]{1}+[a-z0-9_]{2,8}+[.]{1}+[a-z0-9_]{2,4}$/", $mail)) {
			return true;
		}
	}

	function checkName($name) {
		if (preg_match("/^[a-zA-Z- ]*$/", $name)) {
			return true;
		}
	}

	function checkAmount($amount) {
		if (preg_match("/^[0-9]$/",$amount)) {
			if ($amount > 0 && $amount <= 100000) {
				return true;
			}
		}
	}

	function checkPhone($mobile) {
		if (preg_match("/^[0-9]{11}$/", $mobile)) {
			return true;
		}
	}

	function checkUrl($url) {
		if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
			return true;
		}
	}
?>