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

function addAdmin() {
	var name = document.getElementById('name').value;
	var mail = document.getElementById('mail').value;
	var pg = "add";
	var dataString = "name="+name+"&mail="+mail+"&page="+pg;
	
	jQuery.ajax({
		type: "post",
		url: "submit.php",
		cache: false,
		data: dataString,
		success: function(res){
			jQuery('#msg').html(res);
		}
	});
	
	return false;
}

function searchT() {
	var searchText = document.getElementById('srch').value;
	if (searchText == "") {
		alert("Please insert some query before you search");
		return false;
	} else {
		document.getElementById('frm').submit();
	}
	
	return false;
}