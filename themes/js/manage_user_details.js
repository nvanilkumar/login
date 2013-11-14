$(document).ready(function() {
	
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
						remote: {
						url: baseUrl + "remote/check_userid",
						type: "post",
						data: {
								username: function() {
								return $("#email").val();
								},
								old_email: function() {
								return $("#old_email").val();
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
					 
					
				 
		},
  	messages: {
					first: { 
						 required: "Please enter the first name",
					},
					last: { 
						 required: "Please enter the last name",
					},
 
					email: {
						required: 'Please Enter Valid Email!',
						remote: 'email alerady exists  '
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
					}
					
		}	
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
						remote: {
						url: baseUrl + "remote/check_userid",
						type: "post",
						data: {
								username: function() {
								return $("#email").val();
								},
								old_email: function() {
								return $("#old_email").val();
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
				 
					
				 
		},
  	messages: {
					first: { 
						 required: "Please enter the first name",
					},
					last: { 
						 required: "Please enter the last name",
					},

					 
					email: {
						required: 'Please Enter Valid Email!',
						remote: 'email alerady exists  '
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
					 
		}	,
				
			
	});
	
	
});
