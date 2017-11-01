// JavaScript Document
$(document).ready(function (e) {  
    submitForm = function (that, redirect) { 
        $that = $(that);
        var $thatForm = $that.parents("form");
        $($thatForm).one("submit", function (e) {
            e.preventDefault();
            $btnVal = $that.val();
            $that.attr({"disabled": "disabled"});
            $that.val("Please Wait...");
            fd = new FormData(this);
            $.ajax({
                url: "submit.php",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                dataType: "json",
                success: function (r) {
                    //alert(r);
                    $that.removeAttr("disabled");
                    $that.val($btnVal);
                    if (r.success) {
//                        alert(r.message);
                        $("#wng").hide();
                        $("#suc").html(r.message).fadeIn();                        
                        $thatForm.trigger('reset');
                        if(redirect){
                            setTimeout(function(){location.href = redirect;},5000);
                        }else{
                            setTimeout(function(){location.href = "";},5000);
                        }
                    }
                    else {
                        $("#suc").hide();
                        $("#wng").html(r.message).fadeIn();
                        setTimeout(function(){ $("#wng").slideUp()},5000);
//                        alert(r.message);
                    }
                },
                error: function (a, b, c) {
                    $that.removeAttr("disabled");
                    $that.val($btnVal);
					alert(a.responseText);
                    //alert("Ajax ERROR!!!\n");
                }
            });
            return false;
        });
    }//ajax submission code end
});