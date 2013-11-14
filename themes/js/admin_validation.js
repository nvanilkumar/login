$(function(){
    $('#add_org').validate({
        rules:{
            'sub_type':{
               required:true,
            },
			'name':{
               required:true,
            },
			'phone':{
                required:true,
                number:true
            },
			'address':{
               required:true,
            },
			'pincode':{
               required:true,
			   number:true
            },
			'city':{
               required:true,
            },
			'bank':{
               required:true,
            },
			'branch':{
               required:true,
            },
			
			'caccount_no':{
               required:true,
			  
            },
			'account_no':{
               required:true,
			    equalTo: "#caccount_no"
            },
			'ifsc_code':{
               required:true,
			   number:true
            },
            
         },
        messages:{
           
        },
		errorPlacement: function(error, element) {
			//$('.alert_error').css('display','block');
			//$('.alert_error').fadeOut(15000);
			 element.css('border', '1px solid #D20009');
			 //$(element).addClass(error);
			 //error.appendTo( element.parent().next().next() );
			 
		},
    });
  
  

});


$(function(){
    $('#addbank').validate({
        rules:{
            'b_name':{
               required:true,
            },
			'b_logo':{
               required:true,
            },
			'bank_url':{
                required:true,
                number:true
            },			            
         },
        messages:{
           
        },
		errorPlacement: function(error, element) {
			//$('.alert_error').css('display','block');
			//$('.alert_error').fadeOut(15000);
			 element.css('border', '1px solid #D20009');
			 //$(element).addClass(error);
			 //error.appendTo( element.parent().next().next() );
			 
		},
    });
  
  

});