jQuery(document).ready(function(){
	jQuery('#some').click(function(){
		jQuery.post("test.php",
		{fname: jQuery('#name').val(),lname: jQuery('#email').val()},function(data){
			jQuery('#txt').html(data);
		});
	});
});