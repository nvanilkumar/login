$(document).ready(function() { 	    
    $(".check_login").click(function(){       
         loginSubmit();
    });
    
});// JavaScript Document
window.onkeyup = function (event) {
    if (event.keyCode === 13) {
        loginSubmit();
    }
}

function loginSubmit()
{
    UserName = $('#username').val();
    Password = $('#password').val();
    LoginType = 'admin';
	 
    $('#remember').is(':checked') ? $("#remember").val('remember') : $("#remember").val('0');
    Remember = $('#remember').val(); 
	   $('#username').css('border', 'none');
	   $('#password').css('border', 'none');        
       if(UserName == ""){
           $('#username').focus();
		   $('#username').css('border', '1px solid #FF0000');
	   }else if(Password == ""){
           $('#password').focus();
		   $('#password').css('border', '1px solid #FF0000');
       }
       
        if(UserName != '' && Password != ''){
            $.post(baseurl+'admin/login', {UserName: UserName, Password : Password, LoginType : LoginType , Remember : Remember}, function(response)
            {  
					if($.trim(response) == "incorrect")
                    $('.error').html('Incorrect username or password');
					else 
						window.location.href = baseurl+'admin/list_users';                    
                
            });
       }       
}