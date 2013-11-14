<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Welcome to Admin Panel</title>
<link href="<?=CSS_PATH?>login_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"  src="<?=JS_PATH?>jquery.js"></script>
<script type="text/javascript"  src="<?=JS_PATH?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?=JS_PATH?>admin_login.js"></script>
<script type="text/javascript">var baseurl = '<?=base_url()?>'; </script>

</head>
<body class="loginbg">	
    <div class="login_main">
    	<div class="midel_bg">
            <div class="right_logo">
             	<a href="javascript:void(0);">Login Project Logo</a>
            </div>
        <span id="login_box">	 
       		<h2>Admin Login</h2>
            <div class="userfills">
            	<h6>Username</h6>
             	<div class="username">
              		<input type="text" id="username" name="username" placeholder="Username" value="<?php if(!empty($_COOKIE["auname"]) and ($type == "admin") )echo $_COOKIE["auname"]; 
																										if(!empty($_COOKIE["euname"]) and ($type == "evaluator")  )echo $_COOKIE["euname"]; ?>" class="text"/>
                    
            	 </div>
                 <span> </span>
             	<h6>Password</h6>
            	<div class="username">
                	<input type="password" id="password" name="password" minlength="4" maxlength="20" placeholder="Password" value="<?php if(!empty($_COOKIE["apassword"])  and ($type == "admin"))echo $_COOKIE["apassword"]; 
																																    	  if(!empty($_COOKIE["epassword"]) and ($type == "evaluator") )echo $_COOKIE["epassword"]; 	
																																	?>"/>
                    
              	</div>
                <span></span>
             	 
             	<samp><input name="" type="checkbox" <?php if(!empty($_COOKIE["apassword"])  and ($type == "admin"))echo 'checked'; 
														   if(!empty($_COOKIE["epassword"]) and ($type == "evaluator") )echo 'checked'; 	
															?> id="remember" />Remember Me</samp>
                <input type="hidden" name="login_type" value="<?=@$type?>" id="login_type" >
            	 <div class="login_btn">
                 <input   type="Submit"  class="loginbutton check_login"  value="Login"  />
                </div>
                <span class="error"> </span>
            </div>
        </span>    
            
                                   
       </div>
   
  </div>
	
    
     
</body>
</html>















