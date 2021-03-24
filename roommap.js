$('document').ready(function()
{
    /* validation */
    $("#room_info").validate({
        rules:
        {
            dept_name: {
                required: true,
                minlength: 3
            },
			student: {
                required: true,            
			email: true
            },
		
			type-list: {
                required: true,
			number: true,
			minlength: 10,
                maxlength: 10
			
            },


            room: {
                required: true
            },
		  capacity: {
                required: true,
			
                
            },
		  fees: {
                required: true,
			
                
            },
        
        },
        messages:
        {
            user_name: "Please Provide Your Name ",
		
		  email_id:{
                required: "please Provide your email id",
			
                email: "provide valid emaail  format ex xxx@yyy.com"
            },
		mobile_no: "Please Provide Your mobile Number (without +91) ",
            password:{
                required: "please Provide password",
			
                minlength: "Password Needs To Be Minimum of 4 Characters"
            },
           password2: "Confirm Password Should match above password",
            
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'reg.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
				$("#register-form")[0].reset();
			
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;  !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign up');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign up');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});