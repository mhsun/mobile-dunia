function checkUserData() {
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var subject = document.getElementById('subject').value;
	var msg = document.getElementById('message').value;
	var txt = document.getElementById('txt');
	var frm = document.getElementById('frm');
	var dataString = "name="+name+"&mail="+email;
	if (name=="") {
		txt.innerHTML = "Please Fill Up the Name Field";
		txt.style.color = "red";
		return false;
	}
	
	if (email=="") {
		txt.innerHTML = "Please Fill Up the Email Field";
		txt.style.color = "red";
		return false;
	}
	
	if (subject=="") {
		txt.innerHTML = "Please Fill Up the Subject Field";
		txt.style.color = "red";
		return false;
	}
	
	if (msg=="") {
		txt.innerHTML = "Please Fill Up the Message Field";
		txt.style.color = "red";
		return false;
	}
	
	jQuery.ajax({
		type: "post",
		url: "test.php",
		data: dataString,
		cache: false,
		success: function(res){
			jQuery('#txt').html(res);
		}
		
		
		
	});
	//frm.reset();
	
	return false;
}

