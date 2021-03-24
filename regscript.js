$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            user_name: {
                required: true,
                minlength: 3
            },
		email_id: {
                required: true,            
			email: true
            },
		
			mobile_no: {
                required: true,
			number: true,
			minlength: 10,
                maxlength: 10
			
            },


            password: {
                required: true,
                minlength: 4,
                maxlength: 8
            },
		  password2: {
                required: true,
			equalTo: "#password",
                
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