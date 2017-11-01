// JavaScript Document
jQuery(document).ready(function (e) {  
    submitForm = function (that, redirect) { 
        jQuerythat = jQuery(that);
        var $thatForm = jQuerythat.parents("form");
        jQuery($thatForm).one("submit", function (e) {
            e.preventDefault();
            $btnVal = jQuerythat.val();
            jQuerythat.attr({"disabled": "disabled"});
            jQuerythat.val("Please Wait...");
            fd = new FormData(this);
            jQuery.ajax({
                url: "submit.php",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                dataType: "json",
                success: function (r) {
                    //alert(r);
                    jQuerythat.removeAttr("disabled");
                    jQuerythat.val($btnVal);
                    if (r.success) {
//                        alert(r.message);
                        jQuery("#wng").hide();
                        jQuery("#suc").html(r.message).fadeIn();                        
                        $thatForm.trigger('reset');
                        if(redirect){
                            setTimeout(function(){location.href = redirect;},5000);
                        }else{
                            setTimeout(function(){location.href = "";},5000);
                        }
                    }
                    else {
                        jQuery("#suc").hide();
                        jQuery("#wng").html(r.message).fadeIn();
                        setTimeout(function(){ jQuery("#wng").slideUp()},5000);
//                        alert(r.message);
                    }
                },
                error: function (a, b, c) {
                    jQuerythat.removeAttr("disabled");
                    jQuerythat.val($btnVal);
					alert(a.responseText);
                    //alert("Ajax ERROR!!!\n");
                }
            });
            return false;
        });
    }//ajax submission code end
});