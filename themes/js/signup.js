$(document).ready(function() {
	
	create_captcha();
	$('.create_captcha').live("click",function(){
	 	create_captcha();
	 });
						   
	$('.usertype').click(function(){
		var type=$(this).val();
		//alert('t:'+ type);
		if(type == '1')
		{
			$('#e_div').show();
			$('#v_div').hide();
			$('#volunteer_form')[0].reset();
		}else{
			$('#v_div').show();
			$('#e_div').hide();
			$('#e_form')[0].reset();
		}
		
		
		
	});
	
	$("#e_form").validate({
		rules: {
			
					schoolname: {
					  required: true,
					  
					},
					add1: {
					  required: true,
					  
					},
					city: {
					  required: true,
					  
					},
					zipcode: {
					  required: true,
					  
					},
					schoolphone: {
					  required: true,
					  number: true,
					  
					},
					schoolfax: {
					 
					  number: true,
					  
					},
					first: { 
						required: true,
						 minlength: 3 
						},
					last: { 
						required: true,
						 minlength: 2 
						},
					workphone: {
					  required: true,
					  number: true,
					  
					},
					cellphone: {
					  required: true,
					  number: true,
					  
					},
					e_fax: {
					  required: true,
					  number: true,
					  
					},
					email : {
						required: true,
						email: true,
						
					},
					username : {
						required: true,
						 minlength: 3,
						remote: {
						url: baseUrl + "remote/check_username",
						type: "post",
						data: {
								username: function() {
								return $("#username").val();
								}
							}
						}
					},
					gradelevel: {
					  required: true,
					  
					},
					communication: {
					  required: true,
					  
					},
					e_first: { 
						required: true,
						 minlength: 3 
						},
					e_last: { 
						required: true,
						 minlength: 2 
						},
					a_phone: {
					  required: true,
					  number: true,
					  
					},
					a_fax: {
					  required: true,
					  number: true,
					  
					},
					e_email : {
						required: true,
						email: true,
						
					},
					
					password: {
						required: true,
						minlength: 6,
						maxlength: 16,
						
					},
					repassword: {
						required: true,
						equalTo: "#password"
					},
					captcha_word_e: {
                    required: true,
                    remote: {
                    url: baseUrl + "remote/captcha_validation",
                    type: "post",
                    data: {
                            captcha_word: function() {
                                return $("#captcha_word_e").val();
                            }
                        }
                    }              
                },
					
				 
		},
  	messages: {
					first: { 
						 required: "Please enter the first name",
					},
					last: { 
						 required: "Please enter the last name",
					},

					password: {
						required: "Please provide a password",
						rangelength: jQuery.format("Enter at least {0} characters")
					},
					repassword: {
						required: "Repeat your password",
						minlength: jQuery.format("Enter at least {0} characters"),
						equalTo: "Enter the same password as above"
					},
					email: {
						required: 'Please enter valid Email!',
						remote: 'email alerady exists  '
					},
					username: {
						required: 'Please enter valid username!',
						remote: 'username alerady exists  '
					},
					e_email: {
						required: 'Please Enter Valid Email!'
						
					},
					schoolname: { 
						 required: "Please enter the schoolname",
					},
					add1:{ 
							required: "Please enter the address",
						},
					city: { 
							required: "Please enter the city",
						},
					zipcode: { 
									required: "Please enter the zipcode",
							},
					schoolphone:{ 
									required: "Please enter the schoolphone",
								},
					
					workphone:{ 
								required: "Please enter the workphone",
							},
					
					cellphone:{ 
								 required: "Please enter the cellphone",
							},
					e_fax:{ 
							required: "Please enter the fax",
							},
					
					communication:{ 
									required: "Please enter the communication mode",
								},
					gradelevel:{ 
									required: "Please enter the gradelevel",
							},
					e_first: { 
						 required: "Please enter the first name",
					},
					e_last: { 
						 required: "Please enter the last name",
					},
					a_phone:{ 
								 required: "Please enter the cellphone",
							},
					a_fax:{ 
							required: "Please enter the fax",
							},
					captcha_word_e:
							{
								required: "Please enter the verification text ",
								remote: 'Text you entered doesn\'t match. Try again?'	
							},
					
					
		}	,
				
			
	});
	
	
	$("#volunteer_form").validate({
		rules: {
					first: { 
						required: true,
						 minlength: 3 
						},
					last: { 
						required: true,
						 minlength: 2 
						},
					add1: {
					  required: true,
					  
					},
					city: {
					  required: true,
					  
					},
					zipcode: {
					  required: true,
					  
					},
					addresstype: {
					  required: true,
					  
					},
					
					email : {
						required: true,
						email: true,
						
					},
					username : {
						required: true,
						 minlength: 3,
						remote: {
						url: baseUrl + "remote/check_username",
						type: "post",
						data: {
								username: function() {
								return $("#username_v").val();
								}
							}
						}
					},
					prefered_phone: {
					  required: true,
					  
					},
					communication: {
					  required: true,
					  
					},
					agegroup: { 
						required: true,
						
						},
					availabledays: { 
						required: true,
						 
						},
					password_v: {
						required: true,
						minlength: 6,
						maxlength: 16,
						
					},
					repassword_v: {
						required: true,
						equalTo: "#password_v"
					},
					captcha_word_v: {
                    required: true,
                    remote: {
                    url: baseUrl + "remote/captcha_validation",
                    type: "post",
                    data: {
                            captcha_word: function() {
                                return $("#captcha_word_v").val();
                            }
                        }
                    }              
                },
					
				 
		},
  	messages: {
					first: { 
						 required: "Please enter the first name",
					},
					last: { 
						 required: "Please enter the last name",
					},

					password_v: {
						required: "Please provide a password",
						rangelength: jQuery.format("Enter at least {0} characters")
					},
					repassword_v: {
						required: "Repeat your password",
						minlength: jQuery.format("Enter at least {0} characters"),
						equalTo: "Enter the same password as above"
					},
					email: {
						required: 'Please enter valid Email!',
						remote: 'email alerady exists  '
					},
					username: {
						required: 'Please enter valid username!',
						remote: 'username alerady exists  '
					},
					add1:{ 
							required: "Please enter the address",
						},
					city: { 
							required: "Please enter the city",
						},
					zipcode: { 
									required: "Please enter the zipcode",
							},
					addresstype:{ 
									required: "Please select the address type",
								},
					prefered_phone:{ 
								required: "Please select the prefered phone type",
							},

					communication:{ 
								required: "Please select the mode of communication",
							},
					agegroup:{ 
								required: "Please select the age group",
							},
					availabledays:{ 
								required: "Please select the available days",
							},
					captcha_word_v:
							{
								required: "Please enter the verification text ",
								remote: 'Text you entered doesn\'t match. Try again?'	
							},
		}	,
				
			
	});
	
	
});

function create_captcha()
{
						   
	 $.ajax({
		url: baseUrl + "remote/create_captcha",
		type: 'POST',
		success: function(msg){
			$("#captcha_e").html(msg);
			$("#captcha_v").html(msg);
			
			$("#create_captcha").val('');
			$('#captcha_error_e').html('');
			$('#captcha_error_v').html('');
			
		}
	});

}