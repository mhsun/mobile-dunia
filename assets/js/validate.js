function adminLogin() {
	var userName = document.getElementById('user').value;
	var passWord = document.getElementById('pass').value;
	var dataString = "username="+userName+"&pass="+passWord;
	
	jQuery.ajax({
		type: "post",
		url: "submit.php",
		cache: false,
		data: dataString,
		success: function(res){
			jQuery('#result').html(res);
		}
	});
	
	return false;
}

function insertAdmin() {
	var userName = document.getElementById('user').value;
	var passWord = document.getElementById('pass').value;
	var dataString = "username="+userName+"&pass="+passWord;
	
	jQuery.ajax({
		type: "post",
		url: "submit.php",
		cache: false,
		data: dataString,
		success: function(res){
			jQuery('#result').html(res);
		}
	});
	
	return false;
}