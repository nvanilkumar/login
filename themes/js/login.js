$(document).ready(function() {

	if(activation_key !='0')//registration email
	{	
		$('#login_div').show();
		$('#registered_div').show();
	}
	
	$('.login_links_on').click(function(){
			$('#login_div').show();
	});

	$('.check_login').click(function(){

		loginSubmit();
	});
	
	$('#password').keypress(function(e) {
		if(e.which == 13) {
			loginSubmit();
		}
	});
	
	
	$("#forget_pwd").click(function(){ 
         $("#userid").val(""); 
		 $("#password").val(""); 
		  $("#email").val(""); 
         $("#login_div").hide();
         $("#forget_box").show();
    });
    
    $("#Fcancel").click(function(){       
         $("#login_div").show();
         $("#forget_box").hide();
    });
    
    $(".Fcheck_user").click(function(){       
        sendPassword();
    });
	
});

function loginSubmit()
{
    UserName = $('#userid').val();
    Password = $('#password').val();  
	registration_key=$('#r_key').val();
    $('#remember').is(':checked') ? $("#remember").val('remember') : $("#remember").val('');
    Remember = $('#remember').val();     
       if(UserName == ""){
           $('#userid').focus();
       }else if(Password == ""){
           $('#password').focus();
       }
       
        if(UserName != '' && Password != ''){
            $.post(baseUrl+'login/signin', {UserName: UserName, Password : Password, Remember : Remember,registration_key : registration_key}, 			function(response)
            {   
                if(response){
                    switch (response) {
                    case "incorrect":
                    $('.serror').html('Incorrect username or password');
                    break;

                    case "1":
                    window.location.href = baseUrl+'login/home';
                    break;
					
					case "2":
                    window.location.href = baseUrl+'login/home';
                    break;
					
					case "not_activated":
                    $('.serror').html('Please click the activation email, to activate your account.');
                    break;
					
					case "in_active":
                    $('.serror').html('Your acount has been de-activated. Please contact admin to activate your account.');
                    break;

                    }
                } else {
                    window.location.href = baseUrl;
                } 
            });
       }       
}

function sendPassword()
{   var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    Femail = $('#email').val();    
    if(Femail == "" || ! Femail.match(emailReg))
	{
           $('#Femail').focus();
		   $('#Femail').addClass(".main_body .login_main .text_box input:focus");
    }
    
     if(Femail != ''){
            $.post(baseUrl+'remote/forget_password', {Femail: Femail}, function(response)
            {  //alert(response);
                $('#Ferror').html('');
					if($.trim(response) == "incorrect"){
                        $('#Ferror2').html('');$('#Ferror').html('Incorrect email');}
					else if(response == "correct"){
                        $('#Ferror').html(''); 
                        $('#Ferror2').html('Password sent to your mail successfully...');
                        $("#Femail").val("");
                        setTimeout('$("#forget_box").hide()',3000);
                        setTimeout('$("#login_box").show()',3000);
                        $("#error").hide();
                         
                    }
                    else
                        $('#Ferror').html('');   
            });
       } 
}
