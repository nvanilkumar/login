$(document).ready(function(){
	 $("#password_form").validate({
		rules: {
				password: {
						required: true,
						minlength: 6,
						maxlength: 16,
						
					},
					repassword: {
						required: true,
						equalTo: "#password"
					},
						 
		},
  	messages: {
					password: {
						required: "Please provide a password",
						rangelength: jQuery.format("Enter at least {0} characters")
					},
					repassword: {
						required: "Repeat your password",
						minlength: jQuery.format("Enter at least {0} characters"),
						equalTo: "Enter the same password as above"
					},
					 
					
		}	 
				
			
	});

});